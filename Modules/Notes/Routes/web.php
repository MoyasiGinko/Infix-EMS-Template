<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// Notes CHECK ROLE TABLES - Find correct role permission table
Route::get('notes-check-role-tables', function () {
    if (Auth::check() && Auth::user()->role_id == 1) {
        try {
            $html = "<h1>Role Permission Tables Investigation</h1>";
            
            // Check what role-related tables exist
            $tables = DB::select("SHOW TABLES LIKE '%role%'");
            $html .= "<h2>Tables containing 'role':</h2><ul>";
            foreach ($tables as $table) {
                $tableName = array_values((array)$table)[0];
                $html .= "<li>{$tableName}</li>";
            }
            $html .= "</ul>";
            
            // Check permission-related tables
            $tables = DB::select("SHOW TABLES LIKE '%permission%'");
            $html .= "<h2>Tables containing 'permission':</h2><ul>";
            foreach ($tables as $table) {
                $tableName = array_values((array)$table)[0];
                $html .= "<li>{$tableName}</li>";
            }
            $html .= "</ul>";
            
            // Check what table stores role-permission relationships
            $allTables = DB::select("SHOW TABLES");
            $html .= "<h2>Looking for role-permission relationship table...</h2>";
            
            foreach ($allTables as $table) {
                $tableName = array_values((array)$table)[0];
                if (stripos($tableName, 'permission') !== false || stripos($tableName, 'role') !== false) {
                    // Get table structure
                    try {
                        $columns = DB::select("DESCRIBE {$tableName}");
                        $columnNames = array_map(function($col) { return $col->Field; }, $columns);
                        $html .= "<h3>{$tableName}</h3>";
                        $html .= "<p>Columns: " . implode(', ', $columnNames) . "</p>";
                        
                        // Check if this table has role_id and permission_id
                        if (in_array('role_id', $columnNames) && in_array('permission_id', $columnNames)) {
                            $html .= "<p><strong>✅ This looks like the role-permission relationship table!</strong></p>";
                        }
                    } catch (\Exception $e) {
                        $html .= "<p>Could not describe table {$tableName}: " . $e->getMessage() . "</p>";
                    }
                }
            }
            
            return $html;
            
        } catch (\Exception $e) {
            return "<h1>❌ ERROR!</h1><p>Table check failed: " . $e->getMessage() . "</p>";
        }
    }
    return "<h1>ACCESS DENIED</h1><p>You must be logged in as Super Admin</p>";
});

// Notes DIRECT SEEDER - Run seeder code directly without Artisan
Route::get('notes-run-direct', function () {
    if (Auth::check() && Auth::user()->role_id == 1) {
        try {
            $html = "<h1>Notes Direct Seeder Execution</h1>";

            // Run the exact same code as in the seeder, directly
            $permissions = [
                [
                    'name' => 'notes_menu',
                    'route' => 'notes.index',
                    'status' => 1,
                    'menu_status' => 1,
                    'position' => 500,
                    'is_saas' => 0,
                    'relate_to_child' => 0,
                    'is_menu' => 1,
                    'is_admin' => 1,
                    'is_teacher' => 1,
                    'is_student' => 0,
                    'is_parent' => 0,
                    'type' => 1,
                    'permission_section' => 0,
                    'lang_name' => 'Notes',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ];

            $html .= "<p><strong>Step 1:</strong> Checking for existing permission...</p>";

            foreach ($permissions as $permission) {
                // Check if permission already exists
                $exists = DB::table('permissions')->where('route', $permission['route'])->exists();

                if (!$exists) {
                    $html .= "<p>✅ No existing permission found, proceeding with insertion...</p>";

                    $permissionId = DB::table('permissions')->insertGetId($permission);
                    $html .= "<p>✅ Permission inserted with ID: {$permissionId}</p>";

                    // Assign to Super Admin role (role_id = 1)
                    DB::table('role_has_permissions')->insert([
                        'role_id' => 1,
                        'permission_id' => $permissionId,
                    ]);
                    $html .= "<p>✅ Assigned to Super Admin role</p>";

                    // Verify insertion
                    $verify = DB::table('permissions')->where('id', $permissionId)->first();
                    $roleVerify = DB::table('role_has_permissions')->where('permission_id', $permissionId)->first();

                    $html .= "<p><strong>Verification:</strong></p>";
                    $html .= "<p>Permission in database: " . ($verify ? "✅ Found" : "❌ Not found") . "</p>";
                    $html .= "<p>Role assignment: " . ($roleVerify ? "✅ Found" : "❌ Not found") . "</p>";

                } else {
                    $existing = DB::table('permissions')->where('route', $permission['route'])->first();
                    $html .= "<p>⚠️ Permission already exists with ID: {$existing->id}</p>";
                }
            }

            $html .= "<p><strong>Final Check - Run /notes-check-db again to verify!</strong></p>";

            return $html;

        } catch (\Exception $e) {
            return "<h1>❌ ERROR!</h1><p>Direct seeder failed: " . $e->getMessage() . "</p><p>Stack trace:</p><pre>" . $e->getTraceAsString() . "</pre>";
        }
    }
    return "<h1>ACCESS DENIED</h1><p>You must be logged in as Super Admin</p>";
});

// Notes PROPER DIAGNOSIS - Find the exact issue
Route::get('notes-diagnose-issue', function () {
    if (Auth::check() && Auth::user()->role_id == 1) {
        $html = "<h1>Notes Permission Insertion Diagnosis</h1>";

        try {
            // Step 1: Check permissions table structure
            $html .= "<h2>Step 1: Permissions Table Structure</h2>";
            $columns = DB::select("DESCRIBE permissions");
            $columnNames = array_map(function($col) { return $col->Field; }, $columns);
            $html .= "<p>Available columns: " . implode(', ', $columnNames) . "</p>";

            // Step 2: Check what we're trying to insert vs what exists
            $html .= "<h2>Step 2: Data Validation</h2>";
            $permission = [
                'name' => 'notes_menu',
                'route' => 'notes.index',
                'status' => 1,
                'menu_status' => 1,
                'position' => 500,
                'is_saas' => 0,
                'relate_to_child' => 0,
                'is_menu' => 1,
                'is_admin' => 1,
                'is_teacher' => 1,
                'is_student' => 0,
                'is_parent' => 0,
                'type' => 1,
                'permission_section' => 0,
                'lang_name' => 'Notes',
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $insertingColumns = array_keys($permission);
            $missingColumns = array_diff($insertingColumns, $columnNames);
            $extraColumns = array_diff($columnNames, $insertingColumns);

            if (!empty($missingColumns)) {
                $html .= "<p>❌ Columns we're trying to insert that don't exist: " . implode(', ', $missingColumns) . "</p>";
            }

            $html .= "<p>Columns we're NOT inserting: " . implode(', ', $extraColumns) . "</p>";

            // Step 3: Check for existing duplicate
            $html .= "<h2>Step 3: Duplicate Check</h2>";
            $existingByName = DB::table('permissions')->where('name', 'notes_menu')->first();
            $existingByRoute = DB::table('permissions')->where('route', 'notes.index')->first();

            $html .= "<p>Existing by name: " . ($existingByName ? "❌ Found (ID: {$existingByName->id})" : "✅ None") . "</p>";
            $html .= "<p>Existing by route: " . ($existingByRoute ? "❌ Found (ID: {$existingByRoute->id})" : "✅ None") . "</p>";

            // Step 4: Test actual insertion with proper error handling
            $html .= "<h2>Step 4: Test Insertion</h2>";

            if (!$existingByRoute) {
                // Remove any columns that don't exist in the table
                $filteredPermission = array_intersect_key($permission, array_flip($columnNames));
                $html .= "<p>Filtered data for insertion:</p><pre>" . json_encode($filteredPermission, JSON_PRETTY_PRINT) . "</pre>";

                // Try the insertion
                DB::beginTransaction();
                try {
                    $permissionId = DB::table('permissions')->insertGetId($filteredPermission);
                    DB::rollback(); // Don't actually save, just test
                    $html .= "<p>✅ Test insertion successful! Would create ID: {$permissionId}</p>";
                } catch (\Exception $e) {
                    DB::rollback();
                    $html .= "<p>❌ Test insertion failed: " . $e->getMessage() . "</p>";
                }
            } else {
                $html .= "<p>⚠️ Cannot test insertion - duplicate exists</p>";
            }

            // Step 5: Check seeder class exists and is valid
            $html .= "<h2>Step 5: Seeder Class Check</h2>";
            $seederPath = app_path('../Modules/Notes/Database/Seeders/NotesPermissionSeeder.php');
            $html .= "<p>Seeder file exists: " . (file_exists($seederPath) ? "✅ Yes" : "❌ No") . "</p>";

            if (file_exists($seederPath)) {
                $html .= "<p>Seeder path: {$seederPath}</p>";
            }

            return $html;

        } catch (\Exception $e) {
            return $html . "<h2>❌ DIAGNOSIS ERROR</h2><p>" . $e->getMessage() . "</p><pre>" . $e->getTraceAsString() . "</pre>";
        }
    }
    return "<h1>ACCESS DENIED</h1><p>You must be logged in as Super Admin</p>";
});

// Notes FORCE INSERT - Guaranteed database insertion
Route::get('notes-force-insert', function () {
    if (Auth::check() && Auth::user()->role_id == 1) {
        try {
            // First, delete any existing Notes permission to avoid conflicts
            $existingPermission = DB::table('permissions')->where('route', 'notes.index')->first();
            if ($existingPermission) {
                DB::table('role_has_permissions')->where('permission_id', $existingPermission->id)->delete();
                DB::table('permissions')->where('id', $existingPermission->id)->delete();
            }

            // Force insert with raw SQL to ensure it works
            $permissionId = DB::table('permissions')->insertGetId([
                'name' => 'notes_menu',
                'route' => 'notes.index',
                'status' => 1,
                'menu_status' => 1,
                'position' => 500,
                'is_saas' => 0,
                'relate_to_child' => 0,
                'is_menu' => 1,
                'is_admin' => 1,
                'is_teacher' => 1,
                'is_student' => 0,
                'is_parent' => 0,
                'type' => 1,
                'permission_section' => 0,
                'lang_name' => 'Notes',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Force assign to Super Admin role
            DB::table('role_has_permissions')->insert([
                'role_id' => 1,
                'permission_id' => $permissionId,
            ]);

            // Verify insertion
            $inserted = DB::table('permissions')->where('id', $permissionId)->first();
            $roleAssigned = DB::table('role_has_permissions')->where('permission_id', $permissionId)->first();

            $html = "<h1>✅ FORCE INSERT COMPLETED!</h1>";
            $html .= "<p><strong>Permission ID:</strong> {$permissionId}</p>";
            $html .= "<p><strong>Verification:</strong></p>";
            $html .= "<pre>Permission: " . ($inserted ? "✅ Found" : "❌ Not Found") . "</pre>";
            $html .= "<pre>Role Assignment: " . ($roleAssigned ? "✅ Found" : "❌ Not Found") . "</pre>";
            $html .= "<p><strong>Now check:</strong></p>";
            $html .= "<p>• Role Permission: <a href='/rolepermission/assign-permission/2' target='_blank'>Check Role Permission</a></p>";
            $html .= "<p>• Sidebar Manager: <a href='/menumanage' target='_blank'>Check Sidebar Manager</a></p>";

            return $html;

        } catch (\Exception $e) {
            return "<h1>❌ ERROR!</h1><p>Force insert failed: " . $e->getMessage() . "</p><p>Stack trace:</p><pre>" . $e->getTraceAsString() . "</pre>";
        }
    }
    return "<h1>ACCESS DENIED</h1><p>You must be logged in as Super Admin</p>";
});

// Notes diagnostic route - Check database
Route::get('notes-check-db', function () {
    if (Auth::check() && Auth::user()->role_id == 1) {
        try {
            // Check if permission exists in database
            $permission = DB::table('permissions')->where('route', 'notes.index')->first();
            $rolePermission = null;

            if ($permission) {
                $rolePermission = DB::table('role_has_permissions')
                    ->where('permission_id', $permission->id)
                    ->where('role_id', 1)
                    ->first();
            }

            $html = "<h1>Notes Permission Database Check</h1>";

            if ($permission) {
                $html .= "<h2>✅ Permission Found:</h2>";
                $html .= "<pre>" . json_encode($permission, JSON_PRETTY_PRINT) . "</pre>";

                if ($rolePermission) {
                    $html .= "<h2>✅ Role Assignment Found:</h2>";
                    $html .= "<pre>" . json_encode($rolePermission, JSON_PRETTY_PRINT) . "</pre>";
                } else {
                    $html .= "<h2>❌ Role Assignment Missing</h2>";
                }
            } else {
                $html .= "<h2>❌ Permission Not Found in Database</h2>";
            }

            // Check if it appears in role permissions interface query
            $allPermissions = DB::table('permissions')
                ->where('status', 1)
                ->where('menu_status', 1)
                ->where('is_admin', 1)
                ->get();

            $notesInList = $allPermissions->where('route', 'notes.index')->first();

            $html .= "<h2>Role Permission Interface Check:</h2>";
            if ($notesInList) {
                $html .= "<p>✅ Notes should appear in Role Permission interface</p>";
            } else {
                $html .= "<p>❌ Notes won't appear in Role Permission interface</p>";
            }

            return $html;

        } catch (\Exception $e) {
            return "<h1>ERROR!</h1><p>Database check failed: " . $e->getMessage() . "</p>";
        }
    }
    return "<h1>ACCESS DENIED</h1><p>You must be logged in as Super Admin</p>";
});

// Notes seed route FIXED - Simple HTML response
Route::get('notes-seed-fixed', function () {
    if (Auth::check() && Auth::user()->role_id == 1) {
        try {
            // Direct database insertion - FIXED without module_name
            $permission = [
                'name' => 'notes_menu',
                'route' => 'notes.index',
                'status' => 1,
                'menu_status' => 1,
                'position' => 500,
                'is_saas' => 0,
                'relate_to_child' => 0,
                'is_menu' => 1,
                'is_admin' => 1,
                'is_teacher' => 1,
                'is_student' => 0,
                'is_parent' => 0,
                'type' => 1,
                'permission_section' => 0,
                'lang_name' => 'Notes',
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Check if permission already exists
            $exists = DB::table('permissions')->where('route', 'notes.index')->first();
            if (!$exists) {
                $permissionId = DB::table('permissions')->insertGetId($permission);

                // Assign to Super Admin role
                DB::table('role_has_permissions')->insert([
                    'role_id' => 1,
                    'permission_id' => $permissionId,
                ]);

                return "<h1>SUCCESS!</h1><p>Notes permission added successfully!</p><p>Permission ID: {$permissionId}</p><p>Now check Role Permission and Sidebar Manager pages.</p>";
            } else {
                return "<h1>ALREADY EXISTS!</h1><p>Notes permission already exists!</p><p>Existing ID: {$exists->id}</p><p>Check Role Permission and Sidebar Manager pages.</p>";
            }
        } catch (\Exception $e) {
            return "<h1>ERROR!</h1><p>Failed to add permission: " . $e->getMessage() . "</p>";
        }
    }
    return "<h1>ACCESS DENIED</h1><p>You must be logged in as Super Admin</p>";
});

// Notes seed route for deployment - Simple HTML response
Route::get('notes-seed-simple', function () {
    if (Auth::check() && Auth::user()->role_id == 1) {
        try {
            // Direct database insertion
            $permission = [
                'name' => 'notes_menu',
                'route' => 'notes.index',
                'status' => 1,
                'menu_status' => 1,
                'position' => 500,
                'is_saas' => 0,
                'relate_to_child' => 0,
                'is_menu' => 1,
                'is_admin' => 1,
                'is_teacher' => 1,
                'is_student' => 0,
                'is_parent' => 0,
                'type' => 1,
                'permission_section' => 0,
                'old_id' => null,
                'lang_name' => 'Notes',
                'module_name' => 'Notes',
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Check if permission already exists
            $exists = DB::table('permissions')->where('route', 'notes.index')->first();
            if (!$exists) {
                $permissionId = DB::table('permissions')->insertGetId($permission);

                // Assign to Super Admin role
                DB::table('role_has_permissions')->insert([
                    'role_id' => 1,
                    'permission_id' => $permissionId,
                ]);

                return "<h1>SUCCESS!</h1><p>Notes permission added successfully!</p><p>Permission ID: {$permissionId}</p><p>Now check Role Permission and Sidebar Manager pages.</p>";
            } else {
                return "<h1>ALREADY EXISTS!</h1><p>Notes permission already exists!</p><p>Existing ID: {$exists->id}</p><p>Check Role Permission and Sidebar Manager pages.</p>";
            }
        } catch (\Exception $e) {
            return "<h1>ERROR!</h1><p>Failed to add permission: " . $e->getMessage() . "</p>";
        }
    }
    return "<h1>ACCESS DENIED</h1><p>You must be logged in as Super Admin</p>";
});

// Notes seed route for deployment - Alternative direct approach
Route::get('notes-seed-direct', function () {
    if (Auth::check() && Auth::user()->role_id == 1) {
        try {
            // Direct database insertion
            $permission = [
                'name' => 'notes_menu',
                'route' => 'notes.index',
                'status' => 1,
                'menu_status' => 1,
                'position' => 500,
                'is_saas' => 0,
                'relate_to_child' => 0,
                'is_menu' => 1,
                'is_admin' => 1,
                'is_teacher' => 1,
                'is_student' => 0,
                'is_parent' => 0,
                'type' => 1,
                'permission_section' => 0,
                'old_id' => null,
                'lang_name' => 'Notes',
                'module_name' => 'Notes',
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Check if permission already exists
            $exists = DB::table('permissions')->where('route', 'notes.index')->first();
            if (!$exists) {
                $permissionId = DB::table('permissions')->insertGetId($permission);

                // Assign to Super Admin role
                DB::table('role_has_permissions')->insert([
                    'role_id' => 1,
                    'permission_id' => $permissionId,
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Notes permission added successfully!',
                    'permission_id' => $permissionId
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Notes permission already exists!',
                    'existing_id' => $exists->id
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add permission: ' . $e->getMessage()
            ]);
        }
    }
    abort(404);
})->middleware(['web']);

// Notes seed route for deployment
Route::get('notes-seed', function () {
    if (Auth::check() && Auth::user()->role_id == 1) {
        try {
            // Run the specific seeder
            Artisan::call('db:seed', [
                '--class' => 'Modules\\Notes\\Database\\Seeders\\NotesPermissionSeeder'
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Notes permissions seeded successfully!',
                'output' => Artisan::output()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Seeder failed: ' . $e->getMessage(),
                'error' => $e->getTraceAsString()
            ]);
        }
    }
    abort(404);
})->middleware(['web']);

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'notes', 'as' => 'notes.'], function () {
    Route::get('/', 'Modules\Notes\Http\Controllers\NoteController@index')->name('index');
    Route::get('create', 'Modules\Notes\Http\Controllers\NoteController@create')->name('create');
    Route::post('/', 'Modules\Notes\Http\Controllers\NoteController@store')->name('store');
    Route::get('{note}', 'Modules\Notes\Http\Controllers\NoteController@show')->name('show');
    Route::get('{note}/edit', 'Modules\Notes\Http\Controllers\NoteController@edit')->name('edit');
    Route::put('{note}', 'Modules\Notes\Http\Controllers\NoteController@update')->name('update');
    Route::delete('{note}', 'Modules\Notes\Http\Controllers\NoteController@destroy')->name('destroy');

    // Export routes
    Route::get('export/excel', 'Modules\Notes\Http\Controllers\NoteController@exportExcel')->name('export.excel');
    Route::get('export/pdf', 'Modules\Notes\Http\Controllers\NoteController@exportPdf')->name('export.pdf');
});
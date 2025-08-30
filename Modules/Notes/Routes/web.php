<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
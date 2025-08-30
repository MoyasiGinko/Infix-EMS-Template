<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// Notes FINAL FIX - Use correct assign_permissions table
Route::get('notes-final-fix', function () {
    if (Auth::check() && Auth::user()->role_id == 1) {
        try {
            $html = "<h1>Notes Permission - Final Fix</h1>";

            // Check if permission already exists
            $permission = DB::table('permissions')->where('route', 'notes.index')->first();

            if ($permission) {
                $html .= "<p>✅ Permission found with ID: {$permission->id}</p>";

                // Check if already assigned in correct table
                $assigned = DB::table('assign_permissions')
                    ->where('permission_id', $permission->id)
                    ->where('role_id', 1)
                    ->first();

                if (!$assigned) {
                    // Insert into correct table
                    DB::table('assign_permissions')->insert([
                        'permission_id' => $permission->id,
                        'role_id' => 1,
                        'status' => 1,
                        'menu_status' => 1,
                        'saas_schools' => 0,
                        'created_by' => 1,
                        'school_id' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    $html .= "<p>✅ Permission assigned to Super Admin role in assign_permissions table</p>";
                } else {
                    $html .= "<p>⚠️ Permission already assigned to Super Admin (ID: {$assigned->id})</p>";
                }

            } else {
                // Insert permission if doesn't exist
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

                $html .= "<p>✅ Permission created with ID: {$permissionId}</p>";

                // Assign to Super Admin in correct table
                DB::table('assign_permissions')->insert([
                    'permission_id' => $permissionId,
                    'role_id' => 1,
                    'status' => 1,
                    'menu_status' => 1,
                    'saas_schools' => 0,
                    'created_by' => 1,
                    'school_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $html .= "<p>✅ Permission assigned to Super Admin role</p>";
            }

            // Final verification
            $finalPermission = DB::table('permissions')->where('route', 'notes.index')->first();
            $finalAssignment = DB::table('assign_permissions')->where('permission_id', $finalPermission->id)->first();

            $html .= "<h2>Final Verification:</h2>";
            $html .= "<p>Permission in database: " . ($finalPermission ? "✅ Found (ID: {$finalPermission->id})" : "❌ Not found") . "</p>";
            $html .= "<p>Role assignment: " . ($finalAssignment ? "✅ Found (ID: {$finalAssignment->id})" : "❌ Not found") . "</p>";

            $html .= "<h2>🎉 SUCCESS! Now check:</h2>";
            $html .= "<p>• <a href='/rolepermission/assign-permission/2' target='_blank'>Role Permission Interface</a></p>";
            $html .= "<p>• <a href='/menumanage' target='_blank'>Sidebar Manager</a></p>";
            $html .= "<p>• <a href='/notes-check-db' target='_blank'>Database Check</a></p>";

            return $html;

        } catch (\Exception $e) {
            return "<h1>❌ ERROR!</h1><p>Final fix failed: " . $e->getMessage() . "</p><p>Stack trace:</p><pre>" . $e->getTraceAsString() . "</pre>";
        }
    }
    return "<h1>ACCESS DENIED</h1><p>You must be logged in as Super Admin</p>";
});

// Notes DEBUG UNUSED MENU - Check what Sidebar Manager unused menu query returns
Route::get('notes-debug-unused-menu', function () {
    if (Auth::check() && Auth::user()->role_id == 1) {
        try {
            $html = "<h1>Debug Unused Menu Query for Staff Role</h1>";

            $role_id = 1; // Staff role

            // Check if there's sidebar data for this role (we know there is now)
            $hasSidebarData = DB::table('sidebars')->where('role_id', $role_id)->whereNull('user_id')->exists();
            $html .= "<p><strong>Has sidebar data for role {$role_id}:</strong> " . ($hasSidebarData ? "Yes" : "No") . "</p>";

            if ($hasSidebarData) {
                $html .= "<p>Since sidebar data exists, using the existing sidebar logic...</p>";

                // This is the logic when sidebar data exists - let's replicate it
                // First get permissions that are assigned but not in sidebar
                $assignedPermissions = DB::table('assign_permissions')
                    ->where('role_id', $role_id)
                    ->where('status', 1)
                    ->where('menu_status', 1)
                    ->pluck('permission_id')
                    ->toArray();

                $html .= "<p><strong>Assigned permissions count:</strong> " . count($assignedPermissions) . "</p>";

                // Check if our Notes permission is in assigned permissions
                $notesPermission = DB::table('permissions')->where('route', 'notes.index')->first();
                $isNotesAssigned = in_array($notesPermission->id, $assignedPermissions);
                $html .= "<p><strong>Is Notes in assigned permissions:</strong> " . ($isNotesAssigned ? "Yes" : "No") . "</p>";

                // Get sidebar permissions that are already used
                $sidebarPermissions = DB::table('sidebars')
                    ->where('role_id', $role_id)
                    ->whereNull('user_id')
                    ->pluck('permission_id')
                    ->toArray();

                $html .= "<p><strong>Sidebar permissions count:</strong> " . count($sidebarPermissions) . "</p>";

                // Check if our Notes permission is in sidebar
                $isNotesInSidebar = in_array($notesPermission->id, $sidebarPermissions);
                $html .= "<p><strong>Is Notes in sidebar:</strong> " . ($isNotesInSidebar ? "Yes" : "No") . "</p>";

                // The unused permissions should be: assigned but not in sidebar, OR in sidebar but inactive
                $unusedFromAssigned = array_diff($assignedPermissions, $sidebarPermissions);
                $inactiveInSidebar = DB::table('sidebars')
                    ->where('role_id', $role_id)
                    ->where('active_status', 0)
                    ->whereNull('user_id')
                    ->pluck('permission_id')
                    ->toArray();

                $html .= "<p><strong>Unused from assigned:</strong> " . count($unusedFromAssigned) . " permissions</p>";
                $html .= "<p><strong>Inactive in sidebar:</strong> " . count($inactiveInSidebar) . " permissions</p>";

                // Check if Notes is in inactive sidebar
                $isNotesInactive = in_array($notesPermission->id, $inactiveInSidebar);
                $html .= "<p><strong>Is Notes in inactive sidebar:</strong> " . ($isNotesInactive ? "✅ Yes - Should appear as unused!" : "❌ No - This is the problem!") . "</p>";

                if (!$isNotesInactive) {
                    // Check the exact sidebar record
                    $notesSidebarRecord = DB::table('sidebars')
                        ->where('permission_id', $notesPermission->id)
                        ->where('role_id', $role_id)
                        ->first();

                    if ($notesSidebarRecord) {
                        $html .= "<h2>Notes Sidebar Record Details:</h2>";
                        $html .= "<pre>" . json_encode($notesSidebarRecord, JSON_PRETTY_PRINT) . "</pre>";

                        if ($notesSidebarRecord->active_status != 0) {
                            $html .= "<p>❌ <strong>PROBLEM FOUND:</strong> active_status is {$notesSidebarRecord->active_status}, should be 0 for unused menu!</p>";
                        }

                        if ($notesSidebarRecord->user_id !== null) {
                            $html .= "<p>❌ <strong>PROBLEM FOUND:</strong> user_id is {$notesSidebarRecord->user_id}, should be NULL for role-level menu!</p>";
                        }
                    } else {
                        $html .= "<p>❌ <strong>PROBLEM:</strong> No sidebar record found for Notes permission!</p>";
                    }
                }

                // Show what the actual unused menu query would return
                $actualUnusedQuery = DB::table('sidebars')
                    ->join('permissions', 'sidebars.permission_id', '=', 'permissions.id')
                    ->where('sidebars.role_id', $role_id)
                    ->where('sidebars.active_status', 0)
                    ->whereNull('sidebars.user_id')
                    ->where('permissions.status', 1)
                    ->where('permissions.menu_status', 1)
                    ->select('permissions.name', 'permissions.route', 'permissions.lang_name', 'sidebars.id as sidebar_id')
                    ->get();

                $html .= "<h2>Actual Unused Menu Results:</h2>";
                $html .= "<p><strong>Count:</strong> " . count($actualUnusedQuery) . "</p>";

                $notesInResults = $actualUnusedQuery->where('route', 'notes.index')->first();
                if ($notesInResults) {
                    $html .= "<p>✅ <strong>Notes found in unused menu results!</strong></p>";
                    $html .= "<pre>" . json_encode($notesInResults, JSON_PRETTY_PRINT) . "</pre>";
                } else {
                    $html .= "<p>❌ <strong>Notes NOT found in unused menu results</strong></p>";
                }

                // Show first few results for comparison
                $html .= "<h3>Sample unused menu items:</h3>";
                foreach ($actualUnusedQuery->take(5) as $item) {
                    $html .= "<p>• <strong>{$item->name}</strong> (route: {$item->route})</p>";
                }
            }

            return $html;

        } catch (\Exception $e) {
            return "<h1>❌ ERROR!</h1><p>Debug failed: " . $e->getMessage() . "</p>";
        }
    }
    return "<h1>ACCESS DENIED</h1><p>You must be logged in as Super Admin</p>";
});

// Notes ADD TO SIDEBAR FIXED - Add Notes using correct sidebars table structure
Route::get('notes-add-to-sidebar-fixed', function () {
    if (Auth::check() && Auth::user()->role_id == 1) {
        try {
            $html = "<h1>Add Notes to Sidebar Data - FIXED</h1>";

            // Get our Notes permission
            $notesPermission = DB::table('permissions')->where('route', 'notes.index')->first();

            if (!$notesPermission) {
                return "<h1>❌ ERROR!</h1><p>Notes permission not found in database!</p>";
            }

            $html .= "<p>✅ Found Notes permission with ID: {$notesPermission->id}</p>";

            // Check if already in sidebar data
            $existingInSidebar = DB::table('sidebars')
                ->where('permission_id', $notesPermission->id)
                ->where('role_id', 1)
                ->first();

            if ($existingInSidebar) {
                $html .= "<p>⚠️ Notes already exists in sidebar data (ID: {$existingInSidebar->id})</p>";
            } else {
                // Add to sidebar data for Staff role using correct columns
                $sidebarId = DB::table('sidebars')->insertGetId([
                    'permission_id' => $notesPermission->id,
                    'position' => 500,
                    'section_id' => 1, // Using section_id from sample record
                    'parent' => null,
                    'parent_route' => null,
                    'level' => null,
                    'user_id' => null,
                    'is_saas' => 0,
                    'ignore' => 0,
                    'role_id' => 1,
                    'active_status' => 0, // Set as unused initially so it appears in unused menu
                    'school_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $html .= "<p>✅ Added Notes to sidebar data with ID: {$sidebarId}</p>";
            }

            // Also check other admin/teacher roles if they exist
            $adminTeacherRoles = DB::table('roles')
                ->whereIn('id', [1, 4, 5]) // Common admin/teacher role IDs
                ->get();

            $html .= "<h2>Adding to other admin/teacher roles:</h2>";
            foreach ($adminTeacherRoles as $role) {
                if ($role->id == 1) continue; // Already handled above

                $existingInRole = DB::table('sidebars')
                    ->where('permission_id', $notesPermission->id)
                    ->where('role_id', $role->id)
                    ->first();

                if (!$existingInRole) {
                    $roleHasSidebarData = DB::table('sidebars')->where('role_id', $role->id)->exists();
                    if ($roleHasSidebarData) {
                        $roleSidebarId = DB::table('sidebars')->insertGetId([
                            'permission_id' => $notesPermission->id,
                            'position' => 500,
                            'section_id' => 1,
                            'parent' => null,
                            'parent_route' => null,
                            'level' => null,
                            'user_id' => null,
                            'is_saas' => 0,
                            'ignore' => 0,
                            'role_id' => $role->id,
                            'active_status' => 0,
                            'school_id' => 1,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                        $html .= "<p>✅ Added to role {$role->id} ({$role->name}) with sidebar ID: {$roleSidebarId}</p>";
                    } else {
                        $html .= "<p>⚠️ Role {$role->id} ({$role->name}) has no sidebar data, skipping</p>";
                    }
                } else {
                    $html .= "<p>⚠️ Role {$role->id} ({$role->name}) already has Notes in sidebar</p>";
                }
            }

            $html .= "<h2>🎉 SUCCESS! Now check:</h2>";
            $html .= "<p>• <a href='/menumanage' target='_blank'>Sidebar Manager for Staff role</a></p>";
            $html .= "<p>• Notes should appear in the <strong>unused menu</strong> section</p>";
            $html .= "<p>• You can now drag Notes into the active sidebar</p>";

            return $html;

        } catch (\Exception $e) {
            return "<h1>❌ ERROR!</h1><p>Add to sidebar failed: " . $e->getMessage() . "</p><p>Stack trace:</p><pre>" . $e->getTraceAsString() . "</pre>";
        }
    }
    return "<h1>ACCESS DENIED</h1><p>You must be logged in as Super Admin</p>";
});

// Notes CHECK SIDEBARS TABLE - Find correct columns for sidebars table
Route::get('notes-check-sidebars-table', function () {
    if (Auth::check() && Auth::user()->role_id == 1) {
        try {
            $html = "<h1>Sidebars Table Structure Investigation</h1>";

            // Check sidebars table structure
            $columns = DB::select("DESCRIBE sidebars");
            $columnNames = array_map(function($col) { return $col->Field; }, $columns);
            $html .= "<h2>Sidebars table columns:</h2>";
            $html .= "<p>" . implode(', ', $columnNames) . "</p>";

            // Show a sample record from sidebars table
            $sampleRecord = DB::table('sidebars')->where('role_id', 1)->first();
            if ($sampleRecord) {
                $html .= "<h2>Sample sidebar record:</h2>";
                $html .= "<pre>" . json_encode($sampleRecord, JSON_PRETTY_PRINT) . "</pre>";
            }

            return $html;

        } catch (\Exception $e) {
            return "<h1>❌ ERROR!</h1><p>Table check failed: " . $e->getMessage() . "</p>";
        }
    }
    return "<h1>ACCESS DENIED</h1><p>You must be logged in as Super Admin</p>";
});

// Notes ADD TO SIDEBAR DATA - Add Notes to existing sidebar data for Staff role
Route::get('notes-add-to-sidebar', function () {
    if (Auth::check() && Auth::user()->role_id == 1) {
        try {
            $html = "<h1>Add Notes to Sidebar Data for Staff Role</h1>";

            // Get our Notes permission
            $notesPermission = DB::table('permissions')->where('route', 'notes.index')->first();

            if (!$notesPermission) {
                return "<h1>❌ ERROR!</h1><p>Notes permission not found in database!</p>";
            }

            $html .= "<p>✅ Found Notes permission with ID: {$notesPermission->id}</p>";

            // Check if already in sidebar data
            $existingInSidebar = DB::table('sidebars')
                ->where('permission_id', $notesPermission->id)
                ->where('role_id', 1)
                ->first();

            if ($existingInSidebar) {
                $html .= "<p>⚠️ Notes already exists in sidebar data (ID: {$existingInSidebar->id})</p>";
            } else {
                // Add to sidebar data for Staff role
                $sidebarId = DB::table('sidebars')->insertGetId([
                    'permission_id' => $notesPermission->id,
                    'role_id' => 1,
                    'active_status' => 0, // Set as unused initially so it appears in unused menu
                    'position' => 500,
                    'parent' => null,
                    'lang_name' => 'Notes',
                    'name' => 'notes_menu',
                    'module' => 'Notes',
                    'parent_id' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $html .= "<p>✅ Added Notes to sidebar data with ID: {$sidebarId}</p>";
            }

            // Also check other admin/teacher roles if they exist
            $adminTeacherRoles = DB::table('roles')
                ->whereIn('id', [1, 4, 5]) // Common admin/teacher role IDs
                ->get();

            $html .= "<h2>Adding to other admin/teacher roles:</h2>";
            foreach ($adminTeacherRoles as $role) {
                if ($role->id == 1) continue; // Already handled above

                $existingInRole = DB::table('sidebars')
                    ->where('permission_id', $notesPermission->id)
                    ->where('role_id', $role->id)
                    ->first();

                if (!$existingInRole) {
                    $roleHasSidebarData = DB::table('sidebars')->where('role_id', $role->id)->exists();
                    if ($roleHasSidebarData) {
                        $roleSidebarId = DB::table('sidebars')->insertGetId([
                            'permission_id' => $notesPermission->id,
                            'role_id' => $role->id,
                            'active_status' => 0,
                            'position' => 500,
                            'parent' => null,
                            'lang_name' => 'Notes',
                            'name' => 'notes_menu',
                            'module' => 'Notes',
                            'parent_id' => null,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                        $html .= "<p>✅ Added to role {$role->id} ({$role->name}) with sidebar ID: {$roleSidebarId}</p>";
                    } else {
                        $html .= "<p>⚠️ Role {$role->id} ({$role->name}) has no sidebar data, skipping</p>";
                    }
                } else {
                    $html .= "<p>⚠️ Role {$role->id} ({$role->name}) already has Notes in sidebar</p>";
                }
            }

            $html .= "<h2>🎉 SUCCESS! Now check:</h2>";
            $html .= "<p>• <a href='/menumanage' target='_blank'>Sidebar Manager</a> - Notes should appear in unused menu for Staff role</p>";
            $html .= "<p>• You can now drag Notes into the active sidebar</p>";

            return $html;

        } catch (\Exception $e) {
            return "<h1>❌ ERROR!</h1><p>Add to sidebar failed: " . $e->getMessage() . "</p><p>Stack trace:</p><pre>" . $e->getTraceAsString() . "</pre>";
        }
    }
    return "<h1>ACCESS DENIED</h1><p>You must be logged in as Super Admin</p>";
});

// Notes SIDEBAR MANAGER DEBUG - Check what SidebarManager sees
Route::get('notes-sidebar-debug', function () {
    if (Auth::check() && Auth::user()->role_id == 1) {
        try {
            $html = "<h1>Sidebar Manager Debug for Staff Role (role_id = 1)</h1>";

            // Simulate the exact query that SidebarManagerController does for Staff role
            $role_id = 1; // Staff role

            // Check if there's sidebar data for this role
            $hasSidebarData = DB::table('sidebars')->where('role_id', $role_id)->whereNull('user_id')->exists();
            $html .= "<p><strong>Has sidebar data for role {$role_id}:</strong> " . ($hasSidebarData ? "Yes" : "No") . "</p>";

            if (!$hasSidebarData) {
                $html .= "<p>Since no sidebar data exists, querying all available permissions...</p>";

                // This is the exact query from SidebarManagerController
                $allPermissions = DB::table('permissions')
                    ->where('status', 1)
                    ->where('menu_status', 1)
                    ->where(function($query) {
                        $query->where('is_admin', 1)->orWhere('is_teacher', 1);
                    })
                    ->orderBy('position')
                    ->get();

                $html .= "<p><strong>Total permissions found:</strong> " . count($allPermissions) . "</p>";

                // Check specifically for Notes
                $notesPermission = $allPermissions->where('route', 'notes.index')->first();
                if ($notesPermission) {
                    $html .= "<h2>✅ Notes Permission Found in Sidebar Manager Query:</h2>";
                    $html .= "<pre>" . json_encode($notesPermission, JSON_PRETTY_PRINT) . "</pre>";
                } else {
                    $html .= "<h2>❌ Notes Permission NOT Found in Sidebar Manager Query</h2>";

                    // Let's check our Notes permission details
                    $ourNotesPermission = DB::table('permissions')->where('route', 'notes.index')->first();
                    if ($ourNotesPermission) {
                        $html .= "<p><strong>Our Notes Permission Details:</strong></p>";
                        $html .= "<pre>" . json_encode($ourNotesPermission, JSON_PRETTY_PRINT) . "</pre>";

                        // Check each condition
                        $html .= "<p><strong>Condition Check:</strong></p>";
                        $html .= "<p>status = 1: " . ($ourNotesPermission->status == 1 ? "✅ Pass" : "❌ Fail ({$ourNotesPermission->status})") . "</p>";
                        $html .= "<p>menu_status = 1: " . ($ourNotesPermission->menu_status == 1 ? "✅ Pass" : "❌ Fail ({$ourNotesPermission->menu_status})") . "</p>";
                        $html .= "<p>is_admin = 1: " . ($ourNotesPermission->is_admin == 1 ? "✅ Pass" : "❌ Fail ({$ourNotesPermission->is_admin})") . "</p>";
                        $html .= "<p>is_teacher = 1: " . ($ourNotesPermission->is_teacher == 1 ? "✅ Pass" : "❌ Fail ({$ourNotesPermission->is_teacher})") . "</p>";
                    } else {
                        $html .= "<p>❌ Notes permission not found in database at all!</p>";
                    }
                }

                // Show first few results for comparison
                $html .= "<h2>Sample of permissions that DO appear:</h2>";
                foreach ($allPermissions->take(5) as $perm) {
                    $html .= "<p><strong>{$perm->name}</strong> (route: {$perm->route})</p>";
                }
            }

            return $html;

        } catch (\Exception $e) {
            return "<h1>❌ ERROR!</h1><p>Sidebar debug failed: " . $e->getMessage() . "</p>";
        }
    }
    return "<h1>ACCESS DENIED</h1><p>You must be logged in as Super Admin</p>";
});

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
                $rolePermission = DB::table('assign_permissions')
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
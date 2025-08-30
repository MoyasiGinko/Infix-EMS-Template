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

// Notes SIMPLE DEBUG - Quick check for notes in menus
Route::get('notes-simple-debug', function () {
    try {
        $html = "<h1>Notes Simple Debug</h1>";
        $html .= "<style>
            .section { margin: 15px 0; padding: 10px; border: 1px solid #ccc; }
            .found { color: green; font-weight: bold; }
            .not-found { color: red; font-weight: bold; }
            .warning { color: orange; font-weight: bold; }
            pre { background: #f5f5f5; padding: 10px; }
        </style>";

        $role_id = 1;

        // Quick check 1: Permission exists?
        $html .= "<div class='section'>";
        $html .= "<h2>1. Permission Check</h2>";
        $permission = DB::table('permissions')->where('route', 'notes.index')->first();
        if ($permission) {
            $html .= "<p class='found'>✅ Permission exists: ID {$permission->id}, name: {$permission->name}</p>";
            $html .= "<p>Status: {$permission->status}, Menu Status: {$permission->menu_status}</p>";
            $html .= "<p>Is Admin: " . ($permission->is_admin ?? 'NULL') . ", Is Teacher: " . ($permission->is_teacher ?? 'NULL') . "</p>";
        } else {
            $html .= "<p class='not-found'>❌ No permission found for notes.index</p>";
        }
        $html .= "</div>";

        // Quick check 2: Assigned?
        $html .= "<div class='section'>";
        $html .= "<h2>2. Assignment Check</h2>";
        if ($permission) {
            $assigned = DB::table('assign_permissions')
                ->where('permission_id', $permission->id)
                ->where('role_id', $role_id)
                ->first();
            if ($assigned) {
                $html .= "<p class='found'>✅ Permission assigned: ID {$assigned->id}</p>";
                $html .= "<p>Status: {$assigned->status}, Menu Status: {$assigned->menu_status}</p>";
            } else {
                $html .= "<p class='not-found'>❌ Permission not assigned to role {$role_id}</p>";
            }
        }
        $html .= "</div>";

        // Quick check 3: Sidebar entry?
        $html .= "<div class='section'>";
        $html .= "<h2>3. Sidebar Check</h2>";
        if ($permission) {
            $sidebar = DB::table('sidebars')
                ->where('permission_id', $permission->id)
                ->where('role_id', $role_id)
                ->first();
            if ($sidebar) {
                $html .= "<p class='found'>✅ Sidebar entry exists: ID {$sidebar->id}</p>";
                $html .= "<p>Active Status: {$sidebar->active_status} " . ($sidebar->active_status == 0 ? "(Should be in unused)" : "(Should be in used)") . "</p>";
                $html .= "<p>Position: {$sidebar->position}</p>";
            } else {
                $html .= "<p class='not-found'>❌ No sidebar entry found</p>";
            }
        }
        $html .= "</div>";

        // Quick check 4: What would SidebarManager see?
        $html .= "<div class='section'>";
        $html .= "<h2>4. SidebarManager Unused Query Result</h2>";
        $unused = DB::table('sidebars')
            ->join('permissions', 'sidebars.permission_id', '=', 'permissions.id')
            ->where('sidebars.role_id', $role_id)
            ->where('sidebars.active_status', 0)
            ->whereNull('sidebars.user_id')
            ->where('permissions.status', 1)
            ->where('permissions.menu_status', 1)
            ->select('sidebars.id as sidebar_id', 'permissions.name', 'permissions.route', 'permissions.lang_name')
            ->get();

        $notesInUnused = $unused->where('route', 'notes.index')->first();
        if ($notesInUnused) {
            $html .= "<p class='found'>✅ Notes appears in unused menu query</p>";
            $html .= "<pre>" . json_encode($notesInUnused, JSON_PRETTY_PRINT) . "</pre>";
        } else {
            $html .= "<p class='not-found'>❌ Notes does NOT appear in unused menu query</p>";
        }

        $html .= "<p><strong>Total unused items:</strong> " . count($unused) . "</p>";
        if (count($unused) > 0) {
            $html .= "<p><strong>First few unused items:</strong></p>";
            foreach ($unused->take(5) as $item) {
                $html .= "<p>- {$item->name} ({$item->route}) - {$item->lang_name}</p>";
            }
        }
        $html .= "</div>";

        return $html;

    } catch (\Exception $e) {
        return "<h1>❌ ERROR!</h1><p>Simple debug failed: " . $e->getMessage() . "</p>";
    }
});

// Notes COMPREHENSIVE MENU DEBUG - Check all menu items and states
Route::get('notes-comprehensive-menu-debug', function () {
    if (Auth::check() && Auth::user()->role_id == 1) {
        try {
            $html = "<h1>Comprehensive Menu Debug for Staff Role</h1>";
            $html .= "<style>
                .debug-section { margin: 20px 0; padding: 15px; border: 1px solid #ccc; }
                .found { color: green; font-weight: bold; }
                .not-found { color: red; font-weight: bold; }
                .highlight { background-color: yellow; }
                table { border-collapse: collapse; width: 100%; }
                th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                th { background-color: #f2f2f2; }
            </style>";

            $role_id = 1; // Staff role

            // 1. Check all permissions for this role type
            $html .= "<div class='debug-section'>";
            $html .= "<h2>1. All Available Permissions for Admin/Teacher Roles</h2>";

            $allPermissions = DB::table('permissions')
                ->where('status', 1)
                ->where('menu_status', 1)
                ->where(function($query) {
                    $query->where('is_admin', 1)->orWhere('is_teacher', 1);
                })
                ->orderBy('position')
                ->get();

            $html .= "<p><strong>Total permissions:</strong> " . count($allPermissions) . "</p>";

            $notesInAllPermissions = $allPermissions->where('route', 'notes.index')->first();
            if ($notesInAllPermissions) {
                $html .= "<p class='found'>✅ Notes found in all permissions</p>";
            } else {
                $html .= "<p class='not-found'>❌ Notes NOT found in all permissions</p>";
            }
            $html .= "</div>";

            // 2. Check assigned permissions
            $html .= "<div class='debug-section'>";
            $html .= "<h2>2. Assigned Permissions for Staff Role</h2>";

            $assignedPermissions = DB::table('assign_permissions')
                ->join('permissions', 'assign_permissions.permission_id', '=', 'permissions.id')
                ->where('assign_permissions.role_id', $role_id)
                ->where('assign_permissions.status', 1)
                ->where('assign_permissions.menu_status', 1)
                ->where('permissions.status', 1)
                ->where('permissions.menu_status', 1)
                ->select('permissions.*', 'assign_permissions.id as assign_id')
                ->get();

            $html .= "<p><strong>Total assigned permissions:</strong> " . count($assignedPermissions) . "</p>";

            $notesInAssigned = $assignedPermissions->where('route', 'notes.index')->first();
            if ($notesInAssigned) {
                $html .= "<p class='found'>✅ Notes found in assigned permissions (assign_id: {$notesInAssigned->assign_id})</p>";
            } else {
                $html .= "<p class='not-found'>❌ Notes NOT found in assigned permissions</p>";
            }
            $html .= "</div>";

            // 3. Check sidebar data
            $html .= "<div class='debug-section'>";
            $html .= "<h2>3. Sidebar Data for Staff Role</h2>";

            $sidebarData = DB::table('sidebars')
                ->join('permissions', 'sidebars.permission_id', '=', 'permissions.id')
                ->where('sidebars.role_id', $role_id)
                ->whereNull('sidebars.user_id')
                ->select('sidebars.*', 'permissions.name as perm_name', 'permissions.route', 'permissions.lang_name')
                ->orderBy('sidebars.active_status')
                ->orderBy('sidebars.position')
                ->get();

            $html .= "<p><strong>Total sidebar items:</strong> " . count($sidebarData) . "</p>";

            $activeSidebar = $sidebarData->where('active_status', 1);
            $inactiveSidebar = $sidebarData->where('active_status', 0);

            $html .= "<p><strong>Active sidebar items:</strong> " . count($activeSidebar) . "</p>";
            $html .= "<p><strong>Inactive sidebar items:</strong> " . count($inactiveSidebar) . "</p>";

            $notesInSidebar = $sidebarData->where('route', 'notes.index')->first();
            if ($notesInSidebar) {
                $html .= "<p class='found'>✅ Notes found in sidebar data</p>";
                $html .= "<p><strong>Notes sidebar details:</strong></p>";
                $html .= "<ul>";
                $html .= "<li>ID: {$notesInSidebar->id}</li>";
                $html .= "<li>Active Status: {$notesInSidebar->active_status} " . ($notesInSidebar->active_status == 0 ? "(Inactive - should appear in unused)" : "(Active - should appear in used)") . "</li>";
                $html .= "<li>Position: {$notesInSidebar->position}</li>";
                $html .= "<li>Permission Name: {$notesInSidebar->perm_name}</li>";
                $html .= "<li>Lang Name: {$notesInSidebar->lang_name}</li>";
                $html .= "<li>User ID: " . ($notesInSidebar->user_id ?? 'NULL') . "</li>";
                $html .= "</ul>";
            } else {
                $html .= "<p class='not-found'>❌ Notes NOT found in sidebar data</p>";
            }
            $html .= "</div>";

            // 4. What should appear in unused menu (backend calculation)
            $html .= "<div class='debug-section'>";
            $html .= "<h2>4. Backend Calculation: What Should Appear in Unused Menu</h2>";

            $unusedMenuItems = DB::table('sidebars')
                ->join('permissions', 'sidebars.permission_id', '=', 'permissions.id')
                ->where('sidebars.role_id', $role_id)
                ->where('sidebars.active_status', 0)
                ->whereNull('sidebars.user_id')
                ->where('permissions.status', 1)
                ->where('permissions.menu_status', 1)
                ->select('sidebars.id as sidebar_id', 'permissions.name', 'permissions.route', 'permissions.lang_name', 'sidebars.position')
                ->orderBy('sidebars.position')
                ->get();

            $html .= "<p><strong>Unused menu items count:</strong> " . count($unusedMenuItems) . "</p>";

            if (count($unusedMenuItems) > 0) {
                $html .= "<h3>Unused Menu Items:</h3>";
                $html .= "<table>";
                $html .= "<tr><th>Name</th><th>Route</th><th>Lang Name</th><th>Position</th><th>Sidebar ID</th></tr>";

                foreach ($unusedMenuItems as $item) {
                    $isNotes = $item->route === 'notes.index';
                    $rowClass = $isNotes ? "class='highlight'" : "";
                    $html .= "<tr {$rowClass}>";
                    $html .= "<td>{$item->name}</td>";
                    $html .= "<td>{$item->route}</td>";
                    $html .= "<td>{$item->lang_name}</td>";
                    $html .= "<td>{$item->position}</td>";
                    $html .= "<td>{$item->sidebar_id}</td>";
                    $html .= "</tr>";
                }
                $html .= "</table>";

                $notesInUnused = $unusedMenuItems->where('route', 'notes.index')->first();
                if ($notesInUnused) {
                    $html .= "<p class='found'>✅ Notes found in unused menu calculation</p>";
                } else {
                    $html .= "<p class='not-found'>❌ Notes NOT found in unused menu calculation</p>";
                }
            } else {
                $html .= "<p>No unused menu items found</p>";
            }
            $html .= "</div>";

            // 5. What should appear in used menu (backend calculation)
            $html .= "<div class='debug-section'>";
            $html .= "<h2>5. Backend Calculation: What Should Appear in Used Menu</h2>";

            $usedMenuItems = DB::table('sidebars')
                ->join('permissions', 'sidebars.permission_id', '=', 'permissions.id')
                ->where('sidebars.role_id', $role_id)
                ->where('sidebars.active_status', 1)
                ->whereNull('sidebars.user_id')
                ->where('permissions.status', 1)
                ->where('permissions.menu_status', 1)
                ->select('sidebars.id as sidebar_id', 'permissions.name', 'permissions.route', 'permissions.lang_name', 'sidebars.position')
                ->orderBy('sidebars.position')
                ->get();

            $html .= "<p><strong>Used menu items count:</strong> " . count($usedMenuItems) . "</p>";

            $notesInUsed = $usedMenuItems->where('route', 'notes.index')->first();
            if ($notesInUsed) {
                $html .= "<p class='found'>✅ Notes found in used menu calculation</p>";
            } else {
                $html .= "<p>Notes not in used menu (expected if inactive)</p>";
            }
            $html .= "</div>";

            // 6. Summary and recommendations
            $html .= "<div class='debug-section'>";
            $html .= "<h2>6. Summary & Diagnosis</h2>";

            if ($notesInUnused) {
                $html .= "<p class='found'><strong>BACKEND STATUS: ✅ GOOD</strong></p>";
                $html .= "<p>Notes appears correctly in backend unused menu calculation.</p>";
                $html .= "<p><strong>LIKELY ISSUE: Frontend/JavaScript filtering or display problem</strong></p>";
                $html .= "<p><strong>Recommendations:</strong></p>";
                $html .= "<ul>";
                $html .= "<li>Check browser console for JavaScript errors</li>";
                $html .= "<li>Try in incognito mode</li>";
                $html .= "<li>Check if frontend JS is filtering based on specific criteria</li>";
                $html .= "<li>Verify the Sidebar Manager view file isn't filtering out certain items</li>";
                $html .= "</ul>";
            } else {
                $html .= "<p class='not-found'><strong>BACKEND STATUS: ❌ PROBLEM</strong></p>";
                $html .= "<p>Notes is not appearing in backend unused menu calculation.</p>";
                $html .= "<p><strong>Check the following:</strong></p>";
                $html .= "<ul>";
                $html .= "<li>Permission exists and has correct status/menu_status</li>";
                $html .= "<li>Sidebar record exists with active_status=0</li>";
                $html .= "<li>Role assignment exists in assign_permissions</li>";
                $html .= "</ul>";
            }
            $html .= "</div>";

            return $html;

        } catch (\Exception $e) {
            return "<h1>❌ ERROR!</h1><p>Comprehensive debug failed: " . $e->getMessage() . "</p><p>Stack trace:</p><pre>" . $e->getTraceAsString() . "</pre>";
        }
    }
    return "<h1>ACCESS DENIED</h1><p>You must be logged in as Super Admin</p>";
});

// Notes CLEAR CACHE AND FIX DISPLAY - Clear cache and fix display name
Route::get('notes-clear-cache-fix', function () {
    if (Auth::check() && Auth::user()->role_id == 1) {
        try {
            $html = "<h1>Clear Cache and Fix Notes Display</h1>";

            // Clear various caches that might affect sidebar
            try {
                Artisan::call('cache:clear');
                $html .= "<p>✅ Application cache cleared</p>";
            } catch (\Exception $e) {
                $html .= "<p>⚠️ Cache clear failed: " . $e->getMessage() . "</p>";
            }

            try {
                Artisan::call('config:clear');
                $html .= "<p>✅ Configuration cache cleared</p>";
            } catch (\Exception $e) {
                $html .= "<p>⚠️ Config clear failed: " . $e->getMessage() . "</p>";
            }

            try {
                Artisan::call('view:clear');
                $html .= "<p>✅ View cache cleared</p>";
            } catch (\Exception $e) {
                $html .= "<p>⚠️ View clear failed: " . $e->getMessage() . "</p>";
            }

            // Update the permission to have a better display name
            $updated = DB::table('permissions')
                ->where('route', 'notes.index')
                ->update([
                    'name' => 'notes',
                    'lang_name' => 'Notes',
                    'updated_at' => now()
                ]);

            if ($updated) {
                $html .= "<p>✅ Updated permission name from 'notes_menu' to 'notes'</p>";
            }

            $html .= "<h2>🎉 Now try these steps:</h2>";
            $html .= "<p>1. <strong>Hard refresh</strong> your browser (Ctrl+F5 or Cmd+Shift+R)</p>";
            $html .= "<p>2. Go to <a href='/menumanage' target='_blank'>Sidebar Manager</a></p>";
            $html .= "<p>3. Look for <strong>'Notes'</strong> in the available menu items</p>";
            $html .= "<p>4. If still not visible, try logging out and back in</p>";

            $html .= "<h2>Debug Info:</h2>";
            $notesPermission = DB::table('permissions')->where('route', 'notes.index')->first();
            $html .= "<p>Current permission name: <strong>{$notesPermission->name}</strong></p>";
            $html .= "<p>Current lang_name: <strong>{$notesPermission->lang_name}</strong></p>";

            return $html;

        } catch (\Exception $e) {
            return "<h1>❌ ERROR!</h1><p>Cache clear failed: " . $e->getMessage() . "</p>";
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
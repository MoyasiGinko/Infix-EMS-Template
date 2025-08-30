<?php
/**
 * Verification (and optional self-heal) script for Notes module sidebar/menu integration.
 * URL: /verify-notes-sidebar.php[?fix=1]
 * - Confirms a single canonical permission for notes.index
 * - Ensures sm_menus rows exist per target role (1,4,5) with correct linkage & structure
 * - (Optional) With ?fix=1 will attempt to repair mismatches (role_id, permission_id, parent linkage, menu_status)
 * Safe & idempotent.
 */

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

require_once __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

header('Content-Type: text/plain');
echo "== NOTES SIDEBAR VERIFICATION ==\n";

$doFix = isset($_GET['fix']);
if ($doFix) echo "(Auto-fix mode enabled)\n";

if (!Schema::hasTable('permissions') || !Schema::hasTable('sm_menus')) {
    echo "Required tables missing. Aborting.\n"; exit;
}

$permRows = DB::table('permissions')->where('route','notes.index')->orderBy('id')->get();
if ($permRows->isEmpty()) { echo "No permission for notes.index found. Run seed-notesmenu.php first.\n"; exit; }
if ($permRows->count() > 1) {
    echo "WARNING: Multiple permissions for notes.index remain (".$permRows->count()."). Run cleanup-notes-duplicate.php again.\n";
}
$perm = $permRows->last();
echo "Using permission id {$perm->id}.\n";

// Identify a parent section (permission_section=1) for each role.
$roles = [1,4,5];
$report = [];

foreach ($roles as $role) {
    $info = [ 'role'=>$role, 'status'=>'OK', 'actions'=>[] ];
    // Find an existing section row (top-level) permission_section=1
    $section = DB::table('sm_menus')
        ->where('role_id',$role)
        ->where('permission_section',1)
        ->orderBy('position')->first();
    if (!$section) {
        $info['status'] = 'WARN';
        $info['actions'][] = 'No section found; Notes will be created root-level.';
    }
    $sectionId = $section?->id;

    $menu = DB::table('sm_menus')->where('role_id',$role)->where('route','notes.index')->first();
    if (!$menu) {
        $info['status'] = 'MISSING';
        $info['actions'][] = 'sm_menus row absent';
        if ($doFix) {
            $pos = 999;
            if ($sectionId) {
                $maxPos = DB::table('sm_menus')->where('role_id',$role)->where('parent_id',$sectionId)->max('position');
                if (is_numeric($maxPos)) $pos = $maxPos + 1; else $pos = 1;
            }
            DB::table('sm_menus')->insert([
                'name'=>'Notes','module'=>'Notes','route'=>'notes.index','lang_name'=>'Notes',
                'section_id'=>$sectionId,'icon'=>'fas fa-sticky-note','status'=>1,'is_saas'=>0,'role_id'=>$role,
                'is_alumni'=>0,'menu_status'=>1,'permission_section'=>0,'position'=>$pos,'default_position'=>$pos,
                'parent'=>$sectionId,'parent_id'=>$sectionId,'school_id'=>1,'alternate_module'=>null,
                'permission_id'=>$perm->id,'ignore'=>0,'created_at'=>now(),'updated_at'=>now(),
            ]);
            $info['actions'][] = 'Inserted new sm_menus row';
        }
    } else {
        // Validate fields
        $updates = [];
        if ($menu->permission_id != $perm->id) { $updates['permission_id'] = $perm->id; }
        if ($menu->permission_section != 0) { $updates['permission_section'] = 0; }
        if ($menu->role_id != $role) { $updates['role_id'] = $role; }
        if ($menu->menu_status != 1) { $updates['menu_status'] = 1; }
        if ($sectionId && ($menu->parent_id != $sectionId || $menu->parent != $sectionId)) {
            $updates['parent_id'] = $sectionId; $updates['parent'] = $sectionId; $updates['section_id'] = $sectionId; }
        if ($updates) {
            $info['status'] = 'FIXED';
            $info['actions'][] = 'Fields to update: '.implode(',',array_keys($updates));
            if ($doFix) {
                $updates['updated_at'] = now();
                DB::table('sm_menus')->where('id',$menu->id)->update($updates);
                $info['actions'][] = 'Applied updates';
            }
        }
    }
    $report[] = $info;
}

echo "\nROLE REPORT:\n";
foreach ($report as $r) {
    echo "Role {$r['role']}: {$r['status']}" . ( $r['actions'] ? ' -> '.implode(' | ',$r['actions']) : '' ) . "\n";
}

// Legacy sidebars sanity: ensure no inactive duplicates will reappear incorrectly
if (Schema::hasTable('sidebars')) {
    $legacy = DB::table('sidebars')->where('permission_id',$perm->id)->get();
    if ($legacy->count()) {
        $active = $legacy->where('active_status',1)->count();
        echo "\nLegacy sidebars rows referencing permission: {$legacy->count()} (active={$active}).\n";
        if ($doFix) {
            // Mark inactive ones active if we have sm_menus rows, or deactivate all if redundant.
            // Strategy: If sm_menus exists for role, set corresponding sidebar active_status=1 so it won't show in unused.
            foreach ($legacy as $row) {
                $hasMenu = DB::table('sm_menus')->where('permission_id',$perm->id)->where('role_id',$row->role_id)->exists();
                if ($hasMenu && $row->active_status == 0) {
                    DB::table('sidebars')->where('id',$row->id)->update(['active_status'=>1]);
                }
            }
            echo "Adjusted legacy sidebar active_status to align with sm_menus presence.\n";
        }
    }
}

echo "\nDone. Append ?fix=1 to apply corrections if any were reported.\n";
?>
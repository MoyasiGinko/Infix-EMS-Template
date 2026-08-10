<?php
/**
 * Cleanup duplicate Notes permissions, keeping the newest/canonical one.
 * URL: /cleanup-notes-duplicate.php
 * Safe to run multiple times.
 */

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

require_once __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

header('Content-Type: text/plain');
echo "== NOTES PERMISSION DUPLICATE CLEANUP ==\n";

if (!Schema::hasTable('permissions')) { echo "permissions table missing. abort.\n"; exit; }

$perms = DB::table('permissions')->where('route','notes.index')->orderBy('id')->get();
if ($perms->count() <= 1) {
    echo "No duplicates (count={$perms->count()}). Nothing to do.\n"; exit;
}

echo "Found {$perms->count()} permission rows for route notes.index\n";
// Heuristic: keep the one that (a) has module='Notes' OR icon not null OR highest id.
$keep = $perms->sortByDesc(function($p){
    return (
        ($p->module === 'Notes' ? 4:0) +
        (!empty($p->icon) ? 2:0) +
        ($p->is_menu == 1 ? 1:0) +
        ($p->id/1000000) // slight tie-breaker by id
    );
})->first();

echo "Keeping permission id {$keep->id} (name={$keep->name}, module={$keep->module})\n";

$removeIds = $perms->where('id','!=',$keep->id)->pluck('id')->all();
echo "Removing ids: ".implode(',',$removeIds)."\n";

// Tables referencing permission_id
$refTables = [
    'assign_permissions','sm_menus','sidebars','role_has_permissions'
];

foreach ($refTables as $table){
    if (!Schema::hasTable($table)) continue;
    $count = DB::table($table)->whereIn('permission_id',$removeIds)->count();
    if ($count==0) continue;
    echo "Updating {$count} rows in {$table} -> permission_id {$keep->id}\n";
    DB::table($table)->whereIn('permission_id',$removeIds)->update(['permission_id'=>$keep->id]);
}

// Normalize duplicates inside assign_permissions (same role+permission pairs) by deleting extras
if (Schema::hasTable('assign_permissions')) {
    $dupes = DB::table('assign_permissions')
        ->select('id','permission_id','role_id')
        ->where('permission_id',$keep->id)
        ->orderBy('role_id')
        ->get()
        ->groupBy('role_id');
    $deleted = 0;
    foreach ($dupes as $roleId => $rows){
        if ($rows->count() > 1){
            // keep first id
            $rowsToDelete = $rows->pluck('id')->slice(1)->all();
            DB::table('assign_permissions')->whereIn('id',$rowsToDelete)->delete();
            $deleted += count($rowsToDelete);
        }
    }
    if ($deleted) echo "Removed {$deleted} duplicate assign_permissions rows.\n";
}

// Delete old permission rows
DB::table('permissions')->whereIn('id',$removeIds)->delete();
echo "Deleted old permission rows.\n";

// Canonical normalization
DB::table('permissions')->where('id',$keep->id)->update([
    'module' => 'Notes',
    'name' => 'Notes',
    'lang_name' => 'Notes',
    'icon' => 'fas fa-sticky-note',
    'is_menu' => 1,
    'status' => 1,
    'menu_status' => 1,
    'updated_at' => now(),
]);
echo "Normalized kept permission row.\n";

echo "== COMPLETE ==\n";
?>
<?php
// Quick diagnostics for Notes sidebar click issue
require __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);$kernel->bootstrap();

use Illuminate\Support\Facades\Route; use Illuminate\Support\Facades\DB; use Illuminate\Support\Facades\Auth;
header('Content-Type: text/plain');
echo "== NOTES ROUTE DEBUG ==\n";

$has = Route::has('notes.index');
echo "Route::has('notes.index'): ".($has?'YES':'NO')."\n";
if($has){
  try { echo "route('notes.index'): ".route('notes.index')."\n"; } catch (\Throwable $e){ echo "route() exception: ".$e->getMessage()."\n"; }
}

// Fetch sm_menus rows
$menus = DB::table('sm_menus')->where('route','like','%notes%')->get();
echo "\nsm_menus rows containing 'notes' (count={$menus->count()}):\n"; foreach($menus as $m){ echo " id={$m->id} route={$m->route} role={$m->role_id} menu_status={$m->menu_status} parent={$m->parent} permission_id={$m->permission_id}\n"; }

// Permission row
$perm = DB::table('permissions')->where('route','notes.index')->first();
echo "\nPermission: ".($perm?"id={$perm->id} status={$perm->status} menu_status={$perm->menu_status}":'NOT FOUND')."\n";

// Sidebar legacy row
$side = DB::table('sidebars')->where('permission_id',$perm?->id)->get();
echo "Legacy sidebars referencing permission: ".$side->count()."\n"; foreach($side as $s){ echo " sidebar_id={$s->id} active_status={$s->active_status} role_id={$s->role_id}\n"; }

// Current user role debug (if logged in)
if(function_exists('auth') && Auth::check()){
  echo "\nLogged in as user_id=".Auth::id()." role_id=".Auth::user()->role_id."\n";
}

echo "\nIf Route::has is NO, the module routes file may not be loaded (check module service provider).\n";
echo "If route() URL prints but clicking menu does nothing, inspect the anchor href in browser (it may be empty or '#').\n";
echo "If sm_menus menu_status=0, enable it via Sidebar Manager or run verify-notes-sidebar.php?fix=1.\n";
echo "If legacy sidebar active_status=0 and no sm_menus row, it may appear in available list only.\n";
?>
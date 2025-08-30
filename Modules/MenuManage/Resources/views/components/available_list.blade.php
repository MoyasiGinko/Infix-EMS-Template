<h4>{{ __('common.Available menu items') }}</h4>
<div class="">
  <div class="row">
    <div class="col-xl-12">
      <!-- menu_setup_wrap  -->
      <div class="dd available_list  menu_item_div menu-list" data-section="1">
        <div class="  available-items-container unused_menu" data-id="remove" data-section_id="remove"
          data-type="un_used" id="available_list">
          @php
          $hasIds = [];
          $paid_modules =
          ['Zoom','University','Gmeet','QRCodeAttendance','BBB','ParentRegistration','InfixBiometrics','AiContent','Lms','Certificate','Jitsi','WhatsappSupport','InAppLiveClass'];
          @endphp

          @isset($unused_menus)
          @php $collection = is_array($unused_menus) ? collect($unused_menus) : $unused_menus; @endphp
          @if ($collection->count() > 0)
          <ol class="dd-list" id="unused_menu_root">
            @foreach ($collection as $menu)
            @php
            // Normalize fields
            $menuId = $menu->id ?? ($menu->permission_id ?? '');
            $lang = $menu->lang_name ?? $menu->name ?? 'Undefined';
            $children = isset($menu->deActiveChild) ? $menu->deActiveChild : collect();
            @endphp
            @if(!empty($menu->module) && in_array($menu->module, $paid_modules))
            @if(moduleStatusCheck($menu->module))
            <li class="dd-item" data-id="{{ $menuId }}" data-route="{{ $menu->route ?? '' }}"
              data-section_id="{{ $menu->parent ?? '' }}" data-permission_id="{{ $menuId }}"
              data-parent_route="{{ $menu->parent_id ?? '' }}">
              <div class="card accordion_card" id="accordion_{{ $menuId }}">
                <div class="card-header item_header" id="heading_{{ $menuId }}">
                  <div class="dd-handle">
                    <div class="float-left">{{ __($lang) }}</div>
                  </div>
                </div>
              </div>
              @if($children instanceof \Illuminate\Support\Collection && $children->count())
              <ol class="dd-list">
                @foreach ($children as $submenu)
                <li class="dd-item" data-id="{{ $submenu->id }}">
                  <div class="card accordion_card" id="accordion_{{ $submenu->id }}">
                    <div class="card-header item_header" id="heading_{{ $submenu->id }}">
                      <div class="dd-handle">
                        <div class="float-left">
                          {{ __($submenu->permissionInfo->lang_name ?? $submenu->lang_name ?? $submenu->name) }}</div>
                      </div>
                    </div>
                  </div>
                </li>
                @endforeach
              </ol>
              @endif
            </li>
            @endif
            @else
            <li class="dd-item" data-id="{{ $menuId }}" data-route="{{ $menu->route ?? '' }}"
              data-section_id="{{ $menu->parent ?? '' }}" data-permission_id="{{ $menuId }}"
              data-parent_route="{{ $menu->parent_id ?? '' }}">
              <div class="card accordion_card" id="accordion_{{ $menuId }}">
                <div class="card-header item_header" id="heading_{{ $menuId }}">
                  <div class="dd-handle">
                    <div class="float-left">{{ __($lang) }}</div>
                  </div>
                </div>
              </div>
              @if($children instanceof \Illuminate\Support\Collection && $children->count())
              <ol class="dd-list">
                @foreach ($children as $submenu)
                <li class="dd-item" data-id="{{ $submenu->id }}">
                  <div class="card accordion_card" id="accordion_{{ $submenu->id }}">
                    <div class="card-header item_header" id="heading_{{ $submenu->id }}">
                      <div class="dd-handle">
                        <div class="float-left">
                          {{ __($submenu->permissionInfo->lang_name ?? $submenu->lang_name ?? $submenu->name) }}</div>
                      </div>
                    </div>
                  </div>
                </li>
                @endforeach
              </ol>
              @endif
            </li>
            @endif
            @endforeach
          </ol>
          @else
          <p class="text-muted" style="padding:10px;">{{ __('No unused menu items found') }}</p>
          @endif
          @endisset

        </div>
      </div>
    </div>
  </div>
</div>
@isset($collection)
@php
$debugAll = $collection->map(function($m){
return [
'id' => $m->id ?? ($m->permission_id ?? null),
'route' => $m->route ?? null,
'name' => $m->name ?? $m->lang_name ?? 'Undefined',
'module' => $m->module ?? null,
'parent' => $m->parent ?? null,
'parent_id' => $m->parent_id ?? null,
'position' => $m->position ?? null,
];
});
@endphp
<!-- Debug data: open console and run:
           const data = JSON.parse(document.getElementById('unused_menu_debug_json').textContent); console.table(data);
      -->
<pre id="unused_menu_debug_json"
  style="display:none">{{ json_encode($debugAll, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) }}</pre>
@endisset
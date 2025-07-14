<h4>{{ __('common.Available menu items') }}</h4>
{{-- Debug info --}}
@if(config('app.debug'))
<div style="background: #f8f9fa; padding: 10px; margin: 10px 0; border: 1px solid #dee2e6;">
    <small>
        Debug: unused_menus count = {{ isset($unused_menus) ? (is_array($unused_menus) ? count($unused_menus) : $unused_menus->count()) : 'not set' }}<br>
        Role ID: {{ @$role->id ?? 'not set' }}<br>
        Role Name: {{ $role_name ?? 'not set' }}
    </small>
</div>
@endif
<div class="">
    <div class="row">
        <div class="col-xl-12">
            <!-- menu_setup_wrap  -->
            <div class="dd available_list  menu_item_div menu-list" data-section="1">
                <div class="  available-items-container unused_menu" data-id="remove" data-section_id="remove" data-type="un_used"
                    id="available_list">
                    @php
                        $hasIds = [];
                        $paid_modules = ['Zoom','University','Gmeet','QRCodeAttendance','BBB','ParentRegistration','InfixBiometrics','AiContent','Lms','Certificate','Jitsi','WhatsappSupport','InAppLiveClass'];
                    @endphp

                    @isset($unused_menus)
                        @if (is_array($unused_menus) ? count($unused_menus) > 0 : $unused_menus->count() > 0)
                            @foreach ($unused_menus as $key => $menu)
                                @if(!empty($menu->module) && in_array($menu->module, $paid_modules))
                                   @if(moduleStatusCheck($menu->module))
                                      <ol class="dd-list">
                                        <li class="dd-item" data-id="{{ $menu->id }}"
                                            data-section_id="{{ $menu->parent }}"
                                            data-permission_id="{{ $menu->id }}"
                                            data-parent_route="{{ $menu->parent_id }}">
                                            <div class="card accordion_card" id="accordion_{{ $menu->id }}">
                                                <div class="card-header item_header" id="heading_{{ $menu->id }}">
                                                    <div class="dd-handle">
                                                        <div class="float-left">
                                                            {{ __($menu->lang_name) }}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <ol class="dd-list">
                                                @if($menu->count() > 0)
                                                    @foreach ($menu->deActiveChild as $submenu)

                                                            <li class="dd-item" data-id="{{ $submenu->id }}">
                                                                <div class="card accordion_card"
                                                                    id="accordion_{{ $submenu->id }}">
                                                                    <div class="card-header item_header"
                                                                        id="heading_{{ $submenu->id }}">
                                                                        <div class="dd-handle">
                                                                            <div class="float-left">
                                                                                {{ __($submenu->permissionInfo->lang_name) }}

                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </li>

                                                    @endforeach
                                                @endif
                                            </ol>
                                        </li>
                                    </ol>
                                   @endif
                                @else
                                 <ol class="dd-list">
                                        <li class="dd-item" data-id="{{ $menu->id }}"
                                            data-section_id="{{ $menu->parent }}"
                                            data-permission_id="{{ $menu->id }}"
                                            data-parent_route="{{ $menu->parent_id }}">
                                            <div class="card accordion_card" id="accordion_{{ $menu->id }}">
                                                <div class="card-header item_header" id="heading_{{ $menu->id }}">
                                                    <div class="dd-handle">
                                                        <div class="float-left">
                                                            {{ __($menu->lang_name) }}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <ol class="dd-list">
                                                @if($menu->count() > 0)
                                                    @foreach ($menu->deActiveChild as $submenu)

                                                            <li class="dd-item" data-id="{{ $submenu->id }}">
                                                                <div class="card accordion_card"
                                                                    id="accordion_{{ $submenu->id }}">
                                                                    <div class="card-header item_header"
                                                                        id="heading_{{ $submenu->id }}">
                                                                        <div class="dd-handle">
                                                                            <div class="float-left">
                                                                                {{ __($submenu->permissionInfo->lang_name) }}

                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </li>

                                                    @endforeach
                                                @endif
                                            </ol>
                                        </li>
                                    </ol>
                                @endif
                            @endforeach
                        @else
                            <ol class="dd-list">
                            </ol>

                        @endif
                    @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

@if(userPermission('notes.index'))
    <li data-position="9999" class="main_sidebar_menu">
        <a href="{{ route('notes.index') }}">
            <div class="nav_icon_small">
                <span class="ti-notepad"></span>
            </div>
            <div class="nav_title">
                <span>{{ __('Notes') }}</span>
            </div>
        </a>
    </li>
@endif

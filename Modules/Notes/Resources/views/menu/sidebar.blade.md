@if(userPermission('notes_menu'))
<li data-position="500" class="sortable_li">
  <a href="{{ route('notes.index') }}">
    <div class="nav_icon_small">
      <span class="fas fa-sticky-note"></span>
    </div>
    <div class="nav_title">
      <span>@lang('Notes')</span>
    </div>
  </a>
</li>
@endif
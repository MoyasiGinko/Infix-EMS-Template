{{-- Notes Module Start --}}
@if(auth()->user()->role_id == 1)
    <li data-position="999" class="sortable_li">
        <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">
            <div class="nav_icon_small">
                <span class="fas fa-sticky-note"></span>
            </div>
            <div class="nav_title">
                <span>@lang('Notes')</span>
            </div>
        </a>
        <ul class="list-unstyled" id="subMenuNotes">
            <li data-position="1000">
                <a href="{{ route('notes.expenses.index') }}">@lang('Expense Notes')</a>
            </li>
            <li data-position="1001">
                <a href="{{ route('notes.incomes.index') }}">@lang('Income Notes')</a>
            </li>
            <li data-position="1002">
                <a href="{{ route('notes.events.index') }}">@lang('Event Notes')</a>
            </li>
            <li data-position="1003">
                <a href="{{ route('notes.incidents.index') }}">@lang('Incident Notes')</a>
            </li>
        </ul>
    </li>
@endif
{{-- Notes Module End --}}
                @endif
            </ul>
        </li>
    @endif
@endif
{{-- Notes Module End --}}

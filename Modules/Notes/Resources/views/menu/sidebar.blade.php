{{-- Notes Module Start --}}
@if(auth()->user()->role_id == 1)
    @if(userPermission('notes.menu') && menuStatus('notes_menu'))
        <li data-position="{{menuPosition('notes_menu')}}" class="sortable_li">
            <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">
                <div class="nav_icon_small">
                    <span class="fas fa-sticky-note"></span>
                </div>
                <div class="nav_title">
                    <span>@lang('Notes')</span>
                </div>
            </a>
            <ul class="list-unstyled" id="subMenuNotes">
                @if(userPermission('notes.expense-list') && menuStatus('notes_expense_list'))
                    <li data-position="{{menuPosition('notes_expense_list')}}">
                        <a href="{{ route('notes.expenses.index') }}">@lang('Expense Notes')</a>
                    </li>
                @endif

                @if(userPermission('notes.income-list') && menuStatus('notes_income_list'))
                    <li data-position="{{menuPosition('notes_income_list')}}">
                        <a href="{{ route('notes.incomes.index') }}">@lang('Income Notes')</a>
                    </li>
                @endif

                @if(userPermission('notes.event-list') && menuStatus('notes_event_list'))
                    <li data-position="{{menuPosition('notes_event_list')}}">
                        <a href="{{ route('notes.events.index') }}">@lang('Event Notes')</a>
                    </li>
                @endif

                @if(userPermission('notes.incident-list') && menuStatus('notes_incident_list'))
                    <li data-position="{{menuPosition('notes_incident_list')}}">
                        <a href="{{ route('notes.incidents.index') }}">@lang('Incident Notes')</a>
                    </li>
                @endif
            </ul>
        </li>
    @endif
@endif
{{-- Notes Module End --}}

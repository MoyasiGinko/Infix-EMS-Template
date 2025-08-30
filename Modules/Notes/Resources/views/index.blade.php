@extends('backEnd.master')

@section('title')@lang('Notes')@endsection

@section('mainContent')
<section class="sms-breadcrumb mb-20">
  <div class="container-fluid">
    <div class="row justify-content-between">
      <h1>@lang('Notes')</h1>
      <div class="bc-pages">
        <a href="{{ route('dashboard') }}">@lang('common.dashboard')</a>
  <a href="#">@lang('Notes')</a>
      </div>
    </div>
  </div>
</section>

<section class="admin-visitor-area up_admin_visitor">
  <div class="container-fluid p-0">
    <div class="row">
      <div class="col-lg-12">
        <div class="white-box">
          <div class="row mb-20 align-items-center">
            <div class="col-lg-6 col-md-6">
              <div class="main-title">
                <h3 class="mb-0">@lang('Notes') @lang('common.list')</h3>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 text-right">
              @if(isset($isSuperAdmin) && $isSuperAdmin)
                @if(!empty($showingAll))
                  <a href="{{ route('notes.index') }}" class="primary-btn small tr-bg mr-10">@lang('common.my') @lang('Notes')</a>
                @else
                  <a href="{{ route('notes.all') }}" class="primary-btn small tr-bg mr-10">@lang('common.view') @lang('common.all')</a>
                @endif
              @endif
              @if(userPermission('notes.create'))
              <a href="{{ route('notes.create') }}" class="primary-btn small fix-gr-bg">
                <span class="ti-plus pr-2"></span>@lang('common.add')
              </a>
              @endif
              @if(userPermission('notes.export.excel'))
              <a href="{{ route('notes.export.excel') }}" class="primary-btn small tr-bg ml-10">@lang('common.export')
                XLSX</a>
              @endif
              @if(userPermission('notes.export.pdf'))
              <a href="{{ route('notes.export.pdf') }}" class="primary-btn small tr-bg ml-10">@lang('common.export')
                PDF</a>
              @endif
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <x-table>
                <table class="table" id="notes_table" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>@lang('common.title')</th>
                      <th>@lang('common.type')</th>
                      <th>@lang('common.quantity')</th>
                      <th>@lang('common.amount')</th>
                      <th>@lang('common.created_by')</th>
                      <th>@lang('common.related')</th>
                      <th>@lang('common.date')</th>
                      <th>@lang('common.actions')</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($notes as $note)
                    <tr>
                      <td>{{ $note->title }}</td>
                      <td>{{ $note->type }}</td>
                      <td>{{ $note->quantity }}</td>
                      <td>{{ number_format($note->amount,2) }}</td>
                      <td>{{ optional($note->user)->name ?? '-' }}</td>
                      <td>
                        @if($note->noteable)
                          {{ class_basename($note->noteable_type) }} #{{ $note->noteable_id }}
                        @else
                          -
                        @endif
                      </td>
                      <td>{{ $note->created_at->format('Y-m-d') }}</td>
                      <td>
                        <div class="dropdown CRM_dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button"
                            id="dropdownMenu{{ $note->id }}" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            @lang('common.select')
                          </button>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu{{ $note->id }}">
                            @if(userPermission('notes.show'))
                            <a class="dropdown-item" href="{{ route('notes.show',$note) }}">@lang('common.view')</a>
                            @endif
                            @if(userPermission('notes.edit'))
                            <a class="dropdown-item" href="{{ route('notes.edit',$note) }}">@lang('common.edit')</a>
                            @endif
                            @if(userPermission('notes.destroy'))
                            <form action="{{ route('notes.destroy',$note) }}" method="POST" class="note-delete-form"
                              data-confirm="{{ __('common.are_you_sure_to_delete') }}">
                              @csrf
                              @method('DELETE')
                              <button class="dropdown-item" type="submit">@lang('common.delete')</button>
                            </form>
                            @endif
                          </div>
                        </div>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="8" class="text-center">@lang('common.no_data_available')</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </x-table>
              <div class="mt-20 d-flex justify-content-center">{{ $notes->links() }}</div>
              @push('script')
              <script>
              document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.note-delete-form').forEach(function(f) {
                  f.addEventListener('submit', function(e) {
                    var msg = this.getAttribute('data-confirm') || 'Are you sure?';
                    if (!confirm(msg)) {
                      e.preventDefault();
                    }
                  });
                });
              });
              </script>
              @endpush
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
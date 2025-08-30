@extends('backEnd.master')
@section('title') @lang('common.view') @lang('Notes') @endsection
@section('mainContent')
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1>@lang('Notes')</h1>
                <div class="bc-pages">
                    <a href="{{ route('dashboard') }}">@lang('common.dashboard')</a>
                    <a href="{{ route('notes.index') }}">@lang('Notes')</a>
                    <a href="#">@lang('common.view')</a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-8">
                    <div class="white-box">
                        <div class="main-title d-flex justify-content-between align-items-center">
                            <h3 class="mb-15">{{ $note->title }}</h3>
                            <div>
                                @if(userPermission('notes.edit'))
                                    <a href="{{ route('notes.edit',$note) }}" class="primary-btn small fix-gr-bg mr-10">@lang('common.edit')</a>
                                @endif
                                <a href="{{ route('notes.index') }}" class="primary-btn small tr-bg">@lang('common.back')</a>
                            </div>
                        </div>
                        <div class="row mt-10">
                            <div class="col-lg-6 mb-10"><strong>@lang('common.type'):</strong> {{ $note->type }}</div>
                            <div class="col-lg-6 mb-10"><strong>@lang('common.reference') ID:</strong> {{ $note->reference_id }}</div>
                            <div class="col-lg-6 mb-10"><strong>@lang('common.tags'):</strong> {{ $note->tags }}</div>
                            <div class="col-lg-6 mb-10"><strong>@lang('common.quantity'):</strong> {{ $note->quantity }}</div>
                            <div class="col-lg-6 mb-10"><strong>@lang('common.amount'):</strong> {{ number_format($note->amount,2) }}</div>
                            <div class="col-lg-6 mb-10"><strong>@lang('common.created_by'):</strong> {{ optional($note->user)->name }}</div>
                            <div class="col-lg-12 mb-10"><strong>@lang('common.content'):</strong><br>{{ $note->content }}</div>
                            <div class="col-lg-6 mb-10"><strong>@lang('common.date'):</strong> {{ $note->created_at->format('Y-m-d H:i') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

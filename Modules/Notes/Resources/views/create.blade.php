@extends('backEnd.master')
@section('title') @lang('common.add') @lang('Notes') @endsection
@section('mainContent')
<section class="sms-breadcrumb mb-20">
  <div class="container-fluid">
    <div class="row justify-content-between">
      <h1>@lang('Notes')</h1>
      <div class="bc-pages">
        <a href="{{ route('dashboard') }}">@lang('common.dashboard')</a>
        <a href="{{ route('notes.index') }}">@lang('Notes')</a>
        <a href="#">@lang('common.add')</a>
      </div>
    </div>
  </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
  <div class="container-fluid p-0">
    <div class="row">
      <div class="col-lg-6">
        <div class="white-box">
          <div class="main-title">
            <h3 class="mb-15">@lang('common.add') @lang('Notes')</h3>
          </div>
          {{ html()->form('POST', route('notes.store'))->class('form-horizontal')->open() }}
          <div class="row">
            <div class="col-lg-12 mt-15">
              <div class="primary_input">
                <label class="primary_input_label" for="title">@lang('common.title') <span
                    class="text-danger">*</span></label>
                <input type="text" class="primary_input_field" name="title" id="title" value="{{ old('title') }}"
                  required>
                @error('title')<span class="text-danger">{{ $message }}</span>@enderror
              </div>
            </div>
            <div class="col-lg-12 mt-15">
              <div class="primary_input">
                <label class="primary_input_label" for="type">@lang('common.type') <span
                    class="text-danger">*</span></label>
                <input type="text" class="primary_input_field" name="type" id="type" value="{{ old('type') }}" required>
                @error('type')<span class="text-danger">{{ $message }}</span>@enderror
              </div>
            </div>
            <div class="col-lg-12 mt-15">
              <div class="primary_input">
                <label class="primary_input_label" for="content">@lang('common.content') <span
                    class="text-danger">*</span></label>
                <textarea class="primary_input_field" name="content" id="content" rows="8" style="min-height:180px"
                  placeholder="@lang('common.content')..." required>{{ old('content') }}</textarea>
                @error('content')<span class="text-danger">{{ $message }}</span>@enderror
              </div>
            </div>
            <div class="col-lg-6 mt-15">
              <div class="primary_input">
                <label class="primary_input_label" for="reference_id">@lang('common.reference') ID</label>
                <input type="number" class="primary_input_field" name="reference_id" id="reference_id"
                  value="{{ old('reference_id') }}">
              </div>
            </div>
            <div class="col-lg-6 mt-15">
              <div class="primary_input">
                <label class="primary_input_label" for="tags">@lang('common.tags')</label>
                <input type="text" class="primary_input_field" name="tags" id="tags" value="{{ old('tags') }}">
              </div>
            </div>
            <div class="col-lg-6 mt-15">
              <div class="primary_input">
                <label class="primary_input_label" for="quantity">@lang('common.quantity')</label>
                <input type="number" class="primary_input_field" name="quantity" id="quantity"
                  value="{{ old('quantity') }}">
              </div>
            </div>
            <div class="col-lg-6 mt-15">
              <div class="primary_input">
                <label class="primary_input_label" for="amount">@lang('common.amount')</label>
                <input type="number" step="0.01" class="primary_input_field" name="amount" id="amount"
                  value="{{ old('amount') }}">
              </div>
            </div>
          </div>
          <div class="row mt-40">
            <div class="col-lg-12 text-center">
              <button class="primary-btn fix-gr-bg submit" type="submit">
                <span class="ti-check"></span>@lang('common.save')
              </button>
              <a href="{{ route('notes.index') }}" class="primary-btn tr-bg ml-10">
                @lang('common.cancel')
              </a>
            </div>
          </div>
          {{ html()->form()->close() }}
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
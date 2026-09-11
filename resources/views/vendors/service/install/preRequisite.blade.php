@extends('service::layouts.app_install', ['title' => __('service::install.environment')])

@section('content')
<div class="single-report-admit">
    <div class="card-header">
        <h2 class="text-center text-uppercase color-whitesmoke" >{{ __('service::install.environment_title') }}
        </h2>

    </div>
</div>

<div class="card-body">
    <div class="requirements">
        <div class="row">
            <div class="col-md-12">
                <h4>Server Requirements </h4>
                <hr class="mt-0">
            </div>
            @foreach ($server_checks as $server)
             @php
                $server_type = gv($server, 'type');
                if($server_type == 'error' and !$has_false){
                    $has_false = true;
                }
                $alert_class = $server_type == 'error' ? 'danger' : ($server_type == 'warning' ? 'warning' : 'success');
                $icon_class = $server_type == 'error' ? 'na' : ($server_type == 'warning' ? 'alert' : 'check-box');
            @endphp
            <div class="col-md-6">
                <p
                    class="alert alert-font alert-{{ $alert_class }}">
                    <i class="ti-{{ $icon_class }} mr-1"></i>
                    {{ gv($server, 'message') }}
                    @if($server_type == 'warning')
                        <span class="badge badge-warning text-uppercase float-right">Warning</span>
                    @endif
                </p>
            </div>
            @endforeach
            <div class="col-md-12">
                <h4>Folder Requirements </h4>
                <hr class="mt-0">
            </div>
            @foreach ($folder_checks as $folder)
            @php
                $folder_type = gv($folder, 'type');
                if($folder_type == 'error' and !$has_false){
                    $has_false = true;
                }
                $alert_class = $folder_type == 'error' ? 'danger' : ($folder_type == 'warning' ? 'warning' : 'success');
                $icon_class = $folder_type == 'error' ? 'na' : ($folder_type == 'warning' ? 'alert' : 'check-box');
            @endphp
            <div class="col-md-6">
                <p
                    class="alert-font alert alert-{{ $alert_class }}">
                    <i class="ti-{{ $icon_class }} mr-1"></i>
                    {{ gv($folder, 'message') }}
                    @if($folder_type == 'warning')
                        <span class="badge badge-warning text-uppercase float-right">Warning</span>
                    @endif
                </p>
            </div>
            @endforeach
        </div>
    </div>
    @if($has_false)
    <p class="text-center alert alert-danger mt-40">
        Please solve the requirements issue.
    </p>
    <a href="{{ route('service.preRequisite') }}" class="offset-3 col-sm-6 primary-btn fix-gr-bg mb-20 ">
        {{ __('service::install.refresh') }} </a>
    @else
    <p class="text-center alert alert-success mt-40">
        All The Requirements look's Fine. Let's Dig in
    </p>
    <a href="{{ route('service.license') }}" class="offset-3 col-sm-6 primary-btn fix-gr-bg  mb-20">
        {{ __('service::install.lets_go_next') }} </a>

    @endif
</div>
@stop

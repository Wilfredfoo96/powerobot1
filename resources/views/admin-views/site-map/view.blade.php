@extends('layouts.back-end.app')
@section('title', translate('generate_Sitemap'))
@push('css_or_js')
<link href="{{asset('assets/back-end')}}/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
<div class="content container-fluid">
    <!-- Page Title -->
    <div class="mb-4 pb-2">
        <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
            <img src="{{asset('/assets/back-end/img/system-setting.png')}}" alt="">
            {{translate('system_Setup')}}
        </h2>
    </div>
    <!-- End Page Title -->

    <!-- Inlile Menu -->
    @include('admin-views.business-settings.system-settings-inline-menu')
    <!-- End Inlile Menu -->

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="border-bottom px-4 py-3">
                    <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2">
                        <img width="20" src="{{asset('/assets/back-end/img/sitemap.png')}}" alt="">
                        {{translate('generate_Sitemap')}}
                    </h5>
                </div>
                <div class="card-body text-center">
                    <a href="{{ route('admin.business-settings.web-config.mysitemap-download') }}"
                        class="btn btn--primary px-4">
                        {{translate('download_Generate_Sitemap')}}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.back-end.app-seller')
@section('title', translate('edit_Shipping'))
@push('css_or_js')

@endpush

@section('content')
<div class="content container-fluid">
    <!-- Page Title -->
    <div class="mb-3">
        <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
            <img width="20" src="{{asset('/assets/back-end/img/shipping_method.png')}}" alt="">
            {{translate('shipping_method_update')}}
        </h2>
    </div>
    <!-- End Page Title -->

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-capitalize">
                    <h5 class="mb-0">{{translate('shipping_method_update')}}</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('seller.business-settings.shipping-method.update',[$method['id']])}}"
                        method="post" style="text-align: {{Session::get('direction') === " rtl" ? 'right' : 'left' }};">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <div class="row ">
                                <div class="col-md-12">
                                    <label for="title" class="title-color">{{translate('title')}}</label>
                                    <input type="text" name="title" value="{{$method['title']}}" class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row ">
                                <div class="col-md-12">
                                    <label for="duration" class="title-color">{{translate('duration')}}</label>
                                    <input type="text" name="duration" value="{{$method['duration']}}"
                                        class="form-control"
                                        placeholder="{{translate('ex')}} : 4-6 {{translate('days')}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row ">
                                <div class="col-md-12">
                                    <label for="cost" class="title-color">{{translate('cost')}}</label>
                                    <input type="text" min="0" max="1000000" name="cost"
                                        value="{{\App\CPU\BackEndHelper::usd_to_currency($method['cost'])}}"
                                        class="form-control"
                                        placeholder="{{translate('ex')}} : {{\App\CPU\Helpers::currency_converter("
                                        10")}}">
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn--primary">{{translate('update')}}</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush
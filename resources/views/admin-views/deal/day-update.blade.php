@extends('layouts.back-end.app')
@section('title', translate('deal_Update'))
@push('css_or_js')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{ asset('assets/select2/css/select2.min.css')}}" rel="stylesheet">
@endpush

@section('content')
<div class="content container-fluid">
    <!-- Page Title -->
    <div class="mb-3">
        <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
            <img width="20" src="{{asset('/assets/back-end/img/deal_of_the_day.png')}}" alt="">
            {{translate('update_Deal_of_The_Day')}}
        </h2>
    </div>
    <!-- End Page Title -->

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.deal.day-update',[$deal['id']])}}"
                        style="text-align: {{Session::get('direction') === " rtl" ? 'right' : 'left' }};" method="post">
                        @csrf
                        @php($language=\App\Model\BusinessSetting::where('type','pnc_language')->first())
                        @php($language = $language->value ?? null)
                        @php($default_lang = 'en')

                        @php($default_lang = json_decode($language)[0])
                        <ul class="nav nav-tabs w-fit-content mb-4">
                            @foreach(json_decode($language) as $lang)
                            <li class="nav-item text-capitalize">
                                <a class="nav-link lang_link {{$lang == $default_lang? 'active':''}}" href="#"
                                    id="{{$lang}}-link">{{\App\CPU\Helpers::get_language_name($lang).'('.strtoupper($lang).')'}}</a>
                            </li>
                            @endforeach
                        </ul>

                        <div class="form-group">
                            @foreach(json_decode($language) as $lang)
                            <?php
                                if (count($deal['translations'])) {
                                    $translate = [];
                                    foreach ($deal['translations'] as $t) {
                                        if ($t->locale == $lang && $t->key == "title") {
                                            $translate[$lang]['title'] = $t->value;
                                        }
                                    }
                                }
                                ?>
                            <div class="row {{$lang != $default_lang ? 'd-none':''}} lang_form" id="{{$lang}}-form">
                                <div class="col-md-12">
                                    <label for="name" class="title-color">{{ translate('title')}}
                                        ({{strtoupper($lang)}})</label>
                                    <input type="text" name="title[]"
                                        value="{{$lang==$default_lang?$deal['title']:($translate[$lang]['title']??'')}}"
                                        class="form-control" id="title"
                                        placeholder="{{translate('ex')}} : {{translate('LUX')}}">
                                </div>
                            </div>
                            <input type="hidden" name="lang[]" value="{{$lang}}" id="lang">
                            @endforeach
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <label for="name" class="title-color">{{ translate('products')}}</label>
                                    <input type="text" class="product_id" name="product_id"
                                        value="{{ $deal['product_id'] }}" hidden>
                                    <div class="dropdown select-product-search w-100">
                                        <button class="form-control text-start dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            {{isset($deal->product) ? $deal->product->name :
                                            translate('product_not_found')}}
                                        </button>
                                        <div class="dropdown-menu w-100 px-2">
                                            <div class="search-form mb-3">
                                                <button type="button" class="btn"><i class="tio-search"></i></button>
                                                <input type="text" class="js-form-search form-control search-bar-input"
                                                    onkeyup="search_product()"
                                                    placeholder="{{translate('search menu')}}...">
                                            </div>
                                            <div
                                                class="d-flex flex-column gap-3 max-h-200 overflow-y-auto overflow-x-hidden search-result-box">
                                                @foreach ($products as $key => $product)

                                                <div
                                                    class="select-product-item media gap-3 border-bottom pb-2 cursor-pointer">
                                                    <img class="avatar avatar-xl border" width="75"
                                                        onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                                        src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$product['thumbnail']}}"
                                                        alt="">
                                                    <div class="media-body d-flex flex-column gap-1">

                                                        <h6 class="product-id" hidden>{{$product['id']}}</h6>
                                                        <h6 class="fz-13 mb-1 text-truncate custom-width product-name">
                                                            {{$product['name']}}</h6>
                                                        <div class="fz-10">{{translate('category')}} :
                                                            {{isset($product->category) ? $product->category->name :
                                                            translate('category_not_found') }}</div>
                                                        <div class="fz-10">{{translate('brand')}} :
                                                            {{isset($product->brand) ? $product->brand->name :
                                                            translate('brands_not_found') }}</div>
                                                        @if ($product->added_by == "seller")
                                                        <div class="fz-10">{{translate('shop')}} :
                                                            {{isset($product->seller) ? $product->seller->shop->name :
                                                            translate('shop_not_found') }}</div>
                                                        @else
                                                        <div class="fz-10">{{translate('shop')}} :
                                                            {{$web_config['name']->value}}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-3">
                            <button type="reset" id="reset" class="btn btn-secondary">{{ translate('reset')}}</button>
                            <button type="submit" class="btn btn--primary">{{ translate('update')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="{{asset('assets/back-end')}}/js/select2.min.js"></script>
<script>
    let selectProductSearch = $('.select-product-search');
        selectProductSearch.on('click', '.select-product-item', function () {
            let productName = $(this).find('.product-name').text();
            let productId = $(this).find('.product-id').text();
            selectProductSearch.find('button.dropdown-toggle').text(productName);
            alert(productId)
            $('.product_id').val(productId);
        })
</script>
<script>
    $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-responsive").select2({
            width: 'resolve'
        });

        $(".lang_link").click(function (e) {
            e.preventDefault();
            $(".lang_link").removeClass('active');
            $(".lang_form").addClass('d-none');
            $(this).addClass('active');

            let form_id = this.id;
            let lang = form_id.split("-")[0];
            console.log(lang);
            $("#" + lang + "-form").removeClass('d-none');
            if (lang == '{{$default_lang}}') {
                $(".from_part_2").removeClass('d-none');
            } else {
                $(".from_part_2").addClass('d-none');
            }
        });

        $(document).ready(function () {
            $('#dataTable').DataTable();
        });

        /*Serach product */
        function search_product(){
            let name = $(".search-bar-input").val();
            if (name.length >0) {
                $.get("{{route('admin.deal.search-product')}}",{name:name},(response)=>{
                    $('.search-result-box').empty().html(response.result);
                })
            }
        }
</script>
@endpush
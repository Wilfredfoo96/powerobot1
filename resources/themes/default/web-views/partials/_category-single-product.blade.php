@php($overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews))
<div class="product-single-hover style--category shadow-none">
    <div class="overflow-hidden position-relative">
        <div class=" inline_product clickable d-flex justify-content-center">
            @if($product->discount > 0)
            <div class="d-flex">
                <span class="for-discoutn-value p-1 pl-2 pr-2">
                    @if ($product->discount_type == 'percent')
                    {{round($product->discount,(!empty($decimal_point_settings) ? $decimal_point_settings: 0))}}%
                    @elseif($product->discount_type =='flat')
                    {{\App\CPU\Helpers::currency_converter($product->discount)}}
                    @endif
                    {{translate('off')}}
                </span>
            </div>
            @else
            <div class="d-flex justify-content-end for-dicount-div-null">
                <span class="for-discoutn-value-null"></span>
            </div>
            @endif
            <div class="d-block pb-0">
                <a href="{{route('product',$product->slug)}}" class="d-block">
                    <img src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$product['thumbnail']}}"
                        onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'">
                </a>
            </div>

            <div class="quick-view">
                <a class="btn-circle stopPropagation" href="javascript:" onclick="quickView('{{$product->id}}')">
                    <i class="czi-eye align-middle"></i>
                </a>
            </div>
            @if($product->product_type == 'physical' && $product->current_stock <= 0) <span class="out_fo_stock">
                {{translate('out_of_stock')}}</span>
                @endif
        </div>
        <div class="single-product-details">
            @if($overallRating[0] != 0 )
            <div class="rating-show justify-content-between">
                <span class="d-inline-block font-size-sm text-body" style="font-weight: 400;
                font-size: 10px;">
                    @for($inc=1;$inc<=5;$inc++) @if ($inc <=(int)$overallRating[0]) <i class="tio-star text-warning">
                        </i>
                        @elseif ($overallRating[0] != 0 && $inc <= (int)$overallRating[0] + 1.1 && $overallRating[0]>
                            ((int)$overallRating[0]))
                            <i class="tio-star-half text-warning"></i>
                            @else
                            <i class="tio-star-outlined text-warning"></i>
                            @endif
                            @endfor
                            <label class="badge-style">( {{$product->reviews_count}} )</label>
                </span>
            </div>
            @endif
            <div class="">
                <a href="{{route('product',$product->slug)}}" class="text-capitalize fw-semibold">
                    {{ Str::limit($product['name'], 18) }}
                </a>
            </div>
            <div class="justify-content-between ">
                <div class="product-price d-flex flex-wrap gap-8 align-items-center row-gap-0 " style="font-weight: 400;
                font-size: 12px;">
                    @if($product->discount > 0)
                    <strike style="font-size: 12px!important;color: #9B9B9B!important;">
                        {{\App\CPU\Helpers::currency_converter($product->unit_price)}}
                    </strike>
                    @endif
                    <span class="text-accent text-dark">
                        {{\App\CPU\Helpers::currency_converter(
                        $product->unit_price-(\App\CPU\Helpers::get_product_discount($product,$product->unit_price))
                        )}}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .steps-light .step-item.active .step-count,
    .steps-light .step-item.active .step-progress {
        color: #fff;

        background-color: {{ $web_config['primary_color'] }};
    }

    .steps-light .step-count,
    .steps-light .step-progress {
        color: #4f4f4f;
        background-color: rgba(225, 225, 225, 0.67);
    }

    .steps-light .step-item.active.current {
        color: {{ $web_config['primary_color'] }} !important;
        pointer-events: none;
    }

    .steps-light .step-item {
        color: #4f4f4f;
        font-size: 14px;
        font-weight: 400;
    }
</style>
<div class="steps steps-light pt-2 pb-2">
    <a class="step-item {{ $step >= 1 ? 'active' : '' }} {{ $step == 1 ? 'current' : '' }}" href="{{ route('shop-cart') }}">
        <div class="step-progress">
            <span class="step-count">
                <img src="{{ asset('/assets/front-end/img/cart-icon.png') }}" class="mb-1" alt="">
            </span>
        </div>
        <div class="step-label">
            {{ translate('cart') }}
        </div>
    </a>
    <a class="step-item {{ $step >= 2 ? 'active' : '' }} {{ $step == 2 ? 'current' : '' }}" href="{{ route('checkout-details') }}">
        <div class="step-progress">
            <span class="step-count"><i class="czi-package"></i></span>
        </div>
        @php($billing_input_by_customer = \App\CPU\Helpers::get_business_settings('billing_input_by_customer'))
        <div class="step-label">
            {{ translate('shipping') }} {{ $billing_input_by_customer == 1 ? translate('and_billing') : ' ' }}
        </div>
    </a>
    <a class="step-item {{ $step >= 3 ? 'active' : '' }} {{ $step == 3 ? 'current' : '' }}"
        href="{{ $step >= 3 ? route('checkout-payment') : 'javascript:' }}">
        <div class="step-progress">
            <span class="step-count"><i class="czi-card"></i></span>
        </div>
        <div class="step-label">
            {{ translate('payment') }}
        </div>
    </a>
</div>

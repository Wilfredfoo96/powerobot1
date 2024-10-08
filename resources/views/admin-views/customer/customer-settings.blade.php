@extends('layouts.back-end.app')
{{--@section('title','Customer')--}}
@section('title', translate('customer_settings'))

@push('css_or_js')

@endpush

@section('content')

<div class="content container-fluid">
    <!-- Page Title -->
    <div class="d-flex justify-content-between align-items-center gap-3 mb-3">
        <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
            <img src="{{asset('/assets/back-end/img/business-setup.png')}}" alt="">
            {{translate('business_Setup')}}
        </h2>

        <div class="btn-group">
            <div class="ripple-animation" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none"
                    class="svg replaced-svg">
                    <path
                        d="M9.00033 9.83268C9.23644 9.83268 9.43449 9.75268 9.59449 9.59268C9.75449 9.43268 9.83421 9.2349 9.83366 8.99935V5.64518C9.83366 5.40907 9.75366 5.21463 9.59366 5.06185C9.43366 4.90907 9.23588 4.83268 9.00033 4.83268C8.76421 4.83268 8.56616 4.91268 8.40616 5.07268C8.24616 5.23268 8.16644 5.43046 8.16699 5.66602V9.02018C8.16699 9.25629 8.24699 9.45074 8.40699 9.60352C8.56699 9.75629 8.76477 9.83268 9.00033 9.83268ZM9.00033 13.166C9.23644 13.166 9.43449 13.086 9.59449 12.926C9.75449 12.766 9.83421 12.5682 9.83366 12.3327C9.83366 12.0966 9.75366 11.8985 9.59366 11.7385C9.43366 11.5785 9.23588 11.4988 9.00033 11.4993C8.76421 11.4993 8.56616 11.5793 8.40616 11.7393C8.24616 11.8993 8.16644 12.0971 8.16699 12.3327C8.16699 12.5688 8.24699 12.7668 8.40699 12.9268C8.56699 13.0868 8.76477 13.1666 9.00033 13.166ZM9.00033 17.3327C7.84755 17.3327 6.76421 17.1138 5.75033 16.676C4.73644 16.2382 3.85449 15.6446 3.10449 14.8952C2.35449 14.1452 1.76088 13.2632 1.32366 12.2493C0.886437 11.2355 0.667548 10.1521 0.666992 8.99935C0.666992 7.84657 0.885881 6.76324 1.32366 5.74935C1.76144 4.73546 2.35505 3.85352 3.10449 3.10352C3.85449 2.35352 4.73644 1.7599 5.75033 1.32268C6.76421 0.88546 7.84755 0.666571 9.00033 0.666016C10.1531 0.666016 11.2364 0.884905 12.2503 1.32268C13.2642 1.76046 14.1462 2.35407 14.8962 3.10352C15.6462 3.85352 16.24 4.73546 16.6778 5.74935C17.1156 6.76324 17.3342 7.84657 17.3337 8.99935C17.3337 10.1521 17.1148 11.2355 16.677 12.2493C16.2392 13.2632 15.6456 14.1452 14.8962 14.8952C14.1462 15.6452 13.2642 16.2391 12.2503 16.6768C11.2364 17.1146 10.1531 17.3332 9.00033 17.3327ZM9.00033 15.666C10.8475 15.666 12.4206 15.0168 13.7195 13.7185C15.0184 12.4202 15.6675 10.8471 15.667 8.99935C15.667 7.15213 15.0178 5.57907 13.7195 4.28018C12.4212 2.98129 10.8481 2.33213 9.00033 2.33268C7.1531 2.33268 5.58005 2.98185 4.28116 4.28018C2.98227 5.57852 2.3331 7.15157 2.33366 8.99935C2.33366 10.8466 2.98283 12.4196 4.28116 13.7185C5.57949 15.0174 7.15255 15.6666 9.00033 15.666Z"
                        fill="currentColor"></path>
                </svg>
            </div>


            <div
                class="dropdown-menu dropdown-menu-right bg-aliceblue border border-color-primary-light p-4 dropdown-w-lg">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <img width="20" src="{{asset('/assets/back-end/img/note.png')}}" alt="">
                    <h5 class="text-primary mb-0">{{translate('note')}}</h5>
                </div>
                <p class="title-color font-weight-medium mb-0">{{
                    translate('please_click_the_Save_button_below_to_save_all_the_changes') }}</p>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Inlile Menu -->
    @include('admin-views.business-settings.business-setup-inline-menu')
    <!-- End Inlile Menu -->

    <form action="{{ route('admin.customer.customer-settings-update') }}" method="post" id="update-settings">
        @csrf

        <div class="card mb-3">
            <div class="card-body">

                <div class="row align-items-end gy-2">

                    @php($wallet_status =\App\CPU\Helpers::get_business_settings('wallet_status'))

                    <div class="col-xl-4 col-md-6">
                        <div class="d-flex justify-content-between align-items-center gap-10 form-control">
                            <span class="title-color">
                                {{translate('customer_Wallet')}}
                                <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                    data-placement="right"
                                    title="{{translate('admin_can_set_whether_wallet_will_be_available_on_customer_profile_by_enabling_or_disabling_this_button')}}">
                                    <img width="16" src="{{asset('/assets/back-end/img/info-circle.svg')}}" alt="">
                                </span>
                            </span>

                            <label class="switcher" for="customer_wallet">
                                <input type="checkbox" class="switcher_input" name="customer_wallet"
                                    id="customer_wallet" value="1" {{ $wallet_status==1 ? 'checked' :'' }}
                                    onclick="toogleModal(event,'customer_wallet','customer-wallet-on.png','customer-wallet-off.png','{{translate('want_to_Turn_ON_Customer_Wallet')}}','{{translate('want_to_Turn_OFF_Customer_Wallet')}}',`<p>{{translate('if_enabled_customers_can_have_the_wallet_option_on_their_account_and_use_it_while_placing_orders_and_getting_refunds')}}</p>`,`<p>{{translate('if_disabled_customer_wallet_option_will_be_hidden_from_their_account')}}</p>`)">
                                <span class="switcher_control"></span>
                            </label>
                        </div>
                    </div>

                    @php($loyalty_point_status = \App\CPU\Helpers::get_business_settings('loyalty_point_status'))

                    <div class="col-xl-4 col-md-6">
                        <div class="d-flex justify-content-between align-items-center gap-10 form-control">
                            <span class="title-color">
                                {{translate('customer_Loyalty_Point')}}
                                <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                    data-placement="right"
                                    title="{{translate('admin_can_set_whether_customers_will_get_loyalty_points_by_enabling_or_disabling_this_button')}}">
                                    <img width="16" src="{{asset('/assets/back-end/img/info-circle.svg')}}" alt="">
                                </span>
                            </span>

                            <label class="switcher" for="customer_loyalty_point">
                                <input type="checkbox" class="switcher_input" name="customer_loyalty_point" value="1"
                                    id="customer_loyalty_point" {{ $loyalty_point_status==1 ? 'checked' :'' }}
                                    onclick="toogleModal(event,'customer_loyalty_point','loyalty-on.png','loyalty-off.png','{{translate('want_to_Turn_ON_Loyalty_Point')}}','{{translate('want_to_Turn_OFF_Loyalty_Point')}}',`<p>{{translate('if_enabled_the_loyalty_point_option_will_be_available_to_the_customers_account')}}</p>`,`<p>{{translate('if_disabled_loyalty_point_option_will_be_hidden_from_the_customers_account')}}</p>`)">
                                <span class="switcher_control"></span>
                            </label>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6">
                        @php($ref_earning_status = \App\CPU\Helpers::get_business_settings('ref_earning_status'))

                        <div class="d-flex justify-content-between align-items-center gap-10 form-control">
                            <span class="title-color d-flex align-items-center gap-1">
                                {{translate('customer_Referrer_Earning')}}
                                <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                    data-placement="right"
                                    title="{{translate('admin_can_set_whether_customers_will_get_referral_earnings_by_enabling_or_disabling_this_button')}}">
                                    <img width="16" src="{{asset('/assets/back-end/img/info-circle.svg')}}" alt="">
                                </span>
                            </span>

                            <label class="switcher" for="ref_earning_status">
                                <input type="checkbox" class="switcher_input" name="ref_earning_status" value="1"
                                    id="ref_earning_status" {{$ref_earning_status==1?'checked':''}}
                                    onclick="toogleModal(event,'ref_earning_status','referral-earning-on.png','referral-earning-off.png','{{translate('want_to_Turn_ON_Referral_And_Earning_option')}}','{{translate('want_to_Turn_OFF_Referral_And_Earning_option')}}',`<p>{{translate('if_enabled_customers_will_receive_rewards_for_each_successful_referral')}}</p>`,`<p>{{translate('if_disabled_customers_will_not_receive_rewards_for_successful_referral')}}</p>`)">
                                <span class="switcher_control"></span>
                            </label>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="card mb-3 {{ $wallet_status == 0?'opacity--40':'' }}">
            <div class="border-bottom px-4 py-3">
                <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2">
                    <img src="{{asset('/assets/back-end/img/vector.png')}}" alt="">
                    {{translate('customer_Wallet_Settings')}}
                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip" data-placement="right"
                        title="{{translate('if_the_Customer_Wallet_option_is_disabled_above_all_settings_of_this_section_will_be_unavailable')}}">
                        <img width="16" src="{{asset('/assets/back-end/img/info-circle.svg')}}" alt="">
                    </span>
                </h5>
            </div>
            <div class="card-body">
                <div class="row align-items-end gy-2">

                    @php($wallet_add_refund = \App\CPU\Helpers::get_business_settings('wallet_add_refund'))

                    <div class="col-xl-4 col-md-6">
                        <div class="d-flex justify-content-between align-items-center gap-10 form-control">
                            <span class="title-color">
                                {{translate('add_Refund_Amount_to_Wallet')}}
                                <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                    data-placement="right"
                                    title="{{translate('admin_can_set_whether_customers_will_get_refund_amount_to_wallet_by_enabling_or_disabling_this_button')}}">
                                    <img width="16" src="{{asset('/assets/back-end/img/info-circle.svg')}}" alt="">
                                </span>
                            </span>

                            <label class="switcher" for="refund_to_wallet">
                                <input type="checkbox" class="switcher_input" name="refund_to_wallet"
                                    id="refund_to_wallet" value="1" {{ ($wallet_status && $wallet_add_refund)
                                    ? 'checked' :'' }} {{ $wallet_status==0 ? 'disabled' :'' }}
                                    onclick="toogleModal(event,'refund_to_wallet','refund-wallet-on.png','refund-wallet-off.png','{{translate('want_to_Turn_ON_Refund_to_Wallet_option')}}','{{translate('want_to_Turn_OFF_Refund_to_Wallet_option')}}',`<p>{{translate('if_enabled_Admin_can_return_the_refund_amount_directly_to_the_customers_wallet_')}}</p>`,`<p>{{translate('if_disabled_Admin_needs_to_return_the_refund_amount_manually')}}</p>`)">
                                <span class="switcher_control"></span>
                            </label>
                        </div>
                    </div>

                    @php($add_funds_to_wallet=\App\CPU\Helpers::get_business_settings('add_funds_to_wallet'))

                    <div class="col-xl-4 col-md-6">
                        <div class="d-flex justify-content-between align-items-center gap-10 form-control">
                            <span class="title-color">
                                {{translate('add_Fund_to_Wallet')}}
                                <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                    data-placement="right"
                                    title="{{translate('admin_can_set_whether_customers_can_add_money_to_their_wallets_by_enabling_or_disabling_this_button')}}">
                                    <img width="16" src="{{asset('/assets/back-end/img/info-circle.svg')}}" alt="">
                                </span>
                            </span>

                            <label class="switcher" for="add_funds_to_wallet">
                                <input type="checkbox" class="switcher_input" name="add_funds_to_wallet" value="1"
                                    id="add_funds_to_wallet" {{ ($wallet_status && $add_funds_to_wallet) ? 'checked' :''
                                    }} {{ $wallet_status==0 ? 'disabled' :'' }}
                                    onclick="toogleModal(event,'add_funds_to_wallet','wallet-on.png','wallet-off.png','{{translate('want_to_Turn_ON_Add_Fund_to_Wallet_option')}}','{{translate('want_to_Turn_OFF_Add_Fund_to_Wallet_option')}}',`<p>{{translate('if_enabled_customers_can_add_money_to_their_wallet')}}</p>`,`<p>{{translate('if_disabled_customers_would_not_be_able_to_add_money_to_their_wallet')}}</p>`)">
                                <span class="switcher_control"></span>
                            </label>
                        </div>
                    </div>

                    @php($minimum_add_fund_amount=\App\CPU\Helpers::get_business_settings('minimum_add_fund_amount'))

                    <div class="col-xl-4 col-md-6">
                        <div class="">
                            <label class="title-color" for="minimum_add_fund_amount">
                                {{translate('minimum_Add_Fund_Amount')}} ({{ \App\CPU\BackEndHelper::currency_symbol()
                                }})
                            </label>
                            <input type="text" class="form-control" name="minimum_add_fund_amount"
                                id="minimum_add_fund_amount" placeholder="{{translate('ex')}} : {{translate('10')}}"
                                value="{{ \App\CPU\Convert::default($minimum_add_fund_amount) ?? 0 }}" {{
                                $wallet_status==0?'disabled':'' }}>
                        </div>
                    </div>

                    @php($maximum_add_fund_amount=\App\CPU\Helpers::get_business_settings('maximum_add_fund_amount'))

                    <div class="col-xl-4 col-md-6">
                        <div class="">
                            <label class="title-color" for="maximum_add_fund_amount">
                                {{translate('maximum_Add_Fund_Amount')}} ({{ \App\CPU\BackEndHelper::currency_symbol()
                                }})
                            </label>
                            <input type="text" class="form-control" name="maximum_add_fund_amount"
                                id="maximum_add_fund_amount" placeholder="{{translate('ex')}} : {{translate('10')}}"
                                value="{{ \App\CPU\Convert::default($maximum_add_fund_amount) ?? 0 }}" {{
                                $wallet_status==0?'disabled':'' }}>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="card mb-3 {{ $loyalty_point_status == 0?'opacity--40':'' }}">
            <div class="border-bottom px-4 py-3">
                <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2">
                    <i class="tio-award"></i>
                    {{translate('customer_Loyalty_Point_Settings')}}
                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip" data-placement="right"
                        title="{{translate('if_the_Customer_Loyalty_Point_option_is_disabled_above_all_settings_of_this_section_will_be_unavailable')}}">
                        <img width="16" src="{{asset('/assets/back-end/img/info-circle.svg')}}" alt="">
                    </span>
                </h5>
            </div>
            <div class="card-body">
                <div class="row align-items-end gy-2">
                    @php($loyalty_point_exchange_rate=\App\CPU\Helpers::get_business_settings('loyalty_point_exchange_rate'))
                    <div class="col-xl-4 col-md-6">
                        <div class="">
                            <label class="title-color" for="loyalty_point_exchange_rate">
                                {{translate('equivalent_Point_to_1_Unit_Currency')}}
                            </label>
                            <input type="text" class="form-control" name="loyalty_point_exchange_rate" {{
                                $loyalty_point_status==0?'disabled':'' }} id="loyalty_point_exchange_rate"
                                placeholder="{{translate('ex')}} : {{translate('10')}}"
                                value="{{ $loyalty_point_exchange_rate ?? 0 }}">
                        </div>
                    </div>

                    @php($loyalty_point_item_purchase_point=\App\CPU\Helpers::get_business_settings('loyalty_point_item_purchase_point'))

                    <div class="col-xl-4 col-md-6">
                        <div class="">
                            <label class="title-color" for="item_purchase_point">
                                {{translate('loyalty_Point_Earn_on_Each_Order')}} (%)
                            </label>
                            <input type="text" class="form-control" name="item_purchase_point" id="item_purchase_point"
                                placeholder="{{translate('ex')}} : {{translate('10')}}" {{
                                $loyalty_point_status==0?'disabled':'' }}
                                value="{{ $loyalty_point_item_purchase_point ?? 0 }}">
                        </div>
                    </div>

                    @php($loyalty_point_minimum_point=\App\CPU\Helpers::get_business_settings('loyalty_point_minimum_point'))

                    <div class="col-xl-4 col-md-6">
                        <div class="">
                            <label class="title-color" for="minimun_transfer_point">
                                {{translate('minimum_Point_Required_To_Convert')}}
                                <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{translate('when_converting_loyalty_points_to_currency_customers_will_require_the_minimum_loyalty_point_set_by_the_admin')}}">
                                    <img width="16" src="{{asset('/assets/back-end/img/info-circle.svg')}}" alt="">
                                </span>
                            </label>
                            <input type="text" class="form-control" name="minimun_transfer_point"
                                id="minimun_transfer_point" placeholder="{{translate('ex')}} : {{translate('10')}}" {{
                                $loyalty_point_status==0?'disabled':'' }}
                                value="{{ $loyalty_point_minimum_point ?? 0 }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3 {{ $ref_earning_status == 0?'opacity--40':'' }}">
            <div class="border-bottom px-4 py-3">
                <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2">
                    <i class="tio-award"></i>
                    {{translate('customer_Referrer_Settings')}}
                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip" data-placement="right"
                        title="{{translate('if_Customer_Referral_Earning_is_disabled_above_all_settings_of_this_section_will_be_unavailable')}}">
                        <img width="16" src="{{asset('/assets/back-end/img/info-circle.svg')}}" alt="">
                    </span>
                </h5>
            </div>

            <div class="card-body">
                <div class="row align-items-end gy-2">
                    @php($ref_earning_exchange_rate =
                    \App\CPU\Helpers::get_business_settings('ref_earning_exchange_rate'))

                    <div class="col-xl-4 col-md-6">
                        <div class="">
                            <label class="title-color" for="ref_earning_exchange_rate">
                                {{translate('earnings_to_Each_Referral')}} ({{ \App\CPU\BackEndHelper::currency_symbol()
                                }})
                                <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                    data-placement="right"
                                    title="{{translate('set_the_earning_amount_for_each_successful_referral')}}">
                                    <img width="16" src="{{asset('/assets/back-end/img/info-circle.svg')}}" alt="">
                                </span>
                            </label>
                            <input type="text" class="form-control" name="ref_earning_exchange_rate"
                                id="ref_earning_exchange_rate" placeholder="{{translate('ex')}} : {{translate('10')}}"
                                {{ $ref_earning_status==0?'disabled':'' }}
                                value="{{ \App\CPU\Convert::default($ref_earning_exchange_rate) ?? 0 }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end my-3">
            <button class="btn btn--primary px-5">{{translate('save')}}</button>
        </div>

    </form>
</div>
@endsection

@push('script_2')
<script>
    function section_visibility(id) {
            if ($('#' + id).is(':checked')) {
                $('#' + id + '_section').attr('style', 'display: block');
            } else {
                $('#' + id + '_section').attr('style', 'display: none !important');
            }
        }

        $('#update-settings').on('submit', function(e) {
            let minimum_add_fund_amount = parseFloat($('#minimum_add_fund_amount').val());
            let maximum_add_fund_amount = parseFloat($('#maximum_add_fund_amount').val());
            if (maximum_add_fund_amount < minimum_add_fund_amount) {
                e.preventDefault();
                toastr.error("{{ translate('minimum_amount_can_not_be_greater_than_maximum_amount') }}");
            }
        });
</script>
@endpush
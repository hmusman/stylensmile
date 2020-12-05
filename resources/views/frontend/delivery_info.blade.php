@extends('frontend.layouts.app')

@section('content')

<section class="pt-5 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 mx-auto">
                <div class="row aiz-steps arrow-divider">
                    <div class="col">
                        <div class="text-center text-success">
                            <i class="la-3x mb-2 las la-shopping-cart"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block text-capitalize">{{ translate('1. My Cart')}}</h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center text-success">
                            <i class="la-3x mb-2 las la-map"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block text-capitalize">{{ translate('2. Shipping info')}}</h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center text-primary">
                            <i class="la-3x mb-2 las la-truck"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block text-capitalize">{{ translate('3. Delivery info')}}</h3>
                        </div>
                    </div>
                    {{-- <div class="col">
                        <div class="text-center">
                            <i class="la-3x mb-2 opacity-50 las la-credit-card"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50 text-capitalize">{{ translate('4. Payment')}}</h3>
                        </div>
                    </div> --}}
                    <div class="col">
                        <div class="text-center">
                            <i class="la-3x mb-2 opacity-50 las la-check-circle"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50 text-capitalize">{{ translate('4. Confirmation')}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-4 gry-bg">
    <div class="container">
        <div class="row cols-xs-space cols-sm-space cols-md-space">
            <div class="col-xxl-8 col-xl-10 mx-auto text-left">
                @php
                    $admin_products = array();
                    $seller_products = array();
                    foreach (Session::get('cart') as $key => $cartItem){
                        if(\App\Product::find($cartItem['id'])->added_by == 'admin'){
                            array_push($admin_products, $cartItem['id']);
                        }
                        else{
                            $product_ids = array();
                            if(array_key_exists(\App\Product::find($cartItem['id'])->user_id, $seller_products)){
                                $product_ids = $seller_products[\App\Product::find($cartItem['id'])->user_id];
                            }
                            array_push($product_ids, $cartItem['id']);
                            $seller_products[\App\Product::find($cartItem['id'])->user_id] = $product_ids;
                        }
                    }
                @endphp

                @if (!empty($admin_products))
                <form class="form-default" action="{{ route('checkout.store_delivery_info') }}" role="form" method="POST" id="admin-products-form">
                    @csrf
                    <div class="card mb-3 shadow-sm border-0 rounded">
                        <div class="card-header p-3">
                            <h5 class="fs-16 fw-600 mb-0">{{ get_setting('site_name') }} {{ translate('Products') }}</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                @foreach ($admin_products as $key => $cartItem)
                                @php
                                    $product = \App\Product::find($cartItem);
                                @endphp
                                <li class="list-group-item">
                                    <div class="d-flex">
                                        <span class="mr-2">
                                            <img
                                                src="{{ uploaded_asset($product->thumbnail_img) }}"
                                                class="img-fit size-60px rounded"
                                                alt="{{  $product->getTranslation('name')  }}"
                                            >
                                        </span>
                                        <span class="fs-14 opacity-60">{{ $product->getTranslation('name') }}</span>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            @if (\App\BusinessSetting::where('type', 'pickup_point')->first()->value == 1)
                            <div class="row border-top pt-3">
                                <div class="col-md-6">
                                    <h6 class="fs-15 fw-600">{{ translate('Choose Delivery Type') }}</h6>
                                </div>
                                <div class="col-md-6">
                                    <div class="row gutters-5">
                                        <div class="col-6">
                                            <label class="aiz-megabox d-block bg-white mb-0">
                                                <input
                                                    type="radio"
                                                    name="shipping_type_{{ \App\User::where('user_type', 'admin')->first()->id }}"
                                                    value="home_delivery"
                                                    onchange="show_pickup_point(this)"
                                                    data-target=".pickup_point_id_admin"
                                                    checked
                                                >
                                                <span class="d-flex p-3 aiz-megabox-elem">
                                                    <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                    <span class="flex-grow-1 pl-3 fw-600">{{  translate('Home Delivery') }}</span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <label class="aiz-megabox d-block bg-white mb-0">
                                                <input
                                                    type="radio"
                                                    name="shipping_type_{{ \App\User::where('user_type', 'admin')->first()->id }}"
                                                    value="pickup_point"
                                                    onchange="show_pickup_point(this)"
                                                    data-target=".pickup_point_id_admin"
                                                >
                                                <span class="d-flex p-3 aiz-megabox-elem">
                                                    <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                    <span class="flex-grow-1 pl-3 fw-600">{{  translate('Local Pickup') }}</span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mt-4 pickup_point_id_admin d-none">
                                        <select
                                            class="form-control aiz-selectpicker"
                                            name="pickup_point_id_{{ \App\User::where('user_type', 'admin')->first()->id }}"
                                            data-live-search="true"
                                        >
                                                <option>{{ translate('Select your nearest pickup point')}}</option>
                                            @foreach (\App\PickupPoint::where('pick_up_status',1)->get() as $key => $pick_up_point)
                                                <option
                                                    value="{{ $pick_up_point->id }}"
                                                    data-content="<span class='d-block'>
                                                                    <span class='d-block fs-16 fw-600 mb-2'>{{ $pick_up_point->getTranslation('name') }}</span>
                                                                    <span class='d-block opacity-50 fs-12'><i class='las la-map-marker'></i> {{ $pick_up_point->getTranslation('address') }}</span>
                                                                    <span class='d-block opacity-50 fs-12'><i class='las la-phone'></i>{{ $pick_up_point->phone }}</span>
                                                                </span>"
                                                >
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @endif

                        </div>
                        <div class="card-footer justify-content-end">
                            <button type="submit" name="owner_id" value="{{ App\User::where('user_type', 'admin')->first()->id }}" class="btn fw-600 btn-primary">{{ translate('Continue To Order Submition')}}</a>
                        </div>
                    </div>
                </form>
                @endif
                <form class="form-default"  action="{{ route('checkout.store_delivery_info') }}" role="form" method="POST" id="seller-products-form">
                    @csrf
                    @if (!empty($seller_products))
                        @foreach ($seller_products as $key => $seller_product)
                            <div class="card mb-3 shadow-sm border-0 rounded">
                                <div class="card-header p-3">
                                    <h5 class="fs-16 fw-600 mb-0">{{ \App\Shop::where('user_id', $key)->first()->name }} {{ translate('Products') }}</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        @foreach ($seller_product as $cartItem)
                                        @php
                                            $product = \App\Product::find($cartItem);
                                        @endphp
                                        <li class="list-group-item">
                                            <div class="d-flex">
                                                <span class="mr-2">
                                                    <img
                                                        src="{{ uploaded_asset($product->thumbnail_img) }}"
                                                        class="img-fit size-60px rounded"
                                                        alt="{{  $product->getTranslation('name')  }}"
                                                    >
                                                </span>
                                                <span class="fs-14 opacity-60">{{ $product->getTranslation('name') }}</span>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @if (\App\BusinessSetting::where('type', 'pickup_point')->first()->value == 1)
                                        <div class="row border-top pt-3">
                                            <div class="col-md-6">
                                                <h6 class="fs-15 fw-600">{{ translate('Choose Delivery Type') }}</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row gutters-5">
                                                    <div class="col-6">
                                                        <label class="aiz-megabox d-block bg-white mb-0">
                                                            <input
                                                                type="radio"
                                                                name="shipping_type_{{ $key }}"
                                                                value="home_delivery"
                                                                onchange="show_pickup_point(this)"
                                                                data-target=".pickup_point_id_{{ $key }}"
                                                                checked
                                                            >
                                                            <span class="d-flex p-3 aiz-megabox-elem">
                                                                <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                                <span class="flex-grow-1 pl-3 fw-600">{{  translate('Home Delivery') }}</span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    @if (is_array(json_decode(\App\Shop::where('user_id', $key)->first()->pick_up_point_id)))
                                                    <div class="col-6">
                                                        <label class="aiz-megabox d-block bg-white mb-0">
                                                            <input
                                                                type="radio"
                                                                name="shipping_type_{{ $key }}"
                                                                value="pickup_point"
                                                                onchange="show_pickup_point(this)"
                                                                data-target=".pickup_point_id_{{ $key }}"
                                                            >
                                                            <span class="d-flex p-3 aiz-megabox-elem">
                                                                <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                                <span class="flex-grow-1 pl-3 fw-600">{{  translate('Local Pickup') }}</span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    @endif
                                                </div>
                                                @if (\App\BusinessSetting::where('type', 'pickup_point')->first()->value == 1)
                                                    @if (is_array(json_decode(\App\Shop::where('user_id', $key)->first()->pick_up_point_id)))
                                                    <div class="mt-4 pickup_point_id_{{ $key }} d-none">
                                                        <select
                                                            class="form-control aiz-selectpicker"
                                                            name="pickup_point_id_{{ $key }}"
                                                            data-live-search="true"
                                                        >
                                                                <option>{{ translate('Select your nearest pickup point')}}</option>
                                                            @foreach (json_decode(\App\Shop::where('user_id', $key)->first()->pick_up_point_id) as $pick_up_point)
                                                                @if (\App\PickupPoint::find($pick_up_point) != null)
                                                                <option
                                                                    value="{{ \App\PickupPoint::find($pick_up_point)->id }}"
                                                                    data-content="<span class='d-block'>
                                                                                    <span class='d-block fs-16 fw-600 mb-2'>{{ \App\PickupPoint::find($pick_up_point)->getTranslation('name') }}</span>
                                                                                    <span class='d-block opacity-50 fs-12'><i class='las la-map-marker'></i> {{ \App\PickupPoint::find($pick_up_point)->getTranslation('address') }}</span>
                                                                                    <span class='d-block opacity-50 fs-12'><i class='las la-phone'></i> {{ \App\PickupPoint::find($pick_up_point)->phone }}</span>
                                                                                </span>"
                                                                >
                                                                </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    @endif

                                    <div class="card-header p-3">
                                        <h3 class="fs-16 fw-600 mb-0">
                                            {{ translate('Select a payment option')}}
                                        </h3>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-xxl-8 col-xl-10 mx-auto">
                                            <div class="row gutters-10">
                                                @if(\App\BusinessSetting::where('type', 'paypal_payment')->first()->value == 1)
                                                    <div class="col-6 col-md-4">
                                                        <label class="aiz-megabox d-block mb-3">
                                                            <input value="paypal" class="online_payment" type="radio" name="payment_option" checked>
                                                            <span class="d-block p-3 aiz-megabox-elem">
                                                                <img src="{{ static_asset('assets/img/cards/paypal.png')}}" class="img-fluid mb-2">
                                                                <span class="d-block text-center">
                                                                    <span class="d-block fw-600 fs-15">{{ translate('Paypal')}}</span>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\BusinessSetting::where('type', 'stripe_payment')->first()->value == 1)
                                                    <div class="col-6 col-md-4">
                                                        <label class="aiz-megabox d-block mb-3">
                                                            <input value="stripe" class="online_payment" type="radio" name="payment_option" checked>
                                                            <span class="d-block p-3 aiz-megabox-elem">
                                                                <img src="{{ static_asset('assets/img/cards/stripe.png')}}" class="img-fluid mb-2">
                                                                <span class="d-block text-center">
                                                                    <span class="d-block fw-600 fs-15">{{ translate('Stripe')}}</span>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\BusinessSetting::where('type', 'sslcommerz_payment')->first()->value == 1)
                                                    <div class="col-6 col-md-4">
                                                        <label class="aiz-megabox d-block mb-3">
                                                            <input value="sslcommerz" class="online_payment" type="radio" name="payment_option" checked>
                                                            <span class="d-block p-3 aiz-megabox-elem">
                                                                <img src="{{ static_asset('assets/img/cards/sslcommerz.png')}}" class="img-fluid mb-2">
                                                                <span class="d-block text-center">
                                                                    <span class="d-block fw-600 fs-15">{{ translate('sslcommerz')}}</span>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\BusinessSetting::where('type', 'instamojo_payment')->first()->value == 1)
                                                    <div class="col-6 col-md-4">
                                                        <label class="aiz-megabox d-block mb-3">
                                                            <input value="instamojo" class="online_payment" type="radio" name="payment_option" checked>
                                                            <span class="d-block p-3 aiz-megabox-elem">
                                                                <img src="{{ static_asset('assets/img/cards/instamojo.png')}}" class="img-fluid mb-2">
                                                                <span class="d-block text-center">
                                                                    <span class="d-block fw-600 fs-15">{{ translate('Instamojo')}}</span>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\BusinessSetting::where('type', 'razorpay')->first()->value == 1)
                                                    <div class="col-6 col-md-4">
                                                        <label class="aiz-megabox d-block mb-3">
                                                            <input value="razorpay" class="online_payment" type="radio" name="payment_option" checked>
                                                            <span class="d-block p-3 aiz-megabox-elem">
                                                                <img src="{{ static_asset('assets/img/cards/rozarpay.png')}}" class="img-fluid mb-2">
                                                                <span class="d-block text-center">
                                                                    <span class="d-block fw-600 fs-15">{{ translate('Razorpay')}}</span>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\BusinessSetting::where('type', 'paystack')->first()->value == 1)
                                                    <div class="col-6 col-md-4">
                                                        <label class="aiz-megabox d-block mb-3">
                                                            <input value="paystack" class="online_payment" type="radio" name="payment_option" checked>
                                                            <span class="d-block p-3 aiz-megabox-elem">
                                                                <img src="{{ static_asset('assets/img/cards/paystack.png')}}" class="img-fluid mb-2">
                                                                <span class="d-block text-center">
                                                                    <span class="d-block fw-600 fs-15">{{ translate('Paystack')}}</span>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\BusinessSetting::where('type', 'voguepay')->first()->value == 1)
                                                    <div class="col-6 col-md-4">
                                                        <label class="aiz-megabox d-block mb-3">
                                                            <input value="voguepay" class="online_payment" type="radio" name="payment_option" checked>
                                                            <span class="d-block p-3 aiz-megabox-elem">
                                                                <img src="{{ static_asset('assets/img/cards/vogue.png')}}" class="img-fluid mb-2">
                                                                <span class="d-block text-center">
                                                                    <span class="d-block fw-600 fs-15">{{ translate('VoguePay')}}</span>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\BusinessSetting::where('type', 'payhere')->first()->value == 1)
                                                    <div class="col-6 col-md-4">
                                                        <label class="aiz-megabox d-block mb-3">
                                                            <input value="payhere" class="online_payment" type="radio" name="payment_option" checked>
                                                            <span class="d-block p-3 aiz-megabox-elem">
                                                                <img src="{{ static_asset('assets/img/cards/payhere.png')}}" class="img-fluid mb-2">
                                                                <span class="d-block text-center">
                                                                    <span class="d-block fw-600 fs-15">{{ translate('payhere')}}</span>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\BusinessSetting::where('type', 'ngenius')->first()->value == 1)
                                                    <div class="col-6 col-md-4">
                                                        <label class="aiz-megabox d-block mb-3">
                                                            <input value="ngenius" class="online_payment" type="radio" name="payment_option" checked>
                                                            <span class="d-block p-3 aiz-megabox-elem">
                                                                <img src="{{ static_asset('assets/img/cards/ngenius.png')}}" class="img-fluid mb-2">
                                                                <span class="d-block text-center">
                                                                    <span class="d-block fw-600 fs-15">{{ translate('ngenius')}}</span>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\Addon::where('unique_identifier', 'african_pg')->first() != null && \App\Addon::where('unique_identifier', 'african_pg')->first()->activated)
                                                    @if(\App\BusinessSetting::where('type', 'mpesa')->first()->value == 1)
                                                        <div class="col-6 col-md-4">
                                                            <label class="aiz-megabox d-block mb-3">
                                                                <input value="mpesa" class="online_payment" type="radio" name="payment_option" checked>
                                                                <span class="d-block p-3 aiz-megabox-elem">
                                                                    <img src="{{ static_asset('assets/img/cards/mpesa.png')}}" class="img-fluid mb-2">
                                                                    <span class="d-block text-center">
                                                                        <span class="d-block fw-600 fs-15">{{ translate('mpesa')}}</span>
                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    @endif
                                                    @if(\App\BusinessSetting::where('type', 'flutterwave')->first()->value == 1)
                                                        <div class="col-6 col-md-4">
                                                            <label class="aiz-megabox d-block mb-3">
                                                                <input value="flutterwave" class="online_payment" type="radio" name="payment_option" checked>
                                                                <span class="d-block p-3 aiz-megabox-elem">
                                                                    <img src="{{ static_asset('assets/img/cards/flutterwave.png')}}" class="img-fluid mb-2">
                                                                    <span class="d-block text-center">
                                                                        <span class="d-block fw-600 fs-15">{{ translate('flutterwave')}}</span>
                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    @endif
                                                @endif
                                                @if(\App\Addon::where('unique_identifier', 'paytm')->first() != null && \App\Addon::where('unique_identifier', 'paytm')->first()->activated)
                                                    <div class="col-6 col-md-4">
                                                        <label class="aiz-megabox d-block mb-3">
                                                            <input value="paytm" class="online_payment" type="radio" name="payment_option" checked>
                                                            <span class="d-block p-3 aiz-megabox-elem">
                                                                <img src="{{ static_asset('assets/img/cards/paytm.jpg')}}" class="img-fluid mb-2">
                                                                <span class="d-block text-center">
                                                                    <span class="d-block fw-600 fs-15">{{ translate('Paytm')}}</span>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\BusinessSetting::where('type', 'cash_payment')->first()->value == 1)
                                                    @php
                                                        $digital = 0;
                                                        foreach(Session::get('cart') as $cartItem){
                                                            if($cartItem['digital'] == 1){
                                                                $digital = 1;
                                                            }
                                                        }
                                                    @endphp
                                                    @if($digital != 1)
                                                        <div class="col-6 col-md-4">
                                                            <label class="aiz-megabox d-block mb-3">
                                                                <input value="cash_on_delivery" class="online_payment" type="radio" name="payment_option" checked>
                                                                <span class="d-block p-3 aiz-megabox-elem">
                                                                    <img src="{{ static_asset('assets/img/cards/cod.png')}}" class="img-fluid mb-2">
                                                                    <span class="d-block text-center">
                                                                        <span class="d-block fw-600 fs-15">{{ translate('Cash on Delivery')}}</span>
                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    @endif
                                                @endif
                                                @if (Auth::check())
                                                    @if (\App\Addon::where('unique_identifier', 'offline_payment')->first() != null && \App\Addon::where('unique_identifier', 'offline_payment')->first()->activated)
                                                        @foreach(\App\ManualPaymentMethod::all() as $method)
                                                            <div class="col-6 col-md-4">
                                                                <label class="aiz-megabox d-block mb-3">
                                                                    <input value="{{ $method->heading }}" type="radio" name="payment_option" onchange="toggleManualPaymentData({{ $method->id }})" data-id="{{ $method->id }}" checked>
                                                                    <span class="d-block p-3 aiz-megabox-elem">
                                                                        <img src="{{ uploaded_asset($method->photo) }}" class="img-fluid mb-2">
                                                                        <span class="d-block text-center">
                                                                            <span class="d-block fw-600 fs-15">{{ $method->heading }}</span>
                                                                        </span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        @endforeach

                                                        @foreach(\App\ManualPaymentMethod::all() as $method)
                                                            <div id="manual_payment_info_{{ $method->id }}" class="d-none">
                                                                @php echo $method->description @endphp
                                                                @if ($method->bank_info != null)
                                                                    <ul>
                                                                        @foreach (json_decode($method->bank_info) as $key => $info)
                                                                            <li>{{ translate('Bank Name') }} - {{ $info->bank_name }}, {{ translate('Account Name') }} - {{ $info->account_name }}, {{ translate('Account Number') }} - {{ $info->account_number}}, {{ translate('Routing Number') }} - {{ $info->routing_number }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer justify-content-end">
                                    <button type="submit" name="owner_id" value="{{ $key }}" class="btn fw-600 btn-primary">{{ translate('Continue To Order Submition')}}</a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </form>
                <div class="pt-4">
                    <a href="{{ route('home') }}" >
                        <i class="la la-angle-left"></i>
                        {{ translate('Return to shop')}}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
    <script type="text/javascript">
        function display_option(key){

        }
        function show_pickup_point(el) {
        	var value = $(el).val();
        	var target = $(el).data('target');

            // console.log(value);

        	if(value == 'home_delivery'){
                if(!$(target).hasClass('d-none')){
                    $(target).addClass('d-none');
                }
        	}else{
        		$(target).removeClass('d-none');
        	}
        }

        function submitOrder(el,tpe){
            $(el).prop('disabled', true);
            if($('.agree_checkbox').is(":checked")){
                $("#"+tpe+"-products-form").submit();
            }else{
                AIZ.plugins.notify('danger','{{ translate('You need to agree with our policies') }}');
                $(el).prop('disabled', false);
            }
        }

    </script>
@endsection

@extends('frontend.layouts.app')

@section('content')

    <div id="page-content">
        <section class="slice-xs sct-color-2 border-bottom">
            <div class="container container-sm">
                <div class="row cols-delimited justify-content-center">
                    <div class="col">
                        <div class="icon-block icon-block--style-1-v5 text-center ">
                            <div class="block-icon c-gray-light mb-0">
                                <i class="la la-shopping-cart"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">{{ translate('1. My Cart')}}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="icon-block icon-block--style-1-v5 text-center ">
                            <div class="block-icon mb-0 c-gray-light">
                                <i class="la la-map-o"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">{{ translate('2. Shipping info')}}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="icon-block icon-block--style-1-v5 text-center active">
                            <div class="block-icon mb-0">
                                <i class="la la-truck"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">{{ translate('3. Delivery info')}}</h3>
                            </div>
                        </div>
                    </div>

                   <!--  <div class="col">
                        <div class="icon-block icon-block--style-1-v5 text-center">
                            <div class="block-icon c-gray-light mb-0">
                                <i class="la la-credit-card"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">{{ translate('4. Payment')}}</h3>
                            </div>
                        </div>
                    </div> -->

                    <div class="col">
                        <div class="icon-block icon-block--style-1-v5 text-center">
                            <div class="block-icon c-gray-light mb-0">
                                <i class="la la-check-circle"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">4. {{ translate('Confirmation')}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-4 gry-bg">
            <div class="container">
                <div class="row cols-xs-space cols-sm-space cols-md-space">
                    <div class="col-xl-8">
                        <form class="form-default" data-toggle="validator" action="{{ route('checkout.store_delivery_info') }}" role="form" method="POST" id="delivery_info_form">
                            @csrf
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
                            <div class="card mb-3">
                                <div class="card-header bg-white py-3">
                                    <h5 class="heading-6 mb-0">{{ \App\GeneralSetting::first()->site_name }} Products</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="table-cart">
                                                <tbody>
                                                    @foreach ($admin_products as $key => $id)
                                                    <tr class="cart-item">
                                                        <td class="product-image" width="25%">
                                                            <a href="{{ route('product', \App\Product::find($id)->slug) }}" target="_blank">
                                                                <img loading="lazy"  src="{{ my_asset(\App\Product::find($id)->thumbnail_img) }}">
                                                            </a>
                                                        </td>
                                                        <td class="product-name strong-600">
                                                            <a href="{{ route('product', \App\Product::find($id)->slug) }}" target="_blank" class="d-block c-base-2">
                                                                {{ \App\Product::find($id)->name }}
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label class="d-flex align-items-center p-3 border rounded gry-bg c-pointer">
                                                        <input type="radio" name="shipping_type_admin" value="home_delivery" checked class="d-none" onchange="show_pickup_point(this)" data-target=".pickup_point_id_admin">
                                                        <span class="radio-box"></span>
                                                        <span class="d-block ml-2 strong-600">
                                                            {{  translate('Home Delivery') }}
                                                        </span>
                                                    </label>
                                                </div>
                                                @if (\App\BusinessSetting::where('type', 'pickup_point')->first()->value == 1)
                                                    <div class="col-6">
                                                        <label class="d-flex align-items-center p-3 border rounded gry-bg c-pointer">
                                                            <input type="radio" name="shipping_type_admin" value="pickup_point" class="d-none" onchange="show_pickup_point(this)" data-target=".pickup_point_id_admin">
                                                            <span class="radio-box"></span>
                                                            <span class="d-block ml-2 strong-600">
                                                                {{  translate('Local Pickup') }}
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                            </div>

                                            @if (\App\BusinessSetting::where('type', 'pickup_point')->first()->value == 1)
                                                <div class="mt-3 pickup_point_id_admin d-none">
                                                    <select class="pickup-select form-control-lg w-100" name="pickup_point_id_admin" data-placeholder="{{ translate('Select a pickup point') }}">
                                                            <option>{{ translate('Select your nearest pickup point')}}</option>
                                                        @foreach (\App\PickupPoint::where('pick_up_status',1)->get() as $key => $pick_up_point)
                                                            <option value="{{ $pick_up_point->id }}" data-address="{{ $pick_up_point->address }}" data-phone="{{ $pick_up_point->phone }}">
                                                                {{ $pick_up_point->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if (!empty($seller_products))
                                @foreach ($seller_products as $key => $seller_product)
                                    <div class="card mb-3">
                                        <div class="card-header bg-white py-3">
                                            <h5 class="heading-6 mb-0">{{ \App\Shop::where('user_id', $key)->first()->name }} Products</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row no-gutters">
                                                <div class="col-md-6">
                                                    <table class="table-cart">
                                                        <tbody>
                                                            @foreach ($seller_product as $id)
                                                            <tr class="cart-item">
                                                                <td class="product-image" width="25%">
                                                                    <a href="{{ route('product', \App\Product::find($id)->slug) }}" target="_blank">
                                                                        <img loading="lazy"  src="{{ my_asset(\App\Product::find($id)->thumbnail_img) }}">
                                                                    </a>
                                                                </td>
                                                                <td class="product-name strong-600">
                                                                    <a href="{{ route('product', \App\Product::find($id)->slug) }}" target="_blank" class="d-block c-base-2">
                                                                        {{ \App\Product::find($id)->name }}
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label class="d-flex align-items-center p-3 border rounded gry-bg c-pointer">
                                                                <input type="radio" name="shipping_type_{{ $key }}" value="home_delivery" checked class="d-none" onchange="show_pickup_point(this)" data-target=".pickup_point_id_{{ $key }}">
                                                                <span class="radio-box"></span>
                                                                <span class="d-block ml-2 strong-600">
                                                                    {{  translate('Home Delivery') }}
                                                                </span>
                                                            </label>
                                                        </div>
                                                        @if (\App\BusinessSetting::where('type', 'pickup_point')->first()->value == 1)
                                                            @if (is_array(json_decode(\App\Shop::where('user_id', $key)->first()->pick_up_point_id)))
                                                                <div class="col-6">
                                                                    <label class="d-flex align-items-center p-3 border rounded gry-bg c-pointer">
                                                                        <input type="radio" name="shipping_type_{{ $key }}" value="pickup_point" class="d-none" onchange="show_pickup_point(this)" data-target=".pickup_point_id_{{ $key }}">
                                                                        <span class="radio-box"></span>
                                                                        <span class="d-block ml-2 strong-600">
                                                                            {{  translate('Local Pickup') }}
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            @endif
                                                        @endif
                                                    </div>

                                                    @if (\App\BusinessSetting::where('type', 'pickup_point')->first()->value == 1)
                                                        @if (is_array(json_decode(\App\Shop::where('user_id', $key)->first()->pick_up_point_id)))
                                                            <div class="mt-3 pickup_point_id_{{ $key }} d-none">
                                                                <select class="pickup-select form-control-lg w-100" name="pickup_point_id_{{ $key }}" data-placeholder="{{ translate('Select a pickup point') }}">
                                                                    <option>{{ translate('Select your nearest pickup point')}}</option>
                                                                    @foreach (json_decode(\App\Shop::where('user_id', $key)->first()->pick_up_point_id) as $pick_up_point)
                                                                        @if (\App\PickupPoint::find($pick_up_point) != null)
                                                                            <option value="{{ \App\PickupPoint::find($pick_up_point)->id }}" data-address="{{ \App\PickupPoint::find($pick_up_point)->address }}" data-phone="{{ \App\PickupPoint::find($pick_up_point)->phone }}">
                                                                                {{ \App\PickupPoint::find($pick_up_point)->name }}
                                                                            </option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <section class="py-3 gry-bg">
                                <div class="container">
                                    <div class="row cols-xs-space cols-sm-space cols-md-space">
                                        <div class="col-lg-8">
                                            
                                            <div class="card">
                                                <div class="card-title px-4 py-3">
                                                    <h3 class="heading heading-5 strong-500">
                                                        {{ translate('Select a payment option')}}
                                                    </h3>
                                                </div>
                                                <div class="card-body text-center">
                                                    <div class="row">
                                                        <div class="col-md-6 mx-auto">
                                                            <div class="row">
                                                                @if(\App\BusinessSetting::where('type', 'paypal_payment')->first()->value == 1)
                                                                    <div class="col-6">
                                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="Paypal">
                                                                            <input type="radio" id="" name="payment_option" value="paypal" class="online_payment" checked>
                                                                            <span>
                                                                                <img loading="lazy"  src="{{ static_asset('frontend/images/icons/cards/paypal.png')}}" class="img-fluid">
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                                @if(\App\BusinessSetting::where('type', 'stripe_payment')->first()->value == 1)
                                                                    <div class="col-6">
                                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="Stripe">
                                                                            <input type="radio" id="" name="payment_option" value="stripe" class="online_payment" checked>
                                                                            <span>
                                                                                <img loading="lazy"  src="{{ static_asset('frontend/images/icons/cards/stripe.png')}}" class="img-fluid">
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                                @if(\App\BusinessSetting::where('type', 'sslcommerz_payment')->first()->value == 1)
                                                                    <div class="col-6">
                                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="sslcommerz">
                                                                            <input type="radio" id="" name="payment_option" value="sslcommerz" class="online_payment" checked>
                                                                            <span>
                                                                                <img loading="lazy"  src="{{ static_asset('frontend/images/icons/cards/sslcommerz.png')}}" class="img-fluid">
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                                @if(\App\BusinessSetting::where('type', 'instamojo_payment')->first()->value == 1)
                                                                    <div class="col-6">
                                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="Instamojo">
                                                                            <input type="radio" id="" name="payment_option" value="instamojo" class="online_payment" checked>
                                                                            <span>
                                                                                <img loading="lazy"  src="{{ static_asset('frontend/images/icons/cards/instamojo.png')}}" class="img-fluid">
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                                @if(\App\BusinessSetting::where('type', 'razorpay')->first()->value == 1)
                                                                    <div class="col-6">
                                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="Razorpay">
                                                                            <input type="radio" id="" name="payment_option" value="razorpay" class="online_payment" checked>
                                                                            <span>
                                                                                <img loading="lazy"  src="{{ static_asset('frontend/images/icons/cards/rozarpay.png')}}" class="img-fluid">
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                                @if(\App\BusinessSetting::where('type', 'paystack')->first()->value == 1)
                                                                    <div class="col-6">
                                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="Paystack">
                                                                            <input type="radio" id="" name="payment_option" value="paystack" class="online_payment" checked>
                                                                            <span>
                                                                                <img loading="lazy"  src="{{ static_asset('frontend/images/icons/cards/paystack.png')}}" class="img-fluid">
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                                @if(\App\BusinessSetting::where('type', 'voguepay')->first()->value == 1)
                                                                    <div class="col-6">
                                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="VoguePay">
                                                                            <input type="radio" id="" name="payment_option" value="voguepay" class="online_payment" checked>
                                                                            <span>
                                                                                <img loading="lazy"  src="{{ static_asset('frontend/images/icons/cards/vogue.png')}}" class="img-fluid">
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                                @if(\App\BusinessSetting::where('type', 'payhere')->first()->value == 1)
                                                                    <div class="col-6">
                                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="payhere">
                                                                            <input type="radio" id="" name="payment_option" value="payhere" class="online_payment" checked>
                                                                            <span>
                                                                               <img loading="lazy"  src="{{ static_asset('frontend/images/icons/cards/payhere.png')}}" class="img-fluid">
                                                                           </span>
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                                @if(\App\BusinessSetting::where('type', 'ngenius')->first()->value == 1)
                                                                    <div class="col-6">
                                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="ngenius">
                                                                            <input type="radio" id="" name="payment_option" value="ngenius" class="online_payment" checked>
                                                                            <span>
                                                                           <img loading="lazy"  src="{{ static_asset('frontend/images/icons/cards/ngenius.png')}}" class="img-fluid">
                                                                       </span>
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                                @if(\App\Addon::where('unique_identifier', 'african_pg')->first() != null && \App\Addon::where('unique_identifier', 'african_pg')->first()->activated)
                                                                    @if(\App\BusinessSetting::where('type', 'mpesa')->first()->value == 1)
                                                                        <div class="col-6">
                                                                            <label class="payment_option mb-4" data-toggle="tooltip" data-title="mpesa">
                                                                                <input type="radio" id="" name="payment_option" value="mpesa" class="online_payment" checked>
                                                                                <span>
                                                                            <img loading="lazy"  src="{{ static_asset('frontend/images/icons/cards/mpesa.png')}}" class="img-fluid">
                                                                        </span>
                                                                            </label>
                                                                        </div>
                                                                    @endif
                                                                    @if(\App\BusinessSetting::where('type', 'flutterwave')->first()->value == 1)
                                                                        <div class="col-6">
                                                                            <label class="payment_option mb-4" data-toggle="tooltip" data-title="flutterwave">
                                                                                <input type="radio" id="" name="payment_option" value="flutterwave" class="online_payment" checked>
                                                                                <span>
                                                                            <img loading="lazy"  src="{{ static_asset('frontend/images/icons/cards/flutterwave.png')}}" class="img-fluid">
                                                                        </span>
                                                                            </label>
                                                                        </div>
                                                                    @endif
                                                                @endif
                                                                @if(\App\Addon::where('unique_identifier', 'paytm')->first() != null && \App\Addon::where('unique_identifier', 'paytm')->first()->activated)
                                                                    <div class="col-6">
                                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="Paytm">
                                                                            <input type="radio" id="" name="payment_option" value="paytm" class="online_payment" checked>
                                                                            <span>
                                                                                <img loading="lazy" src="{{ static_asset('frontend/images/icons/cards/paytm.jpg')}}" class="img-fluid">
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
                                                                        <div class="col-6">
                                                                            <label class="payment_option mb-4" data-toggle="tooltip" data-title="Cash on Delivery">
                                                                                <input type="radio" id="" name="payment_option" value="cash_on_delivery" class="online_payment" checked>
                                                                                <span>
                                                                                    <img loading="lazy"  src="{{ static_asset('frontend/images/icons/cards/cod.png')}}" class="img-fluid">
                                                                                </span>
                                                                            </label>
                                                                        </div>
                                                                    @endif
                                                                @endif
                                                                @if (Auth::check())
                                                                    @if (\App\Addon::where('unique_identifier', 'offline_payment')->first() != null && \App\Addon::where('unique_identifier', 'offline_payment')->first()->activated)
                                                                        @foreach(\App\ManualPaymentMethod::all() as $method)
                                                                            <div class="col-6">
                                                                                <label class="payment_option mb-4" data-toggle="tooltip" data-title="{{ $method->heading }}">
                                                                                    <input type="radio" id="" name="payment_option" value="{{ $method->heading }}" onchange="toggleManualPaymentData({{ $method->id }})">
                                                                                    <span>
                                                                                      <img loading="lazy"  src="{{ static_asset($method->photo)}}" class="img-fluid">
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
                                                                                            <li>Bank Name - {{ $info->bank_name }}, Account Name - {{ $info->account_name }}, Account Number - {{ $info->account_number}}, Routing Number - {{ $info->routing_number }}</li>
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

                                                    <div class="card mb-3 bg-gray text-left p-3 d-none">
                                                        <div id="manual_payment_description">

                                                        </div>
                                                    </div>
                                                    @if (Auth::check() && \App\BusinessSetting::where('type', 'wallet_system')->first()->value == 1)
                                                        <div class="or or--1 mt-2">
                                                            <span>or</span>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xxl-6 col-lg-8 col-md-10 mx-auto">
                                                                <div class="text-center bg-gray py-4">
                                                                    <i class="fa"></i>
                                                                    <div class="h5 mb-4">{{ translate('Your wallet balance :')}} <strong>{{ single_price(Auth::user()->balance) }}</strong></div>
                                                                    @if(Auth::user()->balance < $total)
                                                                        <button type="button" class="btn btn-base-2" disabled>{{ translate('Insufficient balance')}}</button>
                                                                    @else
                                                                        <button  type="button" onclick="use_wallet()" class="btn btn-base-1">{{ translate('Pay with wallet')}}</button>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="pt-3">
                                                <input id="agree_checkbox" type="checkbox" checked required>
                                                <label for="agree_checkbox">{{ translate('I agree to the')}}</label>
                                                <a href="{{ route('terms') }}">{{ translate('terms and conditions')}}</a>,
                                                <a href="{{ route('returnpolicy') }}">{{ translate('return policy')}}</a> &
                                                <a href="{{ route('privacypolicy') }}">{{ translate('privacy policy')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>


                            <div class="row align-items-center pt-4">
                                <div class="col-md-6">
                                    <a href="{{ route('home') }}" class="link link--style-3">
                                        <i class="ion-android-arrow-back"></i>
                                        {{ translate('Return to shop')}}
                                    </a>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="button" onclick="submitOrder(this)" class="btn btn-styled btn-base-1">{{ translate('Complete Order')}}</a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-4 ml-lg-auto">
                        @include('frontend.partials.cart_summary')
                    </div>
                </div>
            </div>
        </section>


        
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        function display_option(key){

        }

        function submitOrder(el){
            $(el).prop('disabled', true);
            if($('#agree_checkbox').is(":checked"))
            {
                $('#delivery_info_form').submit();
            }else{
                showFrontendAlert('error','{{ translate('You need to agree with our policies') }}');
                $(el).prop('disabled', false);
            }
        }

        function show_pickup_point(el) {
        	var value = $(el).val();
        	var target = $(el).data('target');

            console.log(value);

        	if(value == 'home_delivery'){
                if(!$(target).hasClass('d-none')){
                    $(target).addClass('d-none');
                }
        	}else{
        		$(target).removeClass('d-none');
        	}
        }

    </script>
@endsection

@extends('layouts.app')

@section('content')
@php
    $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
@endphp
<!-- Basic Data Tables -->
<!--===================================================-->

<div class="row">
    <div class="col-lg-12 pull-right" style="margin-bottom: 10px;">
        <button type="button" class="btn btn-rounded btn-info pull-right exportOrdersData">Export Selected Orders</button>
    </div>
</div>

<div class="panel">
    <div class="panel-heading bord-btm clearfix pad-all h-100">
        <h3 class="panel-title pull-left pad-no">{{translate('Orders')}}</h3>
        <div class="pull-right clearfix">
            <form class="" id="sort_orders" action="" method="GET">
                <div class="box-inline pad-rgt pull-left">
                    <div class="select" style="min-width: 300px;">
                        <select class="form-control demo-select2" name="payment_type" id="payment_type" onchange="sort_orders()">
                            <option value="">{{translate('Filter by Payment Status')}}</option>
                            <option value="paid"  @isset($payment_status) @if($payment_status == 'paid') selected @endif @endisset>{{translate('Paid')}}</option>
                            <option value="unpaid"  @isset($payment_status) @if($payment_status == 'unpaid') selected @endif @endisset>{{translate('Un-Paid')}}</option>
                        </select>
                    </div>
                </div>
                <div class="box-inline pad-rgt pull-left">
                    <div class="select" style="min-width: 300px;">
                        <select class="form-control demo-select2" name="delivery_status" id="delivery_status" onchange="sort_orders()">
                            <option value="">{{translate('Filter by Deliver Status')}}</option>
                            <option value="pending"   @isset($delivery_status) @if($delivery_status == 'pending') selected @endif @endisset>{{translate('Pending')}}</option>
                            <option value="on_review"   @isset($delivery_status) @if($delivery_status == 'on_review') selected @endif @endisset>{{translate('On review')}}</option>
                            <option value="on_delivery"   @isset($delivery_status) @if($delivery_status == 'on_delivery') selected @endif @endisset>{{translate('On delivery')}}</option>
                            <option value="delivered"   @isset($delivery_status) @if($delivery_status == 'delivered') selected @endif @endisset>{{translate('Delivered')}}</option>
                        </select>
                    </div>
                </div>
                <div class="box-inline pad-rgt pull-left">
                    <div class="" style="min-width: 200px;">
                        <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type Order code & hit Enter') }}">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="panel-body">
        <form method="post" action="{{ route('export.orders.admin') }}" id="selectedOrdersData">
            @csrf
            <table class="table table-striped res-table mar-no" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>#</th>
                        <th>{{translate('Order Code')}}</th>
                        <th>{{translate('Num. of Products')}}</th>
                        <th>{{translate('Customer')}}</th>
                        <th>{{translate('Amount')}}</th>
                        <th>{{translate('Delivery Status')}}</th>
                        <th>{{translate('Payment Method')}}</th>
                        <th>{{translate('Payment Status')}}</th>
                        @if ($refund_request_addon != null && $refund_request_addon->activated == 1)
                            <th>{{translate('Refund')}}</th>
                        @endif
                        <th width="10%">{{translate('Options')}}</th>
                    </tr>
                </thead>
                <tbody>
                   
                    @foreach ($orders as $key => $order_id)
                        @php
                            $order = \App\Order::find($order_id->id);
                        @endphp
                        @if($order != null)
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox" data-id="{{ $order->id }}">
                                        <input type="checkbox" class="custom-control-input selectOrders" id="customCheck{{ $order->id }}" name="checkboxes[]" value="{{ $order->id }}">
                                        <label class="custom-control-label" for="customCheck{{ $order->id }}"></label>
                                    </div>

                                </td>
                                <td>
                                    {{ ($key+1) + ($orders->currentPage() - 1)*$orders->perPage() }}
                                </td>
                                <td>
                                    {{ $order->code }} @if($order->viewed == 0) <span class="pull-right badge badge-info">{{ translate('New') }}</span> @endif
                                </td>
                                <td>
                                    {{ count($order->orderDetails->where('seller_id', $admin_user_id)) }}
                                </td>
                                <td>
                                    @if ($order->user != null)
                                        {{ $order->user->name }}
                                    @else
                                        Guest ({{ $order->guest_id }})
                                    @endif
                                </td>
                                <td>
                                    {{ single_price($order->orderDetails->where('seller_id', $admin_user_id)->sum('price') + $order->orderDetails->where('seller_id', $admin_user_id)->sum('tax')) }}
                                </td>
                                <td>
                                    @php
                                        $status = $order->orderDetails->first()->delivery_status;
                                    @endphp

                                    @if ($status=='pending')
                                        @php $sbcolor="red"; $scolor="#fff"; $stxt ="Pending" @endphp
                                    @elseif ($status=='delivered')
                                        @php $sbcolor="green"; $scolor="#fff"; $stxt ="Delivered" @endphp
                                    @elseif ($status=='on_delivery')
                                        @php $sbcolor="grey"; $scolor="#fff"; $stxt ="On Delivery" @endphp
                                    @else
                                        @php $sbcolor="yellow";$scolor="black"; $stxt ="On Review" @endphp
                                    @endif
                                    <!-- {{ ucfirst(str_replace('_', ' ', $status)) }} -->
                                     <span class="badge badge--2 mr-4" style="background-color: {{ $sbcolor }} !important; color: {{ $scolor }} !important;">
                                         {{ $stxt }}
                                     </span> 
                                </td>
                                <td>
                                    {{ ucfirst(str_replace('_', ' ', $order->payment_type)) }}
                                </td>
                                <td>
                                    @if ($order->orderDetails->where('seller_id',  $admin_user_id)->first()->payment_status == 'paid')
                                        @php $color="green"; $txt ="Paid" @endphp
                                    @else
                                        @php $color="red"; $txt ="Unpaid" @endphp
                                    @endif

                                    <span class="badge badge--2 mr-4" style="background-color: {{ $color }} !important;">
                                        {{ $txt }}
                                       {{-- @if ($order->orderDetails->where('seller_id',  $admin_user_id)->first()->payment_status == 'paid')
                                            <i class="bg-green"></i> {{ translate('Paid') }}
                                        @else
                                            <i class="bg-red"></i> {{ translate('Unpaid') }}
                                        @endif --}}
                                    </span>
                                </td>
                                @if ($refund_request_addon != null && $refund_request_addon->activated == 1)
                                    <td>
                                        @if (count($order->refund_requests) > 0)
                                            {{ count($order->refund_requests) }} {{ translate('Refund') }}
                                        @else
                                            {{ translate('No Refund') }}
                                        @endif
                                    </td>
                                @endif
                                <td>
                                    <div class="btn-group dropdown">
                                        <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                            {{translate('Actions')}} <i class="dropdown-caret"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="{{ route('orders.show', encrypt($order->id)) }}">{{translate('View')}}</a></li>
                                            <li><a href="{{ route('seller.invoice.download', $order->id) }}">{{translate('Download Invoice')}}</a></li>
                                            <li><a onclick="confirm_modal('{{route('orders.destroy', $order->id)}}');">{{translate('Delete')}}</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach

                </tbody>
            </table>
        </form>
        <div class="clearfix">
            <div class="pull-right">
                {{ $orders->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')
    <script type="text/javascript">
        function sort_orders(el){
            $('#sort_orders').submit();
        }

        $('.exportOrdersData').click(function(){
            
                if($('.selectOrders:checkbox').is(":checked"))
                {
                    $('#selectedOrdersData').submit();
                }
            });
    </script>
@endsection

@extends('backend.layouts.app')

@section('content')
@php
    $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
@endphp
<div class="row align-items-center mb-2">
    <div class="col-md-6">
    </div>
    <div class="col-md-6 text-md-right">
            <button  class="btn btn-circle btn-info exportOrdersData">
                <span>Export Selected Orders</span>
            </button>
    </div>
</div>

<div class="card">
    <div class="card-header row gutters-5">
      <div class="col text-center text-md-left">
        <h5 class="mb-md-0 h6">{{ translate('All Orders') }}</h5>
      </div>
      <div class="col-md-3">
        <div class="input-group input-group-sm">
          <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type Order code & hit Enter') }}">
        </div>
      </div>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('export.orders.admin') }}" id="selectedOrdersData">
            @csrf
            <table class="table aiz-table mb-0">
                <thead>
                    <tr>
                        <th></th>
                        <th>#</th>
                        <th>{{ translate('Order Code') }}</th>
                        <th>{{ translate('Num. of Products') }}</th>
                        <th>{{ translate('Customer') }}</th>
                        <th>{{ translate('Amount') }}</th>
                        <th>{{ translate('Delivery Status') }}</th>
                        <th>{{ translate('Payment Status') }}</th>
                        @if ($refund_request_addon != null && $refund_request_addon->activated == 1)
                            <th>{{ translate('Refund') }}</th>
                        @endif
                        <th class="text-right" width="15%">{{translate('options')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key => $order)
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
                                {{ $order->code }}
                            </td>
                            <td>
                                {{ count($order->orderDetails) }}
                            </td>
                            <td>
                                @if ($order->user != null)
                                    {{ $order->user->name }}
                                @else
                                    Guest ({{ $order->guest_id }})
                                @endif
                            </td>
                            <td>
                                {{ single_price($order->grand_total) }}
                            </td>
                            <td>
                                @php
                                    $status = '';
                                    foreach ($order->orderDetails as $orderDetail) {
                                       $status = $orderDetail->delivery_status;
                                    }
                                @endphp

                                @if ($status=='pending')
                                    @php $bc="badge-danger"; $stxt ="Pending" @endphp
                                @elseif ($status=='delivered')
                                    @php $bc="badge-success"; $stxt ="Delivered" @endphp
                                @elseif ($status=='on_delivery')
                                    @php $bc="badge-secondary";$stxt ="On Delivery" @endphp
                                @elseif ($status=='on_review')
                                    @php $bc="badge-warning";$stxt ="On Review" @endphp
                                @endif

                                <span class="badge badge-inline {{ $bc }}" >{{translate($stxt)}}</span>
                                {{-- $status --}}
                            </td>
                            <td>
                                @if ($order->payment_status == 'paid')
                                    <span class="badge badge-inline badge-success">{{translate('Paid')}}</span>
                                @else
                                    <span class="badge badge-inline badge-danger">{{translate('Unpaid')}}</span>
                                @endif
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
                            <td class="text-right">
                                <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('all_orders.show', encrypt($order->id))}}" title="{{ translate('View') }}">
                                    <i class="las la-eye"></i>
                                </a>
                                <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{ route('customer.invoice.download', $order->id) }}" title="{{ translate('Download Invoice') }}">
                                    <i class="las la-download"></i>
                                </a>
                                <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('orders.destroy', $order->id)}}" title="{{ translate('Delete') }}">
                                    <i class="las la-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
        <div class="aiz-pagination">
            {{ $orders->appends(request()->input())->links() }}
        </div>
    </div>
</div>

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection

@section('script')
    <script type="text/javascript">
        $('.exportOrdersData').click(function(){
            
            if($('.selectOrders:checkbox').is(":checked"))
            {
                $('#selectedOrdersData').submit();
            }
        });
    </script>
@endsection

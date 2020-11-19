@extends('layouts.app')

@section('content')

<div class="col-sm-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{translate('Add Customer Review')}}</h3>
        </div>

        <!--Horizontal Form-->
        <!--===================================================-->
        <form class="form-horizontal" action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data">
        	@csrf
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name">{{translate('Customer')}}</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="user_id" required="">
                            <option disabled="" selected="" hidden="">Select Customer</option>
                            @if($users->count()>0)
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach

                            @endif
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name">{{translate('Rating')}}</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="rating" required="">
                            <option disabled="" selected="" hidden="">Select Rating</option>
                            @for($i=1;$i<=5; $i++)
                                
                                    <option value="{{ $i }}">{{ $i }}</option>
                               

                            @endfor
                        </select>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label class="col-sm-3 control-label" for="products">{{translate('Products')}}</label>
                    <div class="col-sm-9">
                        <select name="product_id" id="products" class="form-control demo-select2"  required data-placeholder="{{ translate('Choose Products') }}">
                            @foreach(\App\Product::all() as $product)
                                <option value="{{$product->id}}">{{__($product->name)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                 <div class="form-group mb-3">
                    <label class="col-sm-3 control-label" for="products">{{translate('Comment')}}</label>
                    <div class="col-sm-9">
                       <textarea class="form-control" name="comment" t placeholder="Please Enter Review"></textarea>
                    </div>
                </div>

                <br>
                <div class="form-group" id="discount_table">

                </div>
            </div>
            <div class="panel-footer text-right">
                <button class="btn btn-purple" type="submit">{{translate('Save')}}</button>
            </div>
        </form>
        <!--===================================================-->
        <!--End Horizontal Form-->

    </div>
</div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#products').on('change', function(){
                var product_ids = $('#products').val();
                if(product_ids.length > 0){
                    $.post('{{ route('flash_deals.product_discount') }}', {_token:'{{ csrf_token() }}', product_ids:product_ids}, function(data){
                        $('#discount_table').html(data);
                        $('.demo-select2').select2();
                    });
                }
                else{
                    $('#discount_table').html(null);
                }
            });
        });
    </script>
@endsection

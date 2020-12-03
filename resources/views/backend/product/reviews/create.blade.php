@extends('backend.layouts.app')

@section('content')

<div class="col-md-10 mx-auto">
    <form class="form form-horizontal mar-top" action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data" id="choice_form">
        @csrf
        <input type="hidden" name="added_by" value="admin">
       
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Add Customer Review')}}</h5>
            </div>
            <div class="card-body">
                <div class="form-group row">
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
                
                <div class="form-group row">
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

                <div class="form-group row mb-3">
                    <label class="col-sm-3 control-label" for="products">{{translate('Products')}}</label>
                    <div class="col-sm-9">
                        <select name="product_id" id="products" class="form-control demo-select2"  required data-placeholder="{{ translate('Choose Products') }}">
                            @foreach(\App\Product::all() as $product)
                                <option value="{{$product->id}}">{{__($product->name)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-sm-3 control-label" for="products">{{translate('Comment')}}</label>
                    <div class="col-sm-9">
                       <textarea class="form-control" name="comment" t placeholder="Please Enter Review"></textarea>
                    </div>
                </div>   
            </div>
        </div>
       
        <div class="mar-all text-right">
            <button type="submit" name="button" class="btn btn-info">{{ translate('Add New Product Review') }}</button>
        </div>
    </form>
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

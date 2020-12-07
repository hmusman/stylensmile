@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="aiz-titlebar text-left mt-2 mb-3" style="margin-left: 17px; margin-right: 17px;">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1 class="h3">{{translate('Product wise stock report')}}</h1>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <a href="{{ route('stock_report_download') }}@if(Request::has('category_id'))?category_id=@php echo Request::get('category_id') @endphp @endif" class="btn btn-circle btn-info">
                            <span>{{translate('Download Stock Report')}}</span>
                        </a>
                    </div>
                </div>
            </div>
            <br>

            <div class="col-md-12 mx-auto">
                <div class="card">
                    <!--card body-->
                    <div class="card-body">
                        <form action="{{ route('stock_report.index') }}" method="GET">
                            <div class="form-group row offset-lg-2">
                                <label class="col-md-3 col-form-label">{{translate('Sort by Category')}} :</label>
                                <div class="col-md-5">
                                    <select id="demo-ease" class="from-control aiz-selectpicker" name="category_id" required>
                                        @foreach (\App\Category::all() as $key => $category)
                                            <option value="{{ $category->id }}">{{ $category->getTranslation('name') }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="cil-md-2">
                                    <button class="btn btn-light" type="submit">{{ translate('Filter') }}</button>
                                </div>
                            </div>
                        </form>
                        <table class="table table-bordered aiz-table mb-0">
                            <thead>
                                <tr>
                                    <th>{{ translate('Product Name') }}</th>
                                    <th>{{ translate('Product Tag') }}</th>
                                    <th>{{ translate('Product Size') }}</th>
                                    <th>{{ translate('Stock') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $pro_name =" "; @endphp
                                @foreach ($products as $key => $product)
                                    @php
                                        $qty = 0;
                                        if ($product->variant_product) {
                                            foreach ($product->stocks as $key => $stock) {
                                                $qty += $stock->qty;
                                            }
                                        }
                                        else {
                                            $qty = $product->current_stock;
                                        }
                                    @endphp
                                    @php $i=0; @endphp
                                    @foreach ($product->stocks as $key => $row)
                                        <tr>
                                            <td> @if($pro_name != $product->name && $i==0) {{ $product->getTranslation('name') }} @endif</td>
                                            <td>@if($pro_name != $product->name && $i==0) {{ $product->getTranslation('tags') }} @endif</td>
                                            <td>{{ $row->variant }}</td>
                                            <td>{{ $row->qty }}</td>
                                        </tr>
                                         @php $i++; @endphp
                                    @endforeach
                                    @php $pro_name =$product->name @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <div class="aiz-pagination mt-4">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>  

    </div>

@endsection

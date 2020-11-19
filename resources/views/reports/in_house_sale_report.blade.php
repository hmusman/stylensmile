@extends('layouts.app')

@section('content')

    <div class="pad-all text-center">
        <form class="" action="{{ route('in_house_sale_report.index') }}" method="GET">
            <div class="box-inline mar-btm pad-rgt">
                 {{ translate('Sort by Category') }}:
                 <div class="select">
                     <select id="demo-ease" class="demo-select2" name="category_id" required>
                         @foreach (\App\Category::all() as $key => $category)
                             <option value="{{ $category->id }}">{{ __($category->name) }}</option>
                         @endforeach
                     </select>
                 </div>
            </div>
            <button class="btn btn-default" type="submit">{{ translate('Filter') }}</button>
        </form>
    </div>


    <div class="col-md-offset-2 col-md-8">
        <div class="row">
            <div class=" col-lg-12 pull-right">
                <a href="{{ route('sale_report_download')}}@if(Request::has('category_id'))?category_id=@php echo Request::get('category_id') @endphp @endif" class="btn btn-rounded btn-info pull-right " style="margin-bottom: 10px;">Download Sale Report</a>
            </div>
        </div>
        <div class="panel">
            <!--Panel heading-->
            <div class="panel-heading">
                <h3 class="panel-title">{{ translate('Product wise sale report') }}</h3>
            </div>

            <!--Panel body-->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped mar-no demo-dt-basic">
                        <thead>
                            <tr>
                                <th>{{ translate('Product Name') }}</th>
                                <th>{{ translate('Product Tag') }}</th>
                                <th>{{ translate('Product Size') }}</th>
                                <th>{{ translate('Num of Sale') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{ __($product->name) }}</td>
                                    <td>{{ __($product->tags) }}</td>
                                    <td>{{ __($product->variation) }}</td>
                                    <td>{{ $product->total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

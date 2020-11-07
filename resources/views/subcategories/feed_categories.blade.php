@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('subcategories.create')}}" class="btn btn-rounded btn-info pull-right">{{translate('Add New Subcategory')}}</a>
    </div>
</div>

<br>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading bord-btm clearfix pad-all h-100">
        <h3 class="panel-title pull-left pad-no">{{translate('Sub-Categories')}}</h3>
        <div class="pull-right clearfix">
            <form class="" id="sort_subcategories" action="" method="GET">
                <div class="box-inline pad-rgt pull-left">
                    <div class="" style="min-width: 200px;">
                        <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type name & Enter') }}">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-striped res-table mar-no" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{translate('Subcategory')}}</th>
                    <th>{{translate('Map Category')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subcategories as $key => $subcategory)
                    @if ($subcategory->category != null)
                        <tr>
                            <td>{{ ($key+1) + ($subcategories->currentPage() - 1)*$subcategories->perPage() }}</td>
                            <td>{{__($subcategory->name)}}</td>
                            <td>{{$subcategory->category->name}}</td>
                            <td colspan="3">

                                <select class="form-control" style="background: green;color: #fff" id="subcat_id{{$subcategory->id }}" onchange="assignCategory(this,{{ $subcategory->id }})">
                                        <option value="0">none</option>
                                   @foreach($feedCategories as $feedcategory)
                                    @if($subcategory->feedcat_id == $feedcategory->feed_id)

                                            <option value="{{ $feedcategory->feed_id }}" selected>{{ $feedcategory->feed_id }}-{{ $feedcategory->name }}</option>
                                    @else
                                            <option value="{{ $feedcategory->feed_id }}">{{ $feedcategory->feed_id }}-{{ $feedcategory->name }}</option>
                                    @endif    
                                   @endforeach     
                                </select>    
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        <div class="clearfix">
            <div class="pull-right">
                {{ $subcategories->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
    <script type="text/javascript">
        
          $(document).ready(function () {
              $('select').selectize({
                  sortField: 'text'
              });
          });

        function assignCategory(set,id){

            var feedid   = set.value;
            var subcatId = id;
            $.post('{{ route('subsubcategories.mapfeedcategories') }}', {_token:'{{ csrf_token() }}', subcatId:id, feedid:feedid}, function(data){
                if(data == 1){
                    showAlert('success', 'Google Feed updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }
    </script>
@endsection
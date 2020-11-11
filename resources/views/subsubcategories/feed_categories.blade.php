@extends('layouts.app')

@section('content')

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
<style type="text/css">
    .selectize-input.items.full.has-options.has-items {
    background: green;
    color: #fff;
}
</style>
<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('subsubcategories.create')}}" class="btn btn-rounded btn-info pull-right">{{translate('Add New Sub Subcategory')}}</a>
    </div>
</div>

<br>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading bord-btm clearfix pad-all h-100">
        <h3 class="panel-title pull-left pad-no">{{translate('Sub-Sub-categories')}}  Total Sub Sub Categories : {{ $totalSub }}     Feed Assign Categories : {{ $totalassignSub }}</h3>
        <div class="pull-right clearfix">
            <form class="" id="sort_subsubcategories" action="" method="GET">
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
                    <th>{{translate('Sub Subcategory')}}</th>
                    <th colspan="3">{{translate('Map Category')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subsubcategories as $key => $subsubcategory)
                    @if ($subsubcategory->subcategory != null && $subsubcategory->subcategory->category != null)
                        <tr>
                            <td>{{ ($key+1) + ($subsubcategories->currentPage() - 1)*$subsubcategories->perPage() }}</td>
                            <td>{{$subsubcategory->subcategory->category->name}} > {{__($subsubcategory->name)}} > {{$subsubcategory->subcategory->name}}</td>
                            <td colspan="3">

                                <select class="form-control" style="background: green;color: #fff" id="subcat_id{{$subsubcategory->id }}" onchange="assignCategory(this,{{ $subsubcategory->id }})">
                                        <option value="0">none</option>
                                   @foreach($feedCategories as $feedcategory)
                                    @if($subsubcategory->feedcat_id == $feedcategory->feed_id)

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
                {{ $subsubcategories->appends(request()->input())->links() }}
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
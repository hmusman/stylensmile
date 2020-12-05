@extends('layouts.app')

@section('content')



<!-- Basic Data Tables -->
<!--===================================================-->

<div class="panel">
    <div class="panel-heading bord-btm clearfix pad-all h-100">
        <h3 class="panel-title pull-left pad-no">{{translate('New Customer')}}</h3>
    </div>

    <form class="form-horizontal" action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="name">{{translate('Name')}}</label>
                <div class="col-sm-10">
                    <input type="text" placeholder="{{translate('Name')}}" id="name" name="name" class="form-control" value="{{ old('name') }}"  required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="name">{{translate('Email')}}</label>
                <div class="col-sm-10">
                     <input type="email" placeholder="{{translate('Email')}}" id="email" name="email" class="form-control" required value="{{ old('email') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="phone">{{translate('Phone')}}</label>
                <div class="col-sm-10">
                     <input type="number" placeholder="{{translate('Phone')}}" id="phone" name="phone" class="form-control" maxlength="11"  value="{{ old('phone') }}" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="password">{{translate('password')}}</label>
                <div class="col-sm-10">
                     <input type="password" placeholder="{{translate('Password')}}" id="password" name="password" class="form-control" required>
                     @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>


                <p></p>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="password_confirmation">{{translate('Confirm Password')}}</label>
                <div class="col-sm-10">
                     <input type="password" placeholder="{{translate('Confirm Password')}}" id="password_confirmation" name="password_confirmation" class="form-control" required>
                </div>
            </div>
            
        </div>
        <div class="panel-footer text-right">
            <button class="btn btn-purple" type="submit">{{translate('Save')}}</button>
        </div>
    </form>

</div>

@endsection
@section('script')
    <script type="text/javascript">
       
    </script>
@endsection
@section('modal')
   
    
    
@endsection

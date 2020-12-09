@extends('backend.layouts.app')

@section('content')


<div class="col-md-10 mx-auto">
    <form class="form form-horizontal mar-top" action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data" id="choice_form">
        @csrf
        <input type="hidden" name="added_by" value="admin">
       
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Add New Customer')}}</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                <label class="col-sm-2 control-label" for="name">{{translate('Name')}}</label>
                <div class="col-sm-10">
                    <input type="text" placeholder="{{translate('Name')}}" id="name" name="name" class="form-control" value="{{ old('name') }}"  required>
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- <div class="form-group">
                <label class="col-sm-2 control-label" for="name">{{translate('Email')}}</label>
                <div class="col-sm-10">
                     <input type="email" placeholder="{{translate('Email')}}" id="email" name="email" class="form-control" value="{{ old('email') }}">
                     @error('email')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div> --}}

            <div class="form-group">
                <label class="col-sm-2 control-label" for="phone">{{translate('Phone')}}</label>
                <div class="col-sm-10">
                     <input type="number" placeholder="{{translate('Phone')}}" id="phone" name="phone" class="form-control" maxlength="11"  value="{{ old('phone') }}" required>
                     @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- <div class="form-group">
                <label class="col-sm-2 control-label" for="password">{{translate('Password')}}</label>
                <div class="col-sm-10">
                     <input type="password" placeholder="{{translate('Password')}}" id="password" name="password" class="form-control" required>
                     @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="password_confirmation">{{translate('Confirm Password')}}</label>
                <div class="col-sm-10">
                     <input type="password" placeholder="{{translate('Confirm Password')}}" id="password_confirmation" name="password_confirmation" class="form-control" required>
                </div>
            </div>  --}}

              
            </div>
        </div>
       
        <div class="mar-all text-right">
            <button type="submit" name="button" class="btn btn-info">{{ translate('Add New Customer') }}</button>
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

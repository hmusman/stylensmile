<div class="form-group">
    <div class="row">
        <label class="col-sm-2 control-label" for="name">{{translate('Name')}}</label>
        <div class="col-sm-10">
            <input type="text" placeholder="{{translate('Name')}}" id="name" name="name" class="form-control" required>
        </div>
    </div>
</div>
<div class="form-group">
    <div class=" row">
        <label class="col-sm-2 control-label" for="email">{{translate('Email')}}</label>
        <div class="col-sm-10">
            <input type="email" placeholder="{{translate('Email')}}" id="email" name="email" class="form-control" required>
        </div>
    </div>
</div>
<div class="form-group">
    <div class=" row">
        <label class="col-sm-2 control-label" for="address">{{translate('Address')}}</label>
        <div class="col-sm-10">
            <textarea placeholder="{{translate('Address')}}" id="address" name="address" class="form-control" required></textarea>
        </div>
    </div>
</div>
<div class="form-group">
    <div class=" row">
        <label class="col-sm-2 control-label" for="email">{{translate('Country')}}</label>
        <div class="col-sm-10">
            <select name="country" id="country" class="form-control aiz-selectpicker"  data-live-search="true" required data-placeholder="{{translate('Select country')}}">
                @foreach (\App\Country::where('status',1)->get() as $key => $country)
                    <option value="{{ $country->name }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <div class=" row">
        <label class="col-sm-2 control-label" for="city">{{translate('City')}}</label>
        <div class="col-sm-10">
            {{-- <input type="text" placeholder="{{translate('City')}}" id="city" name="city" class="form-control" required> --}}
            @php
                $cities = DB::table('cities')->get();
            @endphp

            <select name="city" id="city" class="form-control" required="">
                <option disabled="" hidden="" selected="">Select City </option>
                @foreach($cities as $city)
                    <option value="{{ $city->name }}">{{ $city->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <div class=" row">
        <label class="col-sm-2 control-label" for="postal_code">{{translate('Postal code')}}</label>
        <div class="col-sm-10">
            <input type="number" min="0" placeholder="{{translate('Postal code')}}" id="postal_code" name="postal_code" class="form-control">
        </div>
    </div>
</div>
<div class="form-group">
    <div class=" row">
        <label class="col-sm-2 control-label" for="phone">{{translate('Phone')}}</label>
        <div class="col-sm-10">
            <input type="number" min="0" placeholder="{{translate('+923012345678 / 03012345678')}}" id="phone" name="phone" class="form-control" required>
        </div>
    </div>
</div>

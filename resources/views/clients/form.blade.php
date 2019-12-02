
<div class="form-group">
<label for="name" class="control-label">{{'name'}}</label>
<input type="text" class="form-control {{ $errors->has('name')?'is-invalid':'' }}" name="name" id="name"     
value="{{ isset($client->name)?$client->name:old('name') }}">
{!! $errors->first('name','<div class="invalid-feedback">:message</div>')  !!}
</div>

<div class="form-group">
<label for="address" class="control-label">{{'address'}}</label>
<input type="text" class="form-control {{ $errors->has('address')?'is-invalid':'' }}" name="address" id="address"     
value="{{ isset($client->address)?$client->address:old('address') }}">
{!! $errors->first('address','<div class="invalid-feedback">:message</div>')  !!}
</div>

<div class="form-group">
<label for="cellphone" class="control-label">{{'cellphone'}}</label>
<input type="text" class="form-control {{ $errors->has('cellphone')?'is-invalid':'' }}" name="cellphone" id="cellphone"     
value="{{ isset($client->cellphone)?$client->cellphone:old('cellphone') }}">
{!! $errors->first('cellphone','<div class="invalid-feedback">:message</div>')  !!}
</div>

<div class="form-group">
<label for="email" class="control-label">{{'email'}}</label>
<input type="email" class="form-control {{ $errors->has('email')?'is-invalid':'' }}" name="email" id="email"     
value="{{ isset($client->email)?$client->email:old('email') }}">
{!! $errors->first('email','<div class="invalid-feedback">:message</div>')  !!}
</div>
        
<div class="form-group">
<label for="photo">{{'photo'}}</label>
@if(isset($client->photo))
<br/>
<img src="{{ asset('storage').'/'.$client->photo}}" class="img-thumbnail img-fluid" alt="" width="200">
<br/>
@endif
<input type="file" class="form-control {{ $errors->has('photo')?'is-invalid':'' }}" name="photo" id="photo"     
value="">
{!! $errors->first('photo','<div class="invalid-feedback">:message</div>')  !!}
</div>

<input type="submit" class="btn btn-success" value="{{ $Mode=='create' ? 'Add':'Modify' }}">
<a class="btn btn-primary" href="{{ url('clients') }}">Return</a>
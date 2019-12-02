


<label for="name">{{'name'}}</label>
<input type="text" name="name" id="name" 

value="{{ isset($client->name)?$client->name:'' }}"
>
<br/>
    
<label for="address">{{'address'}}</label>
<input type="text" name="address" id="address" 

value="{{ isset($client->address)?$client->address:'' }}"
>
<br/>

<label for="cellphone">{{'cellphone'}}</label>
<input type="text" name="cellphone" id="cellphone" 

value="{{ isset($client->cellphone)?$client->cellphone:'' }}"
>
<br/>

<label for="email">{{'email'}}</label>
<input type="email" name="email" id="email" 

value="{{ isset($client->email)?$client->email:'' }}"
>
<br/>

<label for="photo">{{'photo'}}</label>
@if(isset($client->photo))
<br/>
<img src="{{ asset('storage').'/'.$client->photo}}" alt="" width="200">
<br/>
@endif
<input type="file" name="photo" id="photo" value="">
<br/>

<input type="submit" value="{{ $Mode=='create' ? 'Add':'Modify' }}">
<a href="{{ url('clients') }}">Return</a>
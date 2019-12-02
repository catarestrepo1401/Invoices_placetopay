//Seccion para crear clients
<form action="{{ url('clients') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

<label for="name">{{'name'}}</label>
<input type="text" name="name" id="name" value="">
<br/>
    
<label for="address">{{'address'}}</label>
<input type="text" name="address" id="address" value="">
<br/>

<label for="cellphone">{{'cellphone'}}</label>
<input type="text" name="cellphone" id="cellphone" value="">
<br/>

<label for="email">{{'email'}}</label>
<input type="email" name="email" id="email" value="">
<br/>

<label for="photo">{{'photo'}}</label>
<input type="file" name="photo" id="photo" value="">
<br/>

<input type="submit" value="Add">

<a href="{{ url('clients') }}">Return</a>

</form>
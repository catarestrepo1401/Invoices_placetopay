Seccion para editar client
<form action="{{ url('/clients/' . $client->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

        <label for="name">{{'name'}}</label>
        <input type="text" name="name" id="name" value="{{ $client->name }}">
        <br/>
            
        <label for="address">{{'address'}}</label>
        <input type="text" name="address" id="address" value="{{ $client->address }}">
        <br/>
        
        <label for="cellphone">{{'cellphone'}}</label>
        <input type="text" name="cellphone" id="cellphone" value="{{ $client->cellphone }}">
        <br/>
        
        <label for="email">{{'email'}}</label>
        <input type="email" name="email" id="email" value="{{ $client->email }}">
        <br/>
        
        <label for="photo">{{'photo'}}</label>
        <br/>
        <img src="{{ asset('storage').'/'.$client->photo}}" alt="" width="200">
        <br/>
        <input type="file" name="photo" id="photo" value="">
        <br/>

        <input type="submit" value="Modify">
        <a href="{{ url('clients') }}">Return</a>

</form>
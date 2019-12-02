
@extends('layouts.app')

@section('content')

<div class="container">

@if(Session::has('Message'))

<div class="alert alert-success" role="alert">
{{ Session::get('Message') }}
</div>

@endif


<a href="{{ url('clients/create') }}" class="btn btn-success">Add Client</a>
<br/>
<br/>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>photo</th>
            <th>name</th>
            <th>address</th>
            <th>cellphone</th>
            <th>email</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach($clients as $client)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>
            
            <img src="{{ asset('storage').'/'.$client->photo}}" class="img-thumbnail img-fluid" alt="" width="100">

            </td>
            <td>{{ $client->name}}</td>
            <td>{{ $client->address}}</td>
            <td>{{ $client->cellphone}}</td>
            <td>{{ $client->email}}</td>
            <td>

            <a class="btn btn-warning" href="{{ url('/clients/'.$client->id.'/edit') }}">
            Edit
            </a>

            <form method="post" action="{{ url('/clients/'.$client->id) }}" style="display:inline">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Delete</button>
            </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

//se muestre la paginacion de los datos del crud
{{ $clients->links() }}

</div>
@endsection
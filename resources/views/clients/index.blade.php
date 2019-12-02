

@if(Session::has('Message')){{
    Session::get('Message')
}}
@endif

<a href="{{ url('clients/create') }}">Add Client</a>

<table class="table table-light">
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
            
            <img src="{{ asset('storage').'/'.$client->photo}}" alt="" width="200">

            </td>
            <td>{{ $client->name}}</td>
            <td>{{ $client->address}}</td>
            <td>{{ $client->cellphone}}</td>
            <td>{{ $client->email}}</td>
            <td>

            <a href="{{ url('/clients/'.$client->id.'/edit') }}">
            Edit
            </a>

            <form method="post" action="{{ url('/clients/'.$client->id) }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" onclick="return confirm('¿Borrar?');">Delete</button>
            </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
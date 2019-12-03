@extends('layouts.app')

@section('content')

<div class="container">

@if(Session::has('Message'))

<div class="alert alert-success" role="alert">
{{ Session::get('Message') }}
</div>

@endif


<a href="{{ url('invoices/create') }}" class="btn btn-success">Add Invoice</a>
<br/>
<br/>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>iva</th>
            <th>subtotal</th>
            <th>total</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach($invoices as $invoice)
        <tr>
            <td>{{$loop->iteration}}</td>
        
            <td>{{ $invoice->iva}}</td>
            <td>{{ $invoice->subtotal}}</td>
            <td>{{ $invoice->total}}</td>
            
            <td>

            <a class="btn btn-warning" href="{{ url('/invoices/'.$invoice->id.'/edit') }}">
            Edit
            </a>

            <form method="post" action="{{ url('/invoices/'.$invoice->id) }}" style="display:inline">
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
{{ $invoices->links() }}

</div>
@endsection
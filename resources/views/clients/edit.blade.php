
@extends('layouts.app')

@section('content')

<div class="container">

<form action="{{ url('/clients/' . $client->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('clients.form',['Mode'=>'edit'])       

</form>
</div>
@endsection
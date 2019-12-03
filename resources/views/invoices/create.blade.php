
@extends('layouts.app')

@section('content')

<div class="container">

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        
        <li> {{ $error}} </li>

        @endforeach
    </ul>
</div>
@endif

//Seccion para crear invoices
<form action="{{ url('invoices') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

@include('invoices.form',['Mode'=>'create'])


</form>
</div>
@endsection
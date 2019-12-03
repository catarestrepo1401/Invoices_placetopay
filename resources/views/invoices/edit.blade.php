
@extends('layouts.app')

@section('content')

<div class="container">

<form action="{{ url('/invoices/' . $invoice->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('invoices.form',['Mode'=>'edit'])       

</form>
</div>
@endsection
//Seccion para crear invoices
<form action="{{ url('invoices') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}


<label for="iva">{{'iva'}}</label>
<input type="text" name="iva" id="iva" value="">
<br/>

<label for="subtotal">{{'subtotal'}}</label>
<input type="text" name="subtotal" id="subtotal" value="">
<br/>

<label for="total">{{'total'}}</label>
<input type="text" name="total" id="total" value="">
<br/>



<input type="submit" value="Add">

</form>
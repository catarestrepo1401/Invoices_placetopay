
<div class="form-group">
    <label for="iva" class="control-label">{{'iva'}}</label>
    <input type="text" class="form-control {{ $errors->has('iva')?'is-invalid':'' }}" name="iva" id="iva"     
    value="{{ isset($invoice->iva)?$invoice->name:old('iva') }}">
    {!! $errors->first('iva','<div class="invalid-feedback">:message</div>')  !!}
    </div>
    
    <div class="form-group">
    <label for="subtotal" class="control-label">{{'subtotal'}}</label>
    <input type="text" class="form-control {{ $errors->has('subtotal')?'is-invalid':'' }}" name="subtotal" id="subtotal"     
    value="{{ isset($invoice->subtotal)?$invoice->subtotal:old('subtotal') }}">
    {!! $errors->first('subtotal','<div class="invalid-feedback">:message</div>')  !!}
    </div>
    
    <div class="form-group">
    <label for="total" class="control-label">{{'total'}}</label>
    <input type="text" class="form-control {{ $errors->has('total')?'is-invalid':'' }}" name="total" id="total"     
    value="{{ isset($invoice->total)?$invoice->total:old('total') }}">
    {!! $errors->first('total','<div class="invalid-feedback">:message</div>')  !!}
    </div>
    
    
    
    <input type="submit" class="btn btn-success" value="{{ $Mode=='create' ? 'Add':'Modify' }}">
    <a class="btn btn-primary" href="{{ url('invoices') }}">Return</a>
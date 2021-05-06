
<h1>{{$modo}} Envio</h1>

@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        
        <ul>
        @foreach($errors->all() as $error)
      <li>  {{$error}}</li>
        @endforeach
        </ul>
    </div>
   
@endif




<div class="form-group">

<label for="Nombre">Nombre (Quien recibe)</label>
<input type="text" class="form-control" name="Nombre" value="{{isset($empleado->Nombre)?$empleado->Nombre:old('Nombre')}}" id="Nombre">

</div>

<div class="form-group">

<label for="Telefono">Telefono</label>
<input type="text" class="form-control" name="Telefono" value="{{isset($empleado->Telefono)?$empleado->Telefono:old('Telefono')}}" id="Telefono">

</div>

<div class="form-group">
<label for="Estado">Estado</label>
<input type="text" class="form-control" name="Estado" value="{{isset($empleado->Estado)?$empleado->Estado:old('Estado')}}" id="Estado">

</div>

<div class="form-group">
<label for="Municipio">Municipio</label>
<input type="text" class="form-control" name="Municipio" value="{{isset($empleado->Municipio)?$empleado->Municipio:old('Municipio')}}" id="Municipio"> 

</div>

<div class="form-group">
<label for="Direccion">Direccion o (Punto de referencia)</label>
<input type="text" class="form-control" name="Direccion" value="{{isset($empleado->Direccion)?$empleado->Direccion:Old('Direccion')}}" id="Direccion">

</div>

<div class="form-group">
<label for="Foto">Foto</label>
@if(isset($empleado->Foto))
<img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->Foto }}" width="200"  alt="">
@endif
<input type="file" class="form-control" name="Foto" value="" id="Foto">

</div>

<input class="btn btn-success"  type="submit" value="{{$modo}} datos">

<a class="btn btn-primary" href="{{url('empleado/')}}">Regresar</a>
<br>
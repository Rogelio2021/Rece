@extends('layouts.app')

@section('content')
<div class="container">

    
    @if (Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
            
    {{Session::get('mensaje')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>

</div>
    @endif
       


<a href="{{url('empleado1/create')}}" class="btn btn-success">Registrar Nuevo envio</a>
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Estado</th>
            <th>Municipio</th>
            <th>Direccion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($empleados1 as $empleado1)
            
     
        <tr>
            <td>{{$empleado1->id}}</td>
            
            <td>
                <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$empleado1->Foto}}" width="200" alt="">
                
            </td>
 


            <td>{{$empleado1->Nombre}}</td>
            <td>{{$empleado1->Telefono}}</td>
            <td>{{$empleado1->Estado}}</td>
            <td>{{$empleado1->Municipio}}</td>
            <td>{{$empleado1->Direccion}}</td>
            <td>
                
                <a href="{{url('/empleado1/'.$empleado1->id.'/edit')}}" class="btn btn-warning">
                    Editar  
                </a>
                |  
                

                <form action="{{url('/empleado1/'.$empleado1->id)}}" class="d-inline" method="post">
                    @csrf
                    {{method_field('DELETE')}}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar este registro?')" 
                    value="Borrar">
                
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $empleados1->links() !!}
</div>
@endsection
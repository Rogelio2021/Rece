@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{url('/empleado1/'.$empleado1->id)}}" method="post" enctype="multipart/form-data">

@csrf
{{method_field('PATCH')}}
@include('empleado1.form1',['modo'=>' Editar']);

</form>
</div>
@endsection
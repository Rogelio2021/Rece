@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{url('empleado1/')}}" method="post" enctype="multipart/form-data">
    @csrf
    @include('empleado1.form1',['modo'=>' Crear']);    

</form>
</div>
@endsection
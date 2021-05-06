@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Menú de Envios') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('¡Hola Amigo, hola Amiga!') }}
                    <br>
                    
                    {{ __('Selecciona una opcion:') }}
                    <br>
                    <br>
                        <a class="btn btn-success"  href="empleado">Envios a MÉXICO</a>
                        <br>
                        <br>
                        <a class="btn btn-success"  href="empleado1">Envios a USA</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

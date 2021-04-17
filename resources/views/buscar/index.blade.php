@extends('layouts.app')

@section('navegacion')

@include('ui.categoriasNav')

@endsection

@section('content')
        @if(count($vacantes)>0)
            <div class="my-10 bg-gray-100 p-10 shadow">
                <h1 class="text-3xl text-gray-700-m-0">
                    Resultados de la busqueda:
                </h1>
                @include('ui.listadoVacante')

                {{$vacantes->links()}}
            </div>

        @else
            <p class="text-center text-gray-700">
                    No hay vacante que concuerde con tu busqueda
            </p>

        @endif


@endsection

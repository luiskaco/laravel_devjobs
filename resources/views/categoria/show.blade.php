@extends('layouts.app')

@section('navegacion')

@include('ui.categoriasNav')

@endsection

@section('content')

            <div class="my-10 bg-gray-100 p-10 shadow">
                <h1 class="text-3xl text-gray-700-m-0">
                    Categoria:
                    <span class="font-bold">
                        {{$categoria->nombre}}
                    </span>
                </h1>

                @if (count($vacantes)>0)
                    @include('ui.listadoVacante')

                    {{$vacantes->links()}}

                @else
                     <p class="text-center text-gray-700">
                            No hemos encontrado vacantes de esta categoria
                    </p>
                @endif


            </div>


@endsection

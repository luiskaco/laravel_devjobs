@extends('layouts.app')

@section('navegacion')
   @include('ui.adminnav')
   @include('ui.categoriasNav')
@endsection

@section('content')
        <h1 class="text-3xl text-center mt-10">
            {{$vacante->titulo}}
        </h1>

        <div class="mt-10 mb-20 md:flex items-start">

            <div class="md:w-3/5">
                <a href="" class="block text-gray-700 font-bold my-2">
                    Publicado: <span class="font-normal">{{$vacante->created_at->diffForHumans()}}</span>
                    Publicado por: <span class="font-normal">{{$vacante->reclutador->name}}</span>
                </a>
                <a href="" class="block text-gray-700 font-bold my-2">
                    Categoria: <span class="font-normal">{{$vacante->categoria->nombre}}</span>
                </a>
                <a href="" class="block text-gray-700 font-bold my-2">
                    Salario: <span class="font-normal">{{$vacante->salario->nombre}}</span>
                </a>
                <a href="" class="block text-gray-700 font-bold my-2">
                    Ubicación: <span class="font-normal">{{$vacante->ubicacion->nombre}}</span>
                </a>
                </a>
                <a href="" class="block text-gray-700 font-bold my-2">
                    Experencia: <span class="font-normal">{{$vacante->experiencia->nombre}}</span>
                </a>

                <h2 class="text-2xl text-center mt-10 text-gray-700 mb-5">
                    Conocimiento y Tecnologías
                </h2>
                @php
                    $arraySkills = explode(",", $vacante->skills);

                @endphp

                @foreach ($arraySkills as $skill)
                    <a href="" class="inline-block border border-gray-400 rounded py-2 px-8 text-gray-700 my-2 ">
                        {{$skill}}
                    </a>
                @endforeach
                <a href="{{url('storage/vacantes/'. $vacante->imagen)}}" data-lightbox="imagen" data-title="Vacante {{ $vacante->titulo}} ">
                    <img src="{{url('storage/vacantes/'. $vacante->imagen)}}" class="w-40 mt-10" alt="">
                 </a>
                <div class="descripcion mt-10 mb-5">
                    {!! $vacante->descripcion!!}
                </div>


            </div>
            @if($vacante->activa==1)
                 @include('ui.contacto')
            @endif
        </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css" integrity="sha256-tBxlolRHP9uMsEFKVk+hk//ekOlXOixLKvye5W2WR5c=" crossorigin="anonymous" />
@endsection

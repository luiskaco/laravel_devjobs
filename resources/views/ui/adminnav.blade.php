@auth

    <a href="{{route('vacantes.index')}}"
    class="text-white text-sm uppercase font-bold p-3
        {{Request::is('vacantes') ? 'bg-red-500': ''}}"
    >Ver Vacantes</a>
    <a href="{{route('vacantes.create')}}" class="text-white text-sm uppercase font-bold p-3
        {{Request::is('vacantes/create') ? 'bg-red-500': ''}}
    ">Nueva Vacantes</a>

 @endauth



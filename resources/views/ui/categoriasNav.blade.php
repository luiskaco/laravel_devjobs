
@guest
    @foreach ($categorias as $categoria)
        <a
            href="{{route('categorias.show',['categoria' => $categoria->id])}}"
            class="text-white
             text-sm uppercase font-bold p-3
             hover:bg-green-500
             hover:text-white
             {{URL::current() == route('categorias.show',['categoria' => $categoria->id]) ? 'bg-red-500': ''}}
             ">
            {{$categoria->nombre}}
        </a>
    @endforeach
@endguest



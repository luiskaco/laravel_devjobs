<aside class="md:w-2/5 bg-red-500 p-5 rounded m-3 ">
    <h2 class=" text-2xl my-5 uppercase font-bold text-center text-white">Contacta al Reclutador </h2>

    <form action="{{route('candidatos.store')}}" method="post" enctype="multipart/form-data">

        @csrf
        <div class="mb-4">
            <label for="nombre" class="block text-white font-bold mb-4">
                Nombre
            </label>
            <input
                type="text"
                name="nombre"
                id="nombre"
                value="{{old('nombre')}}"
                class="p-3 bg-gray-100 rounded form-input w-full
                @error('nombre')
                    border border-red-500
                @enderror"
                placeholder="Tu nombre"
                >

                @error('nombre')
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                        <p>{{$message}}</p>
                    </div>
                @enderror
        </div>
        <div class="mb-4">
            <label for="nombre" class="block text-white font-bold mb-4">
                Nombre
            </label>
            <input
                type="text"
                name="email"
                id="email"
                value="{{old('email')}}"
                class="p-3 bg-gray-100 rounded form-input w-full
                @error('email')
                    border border-red-500
                @enderror"
                placeholder="Tu email"
                >

                @error('email')
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                        <p>{{$message}}</p>
                    </div>
                @enderror
        </div>
        <div class="mb-4">
            <label for="nombre" class="block text-white font-bold mb-4">
                Curriculum (PDF):
            </label>
            <input
                type="file"
                name="cv"
                id="cv"
                accept="application/pdf"
                class="p-3 rounded form-input w-full
                @error('cv')
                    border border-red-500
                @enderror"
                >

                @error('cv')
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                        <p>{{$message}}</p>
                    </div>
                @enderror
        </div>

        <input type="hidden" name="vacante_id" value="{{$vacante->id}}">

        <input
            type="submit"
            class="bg-red-600 w-full hover:bg-red-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase"
            value="Contactar"
        >
    </form>
</aside>

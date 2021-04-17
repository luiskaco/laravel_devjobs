@extends('layouts.app')

@section('navegacion')
   @include('ui.adminnav')
@endsection


@section('content')
    <h1 class="text-2xl text-center mt-10"> Editar Vacantes {{$vacante->titulo}}</h1>


    <form
        action="{{route('vacantes.update', ['vacante' => $vacante->id])}}"
        class="max-w-lg mx-auto my-10"
        method="post"
    >

        @method('PUT')
        @csrf
        <div class="mb-5">
            <label
                for="titulo"
                class="block text-gray-700 text-sm mb-2"
            >Titulo Vacante:</label>

            <input
                id="titulo"
                type="text"
                class="p-3 bg-gray-100 rounded form-input w-full  @error('titulo') border-red-500 border @enderror"
                name="titulo"
                placeholder="Titulo de la vacante"
                value="{{ $vacante->titulo }}"
            >

            @error('titulo')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block"> {{$message}}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label
                for="categoria"
                class="block text-gray-700 text-sm mb-2">Categoria </label>

            <select
                name="categoria"
                id="categoria"
                class="block appareance-none w-full border border-gray-200 rounded lead leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full @error('categoria') border-red-500 border @enderror"

                >
                <option disabled selected>- Selecciona -</option>

                @foreach ($categorias as $categoria)
                    <option
                         {{ $vacante->categoria_id == $categoria->id ? 'selected' : ''}}
                    value="{{ $categoria->id}}"> {{ $categoria->nombre }}</option>
                @endforeach
            </select>

            @error('categoria')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block"> {{$message}}</span>
                </div>
            @enderror

        </div>

        <div class="mb-5">
            <label
                for="experiencia"
                class="block text-gray-700 text-sm mb-2">Experiencia </label>

            <select
                name="experiencia"
                id="experiencia"
                class="block appareance-none w-full border border-gray-200 rounded lead leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full @error('experiencia') border-red-500 border @enderror"

                >
                <option disabled selected>- Selecciona -</option>

                @foreach ($experiencias as $experiencia)
                    <option
                    {{ $vacante->experiencia_id == $experiencia->id ? 'selected' : ''}}
                    value="{{ $experiencia->id}}"> {{ $experiencia->nombre }}</option>
                @endforeach
            </select>

            @error('experiencia')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block"> {{$message}}</span>
                </div>
            @enderror

        </div>

        <div class="mb-5">
            <label
                for="Ubicacion"
                class="block text-gray-700 text-sm mb-2">Ubicación </label>

            <select
                name="ubicacion"
                id="Ubicacion"
                class="block appareance-none w-full border border-gray-200 rounded lead leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full @error('ubicacion') border-red-500 border @enderror"

                >
                <option disabled selected>- Selecciona -</option>

                @foreach ($ubicaciones as $ubicacion)
                    <option
                    {{ $vacante->ubicacion_id == $ubicacion->id ? 'selected' : ''}}
                    value="{{ $ubicacion->id}}"> {{ $ubicacion->nombre }}</option>
                @endforeach
            </select>

            @error('ubicacion')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block"> {{$message}}</span>
                </div>
            @enderror

        </div>

        <div class="mb-5">
            <label
                for="salario"
                class="block text-gray-700 text-sm mb-2">Salario </label>

            <select
                name="salario"
                id="salario"
                class="block appareance-none w-full border border-gray-200 rounded lead leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full
                @error('salario') border-red-500 border @enderror
                "

                >
                <option disabled selected>- Selecciona -</option>

                @foreach ($salarios as $salario)
                    <option
                    {{ $vacante->salario_id == $salario->id ? 'selected' : ''}}
                    value="{{ $salario->id}}"> {{ $salario->nombre }}</option>
                @endforeach
            </select>

            @error('salario')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block"> {{$message}}</span>
                </div>
            @enderror

        </div>

        <div class="mb-5 mt-3">
            <label
                for="descripcion"
                class="block text-gray-700 text-sm mb-2">Descripción del Puesto </label>

                <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700
                @error('descripcion') border-red-500 border @enderror
                "></div>

                <!--
                    Nota: Media editor solo require de un div
                -->
                {{-- Nota: Creamos un input para pasar los evento escrito en el editor --}}
                <input type="hidden" name="descripcion" id="descripcion" value="{{ $vacante->descripcion }}" />

                @error('descripcion')
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block"> {{$message}}</span>
                    </div>
                @enderror
        </div>

        <div class="mb-5 mt-3">

            <label
                for="skills"
                class="block text-gray-700 text-sm mb-5">Habilidades y conocimientos <span class="text-xs">(Elige al menos 3)</span></label>

                @php
                    $skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular', 'VueJS', 'ReactJS', 'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django', 'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Deno', 'React Native', 'Flutter', 'MobX', 'C#', 'Ruby on Rails']
                @endphp

                <lista-skills
                    :skills="{{json_encode($skills)}}"
                    :oldskills = "{{json_encode( $vacante->skills)}}"
                    {{--
                        Nota: cuando se pasa un string, no se le agrega el : cuando es un arreglo si.
                        --}}
                ></lista-skills>


                @error('skills')
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block"> {{$message}}</span>
                    </div>
                @enderror

        </div>

        <div class="mb-5 mt-3">
            <label
                for="imagen"
                class="block text-gray-700 text-sm mb-2">Imagen vacante </label>

                <div id="dropzoneDevjobs" class="dropzone rounded bg-gray-100

                "></div>

                {{-- input para guardar el nombre en la BD --}}
                <input type="hidden" name="imagen" id="imagen" value="{{ $vacante->imagen}}">

                {{-- mensaje de error --}}
                <p id="error">

                </p>

                @error('imagen')
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block"> {{$message}}</span>
                    </div>
                @enderror
        </div>

        <button
            type="submit"
            class="bg-red-500 w-full hover:bg-red-600 text-gray-100 font-bold p-3 focus:outline focus:shadow-outline uppercase"
        >Publicar Vacante</button>

    </form>


@endsection


@section('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css" integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw==" crossorigin="anonymous" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" />

@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA==" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.js" integrity="sha512-4p9OjnfBk18Aavg91853yEZCA7ywJYcZpFt+YB+p+gLNPFIAlt2zMBGzTxREYh+sHFsttK0CTYephWaY7I3Wbw==" crossorigin="anonymous"></script>

<script>

    Dropzone.autoDiscover = false;// Evitamos que dropzone escanee buscando estanciar la clase dropzone

    document.addEventListener('DOMContentLoaded', () => {
        // Media Eitor
        const editor = new MediumEditor('.editable',{
            toolbar:{
                buttons: ['bold','italic', 'underline','quote', 'anchor', 'justifyLeft', 'justifyCenter', 'justifyRight','justifyFull', 'orderedlist', 'unorderedlist', 'h1','h2', 'h3','h4', 'h5'] ,
                static: true,
                sticky: true
            },
            placeholder: {
                /* This example includes the default options for placeholder,
                if nothing is passed this is what it used */
                text: 'Información de la vacante',
                hideOnClick: true
            }
        });


        // Agrega lo que el usuairo escribe a media editor
        editor.subscribe('editableInput', function(eventObj, editable){
            const contenido = editor.getContent();
            document.querySelector('#descripcion').value = contenido;
        })

        // Llena el editor con el contenido del input por default
        editor.setContent( document.querySelector('#descripcion').value)


        // Dropzone
        const dropzoneDevjobs = new Dropzone('#dropzoneDevjobs',{
            url: "/vacantes/imagen", // Ruta destino
            dictDefaultMessage: "Sube aquí tu archivo", // Cambiar nombre del input
            acceptedFiles:".png, .jpg , .jpeg, .gif ", // Validar formato
            addRemoveLinks: true, // Agregar boton de eliminar
            dictRemoveFile: 'Borrar Archivo',  // Cambiar nombre del boton borrar
            maxFiles: 1, // Definir la carga de 1  | importante para que funcione el metodo  maxfilexxecc y remove file
            headers:{
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
            },
            init: function(){
                // Se ejecuta cuando incia el dropzone

                // Revisar si el value de imagen esta vacio
                if(document.querySelector('#imagen').value.trim()){
                  let imagenPublicada = {};
                  imagenPublicada.size = 1234;
                  imagenPublicada.name = document.querySelector('#imagen').value;

                  //
                  imagenPublicada.nombreServidor = document.querySelector('#imagen').value

                    // Obtner imagen Para publicar nuevamente en dropzone
                    this.options.addedfile.call(this, imagenPublicada);
                    this.options.thumbnail.call(this, imagenPublicada, `/storage/vacantes/${imagenPublicada.name}`);

                    // Agregas clases necesaria apra el publicao
                    imagenPublicada.previewElement.classList.add('dz-sucess');
                    imagenPublicada.previewElement.classList.add('dz-complete');

                }


            },
            success: function (file, response){
                // console.log(file);   Informacion del archvio
                console.log(response);  // informacion de la respuesta

                document.querySelector('#error').textContent = '';

                // Coloca la respuesta del servidor
                document.querySelector('#imagen').value=response.correcto;

                // Añadir al objeto de archvo el nombre del servidor

                file.nombreServidor = response.correcto;
            },
            maxfilesexceeded: function(file) { // Se ejcuta cuando esten todos los archivos
                // this.files; // onde se suben los archivos
                //    // console.log(this.files);

                this.removeAllFiles();
                this.addFile(file);
                    // if( this.files[1] != null ) {
                    //     this.removeFile(this.files[0]); // eliminar el archivo anterior
                    //     this.addFile(file); // Agregar el nuevo archivo
                    // }
            },
            removedfile: function(file, response) {
                    file.previewElement.parentNode.removeChild(file.previewElement);

                    params = {
                         imagen: file.nombreServidor
                        // imagen: file.nombreServidor ?? document.querySelector('#imagen').value
                        // Si no encuentra la  enviada antes de la validacion, busca la de la respuesta de validacion
                    }

                    axios.post('/vacantes/borrarimagen', params )
                        .then(respuesta => console.log(respuesta))
                }
        });

    })
</script>

@endsection

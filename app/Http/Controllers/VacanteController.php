<?php

namespace App\Http\Controllers;

use App\Salario;
use App\Vacante;
use App\Categoria;
use App\Ubicacion;
use App\Experiencia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // FOrma 1
        // $vacantes = Vacante::where('user_id' , Auth::user()->id )->get();

        // Forma 2
        $vacantes = auth()->user()->vacantes()->latest()->simplePaginate(5);
        /**
         * Nota: paginate() esta tado a las clase de boostraps
         *       simplePaginate() -> no esta atado, no muestra los numero.
         */

        return view('Vacantes.index', compact('vacantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Consultas
        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicaciones = Ubicacion::all();
        $salarios = Salario::all();

        return view('Vacantes.create', compact('categorias','experiencias','ubicaciones','salarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validacion
        $data = $request->validate([
            'titulo' => 'required|min:8',
            'categoria' =>'required',
            'experiencia' => 'required',
            'ubicacion' => 'required',
            'salario' => 'required',
            'descripcion' => 'required|min:50',
            'imagen' =>'required',
            'skills' => 'required'
        ]);

        // Almacenar en la Base de datos
        auth()->user()->vacantes()->create([
            'titulo' => $data['titulo'],
            'imagen' => $data['imagen'],
            'descripcion' => $data['descripcion'],
            'skills' => $data['skills'],
            'categoria_id' => $data['categoria'],
            'experiencia_id' => $data['experiencia'],
            'ubicacion_id' => $data['ubicacion'],
            'salario_id' => $data['salario']
        ]);

        return redirect()->action('VacanteController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show(Vacante $vacante)
    {

        // Impedir acceder a vacantes inactivas
        // if($vacante->activa==0) return abort(404);

        return view('vacantes.show', compact('vacante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacante $vacante)
    {
        // Agregando policiy
        $this->authorize('view', $vacante);


        // Consultas
        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicaciones = Ubicacion::all();
        $salarios = Salario::all();

        return view("vacantes.edit", compact('vacante','categorias','experiencias','ubicaciones','salarios'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacante $vacante)
    {
             // Agregando policiy
              $this->authorize('update', $vacante);


                // Validacion
            $data = $request->validate([
                'titulo' => 'required|min:6',
                'categoria' =>'required',
                'experiencia' => 'required',
                'ubicacion' => 'required',
                'salario' => 'required',
                'descripcion' => 'required|min:50',
                'imagen' =>'required',
                'skills' => 'required'
            ]);

            // Guardamos cambios
            $vacante->titulo = $data['titulo'];
            $vacante->skills = $data['skills'];
            $vacante->imagen = $data['imagen'];
            $vacante->descripcion = $data['descripcion'];
            $vacante->categoria_id = $data['categoria'];
            $vacante->experiencia_id = $data['experiencia'];
            $vacante->ubicacion_id = $data['ubicacion'];
            $vacante->salario_id = $data['salario'];

            $vacante->save();

            //Redirecionamos
            return redirect()->action('VacanteController@index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , Vacante $vacante)
    {
         // Agregando policiy
         $this->authorize('delete', $vacante);

        if($request->ajax()){
            $vacante->delete();

            return  response()->json(['mensaje' => 'Se elimino la vacante' . $vacante->titulo ], 200);
        }

    }

    // Metodos extra
    public function imagen(Request $request)
    {
        /** CODIGO INTERESANTE */
        $imagen = $request->file('file');
        //$imagen->extension();
        // Str::uuid().'-'.

        $nombreImagen = time() . '.'. $imagen->extension();

        // Meotod que me gusta
       // $nombreImagen = $imagen->store('vacantes', 'public');

        // Metodo del profe
        $imagen->move(public_path('storage/vacantes'), $nombreImagen );

        return response()->json(['correcto' => $nombreImagen]);
    }

    // Borrar imagen via ajax
    public function borrarimagen(Request $request){
        if($request->ajax()) {
            $imagen = $request->get('imagen');

            if( File::exists( 'storage/vacantes/' . $imagen ) ) {
                File::delete( 'storage/vacantes/' . $imagen );
            }

            return response('Imagen Eliminada', 200);
        }
    }

    // Cambia el estao de una vacante
    public function estado(Request $request, Vacante $vacante){

        if($request->ajax()){

                // Leer nuevo estado y asginarlo
            $vacante->activa = $request->estado;

            // Guardar en la BD
            $vacante->save();

            return response()->json(["respuesta" => "Correcto"], 200);

        }
    }

    public function buscar(Request $request){

        $data = $request->validate([
            'categoria' => 'required',
            'ubicacion' => 'required'
        ]);

        // Asignar Valores
        $categoria = $data['categoria'];
        $ubicacion = $data['ubicacion'];

        // Buscar

        // FORMA 1
           $vacantes = Vacante::latest()
                        ->where('categoria_id' , $data['categoria'])
                        ->where('ubicacion_id' , $data['ubicacion'])
                        ->simplePaginate(4);

        // FORMA 2
        // $vacantes = Vacante::latest()
        //     ->where([
        //         'categoria_id' =>  $categoria,
        //         'ubicacion_id' => $ubicacion])->get();


        return view('buscar.index', compact('vacantes'));
    }

    public function resultados(){
        return "hola";
    }

}

<?php

namespace App\Http\Controllers;

use App\Vacante;
use App\Candidato;
use Illuminate\Http\Request;
use App\Notifications\NuevoCandidato;


class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
           // Obtener el ID

        //Forma uno
        // $request->route('id');

        // Forma 2
        // return $request->id;

        $vacante_id = $request->route('id');

          // Obtener los candidatos y la vacante
       $vacante = Vacante::findOrFail($vacante_id);

        // Verificar que sea el autor el creado de la publicacion
        $this->authorize('view', $vacante);

        // $vacante->candidato;

        return view('candidato.index', compact('vacante'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nombre' => 'required',
            'email' => 'required|email',
            'cv' => 'required|mimes:pdf|max:1000',
            'vacante_id' => 'required'
        ]);

        // Una Forma
            // $candidato = new Candidato();
            // $candidato->nombre = $data['nombre'];
            // $candidato->email = $data['email'];
            // $candidato->vacante_id = $data['vacante_id'];
            // $candidato->cv = '1234';
            // $candidato ->save();

        // Segunda Forma
            // $candidato = new Candidato($data);
            // $candidato->cv = '222';
            // $candidato ->save();

        // Tercer forma
            // $candidato = new Candidato();
            // $candidato->fill($data);
            // $candidato->cv = 'tercera';
            // $candidato ->save();

        // Almacenar arhivos pdf
            if($request->file('cv')) {
                $archivo = $request->file('cv');
                $nombreArchivo = time() . "." . $request->file('cv')->extension();
                $ubicacion = public_path('/storage/cv');
                $archivo->move($ubicacion, $nombreArchivo);
            }

        // Basado en relacion
            $vacante = Vacante::find($data['vacante_id']);
            $vacante->candidato()->create([
                'nombre' => $data['nombre'],
                'email' => $data['email'],
                'cv' => $nombreArchivo
            ]);



        // Notificar al reclutador
            $reclutador = $vacante->reclutador;
            // $reclutador->notify(new \App\Notifications\NuevoCandidato() ); // Llamando a la notificacion
            $reclutador->notify(new NuevoCandidato($vacante) );
        /**
         *  Nota: No se le pasa el id basado en relacion
         *  NOta: la relacion si la llamamos como ->candidato accedemos a la colecion
         *                                         ->candidato() accedemos a las funciones
         */
        return back()->with('estado', 'Tus datos se enviaron correctametne! Suerte'); // Pagina Previa
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function show(Candidato $candidato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidato $candidato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidato $candidato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidato $candidato)
    {
        //
    }
}

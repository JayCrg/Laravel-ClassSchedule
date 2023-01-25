<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asignatura;
use Illuminate\Support\Facades\Auth;



class AsignaturaController extends Controller
{
    protected $Asignaturas;

    public function __construct(Asignatura $Asignaturas)
    {
        $this->Asignaturas = $Asignaturas;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id= Auth::user()->id;
        $Asignaturas = $this->Asignaturas->obtenerAsignaturasPorUsuario($user_id);
        return view('asignaturas', ['asignaturas' => $Asignaturas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asignaturas-crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'codAs' => ['required'],
        //     'nombreAs' => ['required'],
        //     'nombreCortoAs' => ['required'],
        //     'profesorAs' => ['required'],
        //     'colorAs' => ['required'],
        // ]);
            // $lastID = $this->Asignaturas->obtenerUltimoID();

            // $Asignatura = new Asignatura([
            //     "user_id" => Auth::user()->id,
            //     "nombreAs" => $request->nombreAs,
            //     "nombreCortoAs" => $request->nombreCortoAs,
            //     "profesorAs" => $request->profesorAs,
            //     "colorAs" => $request->colorAs
            // ]);
        $Asignatura = new Asignatura($request->all());
        $Asignatura->save();
        return redirect()->action([AsignaturaController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Asignatura = $this->Asignaturas->obtenerAsignaturaPorCodAs($id);
        return view('asignaturas', ['asignatura' => $Asignatura]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Asignatura = $this->Asignaturas->obtenerAsignaturaPorCodAs($id);
        return view('asignaturas-editar', ['asignatura' => $Asignatura]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'codAs' => 'required',
            'nombreAs' => 'required',
            'nombreCortoAs' => 'required',
            'profesorAs' => 'required',
            ]);
            
        $Asignatura = Asignatura::find($id);
        $Asignatura->fill($request->all());
        $Asignatura->save();
        return redirect()->action([AsignaturaController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($codAs)
    {
        $Asignatura = Asignatura::find($codAs);
        $Asignatura->delete();
        return redirect()->action([AsignaturaController::class, 'index']);
    }
}

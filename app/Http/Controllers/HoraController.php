<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Hora;
use App\Models\Asignatura;
use Illuminate\Support\Facades\Auth;


class HoraController extends Controller
{
    protected $hora;
    protected $asignatura;

    public function __construct(Hora $hora, Asignatura $asignatura)
    {
        $this->hora = $hora;
        $this->asignatura = $asignatura;
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $asignaturaElegida = request('asignatura');
        if($asignaturaElegida == 0)
            $query = $this->hora->obtenerHoras($id);
        else
            $query = $this->hora->obtenerHorasPorAsignatura($id, $asignaturaElegida);
        $asignaturas = $this->asignatura->obtenerAsignaturasPorUsuario($id);
        return view("horas", ["horas" => $query, "asignaturas" => $asignaturas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user()->id;
        $asignaturas = $this->asignatura->obtenerAsignaturasPorUsuario($id);
        return view("horas/crear",["asignaturas" => $asignaturas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "diaH" => "required",
            "codAs" => "required",
            "horaH" => "required"
        ]);

        $hora = new Hora([
            "diaH" => $request->get("diaH"),
            "codAs" => $request->get("codAs"),
            "horaH" => $request->get("horaH")
        ]);

        $hora->save();

        return redirect()->action([HoraController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($dia, $hora)
    {
        $id = Auth::user()->id;
        $query = $this -> hora -> obtenerHora($id, $dia, $hora);
        $hora = $query[0];
        return view("horas/mostrar", ["hora" => $hora]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($dia, $hora)
    {
        $id = Auth::user()->id;
        $asignaturas = $this->asignatura->obtenerAsignaturasPorUsuario($id);
        $hora = $this->hora->obtenerHora($id, $dia, $hora);
        $hora = $hora[0];
        return view("horas/editar", ["hora" => $hora, "asignaturas" => $asignaturas]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $asignatura,$dia, $hora)
    {
        $id = Auth::user()->id;
        $request->validate([
            "codAs" => "required",
            "diaH" => "required",
            "horaH" => "required"
        ]);

        DB::table('horas')->where('diaH', $dia)->where('horaH', $hora)->where('codAs', $asignatura)->update([
            "codAs" => $request->get("codAs"),
            "diaH" => $request->get("diaH"),
            "horaH" => $request->get("horaH"),
        ]);

        return redirect()->action([HoraController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($asignatura, $dia, $hora)
    {
        DB::table('horas')->where('diaH', $dia)->where('horaH', $hora)->where('codAs', $asignatura)->delete();
        return redirect()->action([HoraController::class, 'index']);
    }
}

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
        $this->middleware('auth');
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

    public function sacarAsignatura()
    {
        $id = Auth::user()->id;
        // query para obtener todos los datos de la tabla horas y asignaturas

        $lunesPrimeraHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Lunes', '8:15-9:15');
        $lunesSegundaHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Lunes', '9:15-10:15');
        $lunesTerceraHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Lunes', '10:15-11:15');
        $lunesCuartaHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Lunes', '11:45-12:45');
        $lunesQuintaHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Lunes', '12:45-13:45');
        $lunesSextaHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Lunes', '13:45-14:45');

        

        $martesPrimeraHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Martes', '8:15-9:15');
        $martesSegundaHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Martes', '9:15-10:15');
        $martesTerceraHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Martes', '10:15-11:15');
        $martesCuartaHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Martes', '11:45-12:45');
        $martesQuintaHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Martes', '12:45-13:45');
        $martesSextaHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Martes', '13:45-14:45');


        $miercolesPrimeraHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Miercoles', '8:15-9:15');
        $miercolesSegundaHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Miercoles', '9:15-10:15');
        $miercolesTerceraHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Miercoles', '10:15-11:15');
        $miercolesCuartaHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Miercoles', '11:45-12:45');
        $miercolesQuintaHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Miercoles', '12:45-13:45');
        $miercolesSextaHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Miercoles', '13:45-14:45');

        $juevesPrimeraHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Jueves', '8:15-9:15');
        $juevesSegundaHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Jueves', '9:15-10:15');
        $juevesTerceraHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Jueves', '10:15-11:15');
        $juevesCuartaHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Jueves', '11:45-12:45');
        $juevesQuintaHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Jueves', '12:45-13:45');
        $juevesSextaHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Jueves', '13:45-14:45');

        $viernesPrimeraHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Viernes', '8:15-9:15');
        $viernesSegundaHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Viernes', '9:15-10:15');
        $viernesTerceraHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Viernes', '10:15-11:15');
        $viernesCuartaHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Viernes', '11:45-12:45');
        $viernesQuintaHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Viernes', '12:45-13:45');
        $viernesSextaHora = $this->Asignaturas->obtenerAsignaturasPorDiaHora('Viernes', '13:45-14:45');


        return view("horario", [
            "lunesPrimeraHora" => $lunesPrimeraHora,
            "lunesSegundaHora" => $lunesSegundaHora,
            "lunesTerceraHora" => $lunesTerceraHora,
            "lunesCuartaHora" => $lunesCuartaHora,
            "lunesQuintaHora" => $lunesQuintaHora,
            "lunesSextaHora" => $lunesSextaHora,

            "martesPrimeraHora" => $martesPrimeraHora,
            "martesSegundaHora" => $martesSegundaHora,
            "martesTerceraHora" => $martesTerceraHora,
            "martesCuartaHora" => $martesCuartaHora,
            "martesQuintaHora" => $martesQuintaHora,
            "martesSextaHora" => $martesSextaHora,

            "miercolesPrimeraHora" => $miercolesPrimeraHora,
            "miercolesSegundaHora" => $miercolesSegundaHora,
            "miercolesTerceraHora" => $miercolesTerceraHora,
            "miercolesCuartaHora" => $miercolesCuartaHora,
            "miercolesQuintaHora" => $miercolesQuintaHora,
            "miercolesSextaHora" => $miercolesSextaHora,

            "juevesPrimeraHora" => $juevesPrimeraHora,
            "juevesSegundaHora" => $juevesSegundaHora,
            "juevesTerceraHora" => $juevesTerceraHora,
            "juevesCuartaHora" => $juevesCuartaHora,
            "juevesQuintaHora" => $juevesQuintaHora,
            "juevesSextaHora" => $juevesSextaHora,

            "viernesPrimeraHora" => $viernesPrimeraHora,
            "viernesSegundaHora" => $viernesSegundaHora,
            "viernesTerceraHora" => $viernesTerceraHora,
            "viernesCuartaHora" => $viernesCuartaHora,
            "viernesQuintaHora" => $viernesQuintaHora,
            "viernesSextaHora" => $viernesSextaHora,
        ]);
        
    }
}

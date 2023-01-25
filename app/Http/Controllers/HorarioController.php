<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Asignatura;

class HorarioController extends Controller
{
    protected $asignatura;
    // Este controlador se encarga de mostrar el horario del usuario
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Asignatura $asignatura)
    {
        $this->asignatura = $asignatura;
        $this->middleware('auth');
    }

    public function index()
    {
        $id = Auth::user()->id;
        // query para obtener todos los datos de la tabla horas y asignaturas

        $lunesPrimeraHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Lunes', '8:15-9:15');
        $lunesSegundaHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Lunes', '9:15-10:15');
        $lunesTerceraHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Lunes', '10:15-11:15');
        $lunesCuartaHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Lunes', '11:45-12:45');
        $lunesQuintaHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Lunes', '12:45-13:45');
        $lunesSextaHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Lunes', '13:45-14:45');

        

        $martesPrimeraHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Martes', '8:15-9:15');
        $martesSegundaHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Martes', '9:15-10:15');
        $martesTerceraHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Martes', '10:15-11:15');
        $martesCuartaHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Martes', '11:45-12:45');
        $martesQuintaHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Martes', '12:45-13:45');
        $martesSextaHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Martes', '13:45-14:45');


        $miercolesPrimeraHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Miercoles', '8:15-9:15');
        $miercolesSegundaHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Miercoles', '9:15-10:15');
        $miercolesTerceraHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Miercoles', '10:15-11:15');
        $miercolesCuartaHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Miercoles', '11:45-12:45');
        $miercolesQuintaHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Miercoles', '12:45-13:45');
        $miercolesSextaHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Miercoles', '13:45-14:45');

        $juevesPrimeraHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Jueves', '8:15-9:15');
        $juevesSegundaHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Jueves', '9:15-10:15');
        $juevesTerceraHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Jueves', '10:15-11:15');
        $juevesCuartaHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Jueves', '11:45-12:45');
        $juevesQuintaHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Jueves', '12:45-13:45');
        $juevesSextaHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Jueves', '13:45-14:45');

        $viernesPrimeraHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Viernes', '8:15-9:15');
        $viernesSegundaHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Viernes', '9:15-10:15');
        $viernesTerceraHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Viernes', '10:15-11:15');
        $viernesCuartaHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Viernes', '11:45-12:45');
        $viernesQuintaHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Viernes', '12:45-13:45');
        $viernesSextaHora = $this->asignatura->obtenerAsignaturaPorDiaHora('Viernes', '13:45-14:45');


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
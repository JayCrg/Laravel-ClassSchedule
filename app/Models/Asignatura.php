<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class Asignatura extends Model
{
    use HasFactory;
    protected $table = "asignaturas";
    protected $fillable = ['nombreAs', 'nombreCortoAs', 'profesorAs', 'colorAs', 'user_id'];
    protected $hidden = ['codAs', 'created_at','updated_at'];
    protected $primaryKey = 'codAs';
    public function obtenerAsignaturas()
    {
        return Asignatura::all();
    }
    public function obtenerAsignaturaPorCodAs($codAs)
    {
        return Asignatura::find($codAs);
    }
    public function obtenerAsignaturasPorUsuario($id)
    {
        return Asignatura::where('user_id', $id)->get();
    }

    public function obtenerUltimoID()
    {
        return Asignatura::orderBy('codAs', 'desc')->first();
    }

    public function obtenerAsignaturaPorDiaHora($dia, $hora)
    {
        $id = Auth::user()->id;
        $query = DB::table('horas')
            ->join('asignaturas', 'horas.codAs', '=', 'asignaturas.codAs')
            ->where('asignaturas.user_id', $id)
            ->where('horas.diaH', $dia)
            ->where('horas.horaH', $hora)
            ->first();
        return $query;
    }

    public function horas(){
        return $this->hasMany(Hora::class, 'codAs', 'codAs');
    }
}


// <input type="text" value="{{ (Auth::user()->id) }}">
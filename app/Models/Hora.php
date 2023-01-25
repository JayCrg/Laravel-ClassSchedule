<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Hora extends Model
{
    use HasFactory;
    protected $table = "horas";
    protected $fillable = ['diaH', 'codAs', 'horaH'];
    // protected $hidden = ['created_at', 'updated_at'];
    public function obtenerHoras($id){
        $query = DB::table('horas')
            ->join('asignaturas', 'horas.codAs', '=', 'asignaturas.codAs')
            ->where('asignaturas.user_id', $id)
            ->orderBy('horas.diaH')
            ->orderBy('horas.horaH')
            ->get();
        return $query;
    }

    public function obtenerHorasPorDia($id, $dia){
        $query = DB::table('horas')
            ->join('asignaturas', 'horas.codAs', '=', 'asignaturas.codAs')
            ->where('asignaturas.user_id', $id)
            ->where('horas.diaH', $dia)
            ->orderBy('horas.horaH')
            ->get();
        return $query;
    }

    public function obtenerHorasPorAsignatura($id, $asignatura){
        $query = DB::table('horas')
            ->join('asignaturas', 'horas.codAs', '=', 'asignaturas.codAs')
            ->where('asignaturas.user_id', $id)
            ->where('horas.codigoAs', $asignatura)
            ->orderBy('horas.diaH')
            ->orderBy('horas.horaH')
            ->get();
        return $query;
    }

    public function obtenerHora($id, $dia, $hora){
        $query = DB::table('horas')
            ->join('asignaturas', 'horas.codAs', '=', 'asignaturas.codAs')
            ->where('asignaturas.user_id', $id)
            ->where('horas.diaH', $dia)
            ->where('horas.horaH', $hora)
            ->get();
        return $query;
    }

    public function asignatura(){
        return $this->belongsTo(Asignatura::class, 'codAs');
    }
}


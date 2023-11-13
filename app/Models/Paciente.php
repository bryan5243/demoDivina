<?php

namespace App\Models;

use App\Models\Chequeomedico;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'paciente';
    protected $fillable = [
        'nombres',
        'apellidos',
        'cedula',
        'estado',
        'sexo',
        'edad',
        'porcentajediscapacidad',
        'estadocivil',
        'fechanacimiento',
        'profesion',
        'instruccion',
        'nacionalidad',
        'religion',
        'registroconadis',
        'fechaingreso',
        'horaingreso',
        'tipodiscapacidad',
        'tipocedula',
        'foto',
    ];
    public $timestamps = false;
    public function chequeosMedicos()
    {
        return $this->hasMany(Chequeomedico::class, 'id_paciente');
    }
}

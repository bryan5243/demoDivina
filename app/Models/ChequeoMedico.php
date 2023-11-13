<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChequeoMedico extends Model
{
    use HasFactory;

    protected $table = 'chequeomedico';
    public $timestamps = false; // Aquí desactivamos los timestamps

    protected $fillable = [
        'fecha',
        'hora',
        'notapreocupacion',
        'id_paciente',
        'diagnostico',
    ];
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }
}
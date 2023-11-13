<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;

    protected $table = 'examenes';
     public $timestamps = false;

    protected $fillable = [
        'id',
        'tipo',
        'foto',
        'id_paciente'
    
    ];
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }
}

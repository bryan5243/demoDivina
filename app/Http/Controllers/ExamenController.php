<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Examen;
use Intervention\Image\Facades\Image;

class ExamenController extends Controller
{
    public function listar()
    {
        $examenes = Examen::join('paciente', 'examenes.id_paciente', '=', 'paciente.id')
            ->select('examenes.id', 'examenes.tipo', 'paciente.id')
            ->get();
    
        return $examenes;
        
    }

    public function cargarDatos($id)
    {
        $examen = Examen::find($id);

        if (!$examen) {
            return response()->json(['message' => 'Chequeo médico no encontrado'], 404);
        }

        return response()->json($examen);
    }
    
}

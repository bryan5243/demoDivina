<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChequeoMedico;

class ChequeoMedicoController extends Controller
{
    public function listar()
    {
        $ultimosChequeos = ChequeoMedico::join('paciente', 'chequeomedico.id_paciente', '=', 'paciente.id')
            ->select('chequeomedico.*', 'paciente.nombres', 'paciente.apellidos', 'paciente.cedula')
            ->whereIn('chequeomedico.id', function ($query) {
                $query->selectRaw('MAX(id)')
                    ->from('chequeomedico')
                    ->groupBy('id_paciente');
            })
            ->get();
    
        return $ultimosChequeos;
    }
    

    public function cargarDatos($id)
    {
        $chequeo = ChequeoMedico::find($id);

        if (!$chequeo) {
            return response()->json(['message' => 'Chequeo médico no encontrado'], 404);
        }

        return response()->json($chequeo);
    }
}

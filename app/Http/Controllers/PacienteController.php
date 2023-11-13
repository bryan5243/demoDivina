<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use Intervention\Image\Facades\Image;

class PacienteController extends Controller
{
    public function listar()
    {
        $pacientes = Paciente::select('id', 'nombres', 'apellidos', 'cedula', 'estado', 'sexo', 'edad', 'porcentajediscapacidad', 'estadocivil', 'fechanacimiento', 'profesion', 'instruccion', 'nacionalidad', 'religion', 'registroconadis', 'fechaingreso', 'horaingreso', 'tipodiscapacidad', 'tipocedula', 'foto')
            ->whereExists(function ($query) {
                $query->select('id_paciente')
                    ->from('chequeomedico')
                    ->whereRaw('paciente.id = chequeomedico.id_paciente');
            })
            ->get();

        foreach ($pacientes as $paciente) {
            if ($paciente->foto !== null) {
                // Cargar la imagen desde la base de datos
                $imagen = Image::make($paciente->foto);

                // Redimensionar la imagen a un tamaño específico (por ejemplo, 150x150 píxeles)
                $imagen->resize(150, 150);

                // Codificar la imagen redimensionada en formato base64
                $base64Imagen = base64_encode($imagen->encode('jpg'));

                // Asignar la imagen codificada al atributo 'foto' del paciente
                $paciente->foto = $base64Imagen;
            }
        }

        return response()->json($pacientes);
    }
    public function actualizar(Request $request, $id)
    {
        // Obtener el paciente con el ID proporcionado
        $paciente = Paciente::findOrFail($id);

        // Validar y actualizar los campos recibidos en la solicitud
        $paciente->nombres = $request->input('nombres', $paciente->nombres);
        $paciente->apellidos = $request->input('apellidos', $paciente->apellidos);
        $paciente->cedula = $request->input('cedula', $paciente->cedula);
        $paciente->estado = $request->input('estado', $paciente->estado);

        // Guardar los cambios en la base de datos
        $paciente->save();

        // Devolver una respuesta en formato JSON
        return response()->json(['message' => 'Paciente actualizado correctamente']);
    }
    public function buscarPorCedula(Request $request)
    {
        $cedula = $request->input('cedula');

        $paciente = Paciente::select('id', 'nombres', 'apellidos', 'cedula', 'estado', 'sexo', 'edad', 'porcentajediscapacidad', 'estadocivil', 'fechanacimiento', 'profesion', 'instruccion', 'nacionalidad', 'religion', 'registroconadis', 'fechaingreso', 'horaingreso', 'tipodiscapacidad', 'tipocedula', 'foto')
            ->where('cedula', $cedula)
            ->first();

        if ($paciente) {
            if ($paciente->foto !== null) {
                // Cargar la imagen desde la base de datos
                $imagen = Image::make($paciente->foto);

                // Redimensionar la imagen a un tamaño específico (por ejemplo, 150x150 píxeles)
                $imagen->resize(150, 150);

                // Codificar la imagen redimensionada en formato base64
                $base64Imagen = base64_encode($imagen->encode('jpg'));

                // Asignar la imagen codificada al atributo 'foto' del paciente
                $paciente->foto = $base64Imagen;
            }

            return response()->json([
                'success' => true,
                'paciente' => $paciente,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Paciente no encontrado',
            ], 404);
        }
    }

}

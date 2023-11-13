<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Intervention\Image\Facades\Image;

class UsuarioController extends Controller
{


    public function listar()
    {
        $usuarios = Usuario::all(['id', 'usuario', 'contrasena', 'rol', 'estado'])->toArray();
    
        return $usuarios;
    }
    



    public function guardar(Request $request)
    {

        $usuario = new Usuario();
        $usuario->usuario = $request->usuario;
        $usuario->contrasena = $request->contrasena;
        $usuario->rol = $request->rol;
        $usuario->estado = true;

        $usuario->save();

        return response()->json(['message' => 'Usuario registrado exitosamente'], 200);
    }

    public function actualizar(Request $request, $id)
    {
        // Buscar el usuario existente por su ID
        $usuario = Usuario::findOrFail($id);

        // Actualizar los atributos del usuario con los valores del Request
        $usuario->usuario = $request->usuario;
        $usuario->contrasena = $request->contrasena;
        $usuario->rol = $request->rol;
        $usuario->estado = $request->estado;
        $usuario->save();
        return $usuario;
    }
    public function login(Request $request)
    {
        $request->validate([
            'usuario' => 'required|string',
            'contrasena' => 'required|string',
        ]);

        $usuario = Usuario::where('usuario', $request->usuario)->first();

        if ($usuario && $usuario->contrasena === $request->contrasena) {
            // Autenticación exitosa
            return response()->json([
                'success' => true,
                'message' => 'Login exitoso',
            ]);
        } else {
            // Autenticación fallida
            return response()->json([
                'success' => false,
                'message' => 'Credenciales inválidas',
            ], 401);
        }
    }


    // Aquí puedes agregar los demás métodos para las operaciones CRUD, si es necesario
}

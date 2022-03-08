<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

/**
 * Class UsuarioController
 * @package App\Http\Controllers
 */
class UsuarioController extends Controller
{
    public function getUsuario()
    {
        #mostrar solo usuario inactive
        $usuarios = Usuario::where('estado', '=', 'active')->get();
        return response()->json($usuarios);
    }
    public function getUsuarioId($id)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response()->json(['mensaje' => 'No se encontró el usuario'], 404);
        }
        return response()->json($usuario);
    }
    public function newUsuario()
    {
        $usuario = new Usuario();
        $usuario->correo = request('correo');
        $usuario->password = request('password');
        $usuario->nombre = request('nombre');
        $usuario->save();
        return response()->json($usuario);
    }
    public function updateUsuario()
    {
        $usuario = Usuario::find(request('id'));
        $usuario->correo = request('correo');
        $usuario->password = request('password');
        $usuario->nombre = request('nombre');
        $usuario->save();
        return response()->json($usuario);
    }
    public function deleteUsuario($id)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response()->json(['mensaje' => 'No se encontró el usuario'], 404);
        }
        #cambiar estado de usuario a inactive
        $usuario->estado = 'inactive';
        $usuario->save();
        return response()->json(['mensaje' => 'Usuario eliminado']);
    }
}

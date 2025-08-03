<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = DB::table('usuarios')
                        ->select(SELECT_USUARIOS_NIVEIS)
                        ->join('niveis', 'usuarios.nivel', '=', 'niveis.id')
                        ->whereNot('usuarios.id', session('user.id'))
                        ->get();
        $dados = [
            'breadcrumb' => $this->breadcrumb([
                ['usuarios', route('usuario')], ['Lista']
            ]),
            'titulo' => 'Lista de Usuários',
            'activeLista' => 'active',
            'usuarios' => $usuarios,
        ];
        return view('usuario.index', $dados);
    }
}

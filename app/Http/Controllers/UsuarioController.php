<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function index()
    {
        $dados = [
            'breadcrumb' => $this->breadcrumb([
                ['usuarios', route('usuario')], ['Lista']
            ]),
            'titulo' => 'Lista de Usuários',
            'activeLista' => 'active',
            'usuarios' => $this->getUsuarioTabela()
        ];
        return view('usuario.index', $dados);
    }

    public function listar()
    {
         return view('usuario.tabela', ['usuarios' => $this->getUsuarioTabela()]);
    }

    public function bloquear(Request $request)
    {
        if(DB::table('usuarios')->where('id', $request['id'])->update(['ativo' => $request['ativo']])){
            return 'success';
        } else {
            return 'erro';
        }
    }

    private function getUsuarioTabela()
    {
        return DB::table('usuarios')
                        ->select(SELECT_USUARIOS_NIVEIS)
                        ->join('niveis', 'usuarios.nivel', '=', 'niveis.id')
                        ->whereNot('usuarios.id', session('user.id'))
                        ->get();
    }
}

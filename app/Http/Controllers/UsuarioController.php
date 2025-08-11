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

    public function salvar(Request $request)
    {
        $retorno = [];
        if($this->pesquisa('email', $request['email'], $request['id']) > 0) $retorno['email'] = 'O e-mail já cadastrado';
        if($this->pesquisa('telefone', $request['telefone'], $request['id']) > 0) $retorno['telefone'] = 'O telefone já cadastrado';
        if(count($retorno) > 0) return json_encode($retorno);

        $senha = md5(mb_substr($request['telefone'], -4));
        $dados = [
            'nome' => $request['nome'],
            'email' => $request['email'],
            'telefone' => $request['telefone'],
            'endereco' => $request['endereco'],
            'senha' => $senha,
            'config' => session('user.config'),
        ];

        try {
            if($request['id'] != ''){
            DB::table('usuarios')->where('id', $request['id'])->update($dados);
            return 'success';
            } else {
                DB::table('usuarios')->insert($dados);
                return 'success';
            }
            return 'erro';
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function deletar(Request $request)
    {
        try {
            if($request['id'] != ''){
            DB::table('usuarios')->where('id', $request['id'])->update(['deletado' => 1]);
            return 'success';
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    private function pesquisa($item, $valor, $id)
    {
        $where = [
            [$item, $valor]
        ];
        if($id != '') $where[] = ['id', '!=', $id];
        return DB::table('usuarios')->where($where)->count();
    }

    private function getUsuarioTabela()
    {
        return DB::table('usuarios')
                        ->select(SELECT_USUARIOS_NIVEIS)
                        ->join('niveis', 'usuarios.nivel', '=', 'niveis.id')
                        ->where('usuarios.deletado', 0)
                        ->whereNot('usuarios.id', session('user.id'))
                        ->get();
    }
}

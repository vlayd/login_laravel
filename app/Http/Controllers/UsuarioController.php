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
                ['Usuários', route('usuario')], ['Lista']
            ]),
            'niveis' => DB::table('niveis')->get(),
        ];
        return view('usuario.index', $dados);

    }

    public function listar()
    {
        $dados = [
            'usuarios' => $this->getTabela(),
            'niveis' => DB::table('niveis')->get(),
        ];
        return view('usuario.tabela', $dados);
    }

    public function bloquear(Request $request)
    {
        if(DB::table('usuarios')->where('id', $request['id'])->update(['ativo' => $request['ativo']])){
            return 'success';
        } else {
            return 'erro';
        }
    }

    public function findEmailTelefone(Request $request):array
    {
        $retorno = [];
        if($this->pesquisa('email', $request['email'], $request['id'], 'usuarios') > 0) $retorno['email'] = 'O e-mail já cadastrado';
        if($this->pesquisa('telefone', $request['telefone'], $request['id'], 'usuarios') > 0) $retorno['telefone'] = 'O telefone já cadastrado';
        return $retorno;
    }

    public function salvar(Request $request)
    {
        $erros = $this->findEmailTelefone($request);
        if(count($erros) > 0) return json_encode($erros);
        $dados = [
            'nome' => $request['nome'],
            'email' => $request['email'],
            'telefone' => $request['telefone'],
            'endereco' => $request['endereco'],
            'nivel' => $request['nivel'],
        ];

        try {
            if($request['id'] != ''){
                if($request->hasFile('foto')){
                    $old = isset($request['old'])?$request['old']:'';
                    $dados['foto'] = $this->uploadFile($request->file('foto'), PATH_PERFIL.$request['id'], $old);
                }
                DB::table('usuarios')->where('id', $request['id'])->update($dados);
                return 'success';
            } else {
                $senha = md5(mb_substr($request['telefone'], -4));
                $dados['senha'] = $senha;
                $dados['config'] = session('user.config');
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
            return 'erro ' . $th->getMessage();
        }
    }

    private function getTabela()
    {
        return DB::table('usuarios')
                        ->select(SELECT_USUARIOS_NIVEIS_PERMISSOES)
                        ->join('niveis', 'usuarios.nivel', '=', 'niveis.id')
                        ->where('usuarios.deletado', 0)
                        ->whereNot('usuarios.id', session('user.id')) //Não consta o usuário logado
                        ->get();
    }
}

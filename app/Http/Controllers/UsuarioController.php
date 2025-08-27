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
            'grupos' => DB::table('acessos')
                            ->select(['grupo_acessos.nome as nome', 'grupo_acessos.id as id'])
                            ->join('grupo_acessos', 'acessos.grupo', '=', 'grupo_acessos.id', 'left')
                            ->groupBy('acessos.grupo')
                            ->orderBy('acessos.grupo')
                            ->get(),
            'acessos' => DB::table('acessos')->orderBy('grupo')->get(),
        ];
        return view('usuario.index', $dados);

    }

    public function listar()
    {
        $dados = [
            'usuarios' => $this->getTabela(),
        ];
        return view('usuario.tabela', ['usuarios' => $this->getTabela()]);
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

    public function salvarPermissoes(Request $request)
    {
        //Extrai só os valores do array, deixando a chave de fora
        $permissoes = array_values($request->post());
        //Para remover o primeiro item que é csrf token
        array_shift($permissoes);
        //Para remover o primeiro item que é id do usuário
        array_pop($permissoes);
        // dd($permissoes);
        if($permissoes == []){
            DB::table('usuarios_permissoes')->where(['id_usuario' => $request['id']])->delete();
        } else {
            DB::table('usuarios_permissoes')->updateOrInsert(
                [
                    'id_usuario' => $request['id']
                ],
                [
                    'id_usuario' => $request['id'],
                    'permissoes' => $permissoes == [] ? '[]' : json_encode($permissoes[0]), //[0] Elimina o erro de array de array
                ]
            );
        }


        return redirect()->back();
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
                        ->join('usuarios_permissoes', 'usuarios.id', '=', 'usuarios_permissoes.id_usuario', 'left')
                        ->where('usuarios.deletado', 0)
                        ->whereNot('usuarios.id', session('user.id')) //Não consta o usuário logado
                        ->get();
    }
}

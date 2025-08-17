<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrupoController extends Controller
{
    public function index()
    {
        $dados = [
            'breadcrumb' => $this->breadcrumb([
                ['Grupos', route('grupo')], ['Lista']
            ]),
            'titulo' => 'Lista de Usuários',
            'activeLista' => 'active',
        ];
        return view('grupo.index', $dados);
    }

    public function listar()
    {
         return view('grupo.tabela', ['grupos' => $this->getTabela()]);
    }

    public function salvar(Request $request)
    {
        $erros = $this->findNome($request['nome'], $request['id'], 'grupo_acessos');
        if(count($erros) > 0) return json_encode($erros);
        $dados = [
            'nome' => $request['nome'],
        ];

        try {
            if(!empty($request['id'])){
                DB::table('grupo_acessos')->where('id', $request['id'])->update($dados);
                return 'success';
            } else {
                $dados['config'] = session('user.config');
                DB::table('grupo_acessos')->insert($dados);
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
            DB::table('grupo_acessos')->delete($request['id']);
            return 'success';
            }
        } catch (\Throwable $th) {
            return 'erro ' . $th->getMessage();
        }
    }


    private function getTabela()
    {
        return DB::table('grupo_acessos')->get();
    }
}

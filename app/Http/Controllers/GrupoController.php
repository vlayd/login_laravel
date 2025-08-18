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
        ];
        return view('grupo.index', $dados);
    }

    public function listar()
    {
        return view('grupo.tabela', [
            'grupos' => $this->getTabela(),
            'qtdAcessoSemGrupo' => DB::table('acessos')->where('grupo', 0)->count(),
        ]);
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

    private function getTabela($tabela = 'grupo_acessos')
    {
        try {
            return DB::table('grupo_acessos')
                    ->select(['grupo_acessos.id', 'grupo_acessos.nome'])
                    ->selectRaw('COUNT(grupo_acessos.nome) AS qtdAcessos')
                    ->join('acessos', 'grupo_acessos.id', '=', 'acessos.grupo')
                    ->groupBy('grupo_acessos.nome', 'grupo_acessos.id')
                    ->get();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}

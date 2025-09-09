<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NivelController extends Controller
{
    public function index()
    {
        $dados = [
            'breadcrumb' => $this->breadcrumb([
                ['Níveis', route('nivel')], ['Lista']
            ]),
            'grupos' => DB::table('acessos')
                            ->select(['grupo_acessos.nome as nome', 'grupo_acessos.id as id'])
                            ->join('grupo_acessos', 'acessos.grupo', '=', 'grupo_acessos.id', 'left')
                            ->groupBy('acessos.grupo')
                            ->orderBy('acessos.grupo')
                            ->get(),
            'acessos' => DB::table('acessos')->orderBy('grupo')->get(),
        ];
        return view('nivel.index', $dados);
    }

    public function listar()
    {
        return view('nivel.tabela', [
            'niveis' => $this->getTabela(),
        ]);
    }

    public function salvar(Request $request)
    {
        $erros = $this->findNome($request['nome'], $request['id'], 'niveis');
        if(count($erros) > 0) return json_encode($erros);
        $dados = [
            'nome' => $request['nome'],
        ];

        try {
            if(!empty($request['id'])){
                DB::table('niveis')->where('id', $request['id'])->update($dados);
                return 'success';
            } else {
                $dados['config'] = session('user.config');
                DB::table('niveis')->insert($dados);
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
        $acessos = null;
        if($permissoes != []) $acessos = json_encode($permissoes[0]);
        DB::table('niveis')->where(['id' => $request['id']])->update(['acessos' => $acessos]);
        return redirect()->back();
    }

    private function getTabela()
    {
        try {
            return DB::table('niveis')->where('config', session('user.config'))->whereNot('id', 1)->get();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}

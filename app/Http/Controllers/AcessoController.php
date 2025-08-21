<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcessoController extends Controller
{
    private $textItem = 'Acessos';

    public function index()
    {
        $dados = [
            'breadcrumb' => $this->breadcrumb([
                ['Acessos', route('acesso')], ['Lista']
            ]),
            'titulo' => 'Lista de Acessos',
            'grupos' => DB::table('grupo_acessos')->get(),
        ];
        return view('acesso.index', $dados);
    }

    public function listar()
    {
         return view('acesso.tabela', [
            'acessos' => $this->getTabelaAcesso(),
        ]);
    }

    public function salvar(Request $request)
    {
        $erros = $this->findNome($request['nome'], $request['id'], 'acessos');
        if(count($erros) > 0) return json_encode($erros);
        $dados = [
            'nome' => $request['nome'],
            'chave' => $request['chave'],
            'grupo' => $request['grupo'],
        ];

        try {
            if(!empty($request['id'])){
                DB::table('acessos')->where('id', $request['id'])->update($dados);
                return 'success';
            } else {
                $dados['config'] = session('user.config');
                DB::table('acessos')->insert($dados);
                return 'success';
            }
            return 'erro';
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }


    private function getTabelaAcesso()
    {
        return DB::table('acessos')
                    ->select(SELECT_ACESSOS_GRUPO)
                    ->join('grupo_acessos', 'acessos.grupo', '=', 'grupo_acessos.id', 'left')->get();
    }
}

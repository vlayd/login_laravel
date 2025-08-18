<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcessoController extends Controller
{
    private $tabela = 'acessos';
    private $item = 'acesso';
    private $textItem = 'Acessos';

    public function index()
    {
        $dados = [
            'breadcrumb' => $this->breadcrumb([
                [$this->textItem, route($this->item)], ['Lista']
            ]),
            'titulo' => 'Lista de '.$this->textItem,
            'items' => $this->getTabela('grupo_acessos'),
            'nomeItem' => 'Grupos'
        ];
        return view($this->item.'.index', $dados);
    }

    public function listar()
    {
         return view($this->item.'.tabela', [
            $this->tabela => $this->getTabela($this->tabela),
        ]);
    }


    private function getTabela($tabela)
    {
        return DB::table($tabela)->get();
    }
}

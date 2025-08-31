<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        if(!session('user')){
            return view('login.index');
        }
        if(session('user.nivel') != 2){
            if(COUNT_PERMISSOES == 0) return redirect()->route('page404');
            else {
                //Pega somente a primeira permissão (id)
                $permissao1 = json_decode(PERMISSOES->permissoes)[0];
                if($permissao1 != 1){
                    //Pega o chave dessa acesso pela permissao
                    $permissaoHome = DB::table('acessos')->select('chave')->where('id', $permissao1)->first()->chave;
                    // die($permissaoHome);
                    return redirect()->route($permissaoHome);
                }
            }
        }


        return view('home.index');
    }

    public function page404()
    {
        return view('layouts.page_404');
    }
}

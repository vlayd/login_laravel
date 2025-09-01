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
                //Pega somente a primeira permissão (route)
                $permissao1 = json_decode(PERMISSOES->permissoes)[0];
                //Evita o bug do redirect
                if($permissao1 != 'index') return redirect()->route($permissao1);
            }
        }

        return view('home.index');
    }

    public function page404()
    {
        return view('layouts.page_404');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        //form validation (duas maneiras: paipe | e array [])

        $request->validate(
            //rules
            [
                'email' => 'required',
                'senha' => 'required',
            ],
            //error messages
            [
                'email.required' => ' O e-mail obrigatório!',
                'senha.required' => 'A senha é obrigatória!'
            ]
        );

        //get user input
        // $cpf = $request->input('cpf');
        $email = $request['email'];
        $senha = $request['senha'];

        //check if user exists
        $user = DB::table('usuarios')->where('email', $email)->first();
        if(!$user) return $this->loginError('Usuário não cadastrado!');
        if($user->ativo == '0')return $this->loginError('Usuário não autorizado!');
        $user = DB::table('usuarios')->select(SELECT_USUARIOS_NIVEIS)->where(['email'=> $email, 'senha'=> md5($senha)])
                        ->join('niveis', 'usuarios.nivel', '=', 'niveis.id')->first();
        if(!$user)return $this->loginError('Dados incorretos!');
        // dd($user);

        //login user
        session([
            'user' => [
                'id' => $user->id,
                'config' => $user->config,
                'nivel' => $user->idNivel,
                'nome_nivel' => $user->nivel,
            ]
        ]);

        return redirect()->to('/');
    }

    private function loginError(string $message)
    {
        return redirect()
        ->back()
        ->withInput()
        ->with('loginError', $message);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');
        // session()->forget('user');
        return redirect()->to('/');
    }
}

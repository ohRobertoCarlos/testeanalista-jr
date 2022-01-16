<?php

namespace App\Http\Controllers;

use App\User;
use App\Perfis\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('app.admin.index', ['users' => $users]);
    }

    /**
     * Devolver view para criar Usuário
     *
     * @return void
     */
    public function create()
    {
        $perfis = Perfil::PERFIS;

        return view('auth.register', ['perfis' => $perfis]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'password' => 'required|confirmed',
            'email' => 'required|email',
            'perfil' => 'required|integer'
        ],[
            'name.min' => 'O nome tem no mínimo 2 caracteres',
            'required' => 'O campo :attribute é requerido',
            'password.confirmed' => 'Confime a senha para continuar',
            'perfil.integer' => 'selecione um perfil para o usuário',
        ]);

        User::create($request->all());

        return redirect()->route('admin');
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        $perfis = Perfil::PERFIS;

        return view('app.admin.edit', ['user' => $user, 'perfis' => $perfis]);
    }

    public function update(Request $request,$id)
    {
        $user = User::find($id);
        $dados = [
            'name' => $request->nome,
            'email' => $request->email,
            'perfil' => $request->perfil,
        ];

        if ($request->password != null) {
            $dados['password'] = Hash::make($request->password);
        }

        $user->update($dados);

        return redirect()->route('admin');
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('admin');
    }

}

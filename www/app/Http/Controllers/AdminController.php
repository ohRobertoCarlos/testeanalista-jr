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
    public function register()
    {
        $perfis = Perfil::PERFIS;
        return view('auth.register', ['perfis' => $perfis]);
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

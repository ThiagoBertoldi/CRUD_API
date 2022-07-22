<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Client\Response;

class UserController extends Controller
{
    public function newUser()
    {
        return view('newUser');
    }

    public function createUser(Request $request)
    {

        $message = [
            'name.required' => 'Nome não pode estar em branco',
            'name.max' => 'Nome é muito grande',
            'name.min' => 'Nome é muito pequeno',
            'username.unique' => 'Nome de usuário já cadastrado',
            'username.required' => 'Nome de usuário não pode estar em branco',
            'username.max' => 'Nome de usuário é muito grande',
            'username.min' => 'Nome de usuário é muito pequeno',
            'email.required' => 'Email não pode estar em branco',
            'email.unique' => 'Email já cadastrado',
            'password.required' => 'Senha não pode estar em branco',
            'password.min' => 'Senha é muito fraca'
        ];

        $request->validate([
            'name' => 'required|max:255|min:4',
            'username' => 'required|max:255|min:4|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:6'
        ], $message);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password
        ]);

        $success = 'Usuário cadastrado com sucesso';
        return redirect('/')->with('success', $success);
    }

    public function editUser(Request $request)
    {

        if (!$user = User::find($request->id_user)) {
            $message = 'Algo deu errado!';
            return redirect('/', compact('message'));
        }

        return view('editUser', compact('user'));
    }

    public function validUser(Request $request)
    {

        $message = [
            'name.required' => 'Nome não pode estar em branco',
            'name.max' => 'Nome é muito grande',
            'name.min' => 'Nome é muito pequeno',
            'username.required' => 'Nome de usuário não pode estar em branco',
            'username.max' => 'Nome de usuário é muito grande',
            'username.min' => 'Nome de usuário é muito pequeno',
            'password_.required' => 'Senha não pode estar em branco',
            'password.required' => 'Nova senha não pode estar em branco',
            'password.min' => 'Nova senha é muito pequena'
        ];

        $request->validate([
            'name' => 'required|max:255|min:4',
            'username' => 'required|max:255|min:4',
            'password_' => 'required',
            'password' => 'required|min:6'
        ], $message);

        if (!$user = User::find($request->id)) {
            $fail = 'Algo deu errado, alteração não realizada';
            return redirect('/')->with('fail', $fail);
        }

        if ($request->password_ != $user->password) {
            $fail = 'Algo deu errado, alteração não realizada';
            return redirect('/')->with('fail', $fail);
        }

        $data = $request->only('name', 'username', 'password');
        $user->update($data);

        $success = 'Atualizado com sucesso';
        return redirect('/')->with('success', $success);
    }

    public function showUser(Request $request)
    {

        $user = User::find($request->id_user);

        return view('showUser', compact('user'));
    }

    public function deleteUser(Request $request)
    {
        if (!$user = User::find($request->id_user)) {
            $fail = 'Algo deu errado, deleção não realizada';
            return redirect('/')->with('fail', $fail);
        }

        $user->delete();
        $success = 'Usuário deletado com sucesso';
        return redirect('/')->with('success', $success);
    }
}

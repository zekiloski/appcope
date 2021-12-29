<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerfilUpdateRequest;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function update(PerfilUpdateRequest $request)
    {
        auth()->user()->update($request->only('name', 'email'));

        if($request->input('password')){
            auth()->user()->update([
                'password' => bcrypt($request->input('password'))
            ]);
        }
        return redirect()->route('perfil')->with('message', 'Perfil guardado exitosamente');
    }
}

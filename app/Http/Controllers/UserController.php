<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('is_super_admin', false)->get();
        return view('modules.user-management', compact('users'));
    }

    public function edit(User $user)
    {
        if ($user->is_super_admin) {
            abort(403, 'No puedes editar al Super Admin');
        }

        return view('modules.users-edit', [
            'user' => $user,
            'roles' => ['Administrador', 'Contable', 'Técnico'] 
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'role' => 'required|string|in:Administrador,Contable,Técnico',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password ? Hash::make($request->password) : $user->password
        ]);

        return redirect()->route('user-management')->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(User $user)
    {
        if ($user->is_super_admin) {
            return redirect()->route('user-management')
                   ->with('error', 'No se puede eliminar al Super Admin');
        }

        $user->delete();
        return redirect()->route('user-management')
               ->with('success', 'Usuario eliminado correctamente');
    }
}
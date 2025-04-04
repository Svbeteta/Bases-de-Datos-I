<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
   
    public function handle(Request $request, Closure $next, ...$roles)
{
    if (!Auth::check()) {
        return redirect('/login');
    }

    $user = Auth::user();
    
    $allowedRoles = explode(',', implode(',', $roles));
    

    Log::info('Verificación de roles', [
        'user_id' => $user->id,
        'user_role' => $user->role,
        'allowed_roles' => $allowedRoles,
        'is_super_admin' => $user->is_super_admin
    ]);

    // Permite acceso a super admin o si tiene el rol requerido
    if ($user->is_super_admin || in_array($user->role, $allowedRoles)) {
        return $next($request);
    }

    abort(403, 'No tienes permiso para acceder a este módulo');
}
}

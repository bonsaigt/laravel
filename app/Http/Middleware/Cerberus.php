<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Cerberus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user->hasRole('Super Admin')) {
            return $next($request);
        }

        $route_name  = $request->route()->action['as'];
        $permissions = $user->getAllPermissions()
            ->pluck('name')
            ->toArray();

        if (!in_array($route_name, $permissions)) {
            abort(401, "No tienes permisos para esta acción");
        }

        return $next($request);
    }
}

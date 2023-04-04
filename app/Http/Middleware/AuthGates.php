<?php

namespace App\Http\Middleware;

use App\ClientRoles;
use App\ClientPermissions;
use Closure;
use Illuminate\Support\Facades\Gate;

class AuthGates
{
    public function handle($request, Closure $next)
    {
        $user = \Auth::user();
        $iddd = !empty($user->roles_id) ? explode(',', $user->roles_id) : 0;
        
        if (!app()->runningInConsole() && $user) {
            $roles            = ClientRoles::with('permissions')->get();
            $permissionsArray = [];

            foreach ($roles as $role) {
                foreach ($role->permissions as $permissions) {
                    $permissionsArray[$permissions->title][] = $role->id;
                }
            }

            foreach ($permissionsArray as $title => $roles) {
                Gate::define($title, function (\App\User $user) use ($roles,$iddd) {
                    return count(array_intersect($iddd, $roles)) > 0;
                });
            }
        }

        return $next($request);
    }
}

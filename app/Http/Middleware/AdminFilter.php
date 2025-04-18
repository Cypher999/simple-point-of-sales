<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
class AdminFilter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session()->get('session_poc')){
            return redirect()->to('login');
        }
        $user = User::where('id',session()->get('session_poc'))->first();
        if(!$user){
            return redirect()->to('login');
        }
        if($user->role!="superadmin"){
            return redirect()->to('login');
        }
        return $next($request);
    }
}

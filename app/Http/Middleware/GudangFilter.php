<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
class GudangFilter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session()->get('session_poc')){
            return redirect()->to(url('/'));
        }
        $user = User::where('id',session()->get('session_poc'))->first();
        if(!$user){
            return redirect()->to(url('/'));
        }
        if($user->role!="admin gudang"){
            return redirect()->to(url('/'));
        }
        return $next($request);
    }
}

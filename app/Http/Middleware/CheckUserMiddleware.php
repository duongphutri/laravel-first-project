<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $id = Auth::id();
        $chucnangs = User::find($id)->chucnangs;

        foreach ($chucnangs as $chucnang) {
            if ($chucnang->nameroute == $request->route()->getName()) {
                return $next($request);
            }
        }
        return redirect()->back();
    }
}

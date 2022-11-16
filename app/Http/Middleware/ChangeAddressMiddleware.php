<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ChangeAddressMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $return=$next($request);
        $content=$return->content();
        $content=str_replace('[[address]]','Taikos prospektas 75A', $content);
        $return->setContent($content);
        return $return;
    }
}

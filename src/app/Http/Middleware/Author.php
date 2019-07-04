<?php

namespace App\Http\Middleware;

use App\Event;
use Closure;

class Author
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Event::find($request->id)->isAuthor()) {
            return $next($request);
        }
        return redirect()->route('profil');
    }
}

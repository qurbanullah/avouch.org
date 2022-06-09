<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Cache;
use Carbon\Carbon;

use App\Models\User;
use Illuminate\Http\Request;

class LastSeenUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()) {
            // Get the array of users from the cache
            $users = Cache::get('user-is-online-');
            $expireTime = Carbon::now()->addMinute(10); // keep online for 10 min

            // If it's empty create it with the user who triggered this middleware call
            if(empty($users)) {
                Cache::put('user-is-online-' . Auth::user()->id, true, $expireTime);
            } else {
                Cache::put('user-is-online-' . Auth::user()->id, true, $expireTime);
            }
            //Last Seen
            User::where('id', Auth::user()->id)->update(['last_seen' => Carbon::now()]);
        }
        return $next($request);
    }
}

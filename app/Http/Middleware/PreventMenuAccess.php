<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\MenuPermission;
use App\Models\MenuList;

class PreventMenuAccess
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
        // abort(404);

        if(auth()->user()->user_level == "super"){
            return $next($request);
        } else {
            $getAccess = MenuPermission::with('allMenu')->where('user_id', auth()->user()->id)->pluck('menu_id')->toArray();
            $getAlias = implode('/', request()->segments());
            $menu = MenuList::where('route', $getAlias)->first();
            if (in_array($menu->id, $getAccess)) {
                return $next($request);
            } else {
                return redirect()->back()->with([
                    'msg'                       => 'You dont have an access to this route',
                    'icon'                      => 'error',
                    'confirmButtonColor'        => 'danger',
                ]);
            }
        }
    }
}

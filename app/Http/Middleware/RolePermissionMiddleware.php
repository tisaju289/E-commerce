<?php

namespace App\Http\Middleware;

use Log;
use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class RolePermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission)
    {
        // যদি ব্যবহারকারী লগ ইন না করে থাকে, তাহলে তাকে লগ ইন পেজে রিডাইরেক্ট করুন
        if (!Auth::check()) {
            return redirect('login');
        }

        // লগ ইন করা ব্যবহারকারী
        $user = Auth::user();

        // যদি ব্যবহারকারী নির্দিষ্ট permission না থাকে, তাহলে তাকে 403 পেজে রিডাইরেক্ট করুন
        if (!$user->can($permission)) {
            abort(403, 'Unauthorized action.');
        }

        // যদি permission থাকে, তাহলে request চালিয়ে যান
        return $next($request);
    }

}

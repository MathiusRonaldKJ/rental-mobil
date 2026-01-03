<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Check authentication lebih ringkas
        if (!Auth::check()) {
            // Simpan intended URL untuk redirect setelah login
            if ($request->isMethod('get')) {
                session()->put('url.intended', $request->url());
            }
            
            return redirect()->route('login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        // 2. Check user role
        $user = Auth::user();
        
        // 3. Berikan response berbeda untuk API request
        if ($user->role !== 'admin') {
            if ($request->expectsJson() || $request->is('api/*')) {
                return response()->json([
                    'message' => 'Unauthorized. Admin access required.',
                    'success' => false
                ], 403);
            }
            
            return redirect()->route('user.dashboard')
                ->with('error', 'Akses ditolak. Hanya admin yang dapat mengakses halaman ini.');
        }

        // 4. Share user data ke semua views (optional)
        if ($request->isMethod('get')) {
            view()->share('currentUser', $user);
        }

        return $next($request);
    }
}
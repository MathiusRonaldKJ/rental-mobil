<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ForceHttpsRailway
{
    public function handle(Request $request, Closure $next)
    {
        // ✅ SELALU FORCE HTTPS TANPA KONDISI APAPUN
        URL::forceScheme('https');
        $request->server->set('HTTPS', 'on');
        $request->server->set('SERVER_PORT', 443);
        
        // Set header untuk memastikan
        $request->headers->set('X-Forwarded-Proto', 'https');
        
        // Jika masih HTTP, redirect ke HTTPS
        if (!$request->secure() || $request->getScheme() !== 'https') {
            $httpsUrl = 'https://' . $request->getHttpHost() . $request->getRequestUri();
            return redirect()->to($httpsUrl, 301);
        }
        
        return $next($request);
    }
}
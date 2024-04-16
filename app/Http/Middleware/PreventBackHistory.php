<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventBackHistory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next)
    {
        // Call the $next middleware and get the response
        $response = $next($request);

        // Add cache control headers to prevent caching
        $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');

        // Add headers to prevent browser from caching AJAX requests
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');

        // Add JavaScript code to prevent history manipulation
        $response->setContent($response->getContent() . $this->preventBackHistoryScript());

        return $response;
    }

    private function preventBackHistoryScript()
    {
        return <<<SCRIPT
        <script>
        if (window.history && window.history.pushState) {
            window.history.pushState(null, null, document.URL);
            window.addEventListener('popstate', function () {
                window.history.pushState(null, null, document.URL);
            });
        }
        </script>
        SCRIPT;
    }
}

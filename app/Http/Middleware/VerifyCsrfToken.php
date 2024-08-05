<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/api/v1/groups',
        '/api/v1/auth',
        '/api/v1/register',
        '/api/v1/partials',
        '/api/v1/courses',
        '/api/v1/activities',
        '/api/v1/students'
    ];
}

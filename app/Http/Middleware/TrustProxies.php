<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    /**
     * Trust ALL proxies.
     *
     * Render sits behind a reverse proxy that terminates HTTPS and forwards
     * requests to Laravel as plain HTTP internally. This makes Laravel generate
     * http:// URLs for asset(), route(), url() etc — causing mixed content errors.
     *
     * Setting $proxies = '*' tells Laravel to trust the X-Forwarded-Proto header
     * from Render's proxy, so all URLs are generated as https://.
     */
    protected $proxies = '*';

    protected $headers =
        Request::HEADER_X_FORWARDED_FOR    |
        Request::HEADER_X_FORWARDED_HOST   |
        Request::HEADER_X_FORWARDED_PORT   |
        Request::HEADER_X_FORWARDED_PROTO  |
        Request::HEADER_X_FORWARDED_AWS_ELB;
}

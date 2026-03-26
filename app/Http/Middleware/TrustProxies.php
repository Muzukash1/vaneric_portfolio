<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    /**
     * Trust ALL proxies.
     *
     * Render (and most cloud platforms) sit behind a load balancer / reverse proxy
     * that terminates HTTPS and forwards requests as HTTP internally.
     * Without this, Laravel's asset() and url() helpers generate http:// URLs
     * instead of https://, causing mixed-content errors in the browser.
     *
     * Setting this to '*' tells Laravel to trust the X-Forwarded-Proto header
     * sent by Render's proxy, so all generated URLs use https://.
     */
    protected $proxies = '*';

    /**
     * The headers to use to detect proxies.
     */
    protected $headers =
        Request::HEADER_X_FORWARDED_FOR    |
        Request::HEADER_X_FORWARDED_HOST   |
        Request::HEADER_X_FORWARDED_PORT   |
        Request::HEADER_X_FORWARDED_PROTO  |
        Request::HEADER_X_FORWARDED_AWS_ELB;
}

<?php 

namespace App\Middleware;

use System\Application;

interface MiddlewareInterface
{
    /**
	 * Get instance of Application 
	 *
	 * @param \System\Application $app
	 * @param string $next
     * @return mixed
	 */
    public function handle(Application $app, $next);
}
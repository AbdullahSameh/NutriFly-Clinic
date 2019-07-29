<?php 

namespace App\Middleware\User;

use System\Application;
use  App\Middleware\MiddlewareInterface;

class Config implements MiddlewareInterface
{
    /**
	 * {@inheritDoc}
	 */
    public function handle(Application $app, $next)
    {
       // Share user layout
        $app->share('userLayout', function ($app) {
            return $app->load->controller('User/Common/Layout');
        });
        return $next;
    }
}
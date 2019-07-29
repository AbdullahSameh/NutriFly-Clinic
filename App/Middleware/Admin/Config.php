<?php 

namespace App\Middleware\Admin;

use System\Application;
use  App\Middleware\MiddlewareInterface;

class Config implements MiddlewareInterface
{
    /**
	 * {@inheritDoc}
	 */
    public function handle(Application $app, $next)
    {
        //die('Config Middleware');
        // Share admin layout
        $app->share('adminLayout', function ($app) {
            return $app->load->controller('Admin/Common/Layout');
        });
        return $next;
    }
}
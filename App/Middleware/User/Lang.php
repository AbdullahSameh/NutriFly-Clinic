<?php 

namespace App\Middleware\User;

use System\Application;
use  App\Middleware\MiddlewareInterface;

class Lang implements MiddlewareInterface
{
    /**
	 * {@inheritDoc}
	 */
    public function handle(Application $app, $next)
    {
        // Handle Language and include Language file

        $default = array_get($app->config, 'lang');
        $lang = $app->session->has('lang') ? $app->session->get('lang') : $default;
        $path = getcwd() . '/App/lang/'. $lang . '/user/'.  $lang . '.php';
        include $path;

        return $next;
    }
}
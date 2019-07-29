<?php 

namespace App\Middleware\Admin;

use System\Application;
use  App\Middleware\MiddlewareInterface;

class Auth implements MiddlewareInterface
{
    /**
	 * {@inheritDoc}
	 */
    public function handle(Application $app, $next)
    {
        if (strpos($app->request->url(), '/admin') === 0) {
            // check if the current url started with /admin
            // if so, then call our middlewares
            $loginModel = $app->load->model('Login');
            $ignoredPages = ['/admin/login', '/admin/login/submit'];
            $currentRoute = $app->route->getCurrentRouteUrl();
            //pre($_SESSION);
            if (($isNotLogged = ! $loginModel->isLogged()) && ! in_array($currentRoute, $ignoredPages)) {
                return $app->url->redirectTo('/admin/login');
            }
            if ($isNotLogged) {
                return false;
            }
            $user = $loginModel->user();
            $usersGroupsModel = $app->load->model('UsersGroups');
            $userGroup = $usersGroupsModel->get($user->users_group_id);
            //pre($userGroup);
            if (! in_array($currentRoute, $userGroup->pages)) {
                $app->session->destroy();
                return $app->url->redirectTo('/404');
            }
        }
        return $next;
    }
}
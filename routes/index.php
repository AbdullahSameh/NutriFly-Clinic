<?php 

use System\Application;

$app = app();


//Not found route
$app->route->add('/404', 'NotFound');
$app->route->notFound('/404');

/**
 *  Admin Routes
*/
$adminOptions = [
	'prefix' => '/admin',
	'controller' => 'Admin',
	'middleware' => ['Admin\\Auth', 'Admin\\Config'],
];

$app->route->group($adminOptions, function ($route) {
	// Admin Login
	$route->add('/login', 'Login');
	$route->add('/login/submit', 'Login@submit', 'POST');
	
	// Dashboard
	$route->add('/', 'Dashboard');
	// $route->add('/dashboard', 'Dashboard');
	// $route->add('/submit', 'Dashboard@submit', 'POST');

	// Admin => users
	$route->package('/users', 'Users');

	// Admin => users profile
	$route->add('/profile', 'Profile', 'POST');
	$route->add('/profile/update', 'Profile@update', 'POST');

	// Admin => users groups
	$route->package('/users-groups', 'UsersGroups');

	// Admin => categories
	$route->package('/categories', 'Categories');

	// Admin => products
	$route->add('/products', 'Products');
	$route->add('/products/add', 'Products@add');
	$route->add('/products/submit', 'Products@submit', 'POST');
	$route->add('/products/edit/:id', 'Products@edit');
	$route->add('/products/save/:id', 'Products@save', 'POST');
	$route->add('/products/delete/:id', 'Products@delete');

	// Admin => products
	$route->add('/orders', 'Orders');
	$route->add('/orders/show/:id', 'Orders@show');
	$route->add('/orders/paid/:id', 'Orders@paid');
	$route->add('/orders/delete/:id', 'Orders@delete');
	
	// Admin => stories
	$route->package('/stories', 'Stories');
	
	// Admin => nutrtion plans
	$route->add('/plans', 'Plans');
	$route->add('/plans/delete/:id', 'Plans@delete');
	
	// Admin => settings
	$route->add('/settings', 'Settings');
	$route->add('/settings/save', 'Settings@save', 'POST');

	/*// Admin => contacts
	$route->add('/contacts', 'Contacts');
	$route->add('/contacts/reply/:id', 'Contacts@reply');
	$route->add('/contacts/send/:id', 'Contacts@send', 'POST');*/

	// Logout admin
	$route->add('/logout', 'Logout');
});


/**
 *  User Routes
*/
$adminOptions = [
	'prefix' => '/',
	'controller' => 'User',
	'middleware' => ['User\\Config', 'User\\Lang'],
];

$app->route->group($adminOptions, function ($route) {
	// Site route
	$route->add('/', 'Home');
	$route->add('/lang/:text', 'Home@lang');
	$route->add('/login', 'Login');
	$route->add('/login/submit', 'Login@submit', 'POST');
	$route->add('/login/register', 'Login@register', 'POST');
	$route->add('/products', 'Products');
	$route->add('/products/:id', 'Products@product');
	$route->add('/products/add-to-cart/:id', 'Products@addToCart', 'POST');
	$route->add('/category/:text/:id', 'Categories');
	$route->add('/shopping-cart', 'Cart');
	$route->add('/shopping-cart/update/:id', 'Cart@update', 'POST');
	$route->add('/shopping-cart/delete/:id', 'Cart@delete');
	$route->add('/checkout', 'Checkout');
	$route->add('/checkout/order', 'Checkout@order', 'POST');
	$route->add('/profile', 'Profile');
	$route->add('/profile/update/:id', 'Profile@update', 'POST');
	$route->add('/orders', 'Orders');
	$route->add('/orders/show/:id', 'Orders@show');
	$route->add('/orders/cancel/:id', 'Orders@cancel');
	$route->add('/nutrtion-plan', 'NutrtionPlan');
	$route->add('/nutrtion-plan/get-plan', 'NutrtionPlan@getPlan');
	$route->add('/nutrtion-plan/send-plan', 'NutrtionPlan@sendPlan', 'POST');
	$route->add('/stories', 'SuccessStory');
	$route->add('/contact-us', 'Home@sendMessage', 'POST');
	
	// $app->route->add('/contact-us', 'Contact');
	// $app->route->add('/about-us', 'About');
	// $app->route->add('/search', 'Search');
	
	// Logout user
	$route->add('/logout', 'Logout');
});

//pre($app);
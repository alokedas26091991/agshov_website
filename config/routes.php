<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return static function (RouteBuilder $routes) {
    /*
     * The default class to use for all routes
     *
     * The following route classes are supplied with CakePHP and are appropriate
     * to set as the default:
     *
     * - Route
     * - InflectedRoute
     * - DashedRoute
     *
     * If no call is made to `Router::defaultRouteClass()`, the class used is
     * `Route` (`Cake\Routing\Route\Route`)
     *
     * Note that `Route` does not do any inflections on URLs which will result in
     * inconsistently cased URLs when used with `:plugin`, `:controller` and
     * `:action` markers.
     */
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder) {
        /*
         * Here, we are connecting '/' (base path) to a controller called 'Pages',
         * its action called 'display', and we pass a param to select the view file
         * to use (in this case, templates/Pages/home.php)...
         */
       
		
	$builder->connect('/', ['controller' => 'Home', 'action' => 'index', 'home', 'prefix' => FALSE]);
	 
	 $builder->connect('/contact-us', ['controller' => 'Home', 'action' => 'contact', 'prefix' => FALSE]);
     $builder->connect('/about-us', ['controller' => 'StaticPages', 'action' => 'about-us', 'prefix' => FALSE]);
     $builder->connect('/career', ['controller' => 'StaticPages', 'action' => 'career', 'prefix' => FALSE]);
     $builder->connect('/our-products', ['controller' => 'Products', 'action' => 'index', 'prefix' => FALSE]);
	 $builder->connect('/privacy-and-policy', ['controller' => 'Pages', 'action' => 'privacypolicy', 'prefix' => FALSE]);
	 $builder->connect('/return-policy', ['controller' => 'Pages', 'action' => 'returnpolicy', 'prefix' => FALSE]);
	 $builder->connect('/terms-and-conditions', ['controller' => 'Pages', 'action' => 'termsandconditions', 'prefix' => FALSE]);
	 $builder->connect('/shipping', ['controller' => 'Pages', 'action' => 'shippingdelivery', 'prefix' => FALSE]);
	 $builder->connect('/covid-note', ['controller' => 'StaticPages', 'action' => 'covidnote', 'prefix' => FALSE]);
	 $builder->connect('/cookies', ['controller' => 'StaticPages', 'action' => 'cookiee', 'prefix' => FALSE]);
	 
	 $builder->connect('/holistic-treatment-in-mumbai', ['controller' => 'Pages', 'action' => 'holistictreatmentinmumbai', 'prefix' => FALSE]);
     $builder->connect('/anxiety-treatment-in-mumbai', ['controller' => 'Pages', 'action' => 'anxietytreatmentinmumbai', 'prefix' => FALSE]);
     $builder->connect('/book-online-homeopathy-consultation-in-mumbai', ['controller' => 'Pages', 'action' => 'bookonlinehomeopathyconsultationinmumbai', 'prefix' => FALSE]);
     $builder->connect('/chronic-disease-treatment-in-mumbai', ['controller' => 'Pages', 'action' => 'chronicdiseasetreatmentinmumbai', 'prefix' => FALSE]);
     $builder->connect('/hairfall-treatment-in-mumbai', ['controller' => 'Pages', 'action' => 'hairfalltreatmentinmumbai', 'prefix' => FALSE]);
     $builder->connect('/homeopathy-pet-consultation-in-mumbai', ['controller' => 'Pages', 'action' => 'homeopathypetconsultationinmumbai', 'prefix' => FALSE]);
     $builder->connect('/homeopathy-specialist-in-mumbai', ['controller' => 'Pages', 'action' => 'homeopathyspecialistinmumbai', 'prefix' => FALSE]);
     $builder->connect('/hormone-imbalance-treatment-in-mumbai', ['controller' => 'Pages', 'action' => 'hormoneimbalancetreatmentinmumbai', 'prefix' => FALSE]);
     $builder->connect('/pcos-treatment-in-mumbai', ['controller' => 'Pages', 'action' => 'pcostreatmentinmumbai', 'prefix' => FALSE]);
     $builder->connect('/404', ['controller' => 'Home', 'action' => 'demopage', 'prefix' => FALSE]);
	
	//$builder->connect('page/*', array('controller' => 'Products', 'action' => 'Details'));
	
$builder->connect('/register', ['controller' => 'Login', 'action' => 'register', 'prefix' => FALSE]);
$builder->connect('/forget-password', ['controller' => 'Login', 'action' => 'forgetpassword', 'prefix' => FALSE]);
    
    
    $builder->connect('/blog-category/:slug', 
        ['controller' => 'Blogs', 'action' => 'blogcategory']
    )->setPass(['slug']); // Pass the slug as a parameter to the controller
    
    $builder->connect('/blog/:slug', 
        ['controller' => 'Blogs', 'action' => 'blogdetails']
    )->setPass(['slug']); // Pass the slug as a parameter to the controller
	
	$builder->connect('/product/:slug', 
        ['controller' => 'Products', 'action' => 'details']
    )->setPass(['slug']); // Pass the slug as a parameter to the controller
	
	
	$builder->connect('/expertise/homeopthaic-consultation', 
        ['controller' => 'Expertise', 'action' => 'homeopthaicconsultation']
    ); 
	
	$builder->connect('/expertise/counselling-sessions', 
        ['controller' => 'Expertise', 'action' => 'counsellingsessions']
    ); 
	$builder->connect('/expertise/baby-and-me-programs', 
        ['controller' => 'Expertise', 'action' => 'babyandmeprograms']
    ); 
	
	$builder->connect('/expertise/hairfall-treatment', 
        ['controller' => 'Expertise', 'action' => 'hairfalltreatment']
    ); 
	
	$builder->connect('/expertise/pet-consultation', 
        ['controller' => 'Expertise', 'action' => 'petconsultation']
    ); 
    

		
		

        /*
         * Connect catchall routes for all controllers.
         *
         * The `fallbacks` method is a shortcut for
         *
         * ```
         * $builder->connect('/:controller', ['action' => 'index']);
         * $builder->connect('/:controller/:action/*', []);
         * ```
         *
         * You can remove these routes once you've connected the
         * routes you want in your application.
         */
});

$routes->prefix('admin', function (RouteBuilder $builder) {
    $builder->connect('/', ['controller' => 'Users', 'action' => 'login']);
    $builder->connect('/login', ['controller' => 'Users', 'action' => 'login']);
    $builder->connect('/registration', ['controller' => 'Users', 'action' => 'registration']);
    $builder->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);
    $builder->fallbacks('InflectedRoute');
});

$routes->prefix('seller', function (RouteBuilder $builder) {
    $builder->connect('/', ['controller' => 'Users', 'action' => 'login']);
    $builder->connect('/registration', ['controller' => 'Users', 'action' => 'registration']);
    $builder->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);
    $builder->fallbacks('InflectedRoute');
});

$routes->prefix('vendor', function (RouteBuilder $builder) {
    $builder->connect('/', ['controller' => 'Users', 'action' => 'login']);
    $builder->connect('/registration', ['controller' => 'Users', 'action' => 'registration']);
    $builder->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);
    $builder->fallbacks('InflectedRoute');
});

$routes->scope('/', function (RouteBuilder $builder) {
    $builder->fallbacks('InflectedRoute');
});

$routes->setExtensions(['pdf']);

    /*
     * If you need a different set of middleware or none at all,
     * open new scope and define routes there.
     *
     * ```
     * $routes->scope('/api', function (RouteBuilder $builder) {
     *     // No $builder->applyMiddleware() here.
     *
     *     // Parse specified extensions from URLs
     *     // $builder->setExtensions(['json', 'xml']);
     *
     *     // Connect API actions here.
     * });
     * ```
     */
};

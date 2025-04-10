<?php
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\Router;

return static function (\Cake\Routing\RouteBuilder $routes): void {
    $routes->setRouteClass(DashedRoute::class);

    // Rutas públicas
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

    // Admin prefix
    $routes->prefix('Admin', function (\Cake\Routing\RouteBuilder $builder): void {
        $builder->connect('/migrations', ['controller' => 'Migrations', 'action' => 'index']);
        $builder->connect('/migrations/create', ['controller' => 'Migrations', 'action' => 'create', '_method' => 'POST']);
        $builder->fallbacks(DashedRoute::class);
    });

    // Fallbacks para todo lo demás
    $routes->fallbacks(DashedRoute::class);
};

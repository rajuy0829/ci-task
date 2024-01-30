<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Task::index');
$routes->post('/generatenum', 'Task::generatenum');
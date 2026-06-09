<?php

declare(strict_types=1);

require_once __DIR__ . '/../src/config.php';
require_once __DIR__ . '/../src/Router.php';

use App\Router;

$router = new Router();

// Define routes
$router->addRoute('/', 'home');
$router->addRoute('/about', 'about');
$router->addRoute('/service', 'service');
$router->addRoute('/pricing', 'pricing');
$router->addRoute('/project', 'project');
$router->addRoute('/project-details', 'project-details');
$router->addRoute('/blog-sidebar', 'blog-sidebar');
$router->addRoute('/blog-single', 'blog-single');
$router->addRoute('/contact', 'contact');

// Resolve the request
$router->resolve($_SERVER['REQUEST_URI']);

<?php

declare(strict_types=1);

namespace App;

class Router
{
    private array $routes = [];

    public function addRoute(string $path, callable|string $handler): void
    {
        $this->routes[$path] = $handler;
    }

    public function resolve(string $uri): void
    {
        $path = parse_url($uri, PHP_URL_PATH);
        
        // Handle subdirectory hosting by stripping the base path if defined
        if (defined('BASE_URL') && !empty(BASE_URL)) {
            $baseUrlPath = parse_url(BASE_URL, PHP_URL_PATH) ?? '';
            if ($baseUrlPath !== '/' && strpos($path, $baseUrlPath) === 0) {
                $path = substr($path, strlen($baseUrlPath));
            }
        }

        // Ensure path starts with / but isn't just double slashes
        $path = '/' . ltrim($path, '/');
        
        $handler = $this->routes[$path] ?? $this->routes['/404'] ?? null;

        if (!$handler) {
            http_response_code(404);
            echo "404 Not Found";
            return;
        }

        if (is_callable($handler)) {
            echo $handler();
        } else {
            $this->renderView($handler);
        }
    }

    private function renderView(string $view): void
    {
        $viewPath = __DIR__ . "/../views/pages/{$view}.php";
        
        if (!file_exists($viewPath)) {
            echo "View {$view} not found";
            return;
        }

        // Default variables for common pages
        $title = "Orbitor - Software Company Template";
        $navClass = "";
        $logo = "logo.png";
        $estimateBtnClass = "btn-solid-border";

        // Custom logic per view if needed
        match ($view) {
            'about' => [
                $title = "About Us - Orbitor",
                $navClass = "nav-text-white",
                $logo = "logo-w.png",
                $estimateBtnClass = "btn-main"
            ],
            'contact' => [
                $title = "Contact Us - Orbitor",
                $navClass = "nav-text-white",
                $logo = "logo-w.png",
                $estimateBtnClass = "btn-main"
            ],
            'service' => [
                $title = "Our Services - Orbitor",
                $navClass = "nav-text-white",
                $logo = "logo-w.png",
                $estimateBtnClass = "btn-main"
            ],
            'pricing' => [
                $title = "Pricing - Orbitor",
                $navClass = "nav-text-white",
                $logo = "logo-w.png",
                $estimateBtnClass = "btn-main"
            ],
            'project' => [
                $title = "Our Portfolio - Orbitor",
                $navClass = "nav-text-white",
                $logo = "logo-w.png",
                $estimateBtnClass = "btn-main"
            ],
            'project-details' => [
                $title = "Project Details - Orbitor",
                $navClass = "nav-text-white",
                $logo = "logo-w.png",
                $estimateBtnClass = "btn-main"
            ],
            'blog-sidebar' => [
                $title = "Blog - Orbitor",
                $navClass = "nav-text-white",
                $logo = "logo-w.png",
                $estimateBtnClass = "btn-main"
            ],
            'blog-single' => [
                $title = "Blog Post - Orbitor",
                $navClass = "nav-text-white",
                $logo = "logo-w.png",
                $estimateBtnClass = "btn-main"
            ],
            default => []
        };

        ob_start();
        include $viewPath;
        $content = ob_get_clean();

        include __DIR__ . "/../views/layouts/main.php";
    }
}

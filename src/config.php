<?php

declare(strict_types=1);

/**
 * AWS Elastic Beanstalk configuration.
 * Uses environment variables for flexibility.
 */

// Try to get BASE_URL from environment, fallback to auto-detection or empty string
$envBaseUrl = getenv('APP_URL') ?: '';
define('BASE_URL', rtrim($envBaseUrl, '/'));

/**
 * Helper function to generate URLs
 */
if (!function_exists('url')) {
    function url(string $path = ''): string
    {
        $path = ltrim($path, '/');
        // If BASE_URL is empty, return absolute path from root
        return (defined('BASE_URL') && !empty(BASE_URL)) 
            ? BASE_URL . '/' . $path 
            : '/' . $path;
    }
}

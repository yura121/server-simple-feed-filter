<?php

declare(strict_types=1);

use App\Kernel;

require_once dirname(__DIR__) . '/vendor/autoload_runtime.php';

if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
    $_SERVER['SERVER_PORT'] = 443;
}

return static function (array $context) {
    return new Kernel($context['APP_ENV'], (bool)$context['APP_DEBUG']);
};

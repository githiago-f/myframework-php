<?php

namespace Lib;

use ReflectionClass;

final class Router {
    protected static $paths = [];
    
    public static function route(string $path, string $handler) {
        Router::$paths[$path] = $handler;
    }

    public static function handle() {
        $path = $_SERVER['REQUEST_URI'];
        $callback = Router::$paths[$path];

        if($callback == null):
            echo show_404();
        else:
            $parts = explode(".", $callback);

            $reflectedController = new ReflectionClass("App\Controllers\\" . $parts[0]);
            $controller = $reflectedController->newInstance();

            try {
                echo call_user_func([$controller, $parts[1]]);
            } catch (\Throwable $th) {
                $message = $th->getMessage();
                if(str_contains($message, 'Argument #1 ($callback) must be a valid callback')) {
                    echo "ERROR:: Controller $parts[0].$parts[1] method not found";
                }
                // should handle error
            }
        endif;
    }
}

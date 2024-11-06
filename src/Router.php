<?php

namespace app\http;


class Router
{
    private static array $_routes = [];


    public static function add(string $action, string $controllerClass): void
    {
        self::$_routes[$action] = $controllerClass;
    }


    public static function get(string $action): ?string
    {
        return self::$_routes[$action] ?? '';
    }
}
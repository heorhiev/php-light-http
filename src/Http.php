<?php

namespace light\http;

use light\http\components\exceptions\NotFoundException;


class Http
{

    private static $_routes = [];


    /**
     * @throws NotFoundException
     */
    public function run(string $action): void
    {
        $controllerClassName = self::getRoute($action);

        if (!$controllerClassName) {
            throw new NotFoundException();
        }

        $controller = new $controllerClassName();

        if ($controller instanceof ControllerInterface) {
            $controller->main();
        }
    }


    public static function addRoute(string $action, string $controllerClass): void
    {
        self::$_routes[$action] = $controllerClass;
    }


    public static function getRoute(string $action): ?string
    {
        return self::$_routes[$action] ?? '';
    }
}
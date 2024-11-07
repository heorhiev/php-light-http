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
        try {
            $controllerClassName = self::getRoute($action);

            $controller = new $controllerClassName();

            if ($controller instanceof ControllerInterface) {
                $controller->main();
                return;
            }
        } catch (\Throwable $e) {
            var_dump($e);
        }

        throw new NotFoundException();
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
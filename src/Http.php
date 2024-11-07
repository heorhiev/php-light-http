<?php

namespace light\http;

use light\http\interfaces\ControllerInterface;
use light\http\components\exceptions\NotFoundException;


class Http
{
    private function __construct()
    {

    }


    /**
     * @throws NotFoundException
     */
    public static function run(string $action): void
    {
        try {
            $controllerClassName = Router::get($action);

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
}
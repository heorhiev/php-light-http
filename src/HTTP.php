<?php

namespace app\http;

use app\http\interfaces\ControllerInterface;
use app\http\components\exceptions\NotFoundException;
use app\http\services\RequestService;


class HTTP
{
    /**
     * @throws NotFoundException
     */
    public function start(): void
    {
        try {
            $action = RequestService::get('action');

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
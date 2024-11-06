<?php

namespace app\http\services;


class RequestService
{

    public static function get(string $name = null)
    {
        if (array_key_exists($name, $_GET)) {
            return $_GET[$name];
        }

        return $_GET;
    }


    public static function post(string $name = null)
    {
        if (array_key_exists($name, $_POST)) {
            return $_POST[$name];
        }

        return $_POST;
    }


    public static function raw()
    {
        return file_get_contents('php://input');
    }
}    
<?php

namespace light\http\services\http;


class ResponseService
{
    public static function redirect(string $to, int $code = 307)
    {
        header("Location: " . $to, true, $code);
        exit;
    }


    public static function setHeader($header)
    {
        header($header);
    }
}    
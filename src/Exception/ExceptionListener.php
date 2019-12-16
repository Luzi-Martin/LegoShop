<?php

namespace App\Exception;

use App\View\View;
use Throwable;

class ExceptionListener
{
    private function __construct()
    {
    }

    public static function register()
    {
        set_exception_handler(self::class.'::handleException');
    }

    public function handleException(Throwable $exception)
    {
        header('Location:/');
    }
}

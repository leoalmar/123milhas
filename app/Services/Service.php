<?php

namespace App\Services;

abstract class Service
{
    /**
     * @param string $method
     * @param array $args
     *
     * @return mixed
     */
    public function __call(string $method, array $args)
    {
        return call_user_func_array([$method], $args);
    }

    /**
     * @param string $method
     * @param array $args
     *
     * @return mixed
     */
    public static function __callStatic(string $method, array $args)
    {
        return call_user_func_array([app(static::class), $method], $args);
    }
}

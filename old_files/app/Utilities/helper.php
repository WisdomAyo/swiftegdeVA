<?php

use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

if (! function_exists('snake_case')) {
    /**
     * Convert a string to snake case.
     *
     * @param  string  $value
     * @param  string  $delimiter
     * @return string
     */
    function snake_case($value, $delimiter = '_')
    {
        return Str::snake($value, $delimiter);
    }

    function stringOf(\Throwable $e){
        return get_class($e).": " .$e->getMessage()." Line: ".$e->getLine()." File: ".$e->getFile();
    }

}

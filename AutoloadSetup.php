<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 8/8/14
 * Time: 10:12 PM
 */
// Or, using an anonymous function as of PHP 5.3.0
spl_autoload_register(function($className)
{
    $className = ltrim($className, '\\');
    $fileName  = GlobalConfig::APPPATH;
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require $fileName;
});
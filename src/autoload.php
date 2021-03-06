<?php

/**
 * Autoloader for PSR-0
 *
 * Code inspired from https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md#example-implementation
 */
function autoload($className)
{
    $className = ltrim($className, '\\');
    $fileName = $namespace = '';

    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }

    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require $fileName;
}

spl_autoload_register('autoload');
<?php

spl_autoload_register(
function ($class) 
{
    $prefix = 'App\\';
    $baseDir = __DIR__ . '/../';

    if (str_starts_with($class, $prefix)) 
    {

        $path = substr($class, strlen($prefix));

        $classFile = $baseDir .  str_replace('\\', '/', $path) . '.php';

        if (file_exists($classFile)) 
        {
            require_once $classFile;
        }
    }else{
        throw new Exception("A classe {$class} não pode ser carregada");
    }
});
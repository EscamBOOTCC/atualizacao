<?php

namespace App\Core;

use Exception;

class Router
{
    private array $routes = [];

    public function get(?string $route, ?string $action)
    {

        $this->routes[] = [
            'method' => 'get',
            'route' => $route,
            'action' => $action
        ];
    }

    public function post(?string $route, ?string $action)
    {

        $this->routes[] = [
            'method' => 'post',
            'route' => $route,
            'action' => $action
        ];
    }


    public function run()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = strtolower($_SERVER['REQUEST_METHOD']);

        // Esta linha remove o caminho das pastas (TCC/public) da comparação
        // Ela substitui o trecho da URL_BASE pelo vazio, deixando apenas a rota
        $projetoPath = parse_url(URL_BASE, PHP_URL_PATH);
        
        @$uri = str_replace($projetoPath, '', $uri); //ver depois o erro

        // Se a URI ficar vazia (raiz), define como '/'
        if ($uri == '') 
        {
            $uri = '/';
        }

        foreach ($this->routes as $route) 
        {
            if ($route['route'] == $uri && $route['method'] == $method) 
            {
                return $this->dispatch($route);
            }
        }

        http_response_code(404);
        exit('Rota não encontrada');
    }

    public function dispatch(?array $route)
    {

        list($controller, $method) = explode('@', $route['action']);

        $controllerClass = "App\\Controllers\\$controller";

        if (!class_exists($controllerClass)) 
        {
            print "Controller $controller não encontrado";
            die;
        }

        if (!method_exists($controllerClass, $method)) 
        {
            print "Método $method não encontrado em $controllerClass";
            die;
        }
        
        $controller = new $controllerClass;
        $controller->$method();

    }

    public function getAllRoutes()
    {
        return $this->routes;
    }

}
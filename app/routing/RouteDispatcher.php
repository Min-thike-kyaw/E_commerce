<?php
namespace App\Routing;

use AltoRouter;

class RouteDispatcher
{
    private $match, $controller, $method;

    public function __construct(AltoRouter $route)
    {
        
        $this->match = $route->match();
        if ($this->match) {
            list($controller, $method) = explode("@", $route->match()['target']);
            $this->controller = $controller;
            $this->method = $method;
            $this->controller = new $this->controller();
            if( is_callable([$this->controller, $this->method])) {
                call_user_func([$this->controller, $this->method], $route->match()['params']);
            }
            
        }
    }
}
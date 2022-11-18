<?php 
    class Route{
        function start(){
            $url = $_SERVER['REQUEST_URI'];
            $route = explode('/', $url);
            if($route[2]){
                $controller_name = $route[2];
            }
            if($route[3]){
                $action = $route[3];
            }

            $controller_path = 'controllers/'.strtolower($controller_name).'.php';

            if(file_exists($controller_path)){
                include $controller_path;
                $controller = new $controller_name;
            }

            if(method_exists($controller, $action)){
                $controller->$action();
            }

        }

    }

?>
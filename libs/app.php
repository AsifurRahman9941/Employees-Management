<?php
require_once "config/Router.php";


class App
{
    public function __construct()
    {
        $router  = new Router();
        $urlController = $router->getController();
        $urlMethod =  $router->getMethod();
        $urlParams = $router->getParam();

      
        $fileController = 'controllers/' . $urlController . '.php';

        if (file_exists($fileController)) {
           
            require_once $fileController;
          
            $controller = new $urlController;
           
            $controller->loadModel($urlController);
           
            if ($urlMethod) {
                
                $controller->{$urlMethod}($urlParams);
            } else {
                $controller->render();
            }
        } else {
            require_once "controllers/errors.php";
            $controller = new Errors();
        }
    }
}

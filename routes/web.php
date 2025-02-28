<?php
class Router {
    public function route($url) {
        switch($url) {
            case 'home':
                require_once 'app/controllers/HomeController.php';
                $controller = new HomeController();
                error_log('hello from home');
                $controller->index();
                break;
            
            default:
                header("HTTP/1.0 404 Not Found");
                echo "Page not found";
                break;
        }
    }
}
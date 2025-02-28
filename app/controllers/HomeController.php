<?php
class HomeController {
    private $db;
    private $savingModel;

    public function __construct() {
   
    }

    public function index() {
        echo 'hello';
        require_once 'app/views/home.php';
    }

    public function admin() {
    
    }
}
<?php
class HomeController
{
    private $db;
    private $savingModel;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect();
        require_once 'app/models/Saving.php';
        $this->savingModel = new Saving($this->db);
    }

    public function index()
    {
        require_once 'app/helpers/AuthMiddleware.php';
        $userId = AuthMiddleware::getUserId();
        $savings = $this->savingModel->getByUserId($userId);
        require_once 'app/views/home.php';
    }

    public function admin()
    {
        require_once 'app/helpers/AuthMiddleware.php';
        AuthMiddleware::isAdmin();
        
        $savings = $this->savingModel->getAll();
        require_once 'app/views/admin.php';
    }
    
}
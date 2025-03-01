<?php
session_start();
require_once 'config/database.php'; #import database
require_once 'routes/web.php';

$url = isset($_GET['url']) ? $_GET['url'] : 'home';
$router = new Router();
$router->route($url);
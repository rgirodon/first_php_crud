<?php
use Dta\FirstEclipse\Dao\UserDao;

include 'vendor/autoload.php';

$config = include 'inc/config.inc';

$id = "";

if (!empty($_GET['id'])) {
    
    $id = $_GET['id'];
    
    $userDao = new UserDao($config);
    
    $user = $userDao->deleteUser($id);
    
    $userDao->close();
}

require 'deleteUserView.php';
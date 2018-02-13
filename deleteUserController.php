<?php
use Dao\UserDao;
use Service\UserService;
use Domain\User;

include 'inc/autoload.inc';

$config = include 'inc/config.inc';

$id = "";

if (!empty($_GET['id'])) {
    
    $id = $_GET['id'];
    
    $userDao = new UserDao($config);
    
    $user = $userDao->deleteUser($id);
    
    $userDao->close();
}

require 'deleteUserView.php';
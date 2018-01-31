<?php
use dao\UserDao;
use service\UserService;
use domain\User;

include 'inc/autoload.inc';

$config = include 'inc/config.inc';

$userDao = new UserDao($config);

$id = "";

if (!empty($_GET['id'])) {
    
    $id = $_GET['id'];
    
    $user = $userDao->deleteUser($id);
}

require 'deleteUserView.php';
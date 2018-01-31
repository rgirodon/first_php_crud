<?php
use dao\UserDao;
use service\UserService;
use domain\User;

include 'inc/autoload.inc';

$config = include 'inc/config.inc';

$userDao = new UserDao($config);

$userService = new UserService();

$validationErrors = [];

$firstName = "";
$lastName = "";

if (!empty($_POST)) {
    
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    
    $user = new User(null, $firstName, $lastName);
    
    $validationErrors = $userService->isValid($user);
    
    if (empty($validationErrors)) {
        
        $userDao->insertUser($user);
        
        header("Location: usersController.php");
    }
}

require 'addUserView.php';
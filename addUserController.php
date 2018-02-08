<?php
use Dao\UserDao;
use Service\UserService;
use Domain\User;

include 'inc/autoload.inc';

$config = include 'inc/config.inc';

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
        
        $userDao = new UserDao($config);
        
        $userDao->insertUser($user);
        
        $userDao->close();
        
        header("Location: usersController.php");
    }
}

require 'addUserView.php';
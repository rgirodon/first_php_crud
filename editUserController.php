<?php
use Dao\UserDao;
use Service\UserService;
use Domain\User;

include 'inc/autoload.inc';

$config = include 'inc/config.inc';

$userDao = new UserDao($config);

$userService = new UserService();

$validationErrors = [];

$user = null;
$id = "";
$firstName = "";
$lastName = "";

if (!empty($_GET['id'])) {
    
    $id = $_GET['id'];
    
    $user = $userDao->findUserById($id);
    
    $userDao->close();
    
    $firstName = $user->firstName;
    $lastName = $user->lastName;
}
else if (!empty($_POST)) {
    
    $id = $_POST["id"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    
    $user = new User($id, $firstName, $lastName);
    
    $validationErrors = $userService->isValid($user);
    
    if (empty($validationErrors)) {
        
        $userDao->updateUser($user);
        
        $userDao->close();
        
        header("Location: usersController.php");
    }
}

require 'editUserView.php';
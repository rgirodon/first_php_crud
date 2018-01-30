<?php
use dao\UserDao;
use domain\User;

include 'inc/autoload.inc';
?>
<?php
$config = include 'inc/config.inc';

$userDao = new UserDao($config);

$user = $userDao->findUserById(6);
?>
<?= $user->firstName." ".$user->lastName ?>
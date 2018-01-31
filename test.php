<?php
use dao\UserDao;

include 'inc/autoload.inc';
?>
<?php
$config = include 'inc/config.inc';

$userDao = new UserDao($config);

$user = $userDao->findUserById(6);
?>
<?= $user->firstName." ".$user->lastName ?>
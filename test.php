<?php

use Dao\UserDao;

include 'inc/autoload.inc';

$config = include 'inc/config.inc';

$userDao = new UserDao($config);

$user = $userDao->findUserById(6);
?>
<?= $user->firstName." ".$user->lastName ?>
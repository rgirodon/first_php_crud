<?php

use Dta\FirstEclipse\Dao\UserDao;

include 'vendor/autoload.php';

$config = include 'inc/config.inc';

$userDao = new UserDao($config["dbSettings"]);

$user = $userDao->findUserById(6);
?>
<?= $user->firstName." ".$user->lastName ?>
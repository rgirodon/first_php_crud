<?php
use Dta\FirstEclipse\Dao\UserDao;

include 'vendor/autoload.php';

$config = include 'inc/config.inc';

$userDao = new UserDao($config["dbSettings"]);

$users  = $userDao->findAllUsers();

$userDao->close();

require 'usersView.php';
<?php
use Dta\FirstEclipse\Dao\UserDao;

include 'vendor/autoload.php';

$config = include 'inc/config.inc';

$userDao = new UserDao($config);

$users  = $userDao->findAllUsers();

$userDao->close();

require 'usersView.php';
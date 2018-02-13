<?php
use Dao\UserDao;

include 'inc/autoload.inc';

$config = include 'inc/config.inc';

$userDao = new UserDao($config);

$users  = $userDao->findAllUsers();

$userDao->close();

require 'usersView.php';
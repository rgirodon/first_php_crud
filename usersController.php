<?php
use dao\UserDao;

include 'inc/autoload.inc';

$config = include 'inc/config.inc';

$userDao = new UserDao($config);

$users  = $userDao->findAllUsers();

require 'usersView.php';
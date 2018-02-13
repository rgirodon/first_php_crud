<?php
include 'vendor/autoload.php';

use Dta\FirstEclipse\Domain\User;

$id = 4;
$firstName = "Remy";
$lastName = "Girodon";

$user1 = new User($id, $firstName, $lastName);

$user2 = new User(65, "Lionel", "Messi");

$config = include 'inc/config.inc';
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>First PHP with Eclipse</title>
  <link rel="stylesheet" href="styles/style.css">
</head>
<body>
  <h1><?= "Hello ".$user1->firstName." ".$user1->lastName." !" ?></h1>
  
  <h1><?= "Hello ".$user2->firstName." ".$user2->lastName." !" ?></h1>
  
  <h2><?= "DB : ".$config['dbSettings']['db.host'].":".$config['dbSettings']['db.port'] ?></h2>
</body>
</html>
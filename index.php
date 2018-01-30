<?php
include 'inc/autoload.inc';
?>
<?php
use domain\User;

$id = 4;
$firstName = "Remy";
$lastName = "Girodon";

$user = new User($id, $firstName, $lastName);

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
  <h1><?php echo "Hello ".$user->firstName." ".$user->lastName." !" ?></h1>
  <h2><?php echo "DB : ".$config['db.host'].":".$config['db.port'] ?></h2>
</body>
</html>
<?php

use Dta\FirstEclipse\Dao\UserDao;
use Dta\FirstEclipse\Domain\Test;

include 'vendor/autoload.php';

$config = include 'inc/config.inc';

$userDao = new UserDao($config["dbSettings"]);

$user = $userDao->findUserById(1);
?>
<?= $user->firstName." ".$user->lastName ?>
<br><br>
<?php
echo Test::$TEST_STATIC_ATTRIBUTE;

echo "<br><br>";

$myTest1 = new Test();
$myTest1->testAttribute = "myTest1";
echo $myTest1->testAttribute;

echo "<br><br>";

$myTest2 = new Test();
$myTest2->testAttribute = "myTest2";
echo $myTest2->testAttribute;

$myTest1::$TEST_STATIC_ATTRIBUTE = "Caramba !";

$myTest2::$TEST_STATIC_ATTRIBUTE = "Olé !";

echo "<br><br>";
echo "attribut static sur myTest1 : ".$myTest1::$TEST_STATIC_ATTRIBUTE;
echo "<br>";
echo "attribut static sur myTest2 : ".$myTest2::$TEST_STATIC_ATTRIBUTE;
?>
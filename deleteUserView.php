<?php 
$title = 'Delete User'; 
?>

<?php 
ob_start(); 
?>

<div class="alert alert-success" role="alert">User has been deleted</div>

<br />
<div>          
	<a href="usersController.php" class="btn black-background text-white">
		<span class="glyphicon glyphicon-list text-white"></span> Back to list of users 
	</a>
</div>

<?php 
$content = ob_get_clean(); 
?>

<?php 
require('template.php'); 
?>
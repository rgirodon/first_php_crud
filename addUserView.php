<?php 
$title = 'Create User'; 
?>

<?php 
ob_start(); 
?>
<h1>Create User</h1>

<form method="post" action="addUserController.php">
	<div class="form-group">
    	<label for="firstName">First Name *</label>
    	<input type="text" class="form-control standardWidth" id="firstName" name="firstName" value="<?php echo $firstName;  ?>">
    	<?php 
    	if (!empty($validationErrors["user.firstName"])) {
    	?>
        <span class="label label-danger"><?php echo $validationErrors["user.firstName"]; ?></span>
        <?php 
    	}
        ?>
  	</div>
  	
  	<div class="form-group">
    	<label for="lastName">Last Name *</label>
    	<input type="text" class="form-control standardWidth" id="lastName" name="lastName" value="<?php echo $lastName;  ?>">
    	<?php 
    	if (!empty($validationErrors["user.lastName"])) {
    	?>
        <span class="label label-danger"><?php echo $validationErrors["user.lastName"]; ?></span>
        <?php 
    	}
        ?>
  	</div>

  	<button type="submit" class="btn btn-default">Create</button>
</form>

<?php 
$content = ob_get_clean(); 
?>

<?php 
require('template.php'); 
?>
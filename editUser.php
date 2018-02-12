<?php
use dao\UserDao;
use service\UserService;
use domain\User;

include 'inc/autoload.inc';

$config = include 'inc/config.inc';

$userDao = new UserDao($config);

$userService = new UserService();

$validationErrors = [];

$user = null;
$id = "";
$firstName = "";
$lastName = "";

if (!empty($_GET['id'])) {
    
    $id = $_GET['id'];
    
    $user = $userDao->findUserById($id);
    $firstName = $user->firstName;
    $lastName = $user->lastName;
}
else if (!empty($_POST)) {
    
    $id = $_POST["id"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    
    $user = new User($id, $firstName, $lastName);
    
    $validationErrors = $userService->isValid($user);
    
    if (empty($validationErrors)) {
        
        $userDao->updateUser($user);
        
        header("Location: users.php");
    }
}
?>
<!doctype html>
    <html lang="fr">
    <head>
      <meta charset="utf-8">
      <title>Update User</title>
      <link rel="stylesheet" href="styles/style.css">
      <link 
            rel="stylesheet" 
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
            integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
            crossorigin="anonymous">
    </head>
    <body>
    
    	<h1>Update User</h1>
    	
    	<form method="post" action="editUser.php">
    		<input type="hidden" name="id" value="<?php echo $id; ?>" />
        	<div class="form-group">
            	<label for="firstName">First Name *</label>
            	<input type="text" class="form-control standardWidth" id="firstName" name="firstName" value="<?php echo $firstName; ?>">
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
            	<input type="text" class="form-control standardWidth" id="lastName" name="lastName" value="<?php echo $lastName; ?>">
            	<?php 
            	if (!empty($validationErrors["user.lastName"])) {
            	?>
                <span class="label label-danger"><?php echo $validationErrors["user.lastName"]; ?></span>
                <?php 
            	}
                ?>
          	</div>

          	<button type="submit" class="btn btn-default">Update</button>
        </form>
		
      
    </body>
    <script 
        src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>

    <script 
        src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
        crossorigin="anonymous"></script>
</html>
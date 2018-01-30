<?php
use dao\UserDao;
use service\UserService;
use domain\User;

include 'inc/autoload.inc';
?>
<?php
$config = include 'inc/config.inc';

$userDao = new UserDao($config);

$id = "";

if (!empty($_GET['id'])) {
    
    $id = $_GET['id'];
    
    $user = $userDao->deleteUser($id);
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
    
    	<div class="alert alert-success" role="alert">User has been deleted</div>
    	
    	<br />
		<div>          
        	<a href="users.php" class="btn black-background text-white">
    			<span class="glyphicon glyphicon-list text-white"></span> Back to list of users 
  			</a>
        </div>
    	      
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
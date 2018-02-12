<?php
use dao\UserDao;

include 'inc/autoload.inc';

$config = include 'inc/config.inc';

$userDao = new UserDao($config);

$users = $userDao->findAllUsers();
?>
<!doctype html>
    <html lang="fr">
    <head>
      <meta charset="utf-8">
      <title>List of users</title>
      <link rel="stylesheet" href="styles/style.css">
      <link 
            rel="stylesheet" 
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
            integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
            crossorigin="anonymous">
    </head>
    <body>
    
    	<h1>List of Users</h1>
    	<br />
		<div>          
        	<a href="addUser.php" class="btn black-background text-white">
    			<span class="glyphicon glyphicon-plus text-white"></span> Add user 
  			</a>
        </div>
		<br />

    	<table class="table table-striped">
	  		<thead>
	  			<tr>
	  				<th>#</th>
	  				<th>First Name</th>
	  				<th>Last Name</th>
	  				<th>Edit</th>
	  				<th>Delete</th>
	  			</tr>
	  		</thead>
	  		<tbody>
<?php
                foreach ($users as $user) {
?>
	  			<tr>
	  				<th scope="row"><?php echo $user->id ?></th> 
	  				<td><?php echo $user->firstName ?></td>
	  				<td><?php echo $user->lastName ?></td> 
	  				<td><a href="editUser.php?id=<?php echo $user->id ?>"><span class="glyphicon glyphicon-pencil text-black"></span></a></td>
	  				<td><a href="deleteUser.php?id=<?php echo $user->id ?>"><span class="glyphicon glyphicon-trash text-black"></span></a></td>
	  			</tr>
<?php 
                }
?>	  			
	  		</tbody>
      	</table>
      
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
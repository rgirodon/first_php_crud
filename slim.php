<?php
use Slim\Http\Request;

use Dta\FirstEclipse\Dao\UserDao;
use Slim\Http\Response;
use Dta\FirstEclipse\Domain\User;

include 'vendor/autoload.php';

$config = include 'inc/config.inc';

$app = new \Slim\App($config);

/*
$app->get('/hello/{name}', 
    
            function (Request $request, Response $response, array $args) {
                
                $name = $args['name'];
                
                $response->getBody()->write("Hello, $name");
                
                return $response;
            });
*/

$app->get('/fake_users',
    
    function (Request $request, Response $response, array $args) {
        
        $users = [];
        
        $user1 = new User(1, 'Jean', 'Tigana', 'password');
        
        $user2 = new User(2, 'Luis', 'Fernandez', 'password');
        
        $user3 = new User(3, 'Alain', 'Giresse', 'password');
        
        $user4 = new User(4, 'Michel', 'Platini', 'password');
        
        $users[] = $user1;
        
        $users[] = $user2;
        
        $users[] = $user3;
        
        $users[] = $user4;
        
        $newResponse = $response->withJson($users);
        
        return $newResponse;
    });

$app->get('/fake_users/{idUser}',
    
    function (Request $request, Response $response, array $args) {
        
        $id = $args['idUser'];
        
        $user = null;
        
        $users = [];
        
        $user1 = new User(1, 'Jean', 'Tigana', 'password');
        
        $user2 = new User(2, 'Luis', 'Fernandez', 'password');
        
        $user3 = new User(3, 'Alain', 'Giresse', 'password');
        
        $user4 = new User(4, 'Michel', 'Platini', 'password');
        
        $users[] = $user1;
        
        $users[] = $user2;
        
        $users[] = $user3;
        
        $users[] = $user4;
        
        foreach ($users as $iterUser) {
            
            if ($iterUser->id == $id) {
                
                $user = $iterUser;
            }
        }
        
        if ($user) {
        
            $newResponse = $response->withJson($user);
        }
        else {
            $newResponse = $response->withJson(["status"=>404], 404);
        }
        
        return $newResponse;
    });
    

$app->get('/users',
    
    function (Request $request, Response $response, array $args) {
        
        $userDao = new UserDao($this->get('dbSettings'));
        
        $users  = $userDao->findAllUsers();
        
        $userDao->close();
        
        $newResponse = $response->withJson($users);
        
        return $newResponse;
    });

$app->get('/users/{id}',
    
    function (Request $request, Response $response, array $args) {
        
        $userDao = new UserDao($this->get('dbSettings'));
        
        $id = $args['id'];
        
        $user  = $userDao->findUserById($id);
        
        $userDao->close();
        
        $newResponse = $response->withJson($user);
        
        return $newResponse;
    });

$app->delete('/users/{id}', 
    
    function (Request $request, Response $response, array $args) {
    
        $id = $args['id'];
        
        $userDao = new UserDao($this->get('dbSettings'));
        
        $user = $userDao->deleteUser($id);
        
        $userDao->close();
        
        $newResponse = $response->withJson(["status"=>200]);
        
        return $newResponse;
    });

$app->post('/users',
    
    function (Request $request, Response $response, array $args) {
        
        $userDao = new UserDao($this->get('dbSettings'));
        
        $user = json_decode($request->getBody());
        
        $userDao->insertUser($user);
        
        $userDao->close();
        
        $newResponse = $response->withJson($user, 201);
        
        return $newResponse;
    });

$app->put('/users/{id}',
    
    function (Request $request, Response $response, array $args) {
        
        $id = $args['id'];
        
        $userDao = new UserDao($this->get('dbSettings'));
        
        $user = json_decode($request->getBody());
        
        $user->id = $id;
        
        $userDao->updateUser($user);
        
        $userDao->close();
        
        $newResponse = $response->withJson(["status"=>200]);
        
        return $newResponse;
    });


$app->run();
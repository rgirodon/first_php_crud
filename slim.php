<?php
use Slim\Http\Request;
use Slim\Http\Response;
use Dta\FirstEclipse\Dao\UserDao;

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
        
        $newResponse = $response->withJson($user)->withStatus(201);
        
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
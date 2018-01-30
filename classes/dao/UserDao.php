<?php
namespace dao;

use domain\User;


class UserDao extends DaoBase {

    public function __construct($config) {
        parent::__construct($config);
    }
    
    public function findAllUsers() {
        
        $result = [];
        
        $reponse = $this->bdd->query("SELECT id, firstname, lastname FROM user order by id");
        
        while ($donnees = $reponse->fetch()) {
            
            $id = $donnees["id"];
            $firstName = $donnees["firstname"];
            $lastName = $donnees["lastname"];
            
            $user = new User($id, $firstName, $lastName);
            
            $result[] = $user;
        }
        
        return $result;
    }
    
    public function findUserById($id) {
        
        $result;
        
        $query = $this->bdd->prepare("SELECT id, firstname, lastname FROM user where id = :id");
        
        $query->bindParam(":id", $id);
        
        if ($query->execute()) {
            
            if ($donnees = $query->fetch()) {
                
                $id = $donnees["id"];
                $firstName = $donnees["firstname"];
                $lastName = $donnees["lastname"];
                
                $result = new User($id, $firstName, $lastName);
            }
        }
        
        return $result;
    }
    
    public function insertUser($user) {
        
        $result;
        
        $query = $this->bdd->prepare("INSERT INTO user (firstname, lastname) VALUES (:firstName, :lastName)");
        
        $query->bindParam(":firstName", $user->firstName);

        $query->bindParam(":lastName", $user->lastName);
        
        $query->execute();   
        
        $id = $this->bdd->lastInsertId();
        
        $user->id = $id;
        
        return $id;
    }
    
    public function deleteUser($id) {
        
        $query = $this->bdd->prepare("DELETE FROM user WHERE id = :id");
        
        $query->bindParam(":id", $id);
        
        $query->execute();
    }
    
    public function updateUser($user) {
        
        $result;
        
        $query = $this->bdd->prepare("UPDATE user SET firstname = :firstName, lastname = :lastName WHERE id = :id");
        
        $query->bindParam(":firstName", $user->firstName);
        
        $query->bindParam(":lastName", $user->lastName);
        
        $query->bindParam(":id", $user->id);
        
        $query->execute();
    }
}
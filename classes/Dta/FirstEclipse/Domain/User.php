<?php
namespace Dta\FirstEclipse\Domain;

class User {

    public $id;
    
    public $firstName;
    
    public $lastName;
    
    public $password;
    
    public function __construct($id, $firstName, $lastName, $password) {
        
        $this->id = $id;
        
        $this->firstName = $firstName;
        
        $this->lastName = $lastName;
        
        $this->password = $password;
    }
}
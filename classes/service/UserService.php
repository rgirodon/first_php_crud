<?php
namespace service;

use domain\User;

class UserService {

    public function __construct() {
        
    }
    
    public function isValid($user) {
        
        $result = [];
        
        if ($user->firstName == '') {
            
            $result['user.firstName'] = "FirstName is required";
        }
        
        if ($user->lastName == '') {
            
            $result['user.lastName'] = "LastName is required";
        }
        
        return $result;
    }
}
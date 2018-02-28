<?php
namespace Dta\FirstEclipse\Service;

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
        
        if ($user->password == '') {
            
            $result['user.password'] = "Password is required";
        }
        
        return $result;
    }
}
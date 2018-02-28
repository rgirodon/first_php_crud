<?php
use PHPUnit\Framework\TestCase;
use Dta\FirstEclipse\Domain\User;

include '../vendor/autoload.php';

/**
 * User test case.
 */
class UserTest extends TestCase {


    /**
     * Tests class User
     */
    public function testUser() {
           
        $user = new User(25, "Remy", "Girodon", "toto21");
        
        $this->assertEquals(25, $user->id);
        
        $this->assertEquals("Remy", $user->firstName);
        
        $this->assertEquals("Girodon", $user->lastName);
        
        $this->assertEquals("toto21", $user->password);
    }
    
}


<?php
use PHPUnit\Framework\TestCase;
use Dta\FirstEclipse\Service\UserService;
use Dta\FirstEclipse\Domain\User;

include '../vendor/autoload.php';

class UserServiceTest extends TestCase {

    /**
     *
     * @var UserService
     */
    private $userService;
    
    /**
     * Prepares the environment before running a test.
     */
    protected function setUp() {
        
        $this->userService = new UserService();
    }
    
    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown() {
        
        $this->userService = null;
    }
    

    public function testIsValid_OK() {
    
        $user = new User(null, "Alberto", "Contador", "toto21");
        
        $this->assertEmpty($this->userService->isValid($user));
    }
        
    public function testIsValid_FirstName_Null_NotOK() {
        
        $user = new User(null, null, "Contador", "toto21");
        
        $this->assertEquals(1, count($this->userService->isValid($user)));
        
        $this->assertEquals("FirstName is required", ($this->userService->isValid($user))["user.firstName"]);
    }
     
    public function testIsValid_FirstName_Empty_NotOK() {
        
        $user = new User(null, "", "Contador", "toto21");
        
        $this->assertEquals(1, count($this->userService->isValid($user)));
        
        $this->assertEquals("FirstName is required", ($this->userService->isValid($user))["user.firstName"]);
    }
       
    public function testIsValid_All_NotOK() {
        
        $user = new User(null, null, null, null);
        
        $this->assertEquals(3, count($this->userService->isValid($user)));
        
        $this->assertEquals("FirstName is required", ($this->userService->isValid($user))["user.firstName"]);
        
        $this->assertEquals("LastName is required", ($this->userService->isValid($user))["user.lastName"]);
        
        $this->assertEquals("Password is required", ($this->userService->isValid($user))["user.password"]);
    }
}


<?php
use PHPUnit\Framework\TestCase;
use service\UserService;
use domain\User;

include 'autoload.inc';

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
        
        parent::setUp();
        
        $this->userService = new UserService();
    }
    
    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown() {
        
        $this->userService = null;
        
        parent::tearDown();
    }
    
    /**
     * Tests UserService->isValid()
     */
    public function testIsValid() {
    
        $user = new User(null, "Alberto", "Contador");
        
        $this->assertEmpty($this->userService->isValid($user));
        
        $user = new User(null, null, "Contador");
        
        $this->assertEquals(1, count($this->userService->isValid($user)));
        
        $this->assertEquals("FirstName is required", ($this->userService->isValid($user))["user.firstName"]);
        
        $user = new User(null, "", "Contador");
        
        $this->assertEquals(1, count($this->userService->isValid($user)));
        
        $this->assertEquals("FirstName is required", ($this->userService->isValid($user))["user.firstName"]);
        
        $user = new User(null, null, null);
        
        $this->assertEquals(2, count($this->userService->isValid($user)));
        
        $this->assertEquals("FirstName is required", ($this->userService->isValid($user))["user.firstName"]);
        
        $this->assertEquals("LastName is required", ($this->userService->isValid($user))["user.lastName"]);
    }
}


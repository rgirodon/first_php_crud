<?php
use PHPUnit\Framework\TestCase;
use Dta\FirstEclipse\Dao\UserDao;
use Dta\FirstEclipse\Domain\User;

include '../vendor/autoload.php';

/**
 * UserDao test case.
 */
class UserDaoTest extends TestCase {

    /**
     *
     * @var UserDao
     */
    private $userDao;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp() {
        
        parent::setUp();
        
        $config = include '../inc/config.inc';
        
        $this->userDao = new UserDao($config);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown() {
        
        $this->userDao->close();
        
        $this->userDao = null;
        
        parent::tearDown();
    }


    /**
     * Tests UserDao->findAllUsers()
     */
    public function testFindAllUsers() {
                
        $users = $this->userDao->findAllUsers();
        
        $this->assertEquals(2, count($users));
        
        $this->assertEquals("Remy", $users[0]->firstName);
        
        $this->assertEquals("Girodon", $users[0]->lastName);
        
        $this->assertEquals("Michel", $users[1]->firstName);
        
        $this->assertEquals("Durand", $users[1]->lastName);
    }
    
    /**
     * Tests UserDao->findUserById()
     */
    public function testFindUserById() {
        
        $user = $this->userDao->findUserById(1);
        
        $this->assertEquals("Remy", $user->firstName);
        
        $this->assertEquals("Girodon", $user->lastName);
    }
    
    /**
     * Tests UserDao->insertUser()
     */
    public function testInsertUser() {
        
        $user = new User(null, "Alberto", "Contador");
        
        $id = $this->userDao->insertUser($user);
        
        $newUser = $this->userDao->findUserById($id);
        
        $this->assertEquals("Alberto", $newUser->firstName);
        
        $this->assertEquals("Contador", $newUser->lastName);
        
        $this->userDao->deleteUser($id);
    }
    
    /**
     * Tests UserDao->deleteUser()
     */
    public function testDeleteUser() {
        
        $user = new User(null, "Alberto", "Contador");
        
        $id = $this->userDao->insertUser($user);
        
        $newUser = $this->userDao->findUserById($id);
        
        $this->assertNotNull($newUser);

        $this->userDao->deleteUser($id);
        
        $deletedUser = $this->userDao->findUserById($id);
        
        $this->assertNull($deletedUser);
    }
    
    /**
     * Tests UserDao->updateUser()
     */
    public function testUpdateUser() {
        
        $user = new User(null, "Alberto", "Contador");
        
        $id = $this->userDao->insertUser($user);
        
        $newUser = $this->userDao->findUserById($id);
        
        $newUser->firstName = "Roberto";
        
        $newUser->lastName = "Ricco";
        
        $this->userDao->updateUser($newUser);
        
        $updatedUser = $this->userDao->findUserById($id);
        
        $this->assertEquals("Roberto", $updatedUser->firstName);
        
        $this->assertEquals("Ricco", $updatedUser->lastName);
        
        $this->userDao->deleteUser($id);
    }
}


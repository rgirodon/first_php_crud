<?php

use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase {

    
    public function testBasic() {
        
        $this->assertTrue(TRUE, "Vrai est vrai !");
    }

    public function testArray() {
        
        $array = [];
        
        $this->assertEmpty($array);
        
        $array[] = "str1";
        
        $this->assertEquals(1, count($array));
        
        $this->assertEquals("str1", $array[0]);
    }
    
    public function testDateTime() {
        
        $dateTime = new DateTime("2018-02-15 11:00:00");
        
        $this->assertEquals(2018, $dateTime->format("Y"));
        
        $this->assertEquals(11, $dateTime->format("H"));
    }
}


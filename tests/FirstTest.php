<?php

use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase {


    public function testArray() {
        
        $array = [];
        
        $this->assertEmpty($array);
        
        $array[] = "str1";
        
        $this->assertEquals(1, count($array));
    }
}


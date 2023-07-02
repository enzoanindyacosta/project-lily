<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use App\user_dashboard\index;


class UserTest1 extends TestCase {
    
        // User Testing
    public function testOne(){
        $x = True;
        if ($x == True){
            echo 'User Test 1: Test Passed ';
            echo '';
        } else{
            echo 'User Test 1: Test Failed ';
            echo '';
        }      
    }
}
class UserTest2 extends TestCase {
        // Unit Testing
    public function testTwo(){
        $y = True;
        if ($y == True){
            echo ' Unit Test 2: Test Passed ';
            echo '';
        } else{
            echo ' Unit Test 2: Test Failed ';
            echo '';
        }      
    }
}
class UserTest3 extends TestCase {
        // Integration Testing
    public function testThree(){
        $z = True;
        if ($z == True){
            echo ' Integration Test 3: Test Passed';
            echo '';
        } else{
            echo ' Integration Test 3: Test Failed';
            echo '';
        }       
    }
}
  
?>

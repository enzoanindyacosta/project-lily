<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use App\user_dashboard\index;

/** @test */
class UserTest extends TestCase {
    
        // User Testing
    public function testOne(){
        $x = True;
        if ($x == True){
            return 'User Test 1: Test Passed';
        } else{
            return 'User Test 2: Test Failed';
        }      
    }
    
        // Unit Testing
    public function testTwo(){
        $y = True;
        if ($x == True){
            return 'Unit Test 1: Test Passed';
        } else{
            return 'Unit Test 2: Test Failed';
        }      
    }
    
        // Integration Testing
    public function testThree(){
        $z = True;
        if ($x == True){
            return 'Integration Test 1: Test Passed';
        } else{
            return 'Integration Test 2: Test Failed';
        }       
    }
}
  
?>

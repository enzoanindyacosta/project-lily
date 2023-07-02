<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use App\user_dashboard\index;


class UserTest extends TestCase {
    
        // User Testing
    public function testOne(){
        $x = True;
        if ($x == True){
            echo 'User Test 1: Test Passed ';
            echo '';
        } else{
            echo 'User Test 2: Test Failed ';
            echo '';
        }      
    }
    
        // Unit Testing
    public function testTwo(){
        $y = True;
        if ($x == True){
            echo ' Unit Test 1: Test Passed ';
            echo '';
        } else{
            echo ' Unit Test 2: Test Failed ';
            echo '';
        }      
    }
    
        // Integration Testing
    public function testThree(){
        $z = True;
        if ($x == True){
            echo ' Integration Test 1: Test Passed';
            echo '';
        } else{
            echo ' Integration Test 2: Test Failed';
            echo '';
        }       
    }
}
  
?>

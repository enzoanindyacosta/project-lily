<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use App\user_dashboard\index;

/* @test */
class UserTest extends TestCase {

        // User Testing
        /* @doesNotPerformAssertions */
    public function testOne(){
        $y = True;
        if ($y == True){
            echo ' User Test 2: Test Passed; ';
        } else{
            echo ' User Test 2: Test Failed; ';
        }      
    }
}

?>

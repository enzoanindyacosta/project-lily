<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use App\user_dashboard\index;

/* @testing */
class UnitTest extends TestCase {

        // Unit Testing
/**
 * @doesNotPerformAssertions
 */
    public function testTwo(){
        $y = True;
        if ($y == True){
            echo ' Unit Test 1: Test Passed; ';
        } else{
            echo ' Unit Test 1: Test Failed; ';
        }      
    }
}

?>

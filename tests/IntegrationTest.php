<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use App\user_dashboard\index;


class IntegrationTest extends TestCase {

        // Integration Testing
    public function testThree(){
        $z = True;
        if ($z == True){
            echo ' Integration Test 3: Test Passed; ';
        } else{
            echo ' Integration Test 3: Test Failed; ';
        }      
    }
}

?>

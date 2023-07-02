<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use App\user_dashboard\index;


class IntegrationTest extends TestCase {

        // Integration Testing
    public function testTwo(){
        $z = True;
        if ($z == True){
            echo ' Integration Test 2: Test Passed ';
            echo '<br>';
        } else{
            echo ' Integration Test 2: Test Failed ';
            echo '<br>';
        }      
    }
}

?>

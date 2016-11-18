<?php

namespace Tests\AppBundle\Services;

use AppBundle\Services\Utils;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    public function testGetCamelCase()
    {
        $calc   = new Utils(false);
        
        $result = $calc->getCamelCase('input');
        $this->assertEquals('Input', $result);
        
        $result = $calc->getCamelCase('input_input');
        $this->assertEquals('InputInput', $result);
    }
    
    
    public function testGetUnderscore()
    {
        $calc   = new Utils(false);
        
        $result = $calc->getUnderscore('Input');
        $this->assertEquals('input', $result);
        
        $result = $calc->getUnderscore('inputInput');
        $this->assertEquals('input_input', $result);
        
        $result = $calc->getUnderscore('InputInput');
        $this->assertEquals('input_input', $result);
    }
}

<?php
namespace Rfls\Test;

use PHPUnit\Framework\TestCase;

class TesteUso extends TestCase
{
    public function testPushAndPop()
    {
        $stack = [];
        $this->assertEquals(0, count($stack));
        
        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack)-1]);
        $this->assertEquals(1, count($stack));
        
        $this->assertEquals('foo', array_pop($stack));
        $this->assertEquals(0, count($stack));
    }
    
    
    public function testComparacao()
    {
        $um = 1;
        $this->assertEquals(1, $um);
                
    }
    // ver 002
    
    public function gitTeste(){}
    
    
   
   
    
}


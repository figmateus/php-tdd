<?php

namespace Code;

use PHPUnit\Framework\TestCase;

class ProdutoTest extends TestCase
{
    public function testIfNameProductIsSettedCorrecly()
    {
        $produto = new Produto();
        $ProductName = $produto->setName('Produto 1');

        $this->assertEquals('Produto 1', $produto->getName());
    }
}
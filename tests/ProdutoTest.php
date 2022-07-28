<?php

namespace Code;

use PHPUnit\Framework\TestCase;

class ProdutoTest extends TestCase
{
    public function testIfNameProductIsSettedCorrecly()
    {
        $product = new Product();
        $ProductName = $product->setName('Produto 1');

        $this->assertEquals('Produto 1', $product->getName());
    }

    public function testIfPriceProductIsSettedCorrecly()
    {
        $product = new Product();
        $ProductName = $product->setPrice('10.50');

        $this->assertEquals('10.50', $product->getPrice());
    }

    public function testIfSlugProductIsSettedCorrecly()
    {
        $product = new Product();
        $ProductName = $product->setSlug('produto-1');

        $this->assertEquals('produto-1', $product->getSlug());
    }
}
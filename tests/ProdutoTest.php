<?php

namespace Code;

use PHPUnit\Framework\TestCase;

class ProdutoTest extends TestCase
{
    private $product;

    public function setUp(): void
    {
        $this->product = new Product();
    }

    public function testIfNameProductIsSettedCorrecly()
    {
        $product = $this->product;
        $ProductName = $product->setName('Produto 1');

        $this->assertEquals('Produto 1', $product->getName());
    }

    public function testIfPriceProductIsSettedCorrecly()
    {
        $product = $this->product;
        $ProductName = $product->setPrice('10.50');

        $this->assertEquals('10.50', $product->getPrice());
    }

    public function testIfSlugProductIsSettedCorrecly()
    {
        $product = $this->product;
        $ProductName = $product->setSlug('produto-1');

        $this->assertEquals('produto-1', $product->getSlug());
    }

    public function testIfSlugThrowExceptionWhenNotSetted()
    {
        $this->expectException('\InvalidArgumentException');
        $this->expectExceptionMessage('Slug do produto não pode ser nulo');

        $product = $this->product;
        $product->setSlug('');
    }
}
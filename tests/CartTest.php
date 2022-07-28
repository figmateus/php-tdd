<?php

class CartTest extends \PHPUnit\Framework\TestCase
{
    //Manipular varios produtos
    // Visualizar produtos
    //Total de produtos | Total compra

    public function testIfClassCartExists()
    {
        $class = class_exists('\\Code\\Cart');
        $this->assertTrue($class);
    }

    public function testAddProductToCart()
    {
        $product = new \Code\Product();
        $product->setName('Produto 1');
        $product->setPrice('10.00');
        $product->setSlug('produto-1');

        $cart = new \Code\Cart();
        $cart->addProduct($product);

        $this->assertIsArray($cart->getProduct());
        $this->assertInstanceOf('\\code\\Product', $cart->getProduct()[0]);
    }
}
<?php

class CartTest extends \PHPUnit\Framework\TestCase
{
    //Manipular varios produtos
    // Visualizar produtos
    //Total de produtos | Total compra
    private $cart;
    private $product;

    public function setUp(): void
    {
        $this->cart = new \Code\Cart();
        $this->product = new \Code\Product();
    }

    public function tearDown(): void
    {
        unset($this->cart);
        unset($this->product);
    }

    protected function assertPreConditions(): void
    {
        $class = class_exists('\\Code\\Cart');
        $this->assertTrue($class);
    }

    protected function assertPostConditions(): void
    {
        //executa apos o teste e o metodo tearDown
    }

    public function testAddProductToCart()
    {
        $product = $this->product;
        $cart = $this->cart;
        $product->setName('Produto 1');
        $product->setPrice('10.00');
        $product->setSlug('produto-1');
        $cart->addProduct($product);

        $product2 = $this->product;
        $product2->setName('Produto 2');
        $product2->setPrice('10.00');
        $product2->setSlug('produto-2');
        $cart->addProduct($product2);



        $this->assertIsArray($cart->getProduct());
        $this->assertInstanceOf('\\code\\Product', $cart->getProduct()[0]);
        $this->assertInstanceOf('\\code\\Product', $cart->getProduct()[1]);
    }

    public function testIfValuesOfProductsOnCartAreCorrectAsSetted()
    {
//        $product = $this->product;
//        $product->setName('Produto 1');
//        $product->setPrice('10.00');
//        $product->setSlug('produto-1');

        //utilizando o stub criado com o getProductStub().
        $productStub = $this->getProductStub();
        $cart = $this->cart;
        $cart->addProduct($productStub);

        $this->assertEquals('Produto 1', $cart->getProduct()[0]->getName());
        $this->assertEquals('10.00', $cart->getProduct()[0]->getPrice());
        $this->assertEquals('produto-1', $cart->getProduct()[0]->getSlug());
    }

    public function testIfTotalOfProductsAndValuesAreCorrect()
    {
        $product = $this->product;
        $cart = $this->cart;
        $product->setName('Produto 1');
        $product->setPrice('10.00');
        $product->setSlug('produto-1');

        $product2 = $this->product;
        $product2->setName('Produto 2');
        $product2->setPrice('10.00');
        $product2->setSlug('produto-2');


        $cart->addProduct($product);
        $cart->addProduct($product2);

        $this->assertEquals(2, $cart->getTotalProducts());
        $this->assertEquals(20.00, $cart->getTotalOrder());
    }

//    public function testUndone()
//    {
//        $this->assertTrue(true);
//        $this->markTestIncomplete('Teste Incompleto!');
//    }
//
//    /**
//     * @requires PHP < 7
//     */
//    public function testIfSpecificFeatureIsForPhp53WorkCorrecly()
//    {
////        if (PHP_VERSION > 7){
////            $this->markTestSkipped('this test only works for php version below 7');
////        }
//        $this->assertTrue(true);
//    }

    public function testIfLogIsSavedWhenInformedToAddProduct()
    {
        $cart = new \Code\Cart();

        //aqui a gente cria uma classe falsa que vai testar o Log
        //no onlyMethods a gente especifica os metodos testados que
        // no nosso caso vai ser o log
        $logMock = $this->getMockBuilder(\Code\Log::class)
                        ->onlyMethods(['log'])
                        ->getMock();
        //aqui a gente configura o esperado desse metodo log
        //com o expects($this->once()) chama ele apenas uma vez
        //utilizando o metodo log especificado abaixo em method
        // com um parametro que foi informado em equalTo
        $logMock->expects($this->once())
            ->method('log')
            ->with($this->equalTo('Adicionando Produto no carrinho'));

        //aqui a gente chama a função add carrinho que esta utilizando o stub
        //e utilizado o metodo log com o parametro especificado a cima.
        $cart->addProduct($this->getProductStub(), $logMock);
    }

    private function getProductStub()
    {
        //aqui a gente cria esse função privada que seja o nosso esboço do produto.
        $productStub = $this->createMock(\Code\Product::class);
        $productStub->method('getName')->willReturn('Produto 1');
        $productStub->method('getPrice')->willReturn('10.00');
        $productStub->method('getSlug')->willReturn('produto-1');

        return $productStub;
    }

}
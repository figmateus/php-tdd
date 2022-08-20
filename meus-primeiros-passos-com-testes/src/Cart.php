<?php

namespace Code;

class Cart
{
    private $products = [];
    public function addProduct($product, Log $log = null)
    {
        //no nosso carrinho a gente recebe o produto a ser adicionado e a mensagem do log.
        //testes em CartTest.php
        $this->products[] = $product;
        if(!is_null($log))
            $log->log('Adicionando Produto no carrinho');

    }

    public function getProduct()
    {
        return $this->products;
    }

    public function getTotalProducts()
    {
        return count($this->products);
    }

    public function getTotalOrder()
    {
        $totalOrder = 0;

        foreach ($this->products as $product){
            $totalOrder += $product->getPrice();
        }
        return $totalOrder;
    }
}
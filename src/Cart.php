<?php

namespace Code;

class Cart
{
    private $products = [];
    public function addProduct($product)
    {
        $this->products[] = $product;
    }

    public function getProduct()
    {
        return $this->products;
    }
}
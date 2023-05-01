<?php

namespace App\Temp;
use App\Temp\ProductRepository;
class Inventory
{
    private array $products;
    public function __construct(private ProductRepository $productsRepo)
    {
    }

    public function setProducts(): void
    {
        $this->products = $this->productsRepo->fetchProducts();
    }

    public function getProducts(): array
    {
        return $this->products;
    }
}
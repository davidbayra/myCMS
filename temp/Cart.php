<?php

namespace App\Temp;

class Cart
{
    public $price;
    public static float $tax = 1.2;

    public function getPrice(): float
    {
        return $this->price * self::$tax;
    }

    public function addToPrice(int $amount): void
    {
        $this->price += $amount;
    }
}
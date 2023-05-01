<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Temp\Cart;

class CartTest extends TestCase
{
    protected $cart;
    protected function setUp():void
    {
        $this->cart = new Cart();
    }

    protected function tearDown(): void
    {
        Cart::$tax = 1.2;
    }

    /** @test */
    function taxChange()
    {
        Cart::$tax = 1.3;
        $this->cart->price = 10;
        $getPrice = $this->cart->getPrice();

        $this->assertEquals(13, $getPrice);
    }

    function testGetPrice()
    {
        $this->cart->price = 10;
        $getPrice = $this->cart->getPrice();

        $this->assertEquals(12, $getPrice);
    }

    /** @test */
    function errorTypeConvert()
    {
        try{
            $this->cart->addToPrice(1);
            $this->fail('a type error');
        } catch (\TypeError $error){
           $this->assertStringStartsNotWith('App\Temp\Cart::addToPrice():', $error->getMessage());
        }

    }
}
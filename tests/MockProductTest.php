<?php

namespace App\Tests;

use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class MockProductTest extends TestCase
{
    /**
     * @throws Exception
     */
    /** @group db */
    public function testMockProduct()
    {
        $mockProducts = [
            ['id' => 0,
            'name' => 'Petrovich',
            'email' => 'Petrovich@mail.ru',
            'pass' => '123'],
            ['id' => 1,
             'name' => 'Abramovich',
             'email' => 'Abramovich@mail.ru',
             'pass' => '123'],
            ['id' => 2,
             'name' => 'Lvovich',
             'email' => 'Lvovich@mail.ru',
             'pass' => '123']
        ];

        $mockRepo = $this->createMock(\App\Temp\ProductRepository::class);
        $mockRepo->method('fetchProducts')->willReturn($mockProducts);


        $products = $mockRepo->fetchProducts();

        $this->assertEquals('Petrovich', $products[0]['name']);

    }
}
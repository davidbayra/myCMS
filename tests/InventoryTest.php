<?php

namespace App\Tests;

use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class InventoryTest extends TestCase
{
    /**
     * @throws Exception
     */
    /** @group db */
    public function testProductsCanBeSet()
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
        $inventory = new \App\Temp\Inventory($mockRepo);


        $mockRepo->expects($this->exactly(1))->method('fetchProducts')->willReturn($mockProducts);

        $inventory->setProducts();

        $this->assertEquals('Petrovich', $inventory->getProducts()[0]['name']);
        $this->assertEquals('Abramovich', $inventory->getProducts()[1]['name']);
        $this->assertEquals('Lvovich', $inventory->getProducts()[2]['name']);

    }
}
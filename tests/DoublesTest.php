<?php

namespace App\Tests;

use App\Temp\ExampleDependency;
use App\Temp\ExamServ;
use App\Temp\ExamComm;
use http\Exception\InvalidArgumentException;
use http\Exception\RuntimeException;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class DoublesTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testMock()
    {
        $mock = $this->createMock(ExamServ::class);
        $mock->expects($this->exactly(1))
            ->method('doSomething')
            ->with('bar')
            ->willReturn('Foo');

        $exCom = new ExamComm($mock);

        $this->assertEquals('Foo', $exCom->execute('bar'));
    }

    /**
     * @throws Exception
     */
    public function testReturnTypes()
    {
        $mock = $this->createMock(ExamServ::class);

        $this->assertNull($mock->doSomething('bar'));
    }

    /**
     * @throws Exception
     */
    public function testConsecutiveReturn()
    {
        $mock = $this->createMock(ExamServ::class);
        $mock->method('doSomething')
            ->will($this->onConsecutiveCalls('hui', 'pizda'));

        foreach (['hui', 'pizda'] as $item) {
            $this->assertSame($item, $mock->doSomething('bar'));
        }
    }

    /**
     * @throws Exception
     */
    public function testExceptionThrown()
    {
        $mock = $this->createMock(ExamServ::class);
        $mock->method('doSomething')
            ->willThrowException(new RuntimeException());

        $this->expectException(RuntimeException::class);
        $mock->doSomething('bar');
    }

    /**
     * @throws Exception
     */
    public function testCallBackReturn()
    {
        $mock = $this->createMock(ExamServ::class);
        $mock->method('doSomething')
            ->willReturnCallback(function ($arg){
                if ($arg % 2 == 0){
                    return $arg;
                }
                throw new InvalidArgumentException();
            });
        $this->assertSame(10, $mock->doSomething(10));
        $this->expectException(InvalidArgumentException::class);
        $mock->doSomething(10);
    }

    public function testWithEqualTo()
    {
        $mock = $this->createMock(ExamServ::class);
        $mock->expects($this->once())
            ->method('doSomething')
            ->with($this->equalTo('bar'));
        $mock->doSomething('bar');
    }

    public function testMultipleArgs()
    {
        $mock = $this->createMock(ExamServ::class);
        $mock->expects($this->once())
            ->method('doSomething')
            ->with(
                $this->stringContains('foo'),
                $this->greaterThanOrEqual(100),
                $this->anything()
            );
        $mock->doSomething('foobar', 101, null);
    }

    public function testCallbackArguments()
    {
        $mock = $this->createMock(ExamServ::class);
        $mock->expects($this->once())
            ->method('doSomething')
            ->with($this->callback(function ($object){
                $this->assertInstanceOf(ExampleDependency::class, $object);
                return $object->exampleMethod() === 'Example string';
            }));
        $mock->doSomething(new ExampleDependency());
    }

    public function testIdenticalTo()
    {
        $dependency = new ExampleDependency();
        $mock = $this->createMock(ExamServ::class);
        $mock->expects($this->once())
            ->method('doSomething')
            ->with($this->IdenticalTo($dependency));
        $mock->doSomething($dependency);

    }

    public function testMockBuilder()
    {
        $mock = $this->getMockBuilder(ExamServ::class)
            ->setConstructorArgs([222,333])
            ->getMock();
        $mock->method('doSomething')->willReturn('foo');

        $this->assertSame('foo', $mock->doSomething('bar'));
    }

    public function testOnlyMethods()
    {
        $mock = $this->getMockBuilder(ExamServ::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['doSomething'])
            ->getMock();
        $mock->method('doSomething')->willReturn('foo');

        $this->assertSame('foo', $mock->nonMock('hui'));
    }

    public function testAddMethod()
    {
        $mock = $this->getMockBuilder(ExamServ::class)
            ->disableOriginalConstructor()
            ->addMethods(['nonMethodService'])
            ->getMock();
        $mock->expects($this->once())
            ->method('nonMethodService')
            ->with($this->isInstanceOf(ExampleDependency::class))
            ->willReturn('foo');

        $this->assertSame('foo', $mock->nonMethodService(new ExampleDependency()));
    }
}


<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class StackTest extends TestCase
{

    public function testCanPushToStack(): void
    {
        $stack = new Stack();
        $stack->push(4);
        $stack->push(5);
        $stack->push(34.34324234);
        $stack->push(3);
        $this->assertEquals(3,$stack->top());
    }

    public function testCanPopFromStack(): void
    {
        $stack = new Stack();
        $stack->push(4);
        $stack->push(5);
        $stack->push('Hello There');
        $stack->push(3);
        $stack->pop();
        $this->assertEquals('Hello There',$stack->top());
    }

    public function testCannotPopFromAnEmptiedStack(): void
    {
        $this->expectException(Exception::class);
        $stack = new Stack();
        $stack->push(4);
        $stack->push(5);
        $stack->pop();
        $stack->pop();
        $stack->pop();
    }

    public function testCannotPopFromAnEmptyStack(): void
    {
        $this->expectException(Exception::class);
        $stack = new Stack();
        $stack->pop();
    }
}



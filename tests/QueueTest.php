<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class QueueTest extends TestCase
{

    public function testCanAddToQueue(): void
    {
        $queue = new Queue();
        $queue->add(4);
        $queue->add(5);
        $queue->add(8);
        $queue->add(3);
        $this->assertEquals(4,$queue->front());
        $this->assertEquals(3,$queue->back());
    }

    public function testCanRemoveFromQueue(): void
    {
        $queue = new Queue();
        $queue->add(4);
        $queue->add(5);
        $queue->add(8);
        $queue->add(1);
        $queue->remove();
        $queue->remove();
        $this->assertEquals(8,$queue->front());
        $this->assertEquals(1,$queue->back());
    }

    public function testCannotRemoveFromEmptyQueue(): void
    {
        $this->expectException(Exception::class);
        $queue = new Queue();
        $queue->add(4);
        $queue->add(5);
        $queue->remove();
        $queue->remove();
        $queue->remove();
    }

    public function testQueueSize() : void
    {
        $queue = new Queue();
        $queue->add(4);
        $queue->add(5);
        $this->assertEquals(2,$queue->size());
    }

}



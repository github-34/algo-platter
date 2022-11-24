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

    public function testCanReverseQueue() : void
    {
        $q = new Queue();
        $q->add(5);
        $q->add(3);
        $q->add(4);
        $q->add(4);
        $q->add(9);
        $q->reverse();
        $this->assertEquals($q->remove(), 9);
        $this->assertEquals($q->remove(), 4);
        $this->assertEquals($q->remove(), 4);
        $this->assertEquals($q->remove(), 3);
        $this->assertEquals($q->remove(), 5);

        $q2 = new Queue();
        $q2->add(5);
        $q2->add(3);
        $q2->add(4);
        $q2->add(9);
        $q2->output();
        $q2->reverse();
        $q2->output();

        $this->assertEquals($q2->remove(), 9);
        $this->assertEquals($q2->remove(), 4);
        $this->assertEquals($q2->remove(), 3);
        $this->assertEquals($q2->remove(), 5);
    }

}

<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class LinkedListDoublyTest extends TestCase
{

    public function testCanAddToLinkedListDoubly(): void
    {
        $ll1 = new LinkedListDoubly();
        $ll1->addFirst(4);
        $ll1->addFirst(5);
        $ll1->addFirst(6);
        $ll1->addFirst(7);
        $ll1->addFirst(723);
        $ll1->output();
        $this->assertEquals(5,$ll1->length());
    }

    public function testCanRemoveFromLinkedListDoubly(): void
    {
        $ll1 = new LinkedListDoubly();
        $ll1->addFirst(4);
        $ll1->addFirst(5);
        $ll1->addFirst(6);
        $ll1->removeFirst();
        $ll1->removeFirst();
        $ll1->output();
        $this->assertEquals(1,$ll1->length());
    }

    public function testCanEmptyLinkedListDoubly(): void
    {
        $ll1 = new LinkedListDoubly();
        $ll1->addFirst(4);
        $ll1->addFirst(5);
        $ll1->addFirst(6);
        $ll1->empty();
        $this->assertEquals(0,$ll1->length());
    }

    public function testCannotRemoveFromEmptyLinkedListDoubly(): void
    {
        $this->expectException(Exception::class);
        $ll1 = new LinkedListDoubly();
        $ll1->addFirst(4);
        $ll1->removeFirst();
        $ll1->removeFirst();
    }
}


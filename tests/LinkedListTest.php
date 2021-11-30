<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class LinkedListTest extends TestCase
{

    public function testCanAddToLinkedList(): void
    {
        $ll1 = new LinkedList();
        $ll1->add(4);
        $ll1->add(5);
        $ll1->add(6);
        $ll1->add(7);
        $ll1->add(723);
        $ll1->output();
        $this->assertEquals(5,$ll1->length());
    }

    public function testCanRemoveFromLinkedList(): void
    {
        $ll1 = new LinkedList();
        $ll1->add(4);
        $ll1->add(5);
        $ll1->add(6);
        $ll1->remove();
        $ll1->remove();
        $ll1->output();
        $this->assertEquals(1,$ll1->length());
    }

    public function testCanEmptyLinkedList(): void
    {
        $ll1 = new LinkedList();
        $ll1->add(4);
        $ll1->add(5);
        $ll1->add(6);
        $ll1->emptyList();
        $this->assertEquals(0,$ll1->length());
    }

    public function testCannotRemoveFromEmptyLinkedList(): void
    {
        $this->expectException(Exception::class);
        $ll1 = new LinkedList();
        $ll1->add(4);
        $ll1->remove();
        $ll1->remove();
    }
}



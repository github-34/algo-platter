<?php

/**
 * Linked List
 *
 * A Linked list is a connected set of nodes. Each node consists of a value and
 * a reference to the next node. Nodes can be only added or removed from head of
 * the chain. LLs of this type are FILO structures.
 *
 * @package algo-platter
 * @version 0.5.0
 * @access  public
 * @see     http://git@github.com/github-34/algo-platter
 * @todo
 *          - Add: reverse LL
 *          - Add: intersect sorted LL - return LL not array
 *          - Add: Reverse LL stack implementation
 *          - Add: palindrome: the palindrome of an LL
 *          - Add: segregate even and odd nodes in a LL
 *          - Add: intersection point of two LLs
 *          - Add: remove duplicates from an unsorted LL
 */

class LinkedList
{

    public $head;

    public function __construct()
    {
        $this->head = null;
    }

    /**
     * Add
     *
     * Adds a node with a given value to the beginning of the linked list
     *
     * @param   mixed   $value  value of the added node. value can be any primitive type or object
     * @return  void
     */
    public function add($value) : void
    {
        $nextNode = &$this->head;
        $node = new LinkedListNode($value, $nextNode);
        $this->head = &$node;
    }

    /**
     * Remove
     *
     * Removes the first node from the beginning of the linked list
     *
     * @return  mixed
     */
    public function remove() : LinkedListNode
    {
        if (is_null($this->head))
            throw new Exception('Linked List is empty!');

        $removedNode = $this->head;
        $this->head = &$this->head->nextNode;
        return $removedNode;
    }

    /**
     * EmptyList
     *
     * Empties the Linked List
     *
     * Note: only the head is unset; the rest of the nodes are not (garbage collection?)
     *
     * @return  void
     */
    public function emptyList() : void
    {
        $this->head = null;
    }

    /**
     * Output
     *
     * Outputs the entire linked list
     *
     * @return  void
     */
    public function output() : void
    {
        if (is_null($this->head)) {
            echo "HEAD->NULL";
            return;
        }

        $node = &$this->head;

        echo "HEAD->";
        while($node instanceof LinkedListNode)
        {
            if (is_object($node->element))
                echo "Obj->";
            else
                echo $node->element."->";
            $node = &$node->nextNode;
        }
        echo "NULL\n";
    }

    /**
     * Length
     *
     * Determines the number of nodes in a linked list
     *
     * @return int
     * @space       O(n)
     * @time        O(n)
     */
    public function length(): int
    {
        if (is_null($this->head))
            return 0;

        $counter = 0;
        $node = &$this->head;

        while($node instanceof LinkedListNode) {
            $counter++;
            $node = &$node->nextNode;
        }
        return $counter;
    }
}

/**
 * Linked List Node
 *
 * A node for a linked list consisting of an element and a reference to the next node
 *
 * Note: No encapsulation, setters/getters for simplicity.
 *
 * @package algo-platter
 * @version 0.5.0
 * @access  public
 * @see     http://git@github.com/github-34/algo-platter
 * @todo
 */

class LinkedListNode
{
    public $element;
    public $nextNode;

    public function __construct($element, &$nextNode)
    {
        $this->element = $element;
        $this->nextNode = $nextNode;
    }

    public function output() : void
    {
        echo "Node: element: ";
        echo is_object($this->element) ? "OBJ" : $this->element;
    }
}

echo "\n\nLinked List 1:\n";

$ll1 = new LinkedList();
echo "Adding 5 elements.\n";
$ll1->add(4);
$ll1->add(5);
$ll1->add(6);
$ll1->add(7);
$ll1->add(723);
$ll1->output();
echo "LL length is: ".$ll1->length()."\n";
$ll1->output();
echo "Removing 3 elements.\n";
$ll1->remove();
$ll1->remove();
$ll1->remove();
$ll1->output();
echo "Removing all elements.\n";
$ll1->remove();
$ll1->remove();
$ll1->output();

echo "\n\nLinked List 2:\n";
$ll2 = new LinkedList();
$ll2->add(833);
$ll2->add(723);
$ll2->add(77);
$ll2->add(63);
$ll2->add(52);
$ll2->add(4);
$ll2->output();

echo "\n\nLinked List 3:\n";
$ll3 = new LinkedList();
$ll3->add(999);
$ll3->add(723);
$ll3->add(89);
$ll3->add(77);
$ll3->add(52);
$ll3->add(44);
$ll3->output();
echo "Emptying LL\n";
$ll3->emptyList();
$ll3->output();

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
 *          - Add: merge sort
 *          - Add: quick sort
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
        $next = &$this->head;
        $node = new LinkedListNode($value, $next);
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
        $this->head = &$this->head->next;
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
            $node = &$node->next;
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
            $node = &$node->next;
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
    public $next;

    public function __construct($element, &$next)
    {
        $this->element = $element;
        $this->next = $next;
    }

    public function output() : void
    {
        echo "Node: element: ";
        echo is_object($this->element) ? "OBJ" : $this->element;
    }
}

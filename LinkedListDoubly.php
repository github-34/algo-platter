<?php

/**
 * Doubly Linked List
 *
 * A doubly linked list is a connected set of nodes, where each node consists of an element and a connection to the previous and next node.
 * A doubly linked also maintains a reference to the first and last node. Nodes can be added or removed from the beginning or the end of the
 * chain. Doubly linked lists are LIFO (last in, first out) structures.
 *
 * Implementation:
 *      makes use of sentinel nodes instead of NULL for (previous/next) references in the first and last nodes that do not refer to doubly linked list nodes.
 *      FIX: ??? remove NULL altogether; use Sentinels for all 'dead' references
 *      Ensures that only one sentinel object is created on construction. All other uses of the sentinel node are via references.
 *
 * @package algo-platter
 * @version 0.7.0
 * @access  public
 * @see     http://git@github.com/github-34/algo-platter
 * @todo    - fix: standardize list node attribute naming?: 'value', 'element' or 'object';
 *                 'value' suggests primitive type only, 'element' suggests array, 'object' suggest non-primitive type only
 *          - fix: unset all nodes when emptying list
 */
class LinkedListDoubly
{
    public $first;
    public $last;

    public function __construct()
    {
        $this->first = $this->last = new Sentinel();
    }

    /**
     * Add First
     *
     * Adds a node to the beginning of the double linked list.
     * The node inserted references a sentinel (previous node) and the originally first node (next node).
     *
     * Implementation: requires DLLNode and Sentinel Objects both implement an isSentinel() method.
     *
     * @param   mixed   $value      the element of the node: can be any type, primitive or object
     * @return  void
     */
    public function addFirst($value): void
    {
        // If the List is Empty i.e. first&last => sentinel
        if ($this->first->isSentinel()) {
            $sentinel = $this->first;
            $next = $previous = $sentinel;       // sets next and previous to the sentinel node that first is referencing (no point in creating a new sentinel node here.)
            $this->first = $this->last = new LLDNode($value, $previous, $next);
            return;
        }

        // create
        $previous = &$this->first->previous;
        $next = $this->first;
        $node = new LLDNode($value, $previous, $next);

        // update old first node
        $this->first->previous = &$node;

        // set first to new node
        $this->first = &$node;

        // set node for gc
        unset($node);
        // if (is_null($this->first)) {           // first (and last) are null
        //     $next = $previous = new Sentinel();
        //     $this->first = new LLDNode($value, $previous, $next);
        //     $this->last = $this->first;
        // }
    }

    /**
     * Add Last
     *
     * Adds a node to the end of a doubly linked list.
     * The node inserted references the originally last node (previous node) and a sentinel (next node).
     *
     * @param   mixed   $value  the node element to be inserted: can be any type, primitive or object
     * @return  void
     */
    public function addLast($value): void
    {

        if ($this->first->isSentinel()) {
            $next = $previous = new Sentinel();
            $this->first = $this->last = new LLDNode($value, $previous, $next);
            return;
        }

        // create new node
        $previous = $this->last;
        $next = $this->last->next;
        $node = new LLDNode($value, $previous, $next);

        // update old last node
        $this->last->next = &$node;

        // set last node to new node
        $this->last = &$node;

        //[Unnecessary for local variable????] set node for gc
        unset($node);
    }

    /**
     * Remove First
     *
     * Removes the first node of a doubly linked list.
     * The new first node now references a sentinel (previous node) and its next node.
     *
     * @return  void
     */
    public function removeFirst(): void
    {
        // if the list has no nodes
        if ($this->first->isSentinel())
            throw new Exception('Doubly Linked List is empty.');

        // if the list has exactly one node
        if ($this->first->next->isSentinel()) {
            $sentinel = &$this->first->next;
            unset($this->first);
            $this->first = $this->last = $sentinel;
            return;
        }

        // if the list has more than one node
        $this->first->next->previous = &$this->first->previous;         // set new first previous to sentinel
        $this->first = $this->first->next;                              // set new the first to old first->next
    }

    /**
     * Remove Last
     *
     * Removes the last node of a doubly linked list.
     * The new last node now references a sentinel (next node) and the previous node.
     *
     * @return  void
     */
    public function removeLast(): void
    {
        // if the list has no nodes
        if ($this->last->isSentinel())
            throw new Exception('Doubly Linked List is empty.');

        // if the list has exactly one node
        if ($this->last->previous->isSentinel) {
            $this->first = $this->last = null;
        }

        // if the list has more than one node
        $this->last->previous->next = &$this->last->next;       // set next to sentinel
        $this->last = $this->last->previous;                    // set last node
    }

    /**
     * Length
     *
     * Returns the number of list nodes in the doubly linked list.
     * Sentinel nodes are not counted.
     *
     * @return  int         0 if no nodes and first/last refer to the sentinel. n non-sentinel, list nodes otherwise.
     */
    public function length() : int
    {
        $node = &$this->first;
        $nodeCounter = 0;

        while(!$node->isSentinel()) {
            $node = &$node->next;
            $nodeCounter++;
        }

        return $nodeCounter;
    }

    /**
     * Empty
     *
     * Empties the Linked List
     *
     * Implementation: nodes in list are not unset. (garbage collection?)
     *
     * @return  void
     */
    public function empty() : void
    {
        if ($this->last->isSentinel())
            return;

        // set first/last to reference the sentinel [Last->next is always the sentinel]
        $this->first = $this->last =&$this->last->next;
    }

    public function isEmpty() : bool
    {
        return $this->first->isSentinel() && $this->last->isSentinel();
    }

    /**
     * Output
     *
     * Outputs the entire doubly linked list.
     * Sentinels are denoted as 'S'.
     *
     * @return  void
     */
    public function output(): void
    {
        echo "\n\n";
        $node = $this->first;

        echo "S=>";
        while (!$node->isSentinel()) {
            echo $node->value;
            $node = &$node->next;
            echo ($node->isSentinel()) ? "=>S" : '<=>';
        }
        echo "\n";
    }
}

/**
 * Sentinel
 *
 * A placeholder for a doubly linked list that the first node references as its
 * previous node and the last node references as its next node.
 *
 * Ensures that null is not used in the doubly linked list chain.
 *
 * @package algo-platter
 * @version 0.7.0
 * @access  public
 * @see     http://git@github.com/github-34/algo-platter
 * @todo    -
 */
class Sentinel
{
    public function isSentinel() : bool
    {
        return true;
    }
}

/**
 * Doubly Linked List Node
 *
 * A node for a doubly linked list consisting of an element, a reference
 * to the next node and a reference to the previous node in the linked list chain
 *
 * Note: No encapsulation for simplicity.
 *
 * @package algo-platter
 * @version 0.7.0
 * @access  public
 * @see     http://git@github.com/github-34/algo-platter
 * @todo    -
 */
class LLDNode
{
    public $value;
    public $previous;
    public $next;

    public function __construct($value, &$previous, &$next)
    {
        $this->value = $value;
        $this->previous = $previous;
        $this->next = $next;
    }

    public function isSentinel() : bool
    {
        return false;
    }
}

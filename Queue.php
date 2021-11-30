<?php

/**
 * Queue
 *
 * A queue is a set of sequential elements with a reference to the front and back of the queue.
 * Elements can be added to the back of the queue or removed from the front of the queue.
 * Queues are FILO structures without a maximum number of elements.
 *
 * Array Implementation
 *
 * Note: queues have no maximum number of elements
 *
 * @package algo-platter
 * @version 0.6.0
 * @access  public
 * @see     http://git@github.com/github-34/algo-platter
 * @todo
 */

class Queue {

    private $elements;
    private $front;                     // array index of front of queue
    private $back;                      // array index of back of queue

    public function __construct()
    {
        $this->elements = array();
        $this->front = null;
        $this->back = null;
    }

    /**
     * Add
     *
     * Adds an element to the back of the queue. Updates the back element reference.
     *
     * 0 is always the front of the queue; n is the back of the queue
     *
     * @param   mixed   $newElement     an element: can be any type, object or primitive.
     * @return  void
     */
    public function add($newElement) : void
    {
        is_null($this->back) ? $this->back = $this->front = 0 : $this->back++;
        $this->elements[$this->back] = $newElement;
    }

    /**
     * Remove
     *
     * Removes an element from the front of the queue. Updates the back reference and front, if necessary.
     *
     * @param   mixed   $newElement     the element from back of queue: can be any type, object or primitive.
     * @return  void
     * @throws  Exception               if the queue has no elements, an element cannot be removed and, so, an exception is thrown.
     */
    public function remove() : mixed
    {
        if (is_null($this->front))
            throw new Exception('Queue\'s empty');

        $elem = $this->elements[$this->front];
        unset($this->elements[$this->front]);

        ($this->front === $this->back) ? $this->front = $this->back = null : $this->front++;

        return $elem;
    }

    /**
     * Empty
     *
     * Returns true if the queue is empty; false otherwise.
     *
     * @return  bool
     */
    public function empty() : bool
    {
        return is_null($this->front) ? true : false;
    }

    /**
     * Size
     *
     * Returns the number of elements in array
     *
     * @return  bool
     */
    public function size() : int
    {
        return sizeof($this->elements);
    }

    /**
     * Front
     *
     * Returns a reference to the node at front of queue
     *
     * @return  mixed           returns a reference to the node at front of queue
     */
    public function &front() : mixed
    {
        if (is_null($this->front))
            throw new Exception('Queue\'s empty');

        return $this->elements[$this->front];
    }

    /**
     * Back
     *
     * Returns a reference to the node at back of queue
     *
     * @return  mixed           returns a reference to the node at back of queue
     */
    public function &back() : mixed
    {
        if (is_null($this->back))
            throw new Exception('Queue\'s empty');

        return $this->elements[$this->back];
    }

    /**
     * Output
     *
     * Outputs the entire Queue
     *
     * @return  void
     */
    public function output() : void
    {
        echo "\nF: ";
        foreach ($this->elements as $node)
            echo $node."<-";
        echo ":B\n";
    }
}

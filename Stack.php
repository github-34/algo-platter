<?php

/**
 * Stack
 *
 * A stack is a sequentially ordered set of elements, where one element is designated as the top element.
 * Elements can be `popped' or removed from the top of a stack or pushed onto a stack i.e. added to the top of the stack.
 * No operations can be performed on elements other than on the top element. Stacks are thus FIFO structures.
 *
 * @package algo-platter
 * @version 0.4.0
 * @access  public
 * @see     http://git@github.com/github-34/algo-platter
 * @todo
 */

class Stack
{

    private array   $elements;  // each array element can be of any type
    private $top;               // element array index: int or null, if element array is empty

    public function __construct()
    {
        $this->elements = array();
        $this->top = null;
    }

    /**
     * Push
     *
     * Pushes (adds) an element onto the top of stack
     *
     * Assumption:  1. stack cannot be full i.e. it has no maximum elements
     *
     * @param   mixed   $element
     * @return  void
     * @space           O(1)
     * @time            O(1)
     */
    public function push($element): void
    {
        $this->top = is_null($this->top) ? 0 : $this->top + 1;
        $this->elements[$this->top] = $element;
    }

    /**
     * Pop
     *
     * Pops (removes) top stack element
     *
     * @param   mixed       $newElement
     * @return  void
     * @throws  Exception   if the stack has no elements
     * @space               O(1)
     * @time                O(1)
     */
    public function pop(): mixed
    {
        if (is_null($this->top))
            throw new Exception('The stack is empty!');

        $elem = $this->elements[$this->top];
        unset($this->elements[$this->top]);
        $this->top = ($this->top == 0) ? null : $this->top - 1;

        return $elem;
    }

    /**
     * Top
     *
     * Gets the top stack element without removing it from the stack
     *
     * @return  mixed       mixed, whatever the top stack element type is
     *                      null, if the stack has no elements
     * @space               O(1)
     * @time                O(1)
     */
    public function top(): mixed
    {
        if (is_null($this->top))
            return null;

        return $this->elements[$this->top];
    }
}

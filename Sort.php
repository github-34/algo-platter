<?php 

/**
 * Sort is a class of basic sorting algorithms on arrays
 *      Algorithm               Type
 *      1. Bubble sort          comparison
 *      2. Insertion sort       comparison
 *      3. Selection sort       comparison
 *
 * @package Algorithms
 * @version 0.3.0
 * @access  public
 * @see     http://git@github.com/github-34/algo-platter
 * @todo
 *          - ADD: quick sort
 *          - ADD: merge sort
 *          - ADD: heap sort
 *          - ADD: radix sort
 */
class Sort
{

    private $algo = 'bubble';

    public function __construct($algo)
    {
        $this->algo = $algo;
    }

    /**
     * Sort
     *
     * Outputs the unsorted array, sorts it by set algorithm and outputs the sorted array
     *
     * @param   Array   $arr    array - passed by reference
     * @return  void
     * @space           O(1)
     * @time            O(n)
     */
    public function sort(Array &$unsorted, String $testCaseDescription = '')
    {
        // echo $testCaseDescription."\n";
        // $this->printArr($unsorted);

        if ($this->algo === 'bubble')
            $arrSorted = $this->bubbleSort($unsorted);
        else if ($this->algo === 'insertion')
            $arrSorted = $this->insertionSort($unsorted);
        else if ($this->algo === 'selection')
            $arrSorted = $this->selectionSort($unsorted);
        else
            throw new Exception('Sorting algorithm '.$this->algo.' is not implemented.');

        // echo "\n";
        // $this->printArr($arrSorted);
        // echo "\n";

        return $arrSorted;
    }

    /**
     * PrintArr
     *
     * Output the contents of an array
     *
     * @param   Array   $arr    array - passed by reference
     * @return  void
     * @space           O(1)
     * @time            O(n)
     */
    public function printArr(Array &$arr) : void
    {
        echo "[ ";
        for ($i = 0; $i < sizeof($arr); $i++)
            echo $arr[$i] . " ";
        echo "] ";
    }

    /**
     * Swap
     *
     * Swaps the values of two array elements.
     * The array is passed by reference and not returned.
     *
     * Assumption: both array keys exist in the array.
     *
     * @param   array   &$array
     * @param   int     $firstKey       a valid array element index
     * @param   int     $secondKey      a valid array element index
     * @return  void
     * @space           O(1)
     * @time            O(1)
     */
    public function swap(&$array, $firstKey, $secondKey): void
    {
        $temp = $array[$firstKey];
        $array[$firstKey] = $array[$secondKey];
        $array[$secondKey] = $temp;
    }

    /**
     * Bubble Sort
     *
     * Sorts by comparing a pair of elements right next to each other and swapping the larger element toward the end of the array
     * Type: comparison sorting algorithm
     *
     * Pseudo Code:
     *      Iteration: through all elements: result: all elements are sorted.
     *        Iteration: from first element to last unsorted element; result: largest element in unsorted parts gets moved to first element in sorted portion
     *          Comparison: if element is smaller than next-element, swap the two element values
     *
     * @param   array   $arr    an unsorted array of integers
     * @return  array           the sorted array
     * @space                   O(n)
     * @time                    O(n^2)
     */
    public function bubbleSort(Array $arr) : Array
    {
        $lastUnsortedElement = sizeof($arr) - 1;

        // iterate through n array elements
        for ($i = 0; $i < sizeof($arr); $i++) {

            // iterate: move largest element from beginning (by swapping successive pairs) to end of unsorted part of array
            for ($j = 0; $j < $lastUnsortedElement; $j++)
                if ($arr[$j] > $arr[$j + 1])
                    $this->swap($arr, $j, $j + 1);

            // shrink unsorted part of array by one
            $lastUnsortedElement--;
        }
        return $arr;
    }

    /**
     * Insertion Sort
     *
     * Sorts array by inserting an unsorted element into the sorted part of array by comparing each sorted element to it
     * Type: comparison
     *
     * Pseudo Code:
     *      Iterate from last unsorted element to first unsorted element; result: all elements are sorted.
     *          Iterate from first sorted element to last sorted element
     *              if current sorted element value is less than
     *                  swap the current sorted element = the last unsorted element
     *              else (reached element => current sorted element)
     *                  break inner loop
     *
     * @param   array   $arr    an unsorted array of integers
     * @return  array           the sorted array
     * @space                   O(n)
     * @time                    O(n^2)
     */
    public function insertionSort(Array $arr) : Array
    {
        if (empty($arr) || sizeof($arr) === 1)
            return $arr;

        $lue = sizeof($arr) - 2;                                // index of last unsorted element

        for ($i = $lue; $i >= 0; $i--) {

            for ($j = $i; $j <= sizeof($arr) - 2; $j++) {       // j is current sorted element were comparing i (last unsorted element) to
                if ($arr[$j] > $arr[$j + 1])
                    $this->swap($arr, $j, $j + 1);
                else
                    break;
            }
        }

        return $arr;
    }

    /**
     * Selection Sort
     *
     * Sorts an array by finding the smallest element in unsorted part of the array and swapping
     * it with the first element in unsorted part of array.
     * Type: basic comparison
     *
     * Pseudo-code:
     *      Iterate through array
     *          Iterate through all element of unsorted part of array
     *              Search for smallest element in unsorted portion
     *          Swap smallest with first unsorted element
     *          Update first unsorted element as the smallest
     *
     * @param   array   $arr    an unsorted array of integers
     * @return  array           a sorted array
     * @space                   O(n)
     * @time                    O(n^2)
     */
    public function selectionSort(Array $arr) : Array
    {
        $fue = 0;                   // first unsorted element
        $smallest = 0;              // index of smallest element in current unsorted search/iteration
        $last = sizeof($arr) - 1;

        // iterate through entire array
        for ($i = 0; $i <= $last; $i++) {

            // iterate through unsorted part of array
            for ($j = $fue; $j <= $last; $j++) {

                // find smallest unsorted element
                if ($arr[$j] < $arr[$smallest])
                    $smallest = $j;
            }

            // swap smallest unsorted element with first unsorted element
            $this->swap($arr, $smallest, $fue);

            $fue++;
            $smallest = $fue;
        }

        return $arr;
    }
}

// $algorithm = $argv[1];
// $sorter = new Sort($algorithm);

// echo "\nRunning ".$algorithm." Sort\n";
// $unsortedArrs = [
//     [ 'arr' => [],                          'desc' => 'no elements' ],
//     [ 'arr' => [1],                         'desc' => '1 element' ],
//     [ 'arr' => [1, 1],                      'desc' => '2 elements, same value' ],
//     [ 'arr' => [1, 1],                      'desc' => '2 elements, different value' ],
//     [ 'arr' => [1, 1, 1, 1, 1],             'desc' => 'n elements, same values' ],
//     [ 'arr' => [1, 2, 3, 4, 5],             'desc' => 'n elements, no duplicates, ascending' ],
//     [ 'arr' => [5, 4, 3, 2, 1],             'desc' => 'n elements, no duplicates, descending' ],
//     [ 'arr' => [1, 2, 2, 4, 4],             'desc' => 'n elements, duplicates, ascending' ],
//     [ 'arr' => [4, 4, 2, 2, 1],             'desc' => 'n elements, duplicates, descending' ],
//     [ 'arr' => [4, 1, 3, 3, 6, 8],          'desc' => 'n elements, duplicates, random, even length'],
//     [ 'arr' => [4, 1, 3, 9, 6, 8],          'desc' => 'n elements, no duplicates, random, even length'],
//     [ 'arr' => [4, 1, 3, 1, 3, 6, 8],       'desc' => 'n elements, duplicates, random, odd length'],
//     [ 'arr' => [4, 1, 3, 9, 3, 6, 8],       'desc' => 'n elements, no duplicates, random, odd length'],
// ];
// foreach ($unsortedArrs as $unsorted)
//     $sorter->sort($unsorted['arr'], $unsorted['desc']);

?>

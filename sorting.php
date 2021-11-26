<?php 

/**
 * Sort is a class of basic sorting algorithms on arrays
 *      Algorithm               Type
 *      1. Bubble sort          comparison
 *
 * @package Algorithms
 * @version 0.1.1
 * @access  public
 * @see     http://git@github.com/github-34/algo-platter
 * @todo
 *          - ADD: selection sort
 *          - ADD: insertion sort
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
        echo $testCaseDescription."\n";
        $this->printArr($unsorted);

        if ($this->algo === 'bubble')
            $arrSorted = $this->bubbleSort($unsorted);
        echo "\n";
        $this->printArr($arrSorted);
        echo "\n";
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
     * @param   array   $arr    an unsorted array
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
}

$sorter = new Sort('bubble');

$unsorted1 = [];
$unsorted2 = [1];
$unsorted3 = [1, 1];
$unsorted4 = [1, 2];
$unsorted5 = [1, 1, 1, 1, 1];
$unsorted6 = [1, 2, 3, 4, 5];
$unsorted7 = [1, 2, 2, 4, 4];
$unsorted8 = [5, 4, 3, 2, 1];
$unsorted9 = [4, 4, 2, 2, 1];
$unsorted10 = [4, 1, 3, 3, 6, 8];
$unsorted11 = [4, 1, 3, 9, 6, 8];
$unsorted12 = [4, 1, 3, 1, 3, 6, 8];
$unsorted13 = [4, 1, 3, 9, 3, 6, 8];
$sorter->sort($unsorted1, 'no elements');
$sorter->sort($unsorted2, '1 element');
$sorter->sort($unsorted3, '2 elements, same value');
$sorter->sort($unsorted4, '2 elements, different value');
$sorter->sort($unsorted5, 'n-elements, same values');
$sorter->sort($unsorted6, 'n-elements, no duplicates, ascending values');
$sorter->sort($unsorted7, 'n-elements, duplicates, ascending values');
$sorter->sort($unsorted8, 'n-elements, no duplicates, descending values');
$sorter->sort($unsorted9, 'n-elements, duplicates, descending values');
$sorter->sort($unsorted10, 'n-elements, duplicates, random, even number of elements');
$sorter->sort($unsorted11, 'n-elements, no duplicates, random, even number of elements');
$sorter->sort($unsorted12, 'n-elements, duplicates, random, odd number of elements');
$sorter->sort($unsorted13, 'n-elements, no duplicates, random, odd number of elements');

?>

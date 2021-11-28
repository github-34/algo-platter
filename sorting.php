<?php

/**
 * Sort is a class of basic sorting algorithms on arrays
 *      Algorithm               Type
 *      1. Bubble sort          comparison
 *      2. Insertion sort       comparison
 *      3. Selection sort       comparison
 *      4. Merge sort           divide-and-conquer, recursive
 *
 * @package Algorithms
 * @version 0.4.0
 * @access  public
 * @see     http://git@github.com/github-34/algo-platter
 * @todo
 *          - ADD: quick sort
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
        else if ($this->algo === 'insertion')
            $arrSorted = $this->insertionSort($unsorted);
        else if ($this->algo === 'selection')
            $arrSorted = $this->selectionSort($unsorted);
        else if ($this->algo === 'quick')
            $arrSorted = $this->quickSort($unsorted, 0, sizeof($unsorted) - 1);
        else
            throw new Exception('Sorting algorithm '.$this->algo.' is not implemented.');

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


    /**
     * Quick Sort
     *
     * Sorts an array recursively by sorting a segment divided into two partitions around a pivot, where all elements less than pivot are in one partition, and all values greater than pivot are in the other.
     * Type: divide-and-conquer, recursive, comparison
     *
     * Pseudo Code:
     *      Recursion: sub-array: &-orig-array, first index, last index, pivot (between first and last)
     *          Base:
     *              0 element: return   [already sorted]
     *              1 element: return   [already sorted]
     *          Recursive Step:
     *              PARTITION: given a pivot-index, place all smaller elements to the left of pivot-value and all larger elements to the right of pivot-value
     *                  iterate: i=0 to i=len
     *                      if a[i] > a[pivotIndex]
     *                          //put in left partition
     *                          swap
     *                          update pivot index to i
     *              newpivotindex
     *          return quicksort($arr, newpivotindex)
     * sorted array (a subarray of original)
     *
     * @param   array   $arr                        reference to an (unsorted) array
     * @param   int     $partitionStartIndex        sdfds
     * @param   int     $partitionEndIndex          asdfsdf
     * @param   int     $partitionPivotIndex        asdfasdf
     * @return  void                                the array parameter referenced is sorted as a side effect
     * @space           O(n)
     * @time            O(n^2)
     */

    // work for when pivot is the last element of parition; initially this is the index of last array element
    public function quickSort(&$arr, $partitionStartIndex, $partitionEndIndex): void
    {
        //echo "\n".$partitionStartIndex."-".$partitionEndIndex."";
        // base cases
        $partitionSize = $partitionEndIndex - $partitionStartIndex;
        if ($partitionSize <= 0) return;   // do nothing; nothing to sort
        if ($partitionSize === 1) return;   // do nothing; one element already sorted
        if ($partitionSize === 2) return;

        // recursive step
        $newPivotIndex = $this->partition($arr, $partitionStartIndex, $partitionEndIndex);

        echo "\nQS=:" . $partitionStartIndex . "-" . $newPivotIndex;
        $this->quicksort($arr, $partitionStartIndex, $newPivotIndex);

        echo "\nQS=:" . ($newPivotIndex + 1) . "-" . $partitionEndIndex;
        $this->quicksort($arr, $newPivotIndex + 1, $partitionEndIndex);
        print_r($arr);
    }

    /**
     * Partition
     *
     * Moves elements smaller than the pivot (assigned by pivot index param) to its left, larger elements to its right and equal values right next it on either side.
     * The set of elements on the either side are called "partitions" the array is divided into.
     * The partitions are created by iterating once through the array, comparing each element with the pivot and then swapping the element with the pivot if the element is smaller than it.
     * In creating the partitions, the initial pivot element is moved in the array. The function returns the final pivot index.
     *
     * Note that the final partitioned array is not necessarily sorted in order. The elements in the left and right partition could be unsorted until the quick sort is finished.
     *
     * Assumption: the pivot index is set in array [no checks are performed that this isn't so]
     *
     * Pseudo Code: put element@pivot index into middle
     *
     *      Pivot = last element
     *      HelperIndex = 0
     *      Iterate over array from first element to last
     *
     *
     * @param   array   $arr            array
     * @param   int     $pivotIndex     the index of pivot element in array
     * @return  int                     the index of the new pivot element
     * @space           O(n)
     * @time            O(n)
     */
    public function partition(&$arr, $partitionStartIndex, $partitionEndIndex): int
    {
        // pivotIndex                       // current end of greater-than-partition (right)
        $currentCompare = $partitionStartIndex;                // current end of less-than-partition (left)
        $pivotIndex = $partitionEndIndex; //sizeof($arr) - 1;
        //echo "\nP:pivotIndex: ".$pivotIndex;
        $pivotValue = $arr[$pivotIndex];    //
        echo "\nP:pivotValue: " . $pivotValue;
        for ($i = 0; $i < sizeof($arr); $i++) {

            if ($arr[$currentCompare] < $pivotValue)
                $currentCompare++;

            if ($arr[$currentCompare] > $pivotValue) {

                // move value before pivot to current compare
                // move current-compare to pivot index
                // move pivot value down 1; update pivotIndex

                $temp = $arr[$currentCompare];
                $arr[$currentCompare] = $arr[$pivotIndex - 1];
                $arr[$pivotIndex - 1] = $pivotValue;
                $arr[$pivotIndex] = $temp;
                $pivotIndex--;
            }
        }
        echo "\nP: new pivotIndex:" . $pivotIndex;

        //print_r($arr);
        return $pivotIndex;
    }


    public function mergeSort(&$arr, $startIndex, $endIndex)
    {

        // find middle
        $numberOfElements = ($endIndex - $startIndex) + 1;
        $middleIndex = $startIndex + (round(($numberOfElements) / 2) - 1);
        echo "\nS:" . $startIndex . "-M:" . $middleIndex . "-E:" . $endIndex ;

        // base cases
        if (($endIndex - $middleIndex) <= 0) return;
        if (($middleIndex - $startIndex) <= 0) return;
        $this->mergeSort($arr, $startIndex, $middleIndex);
        $this->mergeSort($arr, $middleIndex + 1, $endIndex);
        $this->merge($arr, $startIndex, $middleIndex, $middleIndex + 1, $endIndex);
    }

    /**
     * Merge
     * 
     * Merges two sorted partitions of the same array, where the partitions are delineated by start-end indexes
     * 
     * Type: divide-and-conquer, recursive, comparison
     * 
     * @param   Array   &$arr            an array of integers (passed by reference)
     * @param   int     $start1Index    the index at the start of the first sorted partition of the array
     * @param   int     $end1Index      the index at the end of the first sorted partition of the array
     * @param   int     $start2Index    the index at the start of the second sorted partition of the array
     * @param   int     $end2Index      the index at the end of the second sorted partition of the array
     * @return  Array
     * @space           O(?)
     * @time            O(?)
     */
    public function merge(array &$arr, int $start1Index, int $end1Index, int $start2Index, int $end2Index): array
    {

        echo "\n";
        $this->printArr($arr);
        echo "Mergin' s1:".$start1Index." e1:".$end1Index." s2:".$start2Index." e2:".$end2Index;
        $helper1 = $start1Index;
        $helper2 = $start2Index;
        $merge = array();
        $m = 0;

        for ($i = $start1Index; $i <= $end2Index; $i++) {

            // Left Partition Done - Add from next from (sort) right partition
            if ($helper1 > $end1Index && $helper2 < $end2Index) {
                //echo "Left partition done. Adding others from right to MERGE\n";
                $merge[$m] = $arr[$helper2];
                $helper2++;
                $m++;
                continue;
            }

            // Right Partition Done - Add from next from (sort) left partition
            if ($helper2 > $end2Index  && $helper1 < $end1Index) {
                //echo "Right partition done. Add others from left to MERGE\n";
                $merge[$m] = $arr[$helper1];
                $helper1++;
                $m++;
                continue;
            }

            if ($helper2 > $end2Index || $helper1 > $end1Index)
                break;

            $leftVal = $arr[$helper1];
            $rightVal = $arr[$helper2];

            if ($leftVal < $rightVal) {
                $merge[$m] = $leftVal;
                $helper1++;
                $m++;
            } elseif ($leftVal > $rightVal) {
                $merge[$m] = $rightVal;
                $helper2++;
                $m++;
            } else {
                $merge[$i] = $leftVal;
                $merge[$i + 1] = $rightVal;
                $helper1++;
                $helper2++;
                $m = $m + 2;
            }
        }
        echo "\n";
        $this->printArr($merge);
        return $merge;
    }

}

$sorter = new Sort('quick');

$unsorted = [6, 3, 9, 1, 5, 2];
//$unsorted = [1, 2, 3, 4, 5, 6];
//$unsorted = [9, 7, 7, 6, 6, 5];
//print_r($unsorted);
echo $sorter->partition($unsorted, 1, 4);
// print_r($unsorted);
//print_r($sorted);
// merge on two sorted partitions
$sortedParts = [1, 4];
$sorter->merge($sortedParts, 0, 0, 1, 1);
$sortedParts = [1, 4, 1];
$sorter->merge($sortedParts, 0, 1, 2, 2);
$sortedParts = [1, 4, 1];
$sorter->merge($sortedParts, 0, 1, 2, 2);
$sortedParts = [2, 4, 8, 6, 6, 8];
$sorter->merge($sortedParts, 0, 2, 3, 5);
$sortedParts = [2, 4, 8, 6, 1, 4, 9];
$sorter->merge($sortedParts, 0, 2, 4, 6);
$sortedParts = [2, 2, 4, 6, 6, 8];
$sorter->merge($sortedParts, 0, 2, 3, 5);
$sortedParts = [1, 2, 3, 4, 5, 6];
$sorter->merge($sortedParts, 0, 2, 3, 5);

// print_r($unsorted);
// $sorter->mergeSort($unsorted, 0, sizeof($unsorted) - 1);
// print_r($unsorted);
exit;

/**
 * Test Cases
 *
 */
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

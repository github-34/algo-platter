<?php

use PHPUnit\Framework\TestCase;

final class SortTest extends TestCase
{
    private $testCases = [
        [ 'u' => [],                    's' => [],                          'desc' => 'no elements' ],
        [ 'u' => [1],                   's' => [1],                         'desc' => '1 element' ],
        [ 'u' => [1, 1],                's' => [1, 1],                      'desc' => '2 elements, same value' ],
        [ 'u' => [2, 1],                's' => [1, 2],                      'desc' => '2 elements, different value' ],

        [ 'u' => [2, 2, 1],             's' => [1, 2, 2],                   'desc' => '3 elements, duplicates, descending' ],
        [ 'u' => [1, 1, 2],             's' => [1, 1, 2],                   'desc' => '3 elements, duplicates, ascending' ],
        [ 'u' => [5, 2, 4],             's' => [2, 4, 5],                   'desc' => '3 elements, no duplicates, random' ],

        [ 'u' => [2, 2, 1, 1],          's' => [1, 1, 2, 2],                'desc' => '4 elements, duplicates, descending' ],
        [ 'u' => [1, 1, 2, 2],          's' => [1, 1, 2, 2],                'desc' => '4 elements, duplicates, ascending' ],
        [ 'u' => [4, 5, 3, 4],          's' => [3, 4, 4, 5],                'desc' => '4 elements, duplicates, random' ],
        [ 'u' => [4, 2, 7, 1],          's' => [1, 2, 4, 7],                'desc' => '4 elements, no duplicates, random' ],

        [ 'u' => [1, 1, 1, 1, 1],       's' => [1, 1, 1, 1, 1],             'desc' => 'n elements, all same value' ],
        [ 'u' => [1, 2, 3, 4, 5],       's' => [1, 2, 3, 4, 5],             'desc' => 'n elements, no duplicates, ascending' ],
        [ 'u' => [5, 4, 3, 2, 1],       's' => [1, 2, 3, 4, 5],             'desc' => 'n elements, no duplicates, descending' ],
        [ 'u' => [1, 2, 2, 4, 4],       's' => [1, 2, 2, 4, 4],             'desc' => 'n elements, duplicates, ascending' ],
        [ 'u' => [4, 4, 2, 2, 1],       's' => [1, 2, 2, 4, 4],             'desc' => 'n elements, duplicates, descending' ],
        [ 'u' => [4, 1, 3, 3, 6, 8],    's' => [1, 3, 3, 4, 6, 8],          'desc' => 'n elements, duplicates, random, even length'],
        [ 'u' => [4, 1, 3, 9, 6, 8],    's' => [1, 3, 4, 6, 8, 9],          'desc' => 'n elements, no duplicates, random, even length'],
        [ 'u' => [4, 1, 3, 1, 3, 6, 8], 's' => [1, 1, 3, 3, 4, 6, 8],       'desc' => 'n elements, duplicates, random, odd length'],
        [ 'u' => [4, 1, 3, 9, 7, 6, 8], 's' => [1, 3, 4, 6, 7, 8, 9],       'desc' => 'n elements, no duplicates, random, odd length'],
    ];

    private $largeIntArrUnsorted = [];
    private $largeIntArrSorted = [];

    protected function setUp() : void
    {
        $random_number_array = range(0, 30000);
        shuffle($random_number_array);
        $rand_arr = array_slice($random_number_array ,0,30000);
        $this->largeIntArrUnsorted = $rand_arr;
        $this->largeIntArrSorted = $this->largeIntArrUnsorted;
        sort($this->largeIntArrSorted);
    }

    public function doTests($sorter)
    {
        //echo "\n".$sorter->getAlgo()." tests\n=============\n";
        foreach ($this->testCases as $case) {
            //echo 'Test: '.$case['desc']."\n";
            $sorted = $sorter->sort($case['u']);
            $this->assertEquals($case['s'],$sorted);
        }
    }
    public function testBubbleSort(): void
    {

        $sorter = new Sort('bubble');
        $this->doTests($sorter);
    }

    public function testInsertionSort(): void
    {
        $sorter = new Sort('insertion');
        $this->doTests($sorter);
    }

    public function testSelectionSort(): void
    {
        $sorter = new Sort('selection');
        $this->doTests($sorter);
    }

    public function testQuickSort(): void
    {
        $sorter = new Sort('quick');
        $this->doTests($sorter);
    }

    public function testMergeSort(): void
    {
        $sorter = new Sort('merge');
        $this->doTests($sorter);
    }

    public function testBubbleSortLarge(): void
    {
        $sorter = new Sort('bubble');
        $sorted = $sorter->sort($this->largeIntArrUnsorted);
        $this->assertEquals($this->largeIntArrSorted,$sorted);
    }

    public function testInsertionSortLarge(): void
    {
        $sorter = new Sort('insertion');
        $sorted = $sorter->sort($this->largeIntArrUnsorted);
        $this->assertEquals($this->largeIntArrSorted,$sorted);
    }

    public function testSelectionSortLarge(): void
    {
        $sorter = new Sort('insertion');
        $sorted = $sorter->sort($this->largeIntArrUnsorted);
        $this->assertEquals($this->largeIntArrSorted,$sorted);
    }

    public function testQuickSortLarge(): void
    {
        $sorter = new Sort('quick');
        $sorted = $sorter->sort($this->largeIntArrUnsorted);
        $this->assertEquals($this->largeIntArrSorted,$sorted);
    }

    public function testMergeSortLarge(): void
    {
        $sorter = new Sort('merge');
        $sorted = $sorter->sort($this->largeIntArrUnsorted);
        $this->assertEquals($this->largeIntArrSorted,$sorted);
    }
    public function testPhpSortLarge(): void
    {
        $temp = $this->largeIntArrUnsorted;
        sort($temp);
        $this->assertEquals($this->largeIntArrSorted,$temp);
    }
}



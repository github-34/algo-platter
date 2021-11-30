<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class SortTest extends TestCase
{
    private $cases = [
        [ 'u' => [],                    's' => [],                          'desc' => 'no elements' ],
        [ 'u' => [1],                   's' => [1],                         'desc' => '1 element' ],
        [ 'u' => [1, 1],                's' => [1, 1],                      'desc' => '2 elements, same value' ],
        [ 'u' => [2, 1],                's' => [1, 2],                      'desc' => '2 elements, different value' ],
        [ 'u' => [1, 1, 1, 1, 1],       's' => [1, 1, 1, 1, 1],             'desc' => 'n elements, same values' ],
        [ 'u' => [1, 2, 3, 4, 5],       's' => [1, 2, 3, 4, 5],             'desc' => 'n elements, no duplicates, ascending' ],
        [ 'u' => [5, 4, 3, 2, 1],       's' => [1, 2, 3, 4, 5],             'desc' => 'n elements, no duplicates, descending' ],
        [ 'u' => [1, 2, 2, 4, 4],       's' => [1, 2, 2, 4, 4],             'desc' => 'n elements, duplicates, ascending' ],
        [ 'u' => [4, 4, 2, 2, 1],       's' => [1, 2, 2, 4, 4],             'desc' => 'n elements, duplicates, descending' ],
        [ 'u' => [4, 1, 3, 3, 6, 8],    's' => [1, 3, 3, 4, 6, 8],          'desc' => 'n elements, duplicates, random, even length'],
        [ 'u' => [4, 1, 3, 9, 6, 8],    's' => [1, 3, 4, 6, 8, 9],          'desc' => 'n elements, no duplicates, random, even length'],
        [ 'u' => [4, 1, 3, 1, 3, 6, 8], 's' => [1, 1, 3, 3, 4, 6, 8],       'desc' => 'n elements, duplicates, random, odd length'],
        [ 'u' => [4, 1, 3, 9, 7, 6, 8], 's' => [1, 3, 4, 6, 7, 8, 9],       'desc' => 'n elements, no duplicates, random, odd length'],
    ];

    public function testBubbleSort(): void
    {
        $sorter = new Sort('bubble');
        echo "\nBubble Sort Tests\n=============\n";
        foreach ($this->cases as $case) {
            echo 'Test: '.$case['desc']."\n";
            $sorted = $sorter->sort($case['u'], '');
            $this->assertEquals($case['s'],$sorted);
        }

    }

    public function testInsertionSort(): void
    {
        $sorter = new Sort('insertion');
        echo "\nInsertion Sort Tests\n=============\n";
        foreach ($this->cases as $case) {
            echo 'Test: '.$case['desc']."\n";
            $sorted = $sorter->sort($case['u'], '');
            $this->assertEquals($case['s'],$sorted);
        }

    }

    public function testSelectionSort(): void
    {
        $sorter = new Sort('selection');
        echo "\nSelection Sort Tests\n=============\n";
        foreach ($this->cases as $case) {
            echo 'Test: '.$case['desc']."\n";
            $sorted = $sorter->sort($case['u'], '');
            $this->assertEquals($case['s'],$sorted);
        }

    }

}



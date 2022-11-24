<?php

use PHPUnit\Framework\TestCase;

final class RecursionTest extends TestCase
{

    public function testIntegerSum(): void
    {
        $testCases = [
            [ 'num' => 0, 'exp' => 0, 'desc' => 'Integer Sum(0):'],
            [ 'num' => 1, 'exp' => 1, 'desc' => 'Integer Sum(1):'],
            // [ 'num' => 3, 'exp' => 6, 'desc' => 'Integer Sum(3):'],
            // [ 'num' => 5, 'exp' => 15, 'desc' => 'Integer Sum(5):'],
        ];

        foreach ($testCases as $case) {
            $sum = Recursion::intSum($case['num']);
            $this->assertEquals($case['exp'], $sum);
        }
    }

    // public function testFactorial() : void
    // {
    //     $testCases = [
    //         [ 'num' => 0, 'exp' => 0, 'desc' => 'Integer Sum(0):'],
    //         [ 'num' => 1, 'exp' => 1, 'desc' => 'Integer Sum(1):'],
    //         [ 'num' => 2, 'exp' => 2, 'desc' => 'Integer Sum(2):'],
    //         [ 'num' => 3, 'exp' => 6, 'desc' => 'Integer Sum(3):'],
    //         [ 'num' => 4, 'exp' => 24, 'desc' => 'Integer Sum(4):'],
    //         [ 'num' => 5, 'exp' => 120, 'desc' => 'Integer Sum(5):'],
    //         [ 'num' => 22, 'exp' => 120, 'desc' => 'Integer Sum(22):'],
    //     ];

    //     echo "\n Integer Sum tests\n=============\n";
    //     foreach ($testCases as $case) {
    //         echo "\n".$case['num'];
    //         $sum = Recursion::factorial($case['num']);
    //         echo '=>'.$sum;
    //         $this->assertEquals($case['exp'], $sum);
    //     }

    //     $testCases = [
    //         [ 'num' => 31, 'exp' => 120, 'desc' => 'Integer Sum(31):']
    //     ];

    //     // too big num
    //     $this->expectException();
    //     foreach ($testCases as $case) {
    //         echo "\n".$case['num'];
    //         $sum = Recursion::factorial($case['num']);
    //         echo '=>'.$sum;
    //         $this->assertEquals($case['exp'], $sum);
    //     }
    // }

    // public function testFibonacci(): void
    // {
    //     $sorter = new Sort('insertion');

    //     $testCases = [
    //         [ 'num' => 0, 'exp' => 0, 'desc' => 'Integer Sum(0):'],
    //         [ 'num' => 1, 'exp' => 1, 'desc' => 'Integer Sum(1):'],
    //         [ 'num' => 2, 'exp' => 2, 'desc' => 'Integer Sum(2):'],
    //         [ 'num' => 3, 'exp' => 3, 'desc' => 'Integer Sum(3):'],
    //         [ 'num' => 4, 'exp' => 3, 'desc' => 'Integer Sum(3):'],
    //     ];

    //     // too big num
    //     $this->expectException();
    //     foreach ($this->testCases as $case) {
    //         echo "\n".$case['num'];
    //         $sum = Recursion::fibonacci(3);
    //         echo '=>'.$sum;
    //         $this->assertEquals($case['exp'], $sum);
    //     }
    // }
        //Recursion::fibonacciSequence(2);     // 2 = 0 1 1
// echo "\nFibonacci(0) = ".Recursion::fibonacci(0)." = ";
// echo Recursion::fibonacciSequence(1);     // 0
// echo "\nFibonacci(1) = ".Recursion::fibonacci(1)." = ";
// echo Recursion::fibonacciSequence(1);     // 1 = 0 1
// echo "\nFibonacci(2) = ".Recursion::fibonacci(2)." = ";
// echo Recursion::fibonacciSequence(2);     // 2 = 0 1 1
// echo "\nFibonacci(3) = ".Recursion::fibonacci(3)." = ";
// echo Recursion::fibonacciSequence(3);     // 3 = 0 1 1 2
// echo "\nFibonacci(4) = ". Recursion::fibonacci(4)." = ";
// echo Recursion::fibonacciSequence(4);    // 4 = 0 1 1 2 3
// echo "\nFibonacci(5) = ". Recursion::fibonacci(5)." = ";
// echo Recursion::fibonacciSequence(5);    // 5 = 0 1 1 2 3 5
// echo "\nFibonacci(20) = ". Recursion::fibonacci(20)." = ";
// echo Recursion::fibonacciSequence(20);
// echo "\n\n";

}



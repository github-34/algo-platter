<?php

/**
 * Rec
 *
 * A set of simple recursive functions.
 *      1. Integer sum
 *      2. Factorial
 *      3. Fibonacci
 *
 * @package algo-platter
 * @version 1.0
 * @access  public
 * @see     http://git@github.com/github-34/algo-platter
 * @todo    - simplify remove
 *          - only primitive recursive functions or not?
 */
class Recursion {

    /**
     * Int Sum
     *
     * Given an integer, returns the sum of all predecessors of that integer.
     * In other words, given n, it gives the sum of first n integers.
     * E.g. intSum(5) = 5 + 4 + 3 + 2 + 1 = 15
     *
     * @param   int     $num    an integer
     * @return  int             the sum of first num integers
     * @space           O(n)
     * @time            O(n)
     */
    static public function intSum(int $num) : int {

        if ($num === 0)
            return 0;
        if ($num === 1)
            return 1;
        else
            return $num + Recursion::intSum($num - 1);
    }

    /**
     * Factorial
     *
     * Given an integer, returns the multiplication of all predecessors of that integer.
     * In other words, given n, it multiples the first n integers and returns that value.
     *
     * E.g. factorial(4) = 4 x 3 x 2 x 1 = 24
     *
     * @param   int     $num     an integer
     * @return  float            the sum of first num integers. The return value is always an integer.
     *                           However, since PHP represents large integers as floats and automatically converts integer values > MAX_INT
     * @space           O(n)
     * @time            O(n)
     */
    static public function factorial(int $num) : float {

        if ($num <= 1)
            return 1;
        else
            return $num * Recursion::factorial($num - 1);
    }

    /**
     * Fibonacci
     *
     * Returns the Fibonacci number of a given integer n i.e. the sum of each successive pair of integers up to n.
     * Recursive Statement: the value of a fib function given an integer n is the value of the fib function for two prior integers n - 1, and n - 2
     *
     * E.g. fib(0) = 0
     *      fib(1) = 1
     *      fib(2) = fib(1) + fib(0) = 1 + 0 = 1
     *      fib(3) = fib(2) + fib(1) = 1 + 1 = 2
     *      fib(4) = fib(3) + fib(2) = 2 + 1 = 3
     *      fib(5) = fib(4) + fib(3) = 3 + 2 = 5
     *
     * @param   int     $num
     * @return  int
     * @space           O(n^2)
     * @time            O(n^2)
     */
    static public function fibonacci(int $num) : float {

        if ($num === 0)
            return 0;
        else if ($num === 1)
            return 1 + Recursion::fibonacci(0);
        else 
            return Recursion::fibonacci($num - 1) + Recursion::fibonacci($num - 2);
    }

    /**
     * Fibonacci Sequence
     *
     * Outputs the fibonacci sequences of n
     *
     * @param   int     $num
     * @return  void
     * @space
     * @time
     */
    static public function fibonacciSequence(int $num) : void
    {
        for ($i= 0; $i < $num; $i++)
            echo Recursion::fibonacci($i)." ";
    }

    /**
     * Towers of Hanoi
     *
     * Three spikes. n disks, each of different sizes, are on the first spike in order by size.
     * Problem: move the disks to the second or third spike so that they end up in the same order but do it recursively.
     *  Rules:
     *      1. cannot put a bigger disk on top of a smaller one
     *      2. can only move one disk at a time
     *      3. can move disks to all three disks
     *      4. tower can be assembled on the second or third spike
     *
     * @param   array   $towers     two dimensional array (matrix): a spike is represented as an array row. disks on a spike are represented as values in the array row in order. [ 0 => [ 3, 2, 1], 1 => [], 2 => [] ]
     * @return  array               two dimensional array (matrix), where all values originally in row 0 are now in row 2.
     * @space
     * @time
     */
     static public function towersOfHanoi(array $towers)
     {
         return [];
     }
}

// echo "\nInteger Sum(3) = ".Recursion::intSum(3);             // 6
// echo "\nInteger Sum(5) = ".Recursion::intSum(5);             // 15
// echo "\n";

// echo "\nFactorial(0) = ".Recursion::factorial(0);            // 1
// echo "\nFactorial(1) = ".Recursion::factorial(1);            // 1
// echo "\nFactorial(2) = ".Recursion::factorial(2);            // 2
// echo "\nFactorial(3) = ".Recursion::factorial(3);            // 6
// echo "\nFactorial(4) = ".Recursion::factorial(4);            // 24
// echo "\nFactorial(5) = ".Recursion::factorial(5);            // 120
// echo "\nFactorial(22) = ".Recursion::factorial(22);          // 120
// try {
//     echo "\nFactorial(31) = ";
//     echo Recursion::factorial(31);
// }
// catch(Exception $e) {
//     debug_print_backtrace();
// }
// echo "\n";

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

?>
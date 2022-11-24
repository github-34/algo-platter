<?php

/**
 * Str
 *
 * A collection of static functions for string manipulation.
 *
 * Note: String type in PHP is a character array i.e. it is a mutable type, unlike String in Java and Python.
 *       So, concatenation on String types does not create new objects in memory; rather, it appends characters.
 * Note: Difference between '' and "" is:
 *
 * @package Algorithms
 * @version 0.?.0
 * @access  public
 * @see     http://git@github.com/github-34/algo-platter
 * @todo
 */
class Str {

    /**
     * Reverse
     *
     * Returns the reverse of the input string
     *
     * @param   String  $str    A string
     * @return  String          the reverse of @str
     * @space           O(n)
     * @time            O(n)
     */
    public static function reverse(String $str) : String {

        $revStr = '';
        for ($i = 0; $i < strlen($str); $i++)
            $revStr = $str[$i].$revStr;

        return $revStr;
    }

}

$strings = [
    '',
    'Hello',
    'oollo'
];

foreach ($strings as $str) {
    echo "\nReversing: ".$str." => ";
    echo Str::reverse($str);
}
echo "\n";

?>

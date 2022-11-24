<?php


class ArraySearch
{

    private $algo;

    public function __construct($algo = 'linear')
    {
        $this->algo = $algo;
    }

    public function getAlgo()
    {
        return $this->algo;
    }

    /**
     * Search
     *
     * Prints out the array and calls the preset search algorithm on array for needle
     *
     * @param   Array   $haystack   array - passed by reference
     * @param   mixed   $needle     whatever is searched: any type
     * @return  void
     * @space           O(1)
     * @time            O(1)
     */
    public function search(Array $haystack, $needle)
    {
        echo "\n";
        $this->printArr($haystack);

        if ($this->algo === 'linear')
            $index = $this->linear($haystack, $needle);
        else if ($this->algo === 'binary')
            $index = $this->binary($haystack, $needle);
        else
            throw new Exception('Search algorithm '.$this->algo.' not implemented.');

        if ($index === -1)
            echo "\n".$needle." not found";
        else
            echo "\n".$needle." found at ".$index;
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

//Returns the index of the needle in haystack array; -1 if the needle is not found
// type equvalience???
    public function linear(array $haystack, $needle) : int
    {
        echo $needle;
        $index = -1;
        for ($i = 0; $i < sizeof($haystack); $i++)
        {
            if ($haystack[$i] == $needle)
                return $i;
        }
        return -1;
    }

    // assumption: sorted array
    //what index for duplicates??
    public function binary(array $haystack, $needle) : int
    {
        if (empty($haystack))
            return -1;

        $start = 0;
        $end = sizeof($haystack) - 1;
        $mid = floor((sizeof($haystack)) / 2);
        while ($start != $mid && $end != $mid)
        {
            if ($haystack[$mid] < $needle)
            {
                $start = $start;
                $end = $mid--;
            }
            elseif ($haystack[$mid] > $needle)
            {
                $start = $mid++;
                $end = $end;
            }
            else
                return $mid;
            $mid = $start + floor(($end - $start)/ 2);
        }

        return -1;
    }
}

// $tests = [
//     [ [], 1, -1 ],
//     [ [2, 2, 3], 1, -1 ],
//     [ [1, 2, 3], 1, 0 ],
//     [ [3, 2, 1], 1, 2 ],
//     [ [4, 2, 3, 4, 8], 1, 2 ],
// ];
$tests = [
    [ [], 1, -1 ],
    [ [1, 2, 3], 1, 0 ],
    [ [3, 4, 7, 8], 4, 1 ],
    [ [4, 7, 7, 7, 9], 9, 4 ],
];
$searcho = new ArraySearch('binary');

for($i = 0; $i < sizeof($tests); $i++)
{
    $searcho->search($tests[$i][0], $tests[$i][1]);
}




?>
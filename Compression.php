<?php

/**
 * Run Length Compressor
 *
 * Functions for encoding and decoding strings by run-length compression.
 * Run-length encoding converts each set of repeating characters occurring in sequence to a pair [int][char], which indicates that the char occurs int times.
 * Run-length decoding reverses the process.
 *
 * @package algo-platter
 * @version 1.0
 * @access  public
 * @see     http://git@github.com/github-34/algo-platter
 * @todo    -
 */
class Compression
{
    /**
     * Decodes a run-length encoded string.
     *
     * A run-length encoded string is in format [int][char]*, spaces and special chars count as characters
     *
     * @param String        $encodedStr     the run-length encoded string
     * @return String                       the decoded string
     * @throws Exception                    the encoded string is in invalid format
     * @space               O(n)
     * @time                O(n)
     */
    static function runLengthDecode(String $encodedStr) : String {

        // guard: check if encode string is empty. if so, return empty string.
        if (empty($encodedStr))
            return "";

        // initialize vars
        $decodedStr = "";
        $intStr = '';
        $int = 0;
        $intDigits = 0;
        $char = '';

        // iteration: process one segment [int][char] of encoded string 
        for ($i = 0; $i < strlen($encodedStr); $i = $i + $intDigits + 1) {

            if (!is_numeric($encodedStr[$i]))
                throw new Exception("Encoded String invalid.");

            // determine # of integer digits
            $intDigits = 0;
            while(is_numeric($encodedStr[$i + $intDigits])) {
                $intStr = $intStr.$encodedStr[$i + $intDigits];
                $intDigits++;
            }

            // determine integer and char
            $int = (int) $intStr;
            $char = $encodedStr[$i + $intDigits];

            // decode [int][char] segment and append to decoded string
            for ($k = 0; $k < $int; $k++)
                $decodedStr = $decodedStr.$char;
        }

        return $decodedStr;
    }

    /**
     * Encodes any string into a run-length encoded string
     *
     * A run-length encoded string is in format [int][char]*, spaces and special chars count as characters
     *
     * @param   String      $str    a string
     * @return  String              the run-length encoded string
     * @space               O(n)
     * @time                O(n)
     */
    static function runLengthEncode(String $str) : String {

        // guard: empty string returned for empty input
        if (empty($str))
            return "";

        // initialize vars
        $charCounter = 0;
        $currentChar = $str[0];		// input must have at least one char, otherwise empty str
        $encodedStr = "";

        // loop
        for ($i = 0; $i < strlen($str); $i++) {

            $charCounter++;

            if ($i === strlen($str) - 1)
                 $encodedStr = $encodedStr.$charCounter.$currentChar;
            elseif ($currentChar != $str[$i + 1]) {
                $encodedStr = $encodedStr.$charCounter.$currentChar;
                $currentChar = $str[$i + 1];
                $charCounter = 0;
            }
        }

        return $encodedStr;
    }
}



// echo "\nDecoding\n";
// echo "==========\n";
// // Basic cases
// echo "23a => ".RLCompressor::decode("232a")."\n";                          // aaaaaaaaaaaaaaaaa...
// exit ;
// echo "2a2b1c => ".RLCompressor::decode("2a2b1c")."\n";                      // aabbccc
// // echo "2a2b1c => ".RLCompressor::decode("2a2b1c")."\n";		            // aabbccc
// // echo "2a2b4c2d => ".RLCompressor::decode("2a2b4c2d")."\n";			    // aabbccccdd
// // echo "1a1b1a1b1a1b1a => ".RLCompressor::decode("1a1b1a1b1a1b1a")."\n";   // abababababa
// echo "\n";

// // Edge Cases
// // echo "akajklka2342 => ".RLCompressor::decode("akajklka2342")."\n";       // Exception! invalid input string <= input string not encoded correctly
// // echo "11a => ".RLCompressor::decode("11a")."\n";			                // aaaaaaaaaaa <= same character
// // echo "1a1b1c1d1e1f1g => ".RLCompressor::decode("1a1b1c1d1e1f1g")."\n";	// abcdefg   <= all different chars
// // echo "\"   \" => ".RLCompressor::decode("3 ")."\n"; 			            // "   " 3{space}

// echo "\nEncoding\n";
// echo "==========\n";
// // Basic cases
// // echo "aabbccc => ".RLCompressor::encode("aabbccc")."\n";			        // 2a2b3c
// // echo "aabbccccdd => ".RLCompressor::encode("aabbccccdd")."\n";		    // 2a2b4c2d
// // echo "abababababa => ".RLCompressor::encode("abababababa")."\n";  	    // 1a1b1a1b1a1b1a   --a longer string encoded

// // Edge cases
// // echo "aaaaaaaaaaa => ".RLCompressor::encode("aaaaaaaaaaa")."\n";		    // 11a <= one character string input
// // echo "abcdefg => ".RLCompressor::encode("abcdefg")."\n";			        // 1a1b1c1d1e1f1g <= all different characters string input
// // echo "\"   \" => ".RLCompressor::encode("   ")."\n";			            // 3{spaces} <= string with 3 spaces
// // echo "\'\' => ".RLCompressor::encode('')."\n";				            // empty string <= ""
// // echo "\"aaa  bbbbcccc dddd    \" => ".RLCompressor::encode("aaa  bbbbcccc dddd    ")."\n";	// 3a2 4b4c1 4d4    <= mixed spaces and chars
// // echo "\"(&^*@#^@(*&^&#&&#*@(:\" => ".RLCompressor::encode("(&^*@#^@(*&^&#&&#*@(:")."\n";	// 1(1&1^1*1@1#1^1@1(1*1&1^1&1#2&1#1*1@1(1:     <= special characters


// //echo "\"\" => ".RLCompressor::encode("")."\n";				            // "" <= empty string
// //echo "\"aaa  bbbbcccc dddd    \" => ".RLCompressor::encode("aaa  bbbbcccc dddd    ")."\n";	// 3a2 4b4c1 4d4
// // echo encode("(&^*@#^@(*&^&#&&#*@(:")."\n";	// 1(1&1^1*1@1#1^1@1(1*1&1^1&1#2&1#1*1@1(1:

// // edge case - wrong input type
// // echo encode(null);				// type exception

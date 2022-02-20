<?php

class StringProcessor
{
    # Properties - characteristics of this class - the data of this class
    public $inputString;
    
    # Methods - capabilities of the class, what can this class do?

    public function __construct($inputString)
    {
        $this->inputString = $inputString;
        var_dump('StringProcessor class was created with the inputString '. $inputString);
    }
    
    public function findVowels($inputString)
    {
        $vowels = [
        'a', 'A',
        'e', 'E',
        'i', 'I',
        'o', 'O',
        'u', 'U'
        ];
        $vowelCount = 0;
    
        foreach ($vowels as $vowel) {
            $vowelCount += substr_count($inputString, $vowel);
        }
        return $vowelCount;
    }
    //this will check to see if the input word is a palindrome
    public function isPalindrome($inputString)
    {
        $lowercase = strtolower($inputString);
        $reverse = strrev($lowercase);
        $palindrome = $reverse == $lowercase;
        return $palindrome;
    }

    //shift the each letter in the input word one spot

    public function codeTheWord($inputString)
    {
        $shifty=['A' => 'B', 'a' => 'b', 'B' => 'C', 'b' => 'c', 'C' => 'D', 'c' => 'd',
                'D' => 'E', 'd' => 'e', 'E' => 'F', 'e' => 'f', 'F' => 'G', 'f' => 'g',
                'G' => 'H', 'g' => 'h', 'H' => 'I', 'h' => 'i', 'I' => 'J', 'i' => 'j',
                'J' => 'K', 'j' => 'k', 'K' => 'L', 'k' => 'l', 'L' => 'M', 'l' => 'm',
                'M' => 'N', 'm' => 'n', 'N' => 'O', 'n'=> 'o', 'O' => 'P', 'o' => 'p',
                'P' => 'Q', 'p' => 'q', 'Q' => 'R', 'q' => 'r', 'R' => 'S', 'r' => 's',
                'S' => 'T', 's' => 't', 'T' => 'U', 't' => 'u', 'U' => 'V', 'u' => 'v',
                'V' => 'W', 'v' => 'w', 'W' => 'X', 'w' => 'x', 'X' => 'Y', 'x' => 'y',
                'Y' => 'Z', 'y' => 'z', 'Z' => 'A', 'z' => 'a' ];

        $coded = strtr($inputString, $shifty);
        return $coded;
    }
}
<?php


$inputWord = 'The zoo is open';

$lowercase = strtolower($inputWord);

$vowels = [
    'a',
    'e',
    'i',
    'o',
    'u'
];
//this will check to see if the input word is a palindrome
$reverse = strrev($lowercase);

//this will count the vowels of the input word

$vowelCount = 0;

foreach ($vowels as $vowel) {
    $vowelCount += substr_count($inputWord, $vowel);
}

//shift the each letter in the input word one spot

$shifty=['A' => 'B', 'a' => 'b', 'B' => 'C', 'b' => 'c', 'C' => 'D', 'c' => 'd',
        'D' => 'E', 'd' => 'e', 'E' => 'F', 'e' => 'f', 'F' => 'G', 'f' => 'g',
        'G' => 'H', 'g' => 'h', 'H' => 'I', 'h' => 'i', 'I' => 'J', 'i' => 'j',
        'J' => 'K', 'j' => 'k', 'K' => 'L', 'k' => 'l', 'L' => 'M', 'l' => 'm',
        'M' => 'N', 'm' => 'n', 'N' => 'O', 'n'=> 'o', 'O' => 'P', 'o' => 'p',
        'P' => 'Q', 'p' => 'q', 'Q' => 'R', 'q' => 'r', 'R' => 'S', 'r' => 's',
        'S' => 'T', 's' => 't', 'T' => 'U', 't' => 'u', 'U' => 'V', 'u' => 'v',
        'V' => 'W', 'v' => 'w', 'W' => 'X', 'w' => 'x', 'X' => 'Y', 'x' => 'y',
        'Y' => 'Z', 'y' => 'z', 'Z' => 'A', 'z' => 'a' ];

$coded = strtr($inputWord, $shifty);

//create an anagram from the word

$anagram = str_shuffle($lowercase);
var_dump($anagram);



require 'index-view.php'; 
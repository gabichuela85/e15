<?php

$inputWord = 'elle';
$vowels = [
    'a',
    'e',
    'i',
    'o',
    'u'
];
//this will check to see if the input word is a palindrome
$reverse = strrev($inputWord);

//this will count the vowels of the input word

$vowelCount = 0;

foreach ($vowels as $vowel) {
    $vowelCount += substr_count($inputWord, $vowel);
}

require 'index-view.php';
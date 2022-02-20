<?php

//use PhpSpellcheck\SpellChecker\Aspell;

session_start();

//pull in the class

require 'StringProcessor.php';

//retrieving session data


$inputString = $_GET['inputString'];

$stringProcessor = new StringProcessor($inputString);


$_SESSION['results'] = [
    'inputString' => $inputString,
    'palindrome' => $stringProcessor->isPalindrome($inputString),
    'vowelCount' => $stringProcessor->findVowels($inputString),
    'coded' => $stringProcessor->codeTheWord($inputString),
];



header('Location: index.php');
<?php

session_start();


//setting session data

if (isset($_SESSION['results'])) {
    $results = $_SESSION['results'];

    $inputString = $results['inputString'];
    $palindrome = $results['palindrome'];
    $vowelCount = $results['vowelCount'];
    $coded = $results['coded'];
    
    $_SESSION['results'] = null;
}

require 'index-view.php';
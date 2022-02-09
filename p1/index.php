<?php

session_start();

if (isset($_SESSION['results'])) {
    $results = $_SESSION['results'];

    $word = $results['word'];
    $palindrome = $results['palindrome'];
    $vowelCount = $results['vowelCount'];
    $coded = $results['coded'];
    
    $_SESSION['results'] = null;
}

require 'index-view.php';
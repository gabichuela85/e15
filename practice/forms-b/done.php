<?php

session_start();

$results = $_SESSION['results'];

$correct = $results['correct'];
$answer = $results['answer'];


require 'done-view.php';
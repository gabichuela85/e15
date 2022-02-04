<?php

$name = $_POST['name'];
$birthday = $_POST['birthday'];

echo($name);
echo gettype($birthday);

$birthdate = date_create($birthday);

echo date_format($birthdate, "m-d");
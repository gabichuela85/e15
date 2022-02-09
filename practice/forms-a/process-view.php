<!doctype hml>
<html lang='en'>

<head>
    <title></title>
    <meta charset='utf-8'>
    <link href=data: , rel=icon>
</head>

<body>

    <h1>Results</h1>
    <?php if ($correct) { ?>
    You got it correct!
    <?php } else { ?>
    You are incorrect. <a href='index.php'> Please try again...</a>
    <?php } ?>
</body>

</html>
<!doctype hml>
<html lang='en'>

<head>
    <title></title>
    <meta charset='utf-8'>
    <link href=data: , rel=icon>
</head>

<body>
    <h1>Project 1 E15</h1>
    <?php if ($reverse==$inputWord) { ?>
    this is a palindrome.
    <?php } else { ?>
    this is not a palindrome.
    <?php } ?>

    <p><?php echo($inputWord); ?> has <?php echo($vowelCount); ?> vowels.</p>
</body>

</html>
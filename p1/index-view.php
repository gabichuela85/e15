<!doctype hml>
<html lang='en'>

<head>
    <title></title>
    <meta charset='utf-8'>
    <link href=data: , rel=icon>
</head>

<body>
    <form method='GET' action='process.php'>
        <h1>Project 1 E15</h1>
        <label for='word'>What's your word?</label>
        <input type='text' name='word' id='word'>
        <button type='submit'>Process my word</button>
    </form>
    <?php if (isset($word)) {?>

    <?php if ($palindrome) { ?> this is a palindrome. <?php } else { ?> this is not a palindrome.
    <?php } ?>
    <p>
        <?php echo($word); ?> has <?php echo($vowelCount); ?> vowels.</p>
    <p>The coded version of your word is <?php echo($coded); ?>.</p>
    <?php } ?>
</body>

</html>
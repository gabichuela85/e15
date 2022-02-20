<!doctype hml>
<html lang='en'>

<head>
    <title>E15 Project 1</title>
    <meta charset='utf-8'>
    <link href=data: , rel=icon>
    <link rel='stylesheet' href='style/styles.css'>
</head>

<body>
    <div>
        <h1>PRACTICE WITH CLASSES E15</h1>
        <form method='GET' action='process.php' class='entry'>
            <label for=' word'>What's your word?</label>
            <input type='text' name='inputString' id='inputString'>
            <button type='submit'>Process my word</button>
        </form>
        <div class='answers'>
            <?php if (isset($inputString)) {?> <?php if ($palindrome) { ?>
            <p>this is a palindrome.</p>
            <?php } else { ?>
            <p>this is not a palindrome.</p>
            <?php } ?>
            <p><?php echo($inputString); ?> has <?php echo($vowelCount); ?> vowels.</p>
            <p>The coded version of your word is <?php echo($coded); ?>.</p>
            <?php } ?>
        </div>
    </div>

</body>

</html>
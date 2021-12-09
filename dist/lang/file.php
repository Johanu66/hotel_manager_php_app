<?php

include('fr.php');

include('en.php');

if(isset($_SESSION['lang'])) {

} else {
    $_SESSION['lang'] = 'FR';
}

?>

<html>
    <head>
        <title>Test</title>
    </head>

    <body>
        <?php if ($_SESSION['lang'] == 'EN') { echo SLT_EN; } else { echo SLT_FR; } ?>
    </body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial02</title>
</head>

<body>
<?php
    for ($row = 1; $row <= 11; $row++) {
        if ($row % 2 != 0) {
            for ($space = 10; $space >= $row; $space--) {
                echo "&nbsp;&nbsp;";
            }
            for ($col = 1; $col <= $row; $col++) {
                echo "* &ensp;";
            }
            echo "<br>";
        }
    }
    for ($row = 1; $row <= 9; $row++) {
        if ($row % 2 != 0) {
            for ($space = 0; $space <= $row; $space++) {
                echo "&nbsp;&nbsp;";
            }
            for ($col = 9; $col >= $row; $col--) {
                echo "* &ensp;";
            }
            echo "<br>";
        }
    }
    ?>
</body>

</html>
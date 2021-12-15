<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial01</title>

    <style>
        table {
            width: 270px;
            border: 2px solid #000;
        }

        #td1 {
            height: 30px;
            width: 30px;
            background-color: #FFFFFF;
        }

        #td2 {
            height: 30px;
            width: 30px;
            background-color: #000000;
        }
    </style>


</head>

<body>
    <table>
        <?php
        for ($row = 1; $row <= 8; $row++) {
            echo "<tr>";
            for ($col = 1; $col <= 8; $col++) {
                $total = $row + $col;
                if ($total % 2 == 0) {
                    echo "<td id='td1'></td>";
                } else {
                    echo "<td id='td2'></td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>
<?php
require_once 'sql.php';
$sql = "SELECT student_name, age FROM students;";
$result = $conn->query($sql);

$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

$conn->close();

echo "<script>var data=" . json_encode($data) . ";</script>";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/chart.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/chart.js"></script>
    <title>Tutorial_09</title>
</head>

<body>

    <div id="con">
        <canvas id="myCanvas"></canvas>
        <p>The bar chart shows age of students</p>
    </div>
</body>

</html>
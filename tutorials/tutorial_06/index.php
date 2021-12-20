<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Tutorial_06</title>
</head>

<body>

    <?php
    session_start();
    $folder = "";

    if (isset($_SESSION["folder"]) || isset($_SESSION["photo"])) {
        $folder = $_SESSION["folder"];
        session_unset();
    }
    ?>
    <div class="card">
        <h1>Create Folder & Upload Image</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="photo" id="photo" required> <br> <br>
            <label>Enter folder name : </label>
            <input type="text" name="folder" id="folder" placeholder="Folder" value="<?php echo $folder; ?>" required><br><br>
            <input type="submit" value="Save" name="submit">
        </form>
        <br>

        <?php

        if (isset($_GET["status"])) {
            if ($_GET["status"] == 0) {
                echo "<div class='error'>" . $_GET["message"] . "</div>";
            } elseif ($_GET["status"] == 1) {
                echo "<div class='success'>" . $_GET["message"] . "</div>";
            }
        }
        ?>

</body>

</html>
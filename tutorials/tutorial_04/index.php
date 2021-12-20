<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 4</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1>Login Form</h1>

    <form action="home.php" method="post">
        Name : <input type="email" name="email" id="email" required><br><br>
        Password : <input type="password" name="password" id="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <br>

    <?php
    if (isset($_GET["fail"])) {
        echo "<small style='color:red;'>*Invalid email or password!</small>";
    }
    ?>


</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial 4</title>
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <?php
  session_start();
  $email = $_POST["email"];
  $password = $_POST["password"];
  $_SESSION["email"] = $email;
  $_SESSION["password"] = $password;
  ?>

  <?php if ($email === "user@gmail.com" && $password === "123456") : ?>
    <h1>Account Name : <?php echo $_POST["name"]; ?></h1>
    <a href="logout.php"><button>Logout</button></a>
  <?php
  else :
    header('location:index.php?fail=1');
  endif
  ?>

</body>

</html>
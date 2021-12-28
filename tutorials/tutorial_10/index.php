<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial 10</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="con">
    <h1>Login Form</h1><br>
    <form action="login.php" method="post">
      <label>Enter your email : </label><br>
      <input type="email" name="email" id="email"  required><br>
      <label>Enter your password : </label><br>
      <input type="password" name="password" id="password" required><br>
      <input type="submit" value="Login" name="login">
      <?php
      if (isset($_GET["fail"])) {
        echo "<p class='error'>*Incorrect password*</p><br>";
      }
      ?>
    </form>
    <a href="forgetpsw.php">Reset Password</a>
  </div>
</body>

</html>
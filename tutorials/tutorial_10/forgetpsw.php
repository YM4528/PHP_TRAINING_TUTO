<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_10</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php

    use PHPMailer\PHPMailer\PHPMailer;

    //Load Composer's autoloader
    require 'vendor/autoload.php';
    //require 'vendor/phpmailer/phpmailer';
    $user_email = "";
    $msg = $invalid_email = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_email = $_POST['email'];
        if ($user_email == "pinkymissary@gmail.com") { //default user

            $mail = new PHPMailer();  // create a new object
            $mail->IsSMTP(); // enable SMTP
            $mail->SMTPAuth = true;  // authentication enabled
            $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
            $mail->SMTPAutoTLS = false;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 2525;
            /* Log in with Sender email and password */
            $mail->Username = "sender@gmail.com";;
            $mail->Password = "senderpassword";

            /* Set the mail sender. */
            $mail->setFrom("sender@gmail.com", "Sender");

            /* Add a recipient. */
            $mail->addAddress($user_email);
            $mail->addReplyTo($user_email);

            $mail->IsHTML(true);
            $mail->Subject  = "Reset Password";
            $mail->Body = "url to reset password <br>http://localhost/PHP_TRAINING_TUTO/tutorials/tutorial_10/resetpsw.php";
            if ($mail->send()) {
                $msg = '<p>The message is sent to your email.</p>';
            } else {
                $msg = '<p class="error">' . $mail->ErrorInfo . '</p>';
            }
        } else {
            $invalid_email = "*Incorrect Email*";
        }
    }
    ?>
    <div class="con">
        <h1>Reset Password</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="email" name="email" id="email" placeholder="Enter your email" value="<?= $user_email ?>" required> <br>
            <p class="error"><?php echo $invalid_email; ?></p><br>
            <a href="index.php" class="btn">Back</a>
            <input type="submit" value="Submit" name="Submit">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo $msg;
        }
        ?>
    </div>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 03</title>
</head>

<body>

    <?php
    function getAge($dob)
    {
        $dob = new DateTime($dob);
        $today = new Datetime(date('Y'));
        if ($dob > $today) {
            return 'You are not born yet';
        }
        $diff = $today->diff($dob);
        return 'Your Current Age is : ' . $diff->y;
    }
    ?>

    <form>
        Enter your date of birth: <br><br>
        <input type="date" name="dob" value="<?php echo (isset($_GET['dob'])) ? $_GET['dob'] : ''; ?>" required>
        <input type="submit" value="Calculate Age">
        <br><br>
    </form>

    <?php
    if (isset($_GET['dob']) && $_GET['dob'] != '') {
        echo getAge($_GET['dob']);
    }
    ?>
</body>

</html>
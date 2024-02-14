<?php
    session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Profile</title>
</head>
<body>

    <div class = "profile-container">
        <?php
            echo "<img src = '{$_SESSION['user']['avatar']}'?>";
            echo $_SESSION['user']['full_name'] . "<br>";
            echo $_SESSION['user']['email']. "<br>";
            echo "<a href='vendor/logout.php' style = 'color:red; margin-top: 15px; border: 2px; '> logout </a>". "<br>";
        ?>
    </div>
</body>
</html>
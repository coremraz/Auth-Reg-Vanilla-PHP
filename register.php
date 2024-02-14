<?php
    session_start();
if (isset($_SESSION['user'])) {
    header('Location: profile.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
<div class="container">
    <h1>Registration</h1>
    <form action="vendor/signup.php" method="post" enctype="multipart/form-data">
        <label for="fio">Full Name:</label>
        <input type="text" id="fio" name="fio" required>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="profile-image">Profile Image:</label>
        <input type="file" id="profile-image" name="profile-image" accept="image/*" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm-password">Confirm Password:</label>
        <input type="password" id="confirm-password" name="confirm-password" required>

        <button type="submit">Register</button>

        <?php
        if (isset($_SESSION["message"])) {
            echo "<p class = 'msg'>". $_SESSION["message"] . "</p>";
        }
        unset($_SESSION["message"]);
        ?>
    </form>
</div>
</body>
</html>
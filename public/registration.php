<?php
require_once('config.php');
session_start();

if (isset($_POST['submit'])) {

    if (!empty($_POST['username']) && !empty($_POST['password'])) {

        $input_username = htmlspecialchars($_POST['username']);
        $input_password = htmlspecialchars($_POST['password']);

        // connect to db
        require_once '../src/DBconnect.php';

        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $statement = $connection->prepare($sql);
        
        $statement->bindParam(':username', $input_username);
        $statement->bindParam(':password', $input_password);

        $statement->execute();

        $success = "Registration successful, you can now login";
    } else {

        $error = "please fill in all fields.";
    }

}
?>



<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
</head>

<body>
<h2>Register</h2>
<?php if (!empty($success)) echo "<p>$success</p>"; ?>
<?php if (!empty($error)) echo "<p>$error</p>"; ?>

<form method="post">

    <label for="username">Username:</label>
    <input type="text" name="username" required><br><br>

    <label for="password">Password:</label>
    <input type="password" name="password" required><br><br>


    <input type="submit" name="submit" value="Register">
</form>
<p><a href="login.php">Already have an account? Login</a></p>
</body>
</html>

<?php
require_once('config.php');
session_start();
require_once '../src/DBconnect.php';


if (isset($_POST['Submit'])) {
    if (!empty($_POST['Username']) && !empty($_POST['Password'])) {
        $username = htmlspecialchars($_POST['Username']);
        $password = htmlspecialchars($_POST['Password']);

        $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':username', $username);
        $statement->bindParam(':password', $password);
        $statement->execute();
        $user = $statement->fetch();

        if ($user) {
            $_SESSION['Username'] = $username; // store username in session
            $_SESSION['Active'] = true;
            header("location:index.php"); // redirect to index.php
            exit;

        } else {
            echo 'incorrect Username or Password';
        }
    } else {
        echo 'Please enter Username and Password.';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/signin.css">
    <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
</head>

<body>

<h2>Login</h2>

<form method="post">
    <label for="Username">Username:</label>
    <input type="text" name="Username" required><br><br>

    <label for="Password">Password:</label>
    <input type="password" name="Password" required><br><br>

    <input type="submit" name="Submit" value="Login">
</form>
<p><a href="registration.php">Don't have an account? Register</a></p>

</body>
</html>

<?php

function login($username, $password)
{
    $correctUsername = "admin";
    $correctPassword = "12345";

    return $username === $correctUsername &&
           $password === $correctPassword;
}

$message = "";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (login($username, $password)) {
        $message = "Login successful!";
    } else {
        $message = "Invalid username or password.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>

<h2>Login</h2>

<form method="POST">

    <label>Username:</label>
    <input type="text" name="username" required>

    <br><br>

    <label>Password:</label>
    <input type="password" name="password" required>

    <br><br>

    <button type="submit" name="login">Login</button>

</form>

<?php if ($message != "") { ?>
    <p><?php echo $message; ?></p>
<?php } ?>

</body>
</html>
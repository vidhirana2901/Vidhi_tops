<?php
session_start();

if(isset($_POST['login']))
{
    $_SESSION['user'] = $_POST['username'];
    header("location:Pr_4dashboard.php");
}
?>

<form method="post">
    Username: <input type="text" name="username">
    <input type="submit" name="login" value="Login">
</form>
<?php
session_start();

if(!isset($_SESSION['user']))
{
    header("location:Pr_4Login.php");
}

// Logout
if(isset($_POST['logout']))
{
    session_destroy();
    header("location:Pr_4Login.php");
}
?>

<h2>Welcome <?php echo $_SESSION['user']; ?></h2>

<form method="post">
    <input type="submit" name="logout" value="Logout">
</form>
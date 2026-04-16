<!DOCTYPE html>
<html>
<body>

<form method="post">
    Enter Age: 
    <input type="number" name="age" required>
    <br><br>
    <input type="submit" name="submit" value="Check">
</form>

<?php
if(isset($_POST['submit']))
{
    $age = $_POST['age'];

    $message = ($age > 18) ? "You are eligible to vote" : "You are not eligible to vote";

    echo $message;
}
?>

</body>
</html>
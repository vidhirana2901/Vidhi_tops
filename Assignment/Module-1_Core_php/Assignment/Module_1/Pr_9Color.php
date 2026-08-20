<!DOCTYPE html>
<html>
<body>

<form method="post">
    Enter Color (red/green/blue): 
    <input type="text" name="color" required>
    <br><br>
    <input type="submit" name="submit" value="Show Color">
</form>

<?php
if(isset($_POST['submit']))
{
    $color = strtolower($_POST['color']); // convert to lowercase

    switch($color)
    {
        case "red":
            echo "You selected Red color";
            break;

        case "green":
            echo "You selected Green color";
            break;

        case "blue":
            echo "You selected Blue color";
            break;

        default:
            echo "Invalid color!";
    }
}
?>

</body>
</html>
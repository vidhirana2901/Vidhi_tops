<!DOCTYPE html>
<html>
<body>

<form method="post">
    Enter a String: 
    <input type="text" name="str" required>
    <br><br>
    <input type="submit" name="submit" value="Reverse">
</form>

<?php
if(isset($_POST['submit']))
{
    $str = $_POST['str'];
    $reversed = "";

    // Find length manually
    $length = 0;
    while(isset($str[$length]))
    {
        $length++;
    }

    // Reverse string using loop
    for($i = $length - 1; $i >= 0; $i--)
    {
        $reversed .= $str[$i];
    }

    echo "<h3>Reversed String: $reversed</h3>";
}
?>

</body>
</html>
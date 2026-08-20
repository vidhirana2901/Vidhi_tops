<!DOCTYPE html>
<html>
<body>

<form method="post">
    Enter a Number: 
    <input type="number" name="num" required>
    <br><br>
    <input type="submit" name="submit" value="Find Factorial">
</form>

<?php
// Recursive function to find factorial
function factorial($n)
{
    if($n == 0 || $n == 1)
    {
        return 1;
    }
    else
    {
        return $n * factorial($n - 1);
    }
}

// Handle form
if(isset($_POST['submit']))
{
    $num = $_POST['num'];

    if($num < 0)
    {
        echo "Factorial not defined for negative numbers";
    }
    else
    {
        $result = factorial($num);
        echo "<h3>Factorial of $num is: $result</h3>";
    }
}
?>

</body>
</html>
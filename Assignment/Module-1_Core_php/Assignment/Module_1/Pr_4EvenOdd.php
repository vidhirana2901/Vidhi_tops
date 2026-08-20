<html>
<body>
<form method="post">
    Enter Number: <input type="number" name="num"><br><br>
    <input type="submit" name="submit" value="Check">
</form>
<?php
if (isset($_POST['submit'])) 
{
    $number = $_POST['num'];
    if ($number % 2 == 0) 
	{
        echo "The number is Even";
    } 
	else 
	{
        echo "The number is Odd";
    }
}
?>
</body>
</html>
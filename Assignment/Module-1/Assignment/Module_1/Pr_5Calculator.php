<html>
<body>
<form method="post">
    Enter First Number: <input type="number" name="num1"><br><br>
    Enter Second Number: <input type="number" name="num2"><br><br>
    Operator:
    <select name="op">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select><br><br>
    <input type="submit" name="submit" value="Calculate">
</form>
<?php
if (isset($_POST['submit'])) 
{
    $a = $_POST['num1'];
    $b = $_POST['num2'];
    $op = $_POST['op'];

    if ($op == "+") 
    {
        echo "Result = " . ($a + $b);
    } 
    else if ($op == "-") 
    {
        echo "Result = " . ($a - $b);
    } 
    else if ($op == "*") 
    {
        echo "Result = " . ($a * $b);
    } 
    else if ($op == "/") 
    {
        echo "Result = " . ($a / $b);
    }
	else
	{
		echo "Select Option";
	}
}
?>

</body>
</html>
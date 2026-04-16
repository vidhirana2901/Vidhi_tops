<!DOCTYPE html>
<html>
<body>

<form method="post">
    Enter First Number: 
    <input type="number" name="num1" required><br><br>

    Enter Second Number: 
    <input type="number" name="num2" required><br><br>

    Select Operation:
    <select name="operation">
        <option value="add">Addition</option>
        <option value="sub">Subtraction</option>
        <option value="mul">Multiplication</option>
        <option value="div">Division</option>
    </select><br><br>

    <input type="submit" name="submit" value="Calculate">
</form>

<?php
// User-defined functions
function add($a, $b)
{
    return $a + $b;
}

function sub($a, $b)
{
    return $a - $b;
}

function mul($a, $b)
{
    return $a * $b;
}

function div($a, $b)
{
    if($b == 0)
        return "Cannot divide by zero";
    else
        return $a / $b;
}

// Handle form
if(isset($_POST['submit']))
{
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $op = $_POST['operation'];

    switch($op)
    {
        case "add":
            $result = add($num1, $num2);
            break;

        case "sub":
            $result = sub($num1, $num2);
            break;

        case "mul":
            $result = mul($num1, $num2);
            break;

        case "div":
            $result = div($num1, $num2);
            break;
    }

    echo "<h3>Result: " . $result . "</h3>";
}
?>

</body>
</html>
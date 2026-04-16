<!DOCTYPE html>
<html>
<body>

<form method="post">
    Enter First String: 
    <input type="text" name="str1" required><br><br>

    Enter Second String: 
    <input type="text" name="str2" required><br><br>

    <input type="submit" name="submit" value="Perform Operations">
</form>

<?php
if(isset($_POST['submit']))
{
    $str1 = $_POST['str1'];
    $str2 = $_POST['str2'];

    // Concatenation
    $concat = $str1 . " " . $str2;

    // String length
    $length1 = strlen($str1);
    $length2 = strlen($str2);

    // Substring extraction (first 3 characters of str1)
    $substring = substr($str1, 0, 3);

    // Display results
    echo "<h3>Concatenation: $concat</h3>";
    echo "Length of First String: $length1<br>";
    echo "Length of Second String: $length2<br>";
    echo "Substring (first 3 chars of first string): $substring";
}
?>

</body>
</html>
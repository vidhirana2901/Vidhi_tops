<!DOCTYPE html>
<html>
<body>

<?php

echo "<h3>1. Right Triangle Pattern</h3>";
for($i = 1; $i <= 5; $i++)
{
    for($j = 1; $j <= $i; $j++)
    {
        echo "* ";
    }
    echo "<br>";
}

echo "<h3>2. Inverted Triangle Pattern</h3>";
for($i = 5; $i >= 1; $i--)
{
    for($j = 1; $j <= $i; $j++)
    {
        echo "* ";
    }
    echo "<br>";
}

echo "<h3>3. Number Pattern</h3>";
for($i = 1; $i <= 5; $i++)
{
    for($j = 1; $j <= $i; $j++)
    {
        echo $i . " ";
    }
    echo "<br>";
}

echo "<h3>4. Pyramid Pattern</h3>";
for($i = 1; $i <= 5; $i++)
{
    // spaces
    for($k = 5; $k > $i; $k--)
    {
        echo "&nbsp;&nbsp;";
    }
    // stars
    for($j = 1; $j <= (2*$i - 1); $j++)
    {
        echo "* ";
    }
    echo "<br>";
}

?>
</body>
</html>
<!DOCTYPE html>
<html>
<body>

<table border="1" cellspacing="0" cellpadding="20">
<?php
for($row = 1; $row <= 8; $row++)
{
    echo "<tr>";
    
    for($col = 1; $col <= 8; $col++)
    {
        // Check for even/odd pattern
        if(($row + $col) % 2 == 0)
        {
            echo "<td style='background-color: black;'></td>";
        }
        else
        {
            echo "<td style='background-color: white;'></td>";
        }
    }

    echo "</tr>";
}
?>
</table>

</body>
</html>
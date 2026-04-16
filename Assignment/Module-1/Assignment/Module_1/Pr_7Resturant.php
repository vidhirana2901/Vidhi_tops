<!DOCTYPE html>
<html>
<body>

<form method="post">
    Enter Choice (1-3): 
    <input type="number" name="choice" required>
    <br><br>
    <input type="submit" name="submit" value="Show Category">
</form>

<?php
if(isset($_POST['submit']))
{
    $choice = $_POST['choice'];

    switch($choice)
    {
        case 1:
            echo "Category: Starter<br>";
            echo "Dish: Tomato Soup";
            break;

        case 2:
            echo "Category: Main Course<br>";
            echo "Dish: Paneer Butter Masala";
            break;

        case 3:
            echo "Category: Dessert<br>";
            echo "Dish: Ice Cream";
            break;

        default:
            echo "Invalid Choice!";
    }
}
?>

</body>
</html>
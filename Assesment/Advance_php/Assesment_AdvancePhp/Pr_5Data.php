<?php

if(isset($_POST['save']))
{
    $name = $_POST['name'];
    $platform = $_POST['platform'];

    if($name == "" || $platform == "")
    {
        echo "Please complete all profile fields before saving.";
    }
    else
    {
        echo "Profile Saved Successfully!";
    }
}
?>

<form method="post">
    Name: <input type="text" name="name"><br><br>

    Platform: <input type="text" name="platform"><br><br>

    <input type="submit" name="save" value="Save">
</form>
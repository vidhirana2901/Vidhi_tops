<?php

if(isset($_POST['save']))
{
    $bio = $_POST['bio'];

    $file = fopen("registry.txt", "a");
    fwrite($file, $bio . "\n");
    fclose($file);

    echo "Bio Saved Successfully!";
}
?>

<form method="post">
    Enter Bio:
    <br><br>
    <textarea name="bio"></textarea>
    <br><br>
    <input type="submit" name="save" value="Save">
</form>
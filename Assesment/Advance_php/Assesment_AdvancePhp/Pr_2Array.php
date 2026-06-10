<?php

$creators = array(
    array(
        "Name" => "Vidhi",
        "Platform" => "Instagram",
        "Followers" => 5000
    ),
    array(
        "Name" => "Rahul",
        "Platform" => "YouTube",
        "Followers" => 15000
    ),
    array(
        "Name" => "Priya",
        "Platform" => "Facebook",
        "Followers" => 800
    )
);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Creator Profiles</title>
    <style>
        table{
            width: 60%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td{
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th{
            background-color: lightblue;
        }
    </style>
</head>
<body>

<h2 align="center">Creator Profiles</h2>

<table>
    <tr>
        <th>Name</th>
        <th>Platform</th>
        <th>Followers</th>
    </tr>

    <?php
    foreach($creators as $creator)
    {
        echo "<tr>";
        echo "<td>".$creator['Name']."</td>";
        echo "<td>".$creator['Platform']."</td>";
        echo "<td>".$creator['Followers']."</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
<?php
$conn = mysqli_connect("localhost","root","","api_db");

$sql = "SELECT * FROM products";
$result = mysqli_query($conn,$sql);

$data = array();

while($row = mysqli_fetch_assoc($result))
{
    $data[] = $row;
}

echo json_encode($data);
?>
<?php
$conn = mysqli_connect("localhost","root","","api_db");

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];
$name = $data['name'];
$price = $data['price'];

$sql = "UPDATE products
        SET name='$name', price='$price'
        WHERE id='$id'";

if(mysqli_query($conn,$sql))
{
    echo json_encode(["message"=>"Product Updated"]);
}
else
{
    echo json_encode(["message"=>"Failed"]);
}
?>
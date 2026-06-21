<?php
$conn = mysqli_connect("localhost","root","","api_db");

$data = json_decode(file_get_contents("php://input"), true);

$name = $data['name'];
$price = $data['price'];

$sql = "INSERT INTO products(name,price)
        VALUES('$name','$price')";

if(mysqli_query($conn,$sql))
{
    echo json_encode(["message"=>"Product Added"]);
}
else
{
    echo json_encode(["message"=>"Failed"]);
}
?>
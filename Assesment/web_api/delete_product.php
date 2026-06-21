<?php
$conn = mysqli_connect("localhost","root","","api_db");

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];

$sql = "DELETE FROM products WHERE id='$id'";

if(mysqli_query($conn,$sql))
{
    echo json_encode(["message"=>"Product Deleted"]);
}
else
{
    echo json_encode(["message"=>"Failed"]);
}
?>
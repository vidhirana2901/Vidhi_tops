<?php

$conn = mysqli_connect("localhost","root","","smart_vendor");

$name = $_REQUEST['name'];
$password = $_REQUEST['password'];

$query = "SELECT * FROM customers 
          WHERE name='$name' 
          AND password='$password'";

$result = mysqli_query($conn,$query);

?>
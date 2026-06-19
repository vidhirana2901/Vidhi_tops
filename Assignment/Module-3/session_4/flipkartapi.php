<?php

// Fetch products from DummyJSON API
$url = "https://dummyjson.com/products";

$response = file_get_contents($url);

$data = json_decode($response, true);

// Select a random product
$products = $data['products'];

$randomIndex = array_rand($products);

$product = $products[$randomIndex];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Deal of the Day</title>
    <style>
        .deal-box{
            width:300px;
            border:1px solid #ccc;
            padding:15px;
            text-align:center;
            margin:50px auto;
            box-shadow:0 0 10px #ddd;
        }
        img{
            width:200px;
            height:200px;
        }
    </style>
</head>
<body>

<div class="deal-box">
    <h2>🔥 Deal of the Day</h2>

    <img src="<?php echo $product['thumbnail']; ?>">

    <h3><?php echo $product['title']; ?></h3>

    <p><strong>Price:</strong> ₹<?php echo $product['price']; ?></p>
</div>

</body>
</html>
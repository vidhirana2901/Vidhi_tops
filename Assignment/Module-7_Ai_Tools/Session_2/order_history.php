<?php

class OrderHistory
{
    private $orders;

    // Constructor
    public function __construct($orders)
    {
        $this->orders = $orders;
    }

    // Display all orders
    public function displayOrders()
    {
        foreach ($this->orders as $order) {
            echo "Order ID: " . $order["id"];
            echo " - Amount: ₹" . $order["amount"] . "<br>";
        }
    }

    // Get total order amount
    public function getTotalAmount()
    {
        $total = 0;

        foreach ($this->orders as $order) {
            $total += $order["amount"];
        }

        return $total;
    }
}


// Order data
$orders = [
    ["id" => 101, "amount" => 500],
    ["id" => 102, "amount" => 1200],
    ["id" => 103, "amount" => 750]
];


// Create object
$orderHistory = new OrderHistory($orders);


// Display order list
echo "<h2>Order History</h2>";

$orderHistory->displayOrders();

echo "<br>";

echo "Total Amount: ₹" . $orderHistory->getTotalAmount();

?>
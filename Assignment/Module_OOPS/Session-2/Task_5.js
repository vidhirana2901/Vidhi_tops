class FoodOrder {
    constructor({ orderId, restaurantName, isDelivered }) {
        this.orderId = orderId;
        this.restaurantName = restaurantName;
        this.isDelivered = isDelivered;
    }

    markDelivered() {
        this.isDelivered = true;
        console.log("Order " + this.orderId + " has been delivered.");
    }
}

let order = new FoodOrder({
    orderId: 102,
    restaurantName: "Spice Restaurant",
    isDelivered: false
});

console.log("Order ID:", order.orderId);
console.log("Restaurant:", order.restaurantName);
console.log("Delivered:", order.isDelivered);

order.markDelivered();

console.log("Delivered:", order.isDelivered);

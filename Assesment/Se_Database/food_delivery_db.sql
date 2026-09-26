-- Create and use database
CREATE DATABASE IF NOT EXISTS food_delivery_db;
USE food_delivery_db;

-- -----------------------------------------------------
-- 1. TABLE CREATION (DDL)
-- -----------------------------------------------------

-- Restaurants Table
CREATE TABLE restaurants (
    restaurant_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    city VARCHAR(50) NOT NULL,
    cuisine_type VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Menu Items Table
CREATE TABLE menu_items (
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    restaurant_id INT NOT NULL,
    item_name VARCHAR(100) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    category VARCHAR(50) NOT NULL,
    FOREIGN KEY (restaurant_id) REFERENCES restaurants(restaurant_id) ON DELETE CASCADE
);

-- Orders Table
CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100) NOT NULL,
    restaurant_id INT NOT NULL,
    item_id INT NOT NULL,
    quantity INT NOT NULL,
    total_amount DECIMAL(10, 2) NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (restaurant_id) REFERENCES restaurants(restaurant_id),
    FOREIGN KEY (item_id) REFERENCES menu_items(item_id)
);

-- Audit Table (For Trigger)
CREATE TABLE order_audit (
    audit_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    restaurant_id INT NOT NULL,
    action VARCHAR(20) DEFAULT 'INSERT',
    log_time DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- -----------------------------------------------------
-- 2. DATA INSERTION (DML)
-- -----------------------------------------------------

-- Insert Restaurants
INSERT INTO restaurants (name, city, cuisine_type) VALUES
('Spice Villa', 'Ahmedabad', 'Indian'),
('Pasta Central', 'Mumbai', 'Italian'),
('Dragon Express', 'Delhi', 'Chinese');

-- Insert Menu Items (4 Categories: Starter, Main Course, Italian, Dessert)
INSERT INTO menu_items (restaurant_id, item_name, price, category) VALUES
(1, 'Paneer Tikka', 250.00, 'Starter'),
(1, 'Butter Chicken', 380.00, 'Main Course'),
(1, 'Dal Makhani', 200.00, 'Main Course'),
(2, 'Margherita Pizza', 300.00, 'Italian'),
(2, 'Penne Arrabbiata', 320.00, 'Italian'),
(2, 'Tiramisu', 180.00, 'Dessert'),
(3, 'Hakka Noodles', 210.00, 'Main Course'),
(3, 'Spring Rolls', 150.00, 'Starter');

-- Insert 15 Sample Orders
INSERT INTO orders (customer_name, restaurant_id, item_id, quantity, total_amount, order_date) VALUES
('Rahul Sharma', 1, 1, 2, 500.00, '2026-09-01 12:00:00'),
('Priya Patel', 1, 2, 1, 380.00, '2026-09-02 13:15:00'),
('Amit Verma', 2, 4, 2, 600.00, '2026-09-03 19:30:00'),
('Neha Shah', 3, 7, 3, 630.00, '2026-09-04 20:00:00'),
('Sanjay Gupta', 1, 3, 2, 400.00, '2026-09-05 14:00:00'),
('Riya Sen', 2, 5, 1, 320.00, '2026-09-06 21:10:00'),
('Karan Mehta', 2, 6, 2, 360.00, '2026-09-07 22:00:00'),
('Pooja Joshi', 3, 8, 4, 600.00, '2026-09-08 18:45:00'),
('Anil Kumar', 1, 1, 1, 250.00, '2026-09-09 13:00:00'),
('Sneha Roy', 1, 2, 2, 760.00, '2026-09-10 20:30:00'),
('Vikas Jain', 2, 4, 1, 300.00, '2026-09-11 12:30:00'),
('Deepak Chawla', 3, 7, 2, 420.00, '2026-09-12 19:15:00'),
('Meera Nair', 1, 3, 1, 200.00, '2026-09-13 20:45:00'),
('Gaurav Tiwari', 2, 5, 2, 640.00, '2026-09-14 21:00:00'),
('Kavita Singh', 3, 8, 2, 300.00, '2026-09-15 13:30:00');

-- -----------------------------------------------------
-- 3. SALES SUMMARY VIEW
-- -----------------------------------------------------

CREATE VIEW restaurant_sales_summary AS
SELECT 
    r.name AS restaurant_name,
    COUNT(o.order_id) AS total_orders,
    IFNULL(SUM(o.total_amount), 0.00) AS total_revenue
FROM restaurants r
LEFT JOIN orders o ON r.restaurant_id = o.restaurant_id
GROUP BY r.restaurant_id, r.name;

-- -----------------------------------------------------
-- 4. AFTER INSERT TRIGGER
-- -----------------------------------------------------

DELIMITER //
CREATE TRIGGER after_order_insert
AFTER INSERT ON orders
FOR EACH ROW
BEGIN
    INSERT INTO order_audit (order_id, restaurant_id, action, log_time)
    VALUES (NEW.order_id, NEW.restaurant_id, 'INSERT', NOW());
END//
DELIMITER ;

-- -----------------------------------------------------
-- 5. STORED PROCEDURE
-- -----------------------------------------------------

DELIMITER //
CREATE PROCEDURE add_order(
    IN p_customer_name VARCHAR(100),
    IN p_restaurant_id INT,
    IN p_item_id INT,
    IN p_quantity INT
)
BEGIN
    DECLARE v_item_price DECIMAL(10, 2);
    DECLARE v_restaurant_exists INT DEFAULT 0;
    DECLARE v_total_amount DECIMAL(10, 2);

    -- Check if restaurant exists
    SELECT COUNT(*) INTO v_restaurant_exists 
    FROM restaurants 
    WHERE restaurant_id = p_restaurant_id;

    START TRANSACTION;

    IF v_restaurant_exists = 0 THEN
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error: Invalid Restaurant ID. Order cancelled.';
    ELSE
        -- Get item price
        SELECT price INTO v_item_price 
        FROM menu_items 
        WHERE item_id = p_item_id AND restaurant_id = p_restaurant_id;

        IF v_item_price IS NULL THEN
            ROLLBACK;
            SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Error: Item ID does not belong to the given restaurant.';
        ELSE
            SET v_total_amount = v_item_price * p_quantity;

            INSERT INTO orders (customer_name, restaurant_id, item_id, quantity, total_amount, order_date)
            VALUES (p_customer_name, p_restaurant_id, p_item_id, p_quantity, v_total_amount, NOW());

            COMMIT;
        END IF;
    END IF;
END//
DELIMITER ;
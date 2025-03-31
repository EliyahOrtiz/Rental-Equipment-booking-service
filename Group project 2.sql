CREATE DATABASE rental_equipment_booking_system;
USE rental_equipment_booking_system;

CREATE TABLE customer
(
    customer_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL unique,
    email VARCHAR(255) NOT NULL unique,
    `Password` VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE equipment
(
    equipment_id INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `function` VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    `condition` VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE rentals
(
    rental_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    equipment_id INT,
    rental_date DATE,
    return_date DATE,
    `status` VARCHAR(255) NOT NULL,
    FOREIGN KEY (customer_id) REFERENCES customer(customer_id),
    FOREIGN KEY (equipment_id) REFERENCES equipment(equipment_id)
);


describe customer






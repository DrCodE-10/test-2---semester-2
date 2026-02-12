
CREATE DATABASE homecommerce;
USE homecommerce;

CREATE TABLE users(
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
email VARCHAR(100),
password VARCHAR(255),
role VARCHAR(20)
);

CREATE TABLE products(
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
description varchar(200),
price DOUBLE
);

CREATE TABLE orders(
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
total DOUBLE
);

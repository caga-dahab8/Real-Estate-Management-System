-- -- Create the database
-- CREATE DATABASE real_estate_system;

-- -- Use the database
-- USE real_estate_system;

-- -- Users Table
-- CREATE TABLE users (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(100) NOT NULL,
--     email VARCHAR(100) UNIQUE NOT NULL,
--     password VARCHAR(255) NOT NULL,
--     role ENUM('admin', 'user') DEFAULT 'user',
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- );

-- -- Properties Table
-- CREATE TABLE properties (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     title VARCHAR(255) NOT NULL,
--     price DECIMAL(10, 2) NOT NULL,
--     location VARCHAR(255) NOT NULL,
--     description TEXT NOT NULL,
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- );

-- -- Inquiries Table
-- CREATE TABLE inquiries (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     user_id INT NOT NULL,
--     property_id INT NOT NULL,
--     message TEXT NOT NULL,
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--     FOREIGN KEY (user_id) REFERENCES users(id),
--     FOREIGN KEY (property_id) REFERENCES properties(id)
-- );
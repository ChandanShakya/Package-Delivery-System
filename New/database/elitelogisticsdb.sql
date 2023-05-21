CREATE DATABASE elitelogisticsdb;
USE elitelogisticsdb;
CREATE TABLE account_type (
  type_id INT PRIMARY KEY AUTO_INCREMENT,
  type_name ENUM('user', 'admin', 'delivery rider') NOT NULL,
  INDEX idx_type_name (type_name)
);
INSERT INTO account_type (type_name) VALUES
  ('user'),
  ('admin'),
  ('delivery rider');

CREATE TABLE account_details (
  account_id INT PRIMARY KEY AUTO_INCREMENT,
  serial_no INT NOT NULL,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(320) NOT NULL,
  phone_no VARCHAR(20) NOT NULL,
  type_id INT,
  created_on DATE NOT NULL,
  default_location VARCHAR(255) NOT NULL,
  INDEX idx_name (name),
  FOREIGN KEY (type_id) REFERENCES account_type (type_id)
);
INSERT INTO account_details (serial_no, name, email, password, phone_no, type_id, created_on, default_location) VALUES
  (123456, 'John Doe', 'johndoe@example.com', 'password123', '1234567890', 1, '2023-05-20', 'New York'),
  (987654, 'Jane Smith', 'janesmith@example.com', 'pass456word', '9876543210', 2, '2023-05-20', 'Los Angeles');

CREATE TABLE delivery_status (
  status_id INT PRIMARY KEY AUTO_INCREMENT,
  status_name ENUM('Pending for approval', 'Waiting for pickup', 'In Transit', 'Delivered', 'Canceled') NOT NULL,
  INDEX idx_status_name (status_name)
);
INSERT INTO delivery_status (status_name) VALUES
  ('Pending for approval'),
  ('Waiting for pickup'),
  ('In Transit'),
  ('Delivered'),
  ('Canceled');

CREATE TABLE receiver_details (
  receiver_id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  phone_no VARCHAR(20) NOT NULL,
  INDEX idx_name (name)
);
INSERT INTO receiver_details (name, phone_no) VALUES
  ('Receiver 1', '1234567890'),
  ('Receiver 2', '9876543210');

CREATE TABLE address_type (
  address_type_id INT PRIMARY KEY AUTO_INCREMENT,
  address_type_name ENUM('Pickup Address', 'Delivery Address') NOT NULL,
  INDEX idx_type_name (address_type_name)
);
INSERT INTO address_type (address_type_name) VALUES
  ('Pickup Address'),
  ('Delivery Address');

CREATE TABLE package_details (
  order_code INT PRIMARY KEY AUTO_INCREMENT,
  account_id INT,
  receiver_id INT,
  date_received DATE,
  date_delivered DATE,
  delivery_status_id INT,
  INDEX idx_account_id (account_id),
  INDEX idx_receiver_id (receiver_id),
  INDEX idx_delivery_status_id (delivery_status_id),
  FOREIGN KEY (account_id) REFERENCES account_details (account_id),
  FOREIGN KEY (receiver_id) REFERENCES receiver_details (receiver_id),
  FOREIGN KEY (delivery_status_id) REFERENCES delivery_status (status_id)
);
INSERT INTO package_details (account_id, receiver_id, date_received, date_delivered, delivery_status_id) VALUES
  (1, 1, '2023-05-20', '2023-05-25', 4),
  (2, 2, '2023-05-21', '2023-05-26', 3);

CREATE TABLE address_details (
  address_id INT PRIMARY KEY AUTO_INCREMENT,
  order_code INT,
  address_type_id INT,
  address VARCHAR(255) NOT NULL,
  INDEX idx_order_code (order_code),
  INDEX idx_address_type_id (address_type_id),
  FOREIGN KEY (order_code) REFERENCES package_details (order_code),
  FOREIGN KEY (address_type_id) REFERENCES address_type (address_type_id)
);
INSERT INTO address_details (order_code, address_type_id, address) VALUES
  (1, 1, '123 Main St, City, Country'),
  (1, 2, '456 Elm St, City, Country'),
  (2, 1, '789 Oak St, City, Country'),
  (2, 2, '987 Pine St, City, Country');

DROP DATABASE IF EXISTS elitelogisticsdb;
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
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(320) NOT NULL,
  phone_no VARCHAR(20) NOT NULL,
  type_id INT,
  created_on DATETIME NOT NULL,
  default_location VARCHAR(255) NOT NULL,
  INDEX idx_name (name),
  FOREIGN KEY (type_id) REFERENCES account_type (type_id) ON DELETE CASCADE
);
INSERT INTO account_details (name, email, password, phone_no, type_id, created_on, default_location) VALUES
  ('Rikesh Maharjan', 'mrikesh648@gmail.com', '$2y$10$Qb2BiO9LC6v24CsAig7w2eeJHNfpfTViZoxg/3W0uxt797gNPd4.2', '9813441076', 1, '2023-05-20', 'Chamati, Kathmandu'),
  ('Chandan Shakya', 'notch0andan@gmail.com', '$2y$10$hvgwO6ijaDUIbxk.m8.Z2uyrjXS4kjDI73vM1OnuXVM0mKFGoQWW.', '9861760709', 2, '2023-05-20', 'Dallu, Kathmandu'),
  ('Ram Bahadur', 'ram@gmail.com', '$2y$10$gYhUrB8XbkFA44jHaP2ChOQNdmtxBvpnmIUgMiQi2Qo7zLQRJ9pF.', '9843788554', 3, '2023-05-21', 'Paknajwol, Kathmandu');


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
  ('Prinsha Maharjan', '9843177804'),
  ('Chandan Shakya', '9876543210');

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
  delivery_rider_id INT,
  date_received DATETIME,
  date_delivered DATETIME,
  delivery_status_id INT,
  description VARCHAR(255),
  remarks VARCHAR(255),
  created_on DATETIME NOT NULL,
  date_assigned DATETIME,
  INDEX idx_account_id (account_id),
  INDEX idx_receiver_id (receiver_id),
  INDEX idx_delivery_rider_id (delivery_rider_id),
  INDEX idx_delivery_status_id (delivery_status_id),
  FOREIGN KEY (account_id) REFERENCES account_details (account_id) ON DELETE CASCADE,
  FOREIGN KEY (receiver_id) REFERENCES receiver_details (receiver_id) ON DELETE CASCADE,
  FOREIGN KEY (delivery_rider_id) REFERENCES account_details (account_id) ON DELETE CASCADE,
  FOREIGN KEY (delivery_status_id) REFERENCES delivery_status (status_id) ON DELETE CASCADE
);
INSERT INTO package_details (account_id, receiver_id, delivery_rider_id, date_received, date_delivered, delivery_status_id, description, created_on, date_assigned) VALUES
  (1, 1, 3,'2023-05-20 11:13:07', '2023-05-21 11:30:04', 2, 'Box of Apples','2023-05-19 11:03:05','2023-05-19 12:03:05'),
  (1, 2, 3,'2023-05-21 09:12:30', '2023-05-22 10:31:22', 2, '10 copies','2023-05-19 12:03:01','2023-05-19 12:30:01');

CREATE TABLE address_details (
  address_id INT PRIMARY KEY AUTO_INCREMENT,
  order_code INT,
  address_type_id INT,
  address VARCHAR(255) NOT NULL,
  INDEX idx_order_code (order_code),
  INDEX idx_address_type_id (address_type_id),
  FOREIGN KEY (order_code) REFERENCES package_details (order_code) ON DELETE CASCADE,
  FOREIGN KEY (address_type_id) REFERENCES address_type (address_type_id) ON DELETE CASCADE
);
INSERT INTO address_details (order_code, address_type_id, address) VALUES
  (1, 1, 'Chamati, Kathmandu'),
  (1, 2, 'Samakhusi, Kathmandu'),
  (2, 1, 'Chamati, Kathmandu'),
  (2, 2, 'Dallu, Kathmandu');

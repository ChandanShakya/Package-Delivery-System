<details>
    <summary>Click to expand/collapse Folder Structure</summary>

I have divided the Code into two folders:
1. New: Contains the new code for the project

    New Folder:
    * Modules: Contains the dependencies installed via npm, including Bootstrap.
    * Images: Holds various images used in the project.
    * HTML: Includes all the HTML files for different pages of the website.
    * Styles: Contains CSS files for styling the website.
    * Database: Holds the SQL file (elitelogisticsdb.sql) for the database structure.
    * PHP: Includes PHP files for server-side functionalities, with index.php located at the root.

    <details>
    <summary>Click to expand/collapse the New Folder Structure</summary>

    ```
    New
    ├── modules
    │   └── node_modules
    │       ├── @popperjs
    │       └── bootstrap
    │           ├── dist
    │           │   ├── css
    |           │   ├── js
    |           │   └── scss
    │           ├── LICENSE
    │           ├── package.json
    │           └── README.md
    ├── images
    |   ├── bannerimg.jpg
    |   ├── call.png
    |   ├── company-img.jpg
    |   ├── deliverycost.png
    |   ├── deliverytime.png
    |   ├── editprofile-bg.jpg
    |   ├── inventory-management.png
    |   ├── last-mile-delivery.png
    |   ├── order-fulfillment.png
    |   ├── reverse-logistics.png
    |   ├── transportation.png
    |   └── warehousing.png
    ├── html
    │   ├── adminDashboard.html
    │   ├── adminDeliveryriders.html
    │   ├── adminPackage.html
    │   ├── adminProfile.html
    │   ├── adminUsers.html
    │   ├── cusDashboard.html
    │   ├── deliveredPackage.html
    │   ├── drDashboard.html
    │   ├── drProfile.html
    │   ├── editProfile.html
    │   ├── index.html
    │   ├── login.html
    │   ├── packageRecords.html
    │   ├── pendingPackage.html
    │   └── signup.html
    ├── styles
    │   ├── adminDashboard.css
    │   ├── adminDeliveryriders.css
    │   ├── adminPackage.css
    │   ├── adminProfile.css
    │   ├── adminUsers.css
    │   ├── cusDashboard.css
    │   ├── drDashboard.css
    │   ├── editProfile.css
    │   ├── index_main.css
    │   ├── login.css
    │   ├── packageRecords.css
    │   ├── signup.css
    │   └── style.css
    ├── database
    │   └── elitelogisticsdb.sql
    └── php
    |   ├── index_main.php
    |   ├── page_footer.php
    |   └── page_header.php
    └── index.php
    ```

    </details>
2. Old: Contains the old code for the project

    Old Folder:

    * Contains the old code for the project. You can keep it for reference or backup purposes.

    <details>
    <summary>Click to expand/collapse the Old Folder Structure</summary>

    ```
    Old
    ├── images
    |   ├── bannerimg.jpg
    |   ├── call.png
    |   ├── company-img.jpg
    |   ├── deliverycost.png
    |   ├── deliverytime.png
    |   ├── editprofile-bg.jpg
    |   ├── inventory-management.png
    |   ├── last-mile-delivery.png
    |   ├── order-fulfillment.png
    |   ├── reverse-logistics.png
    |   ├── transportation.png
    |   └── warehousing.png
    ├── adminDashboard.css
    ├── adminDashboard.html
    ├── adminDeliveryriders.css
    ├── adminDeliveryriders.html
    ├── adminPackage.css
    ├── adminPackage.html
    ├── adminProfile.css
    ├── adminProfile.html
    ├── adminUsers.css
    ├── adminUsers.html
    ├── cusDashboard.css
    ├── cusDashboard.html
    ├── deliveredPackage.html
    ├── drDashboard.css
    ├── drDashboard.html
    ├── drProfile.html
    ├── editProfile.css
    ├── editProfile.html
    ├── index.html
    ├── login.css
    ├── login.html
    ├── packageRecords.css
    ├── packageRecords.html
    ├── pendingPackage.html
    ├── README.MD
    ├── signup.css
    ├── signup.html
    └── style.css
    ```
    </details>
</details>

<details>
    <summary>Click to expand/collapse Schema</summary>

account_details
- account_id (primary key)
- serial_no
- name
- email
- password
- phone_no
- type_id (foreign key to account_type table)
- created_on

account_type
- type_id (primary key)
- type_name (e.g., user, admin, delivery rider)

package_details
- order_code (primary key)
- account_id (foreign key to account_details)
- receiver_id (foreign key to receiver_details)
- date_received
- date_delivered
- delivery_status_id (foreign key to delivery_status table)

delivery_status
- status_id (primary key)
- status_name (e.g., Pending for approval, Waiting for pickup, In Transit, Delivered, Canceled)

receiver_details
- receiver_id (primary key)
- name
- phone_no

address_details
- address_id (primary key)
- order_code (foreign key to package_details)
- address_type_id (foreign key to address_type table)
- address

address_type
- address_type_id (primary key)
- address_type_name (e.g., Pickup Address, Delivery Address)

```sql
CREATE DATABASE elitelogisticsdb;
USE elitelogisticsdb;
CREATE TABLE account_type (
  type_id INT PRIMARY KEY AUTO_INCREMENT,
  type_name ENUM('user', 'admin', 'delivery rider') NOT NULL,
  INDEX idx_type_name (type_name)
);

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

CREATE TABLE delivery_status (
  status_id INT PRIMARY KEY AUTO_INCREMENT,
  status_name ENUM('Pending for approval', 'Waiting for pickup', 'In Transit', 'Delivered', 'Canceled') NOT NULL,
  INDEX idx_status_name (status_name)
);

CREATE TABLE receiver_details (
  receiver_id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  phone_no VARCHAR(20) NOT NULL,
  INDEX idx_name (name)
);

CREATE TABLE address_type (
  address_type_id INT PRIMARY KEY AUTO_INCREMENT,
  address_type_name ENUM('Pickup Address', 'Delivery Address') NOT NULL,
  INDEX idx_type_name (address_type_name)
);

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

```

</details>

erDiagram
  ACCOUNT_TYPE ||--o{ ACCOUNT_DETAILS : has
  ACCOUNT_DETAILS }o--|| DELIVERY_STATUS : has
  ACCOUNT_DETAILS }o--|| RECEIVER_DETAILS : has
  ACCOUNT_DETAILS ||--o{ PACKAGE_DETAILS : has
  PACKAGE_DETAILS }o--|| DELIVERY_STATUS : has
  PACKAGE_DETAILS ||--o{ ADDRESS_DETAILS : has
  ADDRESS_TYPE ||--o{ ADDRESS_DETAILS : has

  ACCOUNT_TYPE {
    INT type_id PK
    ENUM type_name
  }

  ACCOUNT_DETAILS {
    INT account_id PK
    INT serial_no
    VARCHAR(100) name
    VARCHAR(100) email
    VARCHAR(320) password
    VARCHAR(20) phone_no
    INT type_id FK
    DATE created_on
    VARCHAR(255) default_location
  }

  DELIVERY_STATUS {
    INT status_id PK
    ENUM status_name
  }

  RECEIVER_DETAILS {
    INT receiver_id PK
    VARCHAR(100) name
    VARCHAR(20) phone_no
  }

  ADDRESS_TYPE {
    INT address_type_id PK
    ENUM address_type_name
  }

  PACKAGE_DETAILS {
    INT order_code PK
    INT account_id FK
    INT receiver_id FK
    DATE date_received
    DATE date_delivered
    INT delivery_status_id FK
  }

  ADDRESS_DETAILS {
    INT address_id PK
    INT order_code FK
    INT address_type_id FK
    VARCHAR(255) address
  }

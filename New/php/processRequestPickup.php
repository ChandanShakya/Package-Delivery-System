<?php
session_start();
require_once 'connection.php';
if (isset($_SESSION['account_id'])) {
    $accountId = $_SESSION['account_id'];
} else {
    // User is not logged in, redirect to the login page
    header("Location: ../index.php");
    exit();
}
// Retrieve the form input values
$pickupAddress = $_POST['pickupAddress'];
$receiverName = $_POST['receiverName'];
$deliveryAddress = $_POST['deliveryAddress'];
$receiverPhone = $_POST['receiverPhone'];
$description = $_POST['description'];

// Perform any necessary validations on the input values

// Assuming you have a PDO database connection established
try {
    // Insert the request into the package_details table
    $sql = "INSERT INTO package_details (account_id, receiver_id, delivery_status_id, description) VALUES (:account_id, :receiver_id, :delivery_status_id, :description)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':account_id', $accountId, PDO::PARAM_INT); // Replace $accountId with the appropriate value
    $stmt->bindParam(':receiver_id', $receiverId, PDO::PARAM_INT); // Replace $receiverId with the appropriate value
    $stmt->bindValue(':delivery_status_id', 1, PDO::PARAM_INT); // Assuming 1 represents the status 'Pending for approval'
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    $stmt->execute();
    
    // Insert the pickup address into the address_details table
    $orderCode = $pdo->lastInsertId(); // Get the auto-generated order code from the previous insert
    $pickupAddressTypeId = 1; // Assuming 1 represents the address type 'Pickup Address'
    $sql = "INSERT INTO address_details (order_code, address_type_id, address) VALUES (:order_code, :address_type_id, :address)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':order_code', $orderCode, PDO::PARAM_INT);
    $stmt->bindParam(':address_type_id', $pickupAddressTypeId, PDO::PARAM_INT);
    $stmt->bindParam(':address', $pickupAddress, PDO::PARAM_STR);
    $stmt->execute();

    // Insert the delivery address into the address_details table
    $deliveryAddressTypeId = 2; // Assuming 2 represents the address type 'Delivery Address'
    $sql = "INSERT INTO address_details (order_code, address_type_id, address) VALUES (:order_code, :address_type_id, :address)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':order_code', $orderCode, PDO::PARAM_INT);
    $stmt->bindParam(':address_type_id', $deliveryAddressTypeId, PDO::PARAM_INT);
    $stmt->bindParam(':address', $deliveryAddress, PDO::PARAM_STR);
    $stmt->execute();

    // Insert the receiver details into the receiver_details table
    $sql = "INSERT INTO receiver_details (name, phone_no) VALUES (:name, :phone_no)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $receiverName, PDO::PARAM_STR);
    $stmt->bindParam(':phone_no', $receiverPhone, PDO::PARAM_STR);
    $stmt->execute();

    // Retrieve the receiver ID from the previous insert
    $receiverId = $pdo->lastInsertId();

    // Update the package_details table with the receiver ID
    $sql = "UPDATE package_details SET receiver_id = :receiver_id WHERE order_code = :order_code";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':receiver_id', $receiverId, PDO::PARAM_INT);
    $stmt->bindParam(':order_code', $orderCode, PDO::PARAM_INT);
    $stmt->execute();

    // Redirect to a success page or display a success message
    header("Location: ../dashboard.php?successRequest=true");

    exit();
} catch (PDOException $e) {
    // Handle any potential errors
    echo "Error: " . $e->getMessage();
    exit();
}
?>

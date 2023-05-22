<?php
require_once 'connection.php';
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the order code and assigned delivery personnel from the form
    $orderCode = $_POST['order_code'];
    $deliveryPersonnel = $_POST['delivery_personnel'];

    // Update the delivery rider ID in the package_details table
    $sql = "UPDATE package_details SET delivery_rider_id = :delivery_personnel, delivery_status_id = 2, date_assigned = NOW() WHERE order_code = :order_code";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':delivery_personnel', $deliveryPersonnel, PDO::PARAM_INT);
    $stmt->bindParam(':order_code', $orderCode, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Redirect to the page showing pickup requests
        header('Location: ../dashboard.php?successAssign=true');
        exit;
    } else {
        // Handle the update failure
        $error = "Failed to assign delivery personnel.";
        header('Location: ../dashboard.php?error=' . $error);
        exit;
    }
}
?>
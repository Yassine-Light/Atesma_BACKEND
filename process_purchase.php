<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("conn.php");

if (isset($_POST['s_name']) && isset($_POST['s_email']) && isset($_POST['s_phone']) && isset($_POST['s_certiport_username']) && isset($_POST['certificate_id'])) {
    $Name = $_POST['s_name'];
    $email = $_POST['s_email'];
    $phone = $_POST['s_phone'];
    $certiport_username = $_POST['s_certiport_username'];
    $certificate_id = $_POST['certificate_id'];

    // Generate a unique order UID
    $order_uid = uniqid();

    // Insert the user into the users table
    $sql_user = "INSERT INTO users (Name, email, phone, certiport_name) VALUES (?, ?, ?, ?)";
    $stmt_user = $conn->prepare($sql_user);
    $stmt_user->bind_param("ssss", $Name, $email, $phone, $certiport_username);
    $stmt_user->execute();
    $user_id = $conn->insert_id;  // Get the last inserted user ID

    // Insert into the orders table to link user and certificate
    $sql_order = "INSERT INTO orders (user_id, certificate_id, order_UID) VALUES (?, ?, ?)";
    $stmt_order = $conn->prepare($sql_order);
    $stmt_order->bind_param("iis", $user_id, $certificate_id, $order_uid);
    $stmt_order->execute();

    echo "Order placed successfully!";

    // Close statements and connection
    $stmt_user->close();
    $stmt_order->close();
    $conn->close();
}
?>

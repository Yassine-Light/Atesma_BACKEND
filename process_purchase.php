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

    // Debug: Print received data
    echo "Received data: Name: $Name, Email: $email, Phone: $phone, Certiport Username: $certiport_username, Certificate ID: $certificate_id <br>";

    // Generate a unique order UID
    $order_uid = uniqid();

    // Insert the user into the users table
    $sql_user = "INSERT INTO users (Name, email, phone, certiport_name) VALUES (?, ?, ?, ?)";
    $stmt_user = $conn->prepare($sql_user);

    if (!$stmt_user) {
        die("User statement preparation failed: " . $conn->error);
    }

    $stmt_user->bind_param("ssss", $Name, $email, $phone, $certiport_username);

    if (!$stmt_user->execute()) {
        die("User insertion failed: " . $stmt_user->error);
    }

    // Get the last inserted user ID
    $user_id = $conn->insert_id;

    // Debug: check user_id
    echo "User ID after insertion: $user_id <br>";

    // Check if the certificate_id exists in the certificates table
    $sql_check_certificate = "SELECT * FROM certificates WHERE id = ?";
    $stmt_check = $conn->prepare($sql_check_certificate);
    $stmt_check->bind_param("i", $certificate_id);

    if (!$stmt_check->execute()) {
        die("Certificate check failed: " . $stmt_check->error);
    }

    $result = $stmt_check->get_result();
    if ($result->num_rows == 0) {
        die("Invalid certificate_id: $certificate_id. It does not exist in the certificates table.");
    }

    // Insert into the orders table to link user and certificate
    $sql_order = "INSERT INTO orders (user_id, certificate_id, order_UID) VALUES (?, ?, ?)";
    $stmt_order = $conn->prepare($sql_order);

    if (!$stmt_order) {
        die("Order statement preparation failed: " . $conn->error);
    }

    // Bind parameters and check if insertion works
    $stmt_order->bind_param("iis", $user_id, $certificate_id, $order_uid);

    if (!$stmt_order->execute()) {
        die("Order insertion failed: " . $stmt_order->error);
    }

    echo "Order placed successfully!";

    // Close statements and connection
    $stmt_user->close();
    $stmt_order->close();
    $conn->close();
} else {
    die("Required form data is missing.");
}

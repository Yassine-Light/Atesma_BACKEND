<?php
include('conn.php');

if (isset($_POST['order_id']) && isset($_POST['action'])) {
    $order_id = $_POST['order_id'];
    $action = $_POST['action'];

    // Fetch order details before deleting
    $sql_get = "SELECT * FROM orders WHERE order_id = ?";
    $stmt_get = $conn->prepare($sql_get);
    $stmt_get->bind_param("i", $order_id);
    $stmt_get->execute();
    $order = $stmt_get->get_result()->fetch_assoc();
    $stmt_get->close();

    if ($order) {
        $user_id = $order['user_id'];
        $certificate_id = $order['certificate_id'];
        $order_UID = $order['order_UID'];

        if ($action == 'done') {
            // Move order to completed_orders table
            $sql_insert = "INSERT INTO completed_orders (order_id, user_id, certificate_id, order_UID) VALUES (?, ?, ?, ?)";
        } elseif ($action == 'delete') {
            // Move order to deleted_orders table
            $sql_insert = "INSERT INTO deleted_orders (order_id, user_id, certificate_id, order_UID) VALUES (?, ?, ?, ?)";
        }

        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("iiis", $order_id, $user_id, $certificate_id, $order_UID);
        $stmt_insert->execute();
        $stmt_insert->close();

        // Delete the order from the orders table
        $sql_delete = "DELETE FROM orders WHERE order_id = ?";
        $stmt_delete = $conn->prepare($sql_delete);
        $stmt_delete->bind_param("i", $order_id);
        if ($stmt_delete->execute()) {
            echo 'success';
        } else {
            echo 'error deleting order';
        }
        $stmt_delete->close();
    } else {
        echo 'order not found';
    }

    $conn->close();
} else {
    echo 'no order_id or action provided';
}
?>

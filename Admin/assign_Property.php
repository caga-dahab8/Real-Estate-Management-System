<?php
session_start();
include '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $property_id = $_POST['property_id'];
    $user_id = $_POST['user_id'];

    // Update the property assignment
    $stmt = $pdo->prepare("UPDATE properties SET assigned_to = ? WHERE id = ?");
    $stmt->execute([$user_id, $property_id]);

    $_SESSION['success'] = "Property assignment updated successfully!";
    header("Location: Manage_Properties.php");
    exit();
}
?>
<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit();
}
include '../includes/db_connect.php';

// Delete property
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the property to delete the associated image
    $stmt = $pdo->prepare("SELECT image FROM properties WHERE id = ?");
    $stmt->execute([$id]);
    $property = $stmt->fetch();

    if ($property) {
        // Delete the image file
        $imagePath = "../uploads/" . $property['image'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Delete the property from the database
        $stmt = $pdo->prepare("DELETE FROM properties WHERE id = ?");
        $stmt->execute([$id]);
    }
}

header("Location: manage_properties.php");
exit();
?>
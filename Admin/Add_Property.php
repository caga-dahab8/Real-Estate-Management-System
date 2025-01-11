<?php
session_start();
include '../includes/db_connect.php';
// // Check admin authentication
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit();
}
$success = null;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $location = $_POST['location'];
    $type = $_POST['type']; // 'rent' or 'sale'
    $image = $_FILES['image']['name'];

    // Validate and upload image
    if ($image) {
        $image_path = '../uploads/' . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
    }

    // Insert property into database
    $stmt = $pdo->prepare("INSERT INTO properties (title, description, price, location, type, image) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$title, $description, $price, $location, $type, $image]);

    $success = "Property added successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Property</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Display success popup
        document.addEventListener('DOMContentLoaded', function() {
            <?php if ($success): ?>
                alert("<?= htmlspecialchars($success) ?>");
            <?php endif; ?>
        });

        // Client-side validation for text and number inputs
        function validateForm() {
            const title = document.getElementById('title').value.trim();
            const location = document.getElementById('location').value.trim();
            const price = document.getElementById('price').value.trim();

            const textRegex = /^[a-zA-Z\s]+$/; // Only letters and spaces
            const numberRegex = /^[0-9]+$/; // Only numbers

            if (!textRegex.test(title)) {
                alert("Title must contain only letters and spaces.");
                return false;
            }
            if (!textRegex.test(location)) {
                alert("Location must contain only letters and spaces.");
                return false;
            }
            if (!numberRegex.test(price)) {
                alert("Price must be a valid number.");
                return false;
            }

            return true;
        }
    </script>
</head>

<body class="bg-gray-100 min-h-screen">

    <!-- Header -->
    <?php
    include "../Includes/header.php"
    ?>
    <div class="flex flex-1">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white p-4">
            <h2 class="text-lg font-bold mb-4">Navigation</h2>
            <nav>
                <a href="dashboard.php" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Dashboard</a>
                <a href="add_property.php" class="block py-2 px-4 bg-gray-700 rounded mb-2">Add Property</a>
                <a href="manage_properties.php" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Manage Properties</a>
                <a href="view_inquiries.php" class="block py-2 px-4 hover:bg-gray-700 rounded">View Inquiries</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 bg-gradient-to-r from-blue-50 to-purple-50">
            <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-2xl overflow-hidden p-8">
                <h2 class="text-3xl font-extrabold text-gray-800 mb-6 text-center">Add New Property</h2>

                <form method="POST" enctype="multipart/form-data" class="space-y-8" onsubmit="return validateForm()">
                    <!-- Title Field -->
                    <div class="space-y-2">
                        <label for="title" class="block text-sm font-semibold text-gray-700">Title:</label>
                        <input type="text" id="title" name="title" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300" placeholder="Enter property title" required>
                    </div>

                    <!-- Description Field -->
                    <div class="space-y-2">
                        <label for="description" class="block text-sm font-semibold text-gray-700">Description:</label>
                        <textarea id="description" name="description" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300" rows="5" placeholder="Describe the property" required></textarea>
                    </div>

                    <!-- Price Field -->
                    <div class="space-y-2">
                        <label for="price" class="block text-sm font-semibold text-gray-700">Price:</label>
                        <input type="number" id="price" name="price" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300" placeholder="Enter price" required>
                    </div>

                    <!-- Location Field -->
                    <div class="space-y-2">
                        <label for="location" class="block text-sm font-semibold text-gray-700">Location:</label>
                        <input type="text" id="location" name="location" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300" placeholder="Enter location" required>
                    </div>

                    <!-- Type Field -->
                    <div class="space-y-2">
                        <label for="type" class="block text-sm font-semibold text-gray-700">Type:</label>
                        <select id="type" name="type" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                            <option value="rent">For Rent</option>
                            <option value="sale">For Sale</option>
                        </select>
                    </div>

                    <!-- Image Field -->
                    <div class="space-y-2">
                        <label for="image" class="block text-sm font-semibold text-gray-700">Image:</label>
                        <input type="file" id="image" name="image" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold py-3 px-8 rounded-lg shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-105">
                            Add Property
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4">
        &copy; 2025 Real Estate Management System
    </footer>
</body>

</html>
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
        document.addEventListener('DOMContentLoaded', function () {
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
    <header class="bg-gray-800 text-white py-4">
        <div class="container mx-auto px-4 flex justify-between">
            <h1 class="text-xl font-bold">Admin Dashboard</h1>
            <div>
                Welcome, <?= htmlspecialchars($_SESSION['name']) ?>!
                <a href="../auth/logout.php" class="text-blue-300 hover:underline ml-4">Logout</a>
            </div>
        </div>
    </header>
    <div class="flex flex-1">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white p-4">
            <h2 class="text-lg font-bold mb-4">Navigation</h2>
            <nav>
                <a href="dashboard.php" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Dashboard</a>
                <a href="manage_properties.php" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Manage Properties</a>
                <a href="add_property.php" class="block py-2 px-4 bg-gray-700 rounded mb-2">Add Property</a>
                <a href="view_inquiries.php" class="block py-2 px-4 hover:bg-gray-700 rounded">View Inquiries</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold mb-4">Add New Property</h2>

                <form method="POST" enctype="multipart/form-data" class="space-y-6" onsubmit="return validateForm()">
                    <div>
                        <label for="title" class="block text-gray-700 font-bold">Title:</label>
                        <input type="text" id="title" name="title" class="w-full border border-gray-300 rounded p-2" required>
                    </div>
                    <div>
                        <label for="description" class="block text-gray-700 font-bold">Description:</label>
                        <textarea id="description" name="description" class="w-full border border-gray-300 rounded p-2" rows="4" required></textarea>
                    </div>
                    <div>
                        <label for="price" class="block text-gray-700 font-bold">Price:</label>
                        <input type="number" id="price" name="price" class="w-full border border-gray-300 rounded p-2" required>
                    </div>
                    <div>
                        <label for="location" class="block text-gray-700 font-bold">Location:</label>
                        <input type="text" id="location" name="location" class="w-full border border-gray-300 rounded p-2" required>
                    </div>
                    <div>
                        <label for="type" class="block text-gray-700 font-bold">Type:</label>
                        <select id="type" name="type" class="w-full border border-gray-300 rounded p-2">
                            <option value="rent">For Rent</option>
                            <option value="sale">For Sale</option>
                        </select>
                    </div>
                    <div>
                        <label for="image" class="block text-gray-700 font-bold">Image:</label>
                        <input type="file" id="image" name="image" class="w-full border border-gray-300 rounded p-2" required>
                    </div>
                    <div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Add Property</button>
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
<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

include '../includes/db_connect.php';

// Validate and fetch property details
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM properties WHERE id = ?");
    $stmt->execute([$id]);
    $property = $stmt->fetch();

    if (!$property) {
        die("Property not found.");
    }
} else {
    header("Location: manage_properties.php");
    exit();
}

// Update property
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? 0;

    // Handle image upload (optional)
    if (!empty($_FILES['image']['name'])) {
        $imageName = $_FILES['image']['name'];
        $targetPath = "../uploads/" . $imageName;
        move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);

        // Update with new image
        $stmt = $pdo->prepare("UPDATE properties SET title = ?, description = ?, price = ?, image = ? WHERE id = ?");
        $stmt->execute([$title, $description, $price, $imageName, $id]);
    } else {
        // Update without changing the image
        $stmt = $pdo->prepare("UPDATE properties SET title = ?, description = ?, price = ? WHERE id = ?");
        $stmt->execute([$title, $description, $price, $id]);
    }

    header("Location: manage_properties.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Property</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                <a href="manage_properties.php" class="block py-2 px-4 bg-gray-700 rounded mb-2">Manage Properties</a>
                <a href="add_property.php" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Add Property</a>
                <a href="view_inquiries.php" class="block py-2 px-4 hoverbg-gray-700 rounded">View Inquiries</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold mb-6">Edit Property</h2>

                <form method="POST" enctype="multipart/form-data" class="space-y-6">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-gray-700 font-medium">Title</label>
                        <input
                            type="text"
                            name="title"
                            id="title"
                            value="<?= isset($property['title']) ? htmlspecialchars($property['title']) : '' ?>"
                            class="w-full mt-1 border border-gray-300 rounded-lg p-2 focus:ring focus:ring-indigo-500 focus:border-indigo-500"
                            required>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-gray-700 font-medium">Description</label>
                        <textarea
                            name="description"
                            id="description"
                            rows="4"
                            class="w-full mt-1 border border-gray-300 rounded-lg p-2 focus:ring focus:ring-indigo-500 focus:border-indigo-500"
                            required><?= isset($property['description']) ? htmlspecialchars($property['description']) : '' ?></textarea>
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-gray-700 font-medium">Price</label>
                        <input
                            type="number"
                            name="price"
                            id="price"
                            value="<?= isset($property['price']) ? $property['price'] : '' ?>"
                            class="w-full mt-1 border border-gray-300 rounded-lg p-2 focus:ring focus:ring-indigo-500 focus:border-indigo-500"
                            step="0.01"
                            required>
                    </div>

                    <!-- Image -->
                    <div>
                        <label class="block text-gray-700 font-medium">Image</label>
                        <?php if (!empty($property['image']) && file_exists("../uploads/" . $property['image'])): ?>
                            <img src="../uploads/<?= htmlspecialchars($property['image']) ?>" alt="Property Image" class="w-32 h-32 object-cover rounded-lg mb-3">
                        <?php endif; ?>
                        <input
                            type="file"
                            name="image"
                            class="w-full mt-1 border border-gray-300 rounded-lg p-2 focus:ring focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full bg-indigo-600 text-white font-medium py-2 px-4 rounded-lg hover:bg-indigo-700">
                        Update Property
                    </button>
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
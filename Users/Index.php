<?php
session_start();
include '../includes/db_connect.php';

// Check if the session variable exists
$userName = isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : 'Guest';

// Fetch all unassigned properties
$stmt = $pdo->query("SELECT * FROM properties WHERE assigned_to IS NULL");
$properties = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

    <!-- Header -->
    <header class="bg-gray-800 text-white py-4">
        <div class="container mx-auto px-4 flex justify-between">
            <h1 class="text-xl font-bold">User Dashboard</h1>
            <div>
                Welcome, <?= $userName ?>!
                <a href="../auth/logout.php" class="text-blue-300 hover:underline ml-4">Logout</a>
            </div>
        </div>
    </header>

    <div class="flex flex-1">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white p-4 min-h-screen">
            <h2 class="text-lg font-bold mb-6">Navigation</h2>
            <nav class="space-y-4">
                <a href="index.php" class="block py-2 px-4 bg-gray-700 rounded">Dashboard</a>
                <a href="Property_Details.php" class="block py-2 px-4 hover:bg-gray-700 rounded">View Properties</a>
                <a href="Profile.php" class="block py-2 px-4 hover:bg-gray-700 rounded">Profile</a>
                <a href="../auth/logout.php" class="block py-2 px-4 hover:bg-gray-700 rounded text-red-400">Logout</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h2 class="text-2xl font-bold mb-6">Available Properties</h2>

            <!-- Properties Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php if (count($properties) > 0): ?>
                    <?php foreach ($properties as $property): ?>
                        <div class="bg-white shadow-md rounded-lg overflow-hidden">
                            <!-- Property Image with Link -->
                            <?php if (!empty($property['image']) && file_exists("../uploads/" . $property['image'])): ?>
                                <a href="Property_Details.php?id=<?= $property['id'] ?>">
                                    <img src="../uploads/<?= htmlspecialchars($property['image']) ?>" alt="Property Image" class="w-full h-48 object-cover">
                                </a>
                            <?php else: ?>
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                                    <a href="view_property.php?id=<?= $property['id'] ?>" class="text-gray-500">No Image</a>
                                </div>
                            <?php endif; ?>

                            <!-- Property Details -->
                            <div class="p-4">
                                <h3 class="text-lg font-bold mb-2"><?= htmlspecialchars($property['title']) ?></h3>
                                <p class="text-gray-600 mb-2">Location: <?= htmlspecialchars($property['location']) ?></p>
                                <p class="text-gray-800 font-bold">Price: $<?= htmlspecialchars($property['price']) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-gray-600">No Available properties found.</p>
                <?php endif; ?>
            </div>
        </main>
    </div>
    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4">
        &copy; 2025 Real Estate Management System
    </footer>
</body>

</html>
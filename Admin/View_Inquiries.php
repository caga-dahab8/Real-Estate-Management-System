<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

include '../includes/db_connect.php';

// Fetch all inquiries
$stmt = $pdo->query("
    SELECT i.*, p.title AS property_title
    FROM inquiries i
    JOIN properties p ON i.property_id = p.id
    ORDER BY i.created_at DESC
");
$inquiries = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Inquiries</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen ">

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
                <a href="add_property.php" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Add Property</a>
                <a href="view_inquiries.php" class="block py-2 px-4 bg-gray-700 rounded">View Inquiries</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="max-w-6xl mx-auto bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold mb-4">Inquiries</h2>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-100 border-b">
                                <th class="p-3 text-gray-700">Property</th>
                                <th class="p-3 text-gray-700">User Email</th>
                                <th class="p-3 text-gray-700">Message</th>
                                <th class="p-3 text-gray-700">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($inquiries as $inquiry): ?>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-3"><?= htmlspecialchars($inquiry['property_title']) ?></td>
                                    <td class="p-3"><?= htmlspecialchars($inquiry['user_email']) ?></td>
                                    <td class="p-3"><?= htmlspecialchars($inquiry['message']) ?></td>
                                    <td class="p-3"><?= htmlspecialchars($inquiry['created_at']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4">
        &copy; 2025 Real Estate Management System
    </footer>
</body>

</html>
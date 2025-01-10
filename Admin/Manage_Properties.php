<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

include '../includes/db_connect.php';

// Fetch all properties with assigned user information
$stmt = $pdo->query("
    SELECT p.*, u.name AS assigned_user 
    FROM properties p 
    LEFT JOIN users u ON p.assigned_to = u.id
    ORDER BY p.id DESC
");
$properties = $stmt->fetchAll();

// Fetch all users to populate the assign dropdown
$userStmt = $pdo->query("SELECT id, name FROM users WHERE role = 'user'");
$users = $userStmt->fetchAll();

// Handle deletion
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $propertyId = $_GET['delete'];

    // Delete the property
    $deleteStmt = $pdo->prepare("DELETE FROM properties WHERE id = ?");
    $deleteStmt->execute([$propertyId]);

    header("Location: manage_properties.php");
    exit();
}

// Handle property assignment
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['property_id'], $_POST['user_id'])) {
    $propertyId = $_POST['property_id'];
    $userId = $_POST['user_id'];

    if ($userId) {
        // Assign to a user
        $assignStmt = $pdo->prepare("UPDATE properties SET assigned_to = ? WHERE id = ?");
        $assignStmt->execute([$userId, $propertyId]);
    } else {
        // Unassign the property
        $assignStmt = $pdo->prepare("UPDATE properties SET assigned_to = NULL WHERE id = ?");
        $assignStmt->execute([$propertyId]);
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
    <title>Manage Properties</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
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

    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white p-4">
            <h2 class="text-lg font-bold mb-4">Navigation</h2>
            <nav>
                <a href="dashboard.php" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Dashboard</a>
                <a href="manage_properties.php" class="block py-2 px-4 bg-gray-700 rounded mb-2">Manage Properties</a>
                <a href="add_property.php" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Add Property</a>
                <a href="view_inquiries.php" class="block py-2 px-4 hover:bg-gray-700 rounded">View Inquiries</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h1 class="text-2xl font-bold mb-6">Manage Properties</h1>

            <!-- Properties Table -->
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="w-full table-auto">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-3 px-4">Title</th>
                            <th class="py-3 px-4">Price</th>
                            <th class="py-3 px-4">Type</th>
                            <th class="py-3 px-4">Assigned To</th>
                            <th class="py-3 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($properties as $property): ?>
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4"><?= htmlspecialchars($property['title']) ?></td>
                                <td class="py-3 px-4">$<?= htmlspecialchars($property['price']) ?></td>
                                <td class="py-3 px-4"><?= htmlspecialchars($property['type']) == 'rent' ? 'For Rent' : 'For Sale' ?></td>
                                <td class="py-3 px-4">
                                    <?= $property['assigned_user'] ? htmlspecialchars($property['assigned_user']) : '<span class="text-gray-500">Not Assigned</span>' ?>
                                </td>
                                <td class="py-3 px-4">
                                    <!-- Assign Form -->
                                    <form method="POST" class="inline">
                                        <input type="hidden" name="property_id" value="<?= $property['id'] ?>">
                                        <select name="user_id" class="border rounded py-1 px-2">
                                            <option value="">Unassign</option>
                                            <?php foreach ($users as $user): ?>
                                                <option value="<?= $user['id'] ?>" <?= $property['assigned_to'] == $user['id'] ? 'selected' : '' ?>>
                                                    <?= htmlspecialchars($user['name']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">Assign</button>
                                    </form>

                                    <!-- Edit Link -->
                                    <a href="edit_property.php?id=<?= $property['id'] ?>" class="text-blue-600 hover:underline ml-2">Edit</a>

                                    <!-- Delete Link -->
                                    <a href="manage_properties.php?delete=<?= $property['id'] ?>"
                                        class="text-red-600 hover:underline ml-2"
                                        onclick="return confirm('Are you sure you want to delete this property?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>

</html>
<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

include '../includes/db_connect.php';

// Fetch all properties for initial load
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <!-- Header -->
    <?php
    include "../Includes/header.php"
    ?>

    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white p-4">
            <h2 class="text-lg font-bold mb-4">Navigation</h2>
            <nav>
                <a href="dashboard.php" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Dashboard</a>
                <a href="add_property.php" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Add Property</a>
                <a href="manage_properties.php" class="block py-2 px-4 bg-gray-700 rounded mb-2">Manage Properties</a>
                <a href="view_inquiries.php" class="block py-2 px-4 hover:bg-gray-700 rounded">View Inquiries</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h1 class="text-2xl font-bold mb-6">Manage Properties</h1>

            <!-- Search Bar -->
            <div class="mb-6">
                <input type="text" id="searchInput" placeholder="Search properties by title, price, location, or type..." class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Properties Table -->
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table id="propertiesTable" class="w-full table-auto">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-3 px-4">Title</th>
                            <th class="py-3 px-4">Price</th>
                            <th class="py-3 px-4">Location</th>
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
                                <td class="py-3 px-4"><?= htmlspecialchars($property['location']) ?></td>
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

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4">
        &copy; 2025 Real Estate Management System
    </footer>
    <!-- JavaScript for Dynamic Search -->
    <script>
        function searchTable() {
            const input = document.getElementById("searchInput");
            const filter = input.value.toUpperCase();
            const table = document.getElementById("propertiesTable");
            const tr = table.getElementsByTagName("tr");

            for (let i = 1; i < tr.length; i++) {
                const tdTitle = tr[i].getElementsByTagName("td")[0];
                const tdPrice = tr[i].getElementsByTagName("td")[1];
                const tdLocation = tr[i].getElementsByTagName("td")[2];
                const tdType = tr[i].getElementsByTagName("td")[3];

                if (tdTitle || tdPrice || tdLocation || tdType) {
                    const txtValueTitle = tdTitle.textContent || tdTitle.innerText;
                    const txtValuePrice = tdPrice.textContent || tdPrice.innerText;
                    const txtValueLocation = tdLocation.textContent || tdLocation.innerText;
                    const txtValueType = tdType.textContent || tdType.innerText;

                    if (
                        txtValueTitle.toUpperCase().indexOf(filter) > -1 ||
                        txtValuePrice.toUpperCase().indexOf(filter) > -1 ||
                        txtValueLocation.toUpperCase().indexOf(filter) > -1 ||
                        txtValueType.toUpperCase().indexOf(filter) > -1
                    ) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        // Attach the search function to the input field
        document.getElementById("searchInput").addEventListener("keyup", searchTable);
    </script>
</body>

</html>
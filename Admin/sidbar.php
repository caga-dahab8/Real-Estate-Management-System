<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex">
    <!-- Sidebar -->
    <div class="w-64 h-screen bg-gray-800 text-white flex flex-col">
        <h2 class="text-2xl font-bold text-center py-4 border-b border-gray-700">Admin Dashboard</h2>
        <nav class="flex-1 px-4 py-2">
            <a href="dashboard.php" class="block py-2 px-4 text-sm hover:bg-gray-700 rounded">Dashboard</a>
            <a href="manage_properties.php" class="block py-2 px-4 text-sm hover:bg-gray-700 rounded">Manage Properties</a>
            <a href="add_property.php" class="block py-2 px-4 text-sm hover:bg-gray-700 rounded">Add Property</a>
            <a href="view_inquiries.php" class="block py-2 px-4 text-sm hover:bg-gray-700 rounded">View Inquiries</a>
            <a href="../auth/logout.php" class="block py-2 px-4 text-sm hover:bg-gray-700 rounded">Logout</a>
        </nav>
    </div>
    <!-- Main Content -->
    <div class="flex-1">
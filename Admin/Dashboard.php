<?php
session_start();
include '../includes/db_connect.php';

// // Check admin authentication
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit();
}



// Fetch property count
$stmt = $pdo->query("SELECT COUNT(*) AS total_properties FROM properties");
$propertyCount = $stmt->fetchColumn();

// Fetch inquiry count
$inquiryStmt = $pdo->query("SELECT COUNT(*) AS total_inquiries FROM inquiries");
$inquiryCount = $inquiryStmt->fetchColumn();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

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
            <a href="dashboard.php" class="block py-2 px-4 bg-gray-700 rounded mb-2">Dashboard</a>
            <a href="manage_properties.php" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Manage Properties</a>
            <a href="add_property.php" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Add Property</a>
            <a href="view_inquiries.php" class="block py-2 px-4 hover:bg-gray-700 rounded">View Inquiries</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        <h2 class="text-2xl font-bold mb-6">Dashboard Overview</h2>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="bg-white shadow-md rounded-lg p-4 flex items-center">
                <div class="bg-blue-500 text-white rounded-full p-3 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V4m0 0a4 4 0 118 0v3m-8 0a4 4 0 008 0v3M5 13h14m-5 5h2m-6 0h2m-6 0h2m2 0a4 4 0 008 0H5a4 4 0 000 8h14a4 4 0 000-8H5a4 4 0 008 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-semibold">Properties</h3>
                    <p class="text-gray-500"><?= $propertyCount ?> Registered</p>
                </div>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4 flex items-center">
                <div class="bg-green-500 text-white rounded-full p-3 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21H7a4 4 0 01-4-4v-4a4 4 0 014-4h1V3h4v6h4m3 3h2a2 2 0 012 2v5a2 2 0 01-2 2h-2M9 15H7a2 2 0 00-2 2v2a2 2 0 002 2h2v-4z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-semibold">Inquiries</h3>
                    <p class="text-gray-500"><?= $inquiryCount ?> Received</p>
                </div>
            </div>
        </div>

        <!-- Chart -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-lg font-bold mb-4">Property Overview</h3>
            <canvas id="propertyChart"></canvas>
        </div>
    </main>
</div>

<!-- Footer -->
<footer class="bg-gray-800 text-white text-center py-4">
    &copy; 2025 Real Estate Management System
</footer>

<script>
    // Chart Data
    const ctx = document.getElementById('propertyChart').getContext('2d');
    const propertyChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Properties', 'Inquiries'],
            datasets: [{
                label: '# Count',
                data: [<?= $propertyCount ?>, <?= $inquiryCount ?>],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(75, 192, 192, 0.5)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>

</body>
</html>
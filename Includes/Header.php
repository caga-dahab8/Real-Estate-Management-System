<header class="bg-gray-800 text-white py-4">
    <div class="container mx-auto px-4 flex justify-between">
        <h1 class="text-xl font-bold">Admin Dashboard</h1>
        <div>
            Welcome, <?= htmlspecialchars($_SESSION['name']) ?>!
            <a href="../auth/logout.php" class="text-red-500 hover:underline ml-4">Logout</a>
        </div>
    </div>
</header>
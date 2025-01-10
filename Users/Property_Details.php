<?php
session_start();
include '../includes/db_connect.php';

// Fetch property details
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM properties WHERE id = ?");
    $stmt->execute([$id]);
    $property = $stmt->fetch();

    if (!$property) {
        die("Property not found.");
    }
} else {
    header("Location: index.php");
    exit();
}

// Handle inquiry form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Insert inquiry into the database
    $stmt = $pdo->prepare("INSERT INTO inquiries (user_email, property_id, message) VALUES (?, ?, ?)");
    $stmt->execute([$user_email, $id, $message]);

    $successMessage = "Your inquiry has been sent successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Header -->
    <header class="bg-gray-800 text-white py-4">
        <div class="container mx-auto px-4 flex justify-between">
            <h1 class="text-xl font-bold">Property Details</h1>
            <a href="index.php" class="text-blue-300 hover:underline">Back to Dashboard</a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto p-6">
        <div class="bg-white shadow-md rounded-lg overflow-hidden max-w-4xl mx-auto">
            <!-- Property Image -->
            <?php if (!empty($property['image']) && file_exists("../uploads/" . $property['image'])): ?>
                <img src="../uploads/<?= htmlspecialchars($property['image']) ?>" alt="Property Image" class="w-full h-64 object-cover">
            <?php else: ?>
                <div class="w-full h-64 bg-gray-200 flex items-center justify-center text-gray-500">No Image</div>
            <?php endif; ?>

            <!-- Property Details -->
            <div class="p-6">
                <h2 class="text-2xl font-bold mb-4"><?= htmlspecialchars($property['title']) ?></h2>
                <p class="text-gray-600 mb-2">Location: <?= htmlspecialchars($property['location']) ?></p>
                <p class="text-gray-800 mb-2">Price: $<?= htmlspecialchars($property['price']) ?></p>
                <p class="text-gray-700 mb-4"><?= htmlspecialchars($property['description']) ?></p>
            </div>
        </div>

        <!-- Inquiry Form -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden max-w-4xl mx-auto mt-6 p-6">
            <h2 class="text-xl font-bold mb-4">Send Inquiry</h2>

            <!-- Success Message -->
            <?php if (isset($successMessage)): ?>
                <p class="bg-green-100 text-green-800 p-2 rounded mb-4"><?= htmlspecialchars($successMessage) ?></p>
            <?php endif; ?>

            <form method="POST" class="space-y-6">
                <div>
                    <label for="email" class="block text-gray-700 font-bold">Your Email:</label>
                    <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded p-2" required>
                </div>
                <div>
                    <label for="message" class="block text-gray-700 font-bold">Message:</label>
                    <textarea id="message" name="message" class="w-full border border-gray-300 rounded p-2" rows="4" required></textarea>
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Send Inquiry</button>
                </div>
            </form>
        </div>
    </main>

</body>

</html>
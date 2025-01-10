<!-- <?php
        session_start();
        include '../includes/db_connect.php';

        if (!isset($_SESSION['email'])) {
            header("Location: ../auth/login.php");
            exit();
        }

        if (!isset($_GET['property_id'])) {
            die("Invalid property ID.");
        }

        $property_id = $_GET['property_id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $message = $_POST['message'] ?? '';

            if (empty($message)) {
                $error = "Message cannot be empty.";
            } else {
                // Insert inquiry into the database
                $stmt = $pdo->prepare("INSERT INTO inquiries (user_email, property_id, message) VALUES (?, ?, ?)");
                $stmt->execute([$_SESSION['email'], $property_id, $message]);

                $success = "Inquiry sent successfully!";
            }
        }

        // Fetch property details
        $stmt = $pdo->prepare("SELECT * FROM properties WHERE id = ?");
        $stmt->execute([$property_id]);
        $property = $stmt->fetch();

        if (!$property) {
            die("Property not found.");
        }
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Inquiry</title>
</head>
<body>
    <h1>Send Inquiry for <?= htmlspecialchars($property['title']) ?></h1>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <?php if (isset($success)): ?>
        <p style="color: green;"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>

    <form method="POST">
        <textarea name="message" placeholder="Write your inquiry here..." required></textarea><br>
        <button type="submit">Send Inquiry</button>
    </form>
    <a href="property_details.php?id=<?= $property_id ?>">Back to Property Details</a>
</body>
</html> -->




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'User Dashboard' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

    <!-- Header -->
    <header class="bg-gray-800 text-white py-4">
        <div class="container mx-auto px-4 flex justify-between">
            <h1 class="text-xl font-bold">User Dashboard</h1>
            <div>
                Welcome, <?= htmlspecialchars($_SESSION['name']) ?>!
                <a href="../auth/logout.php" class="text-blue-300 hover:underline ml-4">Logout</a>
            </div>
        </div>
    </header>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white p-4">
            <h2 class="text-lg font-bold mb-4">Navigation</h2>
            <nav>
                <a href="index.php" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Dashboard</a>
                <a href="view_properties.php" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">View Properties</a>
                <a href="profile.php" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Profile</a>
                <a href="Send_Inquiry.php" class="block py-2 px-4 hover:bg-gray-700 rounded">Send Inquiries</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <?php
            session_start();
            include '../includes/db_connect.php';

            $title = 'Your Inquiries';

            // Fetch user inquiries
            $user_id = $_SESSION['user_id'];
            $stmt = $pdo->prepare("SELECT * FROM inquiries WHERE user_id = ?");
            $stmt->execute([$user_id]);
            $inquiries = $stmt->fetchAll();

            ob_start();
            ?>

            <h2 class="text-2xl font-bold mb-6">Your Inquiries</h2>
            <div class="bg-white rounded-lg shadow p-4">
                <?php if (count($inquiries) > 0): ?>
                    <table class="w-full border-collapse border border-gray-200">
                        <thead>
                            <tr>
                                <th class="border p-2">Property</th>
                                <th class="border p-2">Message</th>
                                <th class="border p-2">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($inquiries as $inquiry): ?>
                                <tr>
                                    <td class="border p-2"><?= htmlspecialchars($inquiry['property_id']) ?></td>
                                    <td class="border p-2"><?= htmlspecialchars($inquiry['message']) ?></td>
                                    <td class="border p-2"><?= htmlspecialchars($inquiry['created_at']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No inquiries found.</p>
                <?php endif; ?>
            </div>

            <?php
            $content = ob_get_clean();
            include 'user_layout.php';
            ?>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4">
        &copy; 2025 Real Estate Management System
    </footer>
</body>

</html>
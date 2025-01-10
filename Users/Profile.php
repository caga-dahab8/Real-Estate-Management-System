<?php
session_start();
include '../includes/db_connect.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

// Fetch user details
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if user exists
if (!$user) {
    die("Error: User not found in the database.");
}

// Handle profile updates
$errors = [];
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_name = trim($_POST['name']);
    $current_password = $_POST['current_password'] ?? '';
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Update name
    if (!empty($new_name) && $new_name !== $user['name']) {
        $stmt = $pdo->prepare("UPDATE users SET name = ? WHERE id = ?");
        $stmt->execute([$new_name, $user_id]);
        $success = "Name updated successfully.";
        $user['name'] = $new_name; // Update in session to reflect changes
    }

    // Update password
    if (!empty($current_password) || !empty($new_password) || !empty($confirm_password)) {
        if (password_verify($current_password, $user['password'])) {
            if ($new_password === $confirm_password) {
                $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
                $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
                $stmt->execute([$hashed_password, $user_id]);
                $success = "Password updated successfully.";
            } else {
                $errors[] = "New password and confirmation do not match.";
            }
        } else {
            $errors[] = "Current password is incorrect.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">
    <!-- Header -->
    <header class="bg-gray-800 text-white py-4">
        <div class="container mx-auto px-4 flex justify-between">
            <h1 class="text-xl font-bold">User Dashboard</h1>
            <div>
                Welcome, <?= htmlspecialchars($user['name']) ?>!
                <a href="../auth/logout.php" class="text-blue-300 hover:underline ml-4">Logout</a>
            </div>
        </div>
    </header>

    <main class="flex justify-center items-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-lg">
            <h2 class="text-2xl font-bold mb-6">Update Profile</h2>

            <?php if (!empty($errors)): ?>
                <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (!empty($success)): ?>
                <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                    <?= htmlspecialchars($success) ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="space-y-6">
                <div>
                    <label for="name" class="block text-gray-700 font-bold">Name:</label>
                    <input type="text" id="name" name="name" value="<?= htmlspecialchars($user['name']) ?>" class="w-full border border-gray-300 rounded p-2" required>
                </div>
                <div>
                    <label for="current_password" class="block text-gray-700 font-bold">Current Password:</label>
                    <input type="password" id="current_password" name="current_password" class="w-full border border-gray-300 rounded p-2">
                </div>
                <div>
                    <label for="new_password" class="block text-gray-700 font-bold">New Password:</label>
                    <input type="password" id="new_password" name="new_password" class="w-full border border-gray-300 rounded p-2">
                </div>
                <div>
                    <label for="confirm_password" class="block text-gray-700 font-bold">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" class="w-full border border-gray-300 rounded p-2">
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Update Profile</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
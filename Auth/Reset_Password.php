<?php
session_start();
include '../includes/db_connect.php';

if (!isset($_GET['email'])) {
    header("Location: forgot_password.php");
    exit();
}

$email = $_GET['email'];

// Check if the email exists in the database
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();

if (!$user) {
    header("Location: forgot_password.php?error=invalid_email");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newPassword = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($newPassword === $confirmPassword) {
        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the user's password
        $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE email = ?");
        $stmt->execute([$hashedPassword, $email]);

        $success = "Your password has been reset successfully. You can now <a href='login.php' class='text-blue-600 hover:underline'>log in</a>.";
        header("Location: login.php");
    } else {
        $error = "Passwords do not match.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <section class="bg-white">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="flex items-center justify-center px-4 py-10 bg-white sm:px-6 lg:px-8 sm:py-16 lg:py-24">
                <div class="xl:w-full xl:max-w-sm 2xl:max-w-md xl:mx-auto">
                    <h2 class="text-3xl font-bold leading-tight text-black sm:text-4xl">Reset Password</h2>

                    <?php if (isset($error)): ?>
                        <p class="text-red-500"><?= $error ?></p>
                    <?php endif; ?>

                    <?php if (isset($success)): ?>
                        <p class="text-green-500"><?= $success ?></p>
                    <?php endif; ?>

                    <form action="#" method="POST" class="mt-8">
                        <div class="space-y-5">
                            <div>
                                <label for="" class="text-base font-medium text-gray-900"> New Password </label>
                                <div class="mt-2.5">
                                    <input
                                        type="password"
                                        name="password"
                                        id="password"
                                        placeholder="Enter your new password"
                                        class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600" />
                                </div>
                            </div>

                            <div>
                                <label for="" class="text-base font-medium text-gray-900"> Confirm Password </label>
                                <div class="mt-2.5">
                                    <input
                                        type="password"
                                        name="confirm_password"
                                        id="confirm_password"
                                        placeholder="Confirm your new password"
                                        class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600" />
                                </div>
                            </div>

                            <div>
                                <button type="submit" class="inline-flex items-center justify-center w-full px-4 py-4 text-base font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-md focus:outline-none hover:bg-blue-700 focus:bg-blue-700">Reset Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="flex items-center justify-center px-4 py-10 sm:py-16 lg:py-24 bg-gray-50 sm:px-6 lg:px-8">
                <div>
                    <img class="w-full mx-auto" src="../Assets/Images//1.jpg" alt="" />

                    <div class="w-full max-w-md mx-auto xl:max-w-xl">
                        <h3 class="text-2xl font-bold text-center text-black">Set a New Password</h3>
                        <p class="leading-relaxed text-center text-gray-500 mt-2.5">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
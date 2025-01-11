<?php
session_start();
include '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    // Check user credentials
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Start session
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $user['role'];

        // Set cookies if "Remember Me" is checked
        if ($remember) {
            setcookie('email', $email, time() + (86400 * 30), "/"); // 30 days
            setcookie('password', $password, time() + (86400 * 30), "/");
        } else {
            // Clear cookies if "Remember Me" is unchecked
            setcookie('email', '', time() - 3600, "/"); // Expire immediately
            setcookie('password', '', time() - 3600, "/"); // Expire immediately
        }

        // Redirect based on role
        if ($user['role'] === 'admin') {
            header("Location: ../admin/dashboard.php");
        } else {
            header("Location: ../users/index.php");
        }
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>


    <section class="bg-white">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="flex items-center justify-center px-4 py-10 bg-white sm:px-6 lg:px-8 sm:py-16 lg:py-24">
                <div class="xl:w-full xl:max-w-sm 2xl:max-w-md xl:mx-auto">
                    <h2 class="text-3xl font-bold leading-tight text-black sm:text-4xl">Sign in to Celebration</h2>
                    <?php if (isset($error)): ?>
                        <p style="color: red;"><?= $error ?></p>
                    <?php endif; ?>
                    <p class="mt-2 text-base text-gray-600">Don’t have an account? <a href="Register.php" title="" class="font-medium text-blue-600 transition-all duration-200 hover:text-blue-700 hover:underline focus:text-blue-700">Create a free account</a></p>

                    <form action="#" method="POST" class="mt-8">
                        <div class="space-y-5">
                            <div>
                                <label for="" class="text-base font-medium text-gray-900"> Email address </label>
                                <div class="mt-2.5">
                                    <input
                                        type="email"
                                        name="email"
                                        id="email"
                                        placeholder="Enter email to get started"
                                        value="<?= isset($_COOKIE['email']) ? htmlspecialchars($_COOKIE['email']) : '' ?>"
                                        class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600" />
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center justify-between">
                                    <label for="" class="text-base font-medium text-gray-900"> Password </label>

                                    <a href="forgot_password.php" title="" class="text-sm font-medium text-blue-600 hover:underline hover:text-blue-700 focus:text-blue-700"> Forgot password? </a>
                                </div>
                                <div class="mt-2.5">
                                    <input
                                        type="password"
                                        name="password"
                                        id="password"
                                        placeholder="Enter your password"
                                        value="<?= isset($_COOKIE['password']) ? htmlspecialchars($_COOKIE['password']) : '' ?>"
                                        class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600" />
                                </div>
                            </div>

                            <!-- Remember Me Checkbox -->
                            <div class="flex items-center">
                                <input
                                    type="checkbox"
                                    name="remember"
                                    id="remember"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                    <?= isset($_COOKIE['email']) ? 'checked' : '' ?> />
                                <label for="remember" class="ml-2 text-sm text-gray-900">Remember Me</label>
                            </div>

                            <div>
                                <button type="submit" class="inline-flex items-center justify-center w-full px-4 py-4 text-base font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-md focus:outline-none hover:bg-blue-700 focus:bg-blue-700">Log in</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <div class="flex items-center justify-center px-4 py-10 sm:py-16 lg:py-24 bg-gray-50 sm:px-6 lg:px-8">
                <div>
                    <img class="w-full mx-auto" src="../Assets/Images//1.jpg" alt="" />

                    <div class="w-full max-w-md mx-auto xl:max-w-xl">
                        <h3 class="text-2xl font-bold text-center text-black">Sign In With Open Hands</h3>
                        <p class="leading-relaxed text-center text-gray-500 mt-2.5">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis.</p>

                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
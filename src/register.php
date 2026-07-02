<?php

declare(strict_types=1);

require_once "inc/db.php";
require_once "inc/helpers.php";

session_start();

$error = null;
$first_name = "";
$last_name = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    goto render_page;
}

$first_name = trim($_POST["first_name"] ?? "");
$last_name = trim($_POST["last_name"] ?? "");
$email = trim($_POST["email"] ?? "");
$password = $_POST["password"] ?? "";
$confirm_password = $_POST["confirm_password"] ?? "";
$csrf_token = $_POST["csrf_token"] ?? "";

if (
    empty($first_name) ||
    empty($last_name) ||
    empty($email) ||
    empty($password) ||
    empty($confirm_password) ||
    empty($csrf_token)
) {
    $error = "All fields are required";
    goto render_page;
}

if (!verify_csrf_token($csrf_token)) {
    $error = "Invalid form submission";
    goto render_page;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Please enter a valid email";
    goto render_page;
}

if (mb_strlen($password) < 8) {
    $error = "Password must be at least 8 characters";
    goto render_page;
}

if ($password !== $confirm_password) {
    $error = "Passwords do not match";
    goto render_page;
}

try {
    $existing_user = get_user($email);
} catch (RuntimeException $e) {
    $error = "Internal server error";
    error_log($e->getMessage());
    goto render_page;
}

if ($existing_user !== null) {
    $error = "Email is already registered";
    goto render_page;
}

$password_hash = password_hash($password, PASSWORD_DEFAULT);
if (!is_string($password_hash)) {
    $error = "Internal server error";
    error_log("Password hashing failed");
    goto render_page;
}

try {
    $created = create_user($first_name, $last_name, $email, $password_hash);
} catch (RuntimeException $e) {
    $error = "Internal server error";
    error_log($e->getMessage());
    goto render_page;
}

if ($created === false) {
    $error = "Could not create account";
    goto render_page;
}

try {
    $user = get_user($email);
} catch (RuntimeException $e) {
    $error = "Internal server error";
    error_log($e->getMessage());
    goto render_page;
}

if ($user === null) {
    $error = "Could not create account";
    goto render_page;
}

session_regenerate_id();
$_SESSION["user_id"] = $user["id"];
$_SESSION["email"] = $user["email"];
$_SESSION["first_name"] = $user["first_name"];
$_SESSION["last_name"] = $user["last_name"];
$_SESSION["is_admin"] = $user["is_admin"];

header("Location: index.php");
exit();

render_page:
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Etagere: Register</title>
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/auth.css">
    </head>
    <body class="auth-page">
        <main class="auth-shell">
            <section class="auth-card">
                <h1 id="register-heading">Create account</h1>
                <p class="auth-subtitle">Sign up to start using Etagere.</p>

                <?php if (isset($error) && $error !== null): ?>
                <p class="auth-error">
                    <?= htmlspecialchars($error) ?>
                </p>
                <?php endif; ?>

                <form method="post" class="auth-form">
                    <input type="hidden" name="csrf_token" value="<?= generate_csrf_token() ?>">

                    <label class="auth-label" for="first-name">First name</label>
                    <input
                        id="first-name"
                        placeholder="Enter your first name"
                        type="text"
                        name="first_name"
                        value="<?= htmlspecialchars($first_name) ?>"
                        required
                    >

                    <label class="auth-label" for="last-name">Last name</label>
                    <input
                        id="last-name"
                        placeholder="Enter your last name"
                        type="text"
                        name="last_name"
                        value="<?= htmlspecialchars($last_name) ?>"
                        required
                    >

                    <label class="auth-label" for="email">Email</label>
                    <input
                        id="email"
                        placeholder="Enter your email"
                        type="email"
                        name="email"
                        value="<?= htmlspecialchars($email) ?>"
                        required
                    >

                    <label class="auth-label" for="password">Password</label>
                    <input id="password" placeholder="Enter your password" type="password" name="password" required>

                    <label class="auth-label" for="confirm-password">Confirm password</label>
                    <input
                        id="confirm-password"
                        placeholder="Confirm your password"
                        type="password"
                        name="confirm_password"
                        required
                    >

                    <button type="submit">Create account</button>
                </form>

                <p class="auth-footer">
                    Already have an account? <a href="login.php">Log in</a>
                </p>
            </section>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/jquery@4.0.0/dist/jquery.min.js"></script>
        <script src="js/register.js"></script>
    </body>
</html>

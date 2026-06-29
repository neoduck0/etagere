<?php

declare(strict_types=1);

require_once "inc/db.php";
require_once "inc/helpers.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    goto render_page;
}

$error = null;

$email = $_POST["email"];
$password = $_POST["password"];
$csrf_token = $_POST["csrf_token"];

if (empty($email) || empty($password) || empty($csrf_token)) {
    $error = "Email and password are required";
    goto render_page;
}

if (!verify_csrf_token($csrf_token)) {
    $error = "Invalid form submission";
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
    $error = "Invalid email or password";
    goto render_page;
}

if (password_verify($password, $user["password_hash"]) === false) {
    $error = "Invalid email or password";
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
        <title>Etagere: Login</title>
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <?php if (isset($error) && $error !== null): ?>
        <p><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form method="post">
            <input type="hidden" name="csrf_token" value="<?= generate_csrf_token() ?>">
            <input placeholder="Email" type="email" name="email">
            <input placeholder="Password" type="password" name="password">
            <button type="submit">Login</button>
        </form>
        <a href="register.php">Register</a>
    </body>
</html>

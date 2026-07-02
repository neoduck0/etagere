<?php

declare(strict_types=1);

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "etagere";
$conn = "";

try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    if ($conn === false) {
        $conn = null;
    }
} catch (mysqli_sql_exception) {
    $conn = null;
}

/*
 * Retrieves a user record from the database by email.
 *
 * Throws:
 * - RuntimeException: If the database connection is unavailable or a statement step fails.
 *
 * Return types:
 * - array: The user row when a matching email is found.
 * - null: When no matching user is found.
 */
function get_user(string $email): ?array
{
    global $conn;
    if (!($conn instanceof mysqli)) {
        throw new RuntimeException("Database connection is not established");
    }

    $query = "SELECT * FROM users WHERE email = ? LIMIT 1";

    $stmt = mysqli_prepare($conn, $query);
    if ($stmt === false) {
        throw new RuntimeException("Failed to prepare statement");
    }

    try {
        if (mysqli_stmt_bind_param($stmt, "s", $email) === false) {
            throw new RuntimeException("Failed to bind parameters");
        }

        if (mysqli_stmt_execute($stmt) === false) {
            throw new RuntimeException("Failed to execute statement");
        }

        $result = mysqli_stmt_get_result($stmt);
        if ($result === false) {
            throw new RuntimeException("Failed to get result");
        }

        $row = mysqli_fetch_assoc($result);
        if ($row === false) {
            return null;
        }
        return $row;
    } finally {
        mysqli_stmt_close($stmt);
    }
}

/*
 * Creates a user record in the database.
 *
 * Throws:
 * - RuntimeException: If the database connection is unavailable or a statement step fails.
 *
 * Return types:
 * - bool: True when the user row is inserted.
 * - bool: False when no row is inserted.
 */
function create_user(
    string $first_name,
    string $last_name,
    string $email,
    string $password_hash,
    bool $is_admin = false,
): bool {
    global $conn;
    if (!($conn instanceof mysqli)) {
        throw new RuntimeException("Database connection is not established");
    }

    $query = "INSERT INTO users (first_name, last_name, email, password_hash, is_admin)
        VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);
    if ($stmt === false) {
        throw new RuntimeException("Failed to prepare statement");
    }

    try {
        if (
            mysqli_stmt_bind_param(
                $stmt,
                "ssssi",
                $first_name,
                $last_name,
                $email,
                $password_hash,
                $is_admin,
            ) === false
        ) {
            throw new RuntimeException("Failed to bind parameters");
        }

        if (mysqli_stmt_execute($stmt) === false) {
            throw new RuntimeException("Failed to execute statement");
        }

        return mysqli_stmt_affected_rows($stmt) > 0;
    } finally {
        mysqli_stmt_close($stmt);
    }
}

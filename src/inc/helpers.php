<?php

declare(strict_types=1);

/*
 * Checks if the user is logged in.
 *
 * Returns true if the user is logged in, false otherwise.
 */
function is_logged_in(): bool
{
    return isset($_SESSION["user_id"]);
}

/*
 * Generates a CSRF token and stores it in the session.
 *
 * Returns the generated token as a string.
 */
function generate_csrf_token(): string
{
    if (empty($_SESSION["csrf_token"])) {
        $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
    }
    return $_SESSION["csrf_token"];
}

/*
 * Verifies a CSRF token.
 *
 * Returns true if the token is valid, false otherwise.
 */
function verify_csrf_token(string $token): bool
{
    if (!isset($_SESSION["csrf_token"])) {
        return false;
    }

    if (hash_equals($token, $_SESSION["csrf_token"])) {
        return true;
    } else {
        return false;
    }
}

<?php

declare(strict_types=1);

/*
 * Checks whether the current session has an authenticated user.
 *
 * Return types:
 * - bool: True when `$_SESSION["user_id"]` is set; otherwise false.
 */
function is_logged_in(): bool
{
    return isset($_SESSION["user_id"]);
}

/*
 * Generates a CSRF token, stores it in the session, and returns it.
 *
 * Return types:
 * - string: The existing or newly generated CSRF token.
 * - null: When secure random bytes cannot be generated.
 */
function generate_csrf_token(): ?string
{
    if (empty($_SESSION["csrf_token"])) {
        try {
            $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
        } catch (Random\RandomException) {
            $_SESSION["csrf_token"] = null;
        }
    }
    return $_SESSION["csrf_token"];
}

/*
 * Verifies whether the provided CSRF token matches the session token.
 *
 * Return types:
 * - bool: True when the token is valid; otherwise false.
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

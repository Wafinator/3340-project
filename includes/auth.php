<?php
/**
 * File: includes/auth.php
 * Purpose: Lightweight session-based authentication/authorization helpers.
 * Functions:
 *  - is_logged_in(): bool
 *  - current_user_id(): ?int
 *  - current_username(): ?string
 *  - is_admin(): bool
 *  - require_login(): void (redirects to /user/login.php)
 *  - require_admin(): void (redirects to /user/login.php)
 */
// Authentication and authorization helpers

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function is_logged_in(): bool {
    return isset($_SESSION['user_id']);
}

function current_user_id(): ?int {
    return isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : null;
}

function current_username(): ?string {
    return isset($_SESSION['username']) ? (string)$_SESSION['username'] : null;
}

function is_admin(): bool {
    return !empty($_SESSION['is_admin']);
}

function require_login(): void {
    if (!is_logged_in()) {
        header('Location: /user/login.php');
        exit;
    }
}

function require_admin(): void {
    if (!is_logged_in() || !is_admin()) {
        header('Location: /user/login.php');
        exit;
    }
}
?>


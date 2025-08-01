<?php
session_start();
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $accept_terms = isset($_POST['accept_terms']);

    $errors = [];

    // Validation
    if (empty($username)) {
        $errors[] = "Username is required.";
    } elseif (strlen($username) < 3) {
        $errors[] = "Username must be at least 3 characters long.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        $errors[] = "Username can only contain letters, numbers, and underscores.";
    }

    if (empty($email)) {
        $errors[] = "Email address is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    if (!$accept_terms) {
        $errors[] = "You must agree to the Terms of Service and Privacy Policy.";
    }

    // Check for existing username and email
    if (empty($errors)) {
        try {
            // Check if username already exists
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
            $stmt->execute([$username]);

            if ($stmt->fetchColumn() > 0) {
                $errors[] = "Username already taken. Please choose another.";
            }

            // Check if email already exists
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
            $stmt->execute([$email]);

            if ($stmt->fetchColumn() > 0) {
                $errors[] = "Email already registered. Please use a different one.";
            }

        } catch (PDOException $e) {
            $errors[] = "Database error. Please try again later.";
        }
    }

    // If no errors, create the user
    if (empty($errors)) {
        try {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("
                INSERT INTO users (username, email, password_hash) 
                VALUES (?, ?, ?)
            ");
            $stmt->execute([$username, $email, $hash]);

            // Auto-login the new user
            $user_id = $pdo->lastInsertId();
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['is_admin'] = 0;

            // Success message
            $_SESSION['success_message'] = "Welcome to WafiTechParts! Your account has been created successfully.";

            header("Location: ../index.php");
            exit;
        } catch (PDOException $e) {
            $errors[] = "Registration failed. Please try again later.";
        }
    }

    // If there are errors, store them in session and redirect back
    if (!empty($errors)) {
        $_SESSION['registration_errors'] = $errors;
        $_SESSION['registration_data'] = [
            'username' => $username,
            'email' => $email
        ];
        header("Location: register_form.php");
        exit;
    }

} else {
    // Invalid request method
    header("Location: register_form.php");
    exit;
}
?>

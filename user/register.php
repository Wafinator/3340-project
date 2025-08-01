<?php
session_start();

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

    // Demo registration - skip database checks for myweb hosting
    if (empty($errors)) {
        // Auto-login the new user for demo
        $_SESSION['user_id'] = rand(1, 1000);
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

<?php
session_start();
require_once 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input
    $first_name = trim($_POST['first_name'] ?? '');
    $last_name = trim($_POST['last_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $newsletter = isset($_POST['newsletter']) ? 1 : 0;
    
    // Validation
    $errors = [];
    
    if (empty($first_name)) {
        $errors[] = "First name is required";
    }
    
    if (empty($last_name)) {
        $errors[] = "Last name is required";
    }
    
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address";
    }
    
    if (empty($subject)) {
        $errors[] = "Subject is required";
    }
    
    if (empty($message)) {
        $errors[] = "Message is required";
    }
    
    // If no errors, process the contact form
    if (empty($errors)) {
        try {
            // Insert into database
            $stmt = $pdo->prepare("
                INSERT INTO contact_messages (first_name, last_name, email, phone, subject, message, newsletter, created_at) 
                VALUES (?, ?, ?, ?, ?, ?, ?, NOW())
            ");
            
            $stmt->execute([
                $first_name,
                $last_name,
                $email,
                $phone,
                $subject,
                $message,
                $newsletter
            ]);
            
            $_SESSION['contact_success'] = "Thank you for your message! We'll get back to you within 24 hours.";
            
            // Redirect back to contact page
            header("Location: contact.php");
            exit;
            
        } catch (PDOException $e) {
            $errors[] = "Database error: " . $e->getMessage();
        }
    }
    
    // If there were errors, store them in session and redirect
    if (!empty($errors)) {
        $_SESSION['contact_errors'] = $errors;
        $_SESSION['contact_data'] = $_POST; // Preserve form data
        header("Location: contact.php");
        exit;
    }
} else {
    // Invalid request method
    header("Location: contact.php");
    exit;
}
?> 
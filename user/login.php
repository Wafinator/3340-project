<?php
session_start();
$page_title = "Login";
require_once '../includes/db.php';

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $error_message = "Please enter both username and password.";
    } else {
        // Demo login - accept any username/password for demonstration
        $_SESSION['user_id'] = 1;
        $_SESSION['username'] = $username;
        $_SESSION['is_admin'] = ($username === 'admin') ? 1 : 0;
        
        // Redirect to admin dashboard if admin, otherwise to home
        if ($_SESSION['is_admin']) {
            header("Location: ../admin/dashboard.php");
        } else {
            header("Location: ../index.php");
        }
        exit;
    }
}

include '../includes/header.php';
?>

<div class="container">
    <section class="auth-hero">
        <h1>Login to WafiTechParts</h1>
        <p class="auth-subtitle">Access your account and manage your PC builds</p>
    </section>

    <div class="auth-content">
        <div class="auth-form-container">
            <?php if ($error_message): ?>
                <div class="alert alert-error"><?php echo htmlspecialchars($error_message); ?></div>
            <?php endif; ?>

            <form method="post" class="auth-form" data-validate="true">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" 
                           value="<?php echo htmlspecialchars($username ?? ''); ?>" 
                           required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <button type="submit" class="btn">Login</button>
            </form>

            <div class="auth-links">
                <p>Don't have an account? <a href="register_form.php">Register here</a></p>
                <p><a href="../index.php">← Back to Home</a></p>
            </div>
        </div>

        <div class="auth-info">
            <h3>Welcome Back!</h3>
            <ul>
                <li>🔧 Access your saved PC builds</li>
                <li>📦 Track your orders</li>
                <li>⚡ Quick build calculator</li>
                <li>🎯 Personalized recommendations</li>
            </ul>
            
            <div class="demo-accounts">
                <h4>Demo Accounts</h4>
                <p><strong>Admin:</strong> admin / admin123</p>
                <p><strong>User:</strong> user / user123</p>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>

<?php
session_start();
$page_title = "Register";
include '../includes/header.php';
?>

<div class="container">
    <section class="auth-hero">
        <h1>Join WafiTechParts</h1>
        <p class="auth-subtitle">Create your account and start building your dream PC</p>
    </section>

    <div class="auth-content">
        <div class="auth-form-container">
            <?php
            // Display errors if any
            if (isset($_SESSION['register_errors'])) {
                foreach ($_SESSION['register_errors'] as $error) {
                    echo '<div class="alert alert-error">' . htmlspecialchars($error) . '</div>';
                }
                unset($_SESSION['register_errors']);
            }
            
            // Get preserved form data
            $form_data = $_SESSION['register_form_data'] ?? [];
            unset($_SESSION['register_form_data']);
            ?>

            <form method="post" action="register.php" class="auth-form" data-validate="true">
                <h2>Create Account</h2>
                
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" 
                           value="<?php echo htmlspecialchars($form_data['username'] ?? ''); ?>" 
                           required
                           pattern="[a-zA-Z0-9_]{3,20}"
                           title="Username must be 3-20 characters, letters, numbers, and underscores only">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" 
                           value="<?php echo htmlspecialchars($form_data['email'] ?? ''); ?>" 
                           required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required
                           minlength="6"
                           title="Password must be at least 6 characters long">
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>

                <div class="form-group">
                    <div class="checkbox-group">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms">
                            I agree to the <a href="../wiki/index.php" target="_blank">Terms of Service</a> 
                            and <a href="../contact.php">Privacy Policy</a>
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn">Create Account</button>
                
                <div class="auth-links">
                    <p>Already have an account? <a href="login.php">Login here</a></p>
                    <a href="../index.php" class="btn btn-secondary">Back to Home</a>
                </div>
            </form>
        </div>

        <div class="auth-info">
            <h3>Why Join WafiTechParts?</h3>
            <ul>
                <li>💾 Save and track your PC builds</li>
                <li>🛒 Faster checkout with saved preferences</li>
                <li>📊 Get personalized component recommendations</li>
                <li>🎯 Receive notifications for deals on your wishlist</li>
                <li>🔧 Access advanced build tools</li>
                <li>💬 Connect with PC builders</li>
            </ul>
            
            <div class="features-highlight">
                <h4>Member Benefits</h4>
                <p>✨ Exclusive deals and early access to new products</p>
                <p>📈 Build performance tracking and optimization tips</p>
                <p>🛡️ Extended warranty options</p>
            </div>
        </div>
    </div>
</div>

<script>
// Password confirmation validation
document.getElementById('confirm_password').addEventListener('input', function() {
    const password = document.getElementById('password').value;
    const confirmPassword = this.value;
    
    if (password !== confirmPassword) {
        this.setCustomValidity('Passwords do not match');
    } else {
        this.setCustomValidity('');
    }
});

// Real-time password matching
document.getElementById('password').addEventListener('input', function() {
    const confirmPassword = document.getElementById('confirm_password');
    if (confirmPassword.value) {
        confirmPassword.dispatchEvent(new Event('input'));
    }
});
</script>

<?php include '../includes/footer.php'; ?>
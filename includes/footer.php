    </main>
    <?php
    // Compute path prefix to make links work from nested directories
    $prefix = '';
    if (!file_exists('assets/js/main.js')) {
        if (file_exists('../assets/js/main.js')) {
            $prefix = '../';
        } elseif (file_exists('../../assets/js/main.js')) {
            $prefix = '../../';
        }
    }
    ?>
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>WafiTechParts</h3>
                <p>Your trusted source for premium PC components and custom builds. Quality parts for every budget and need.</p>
            </div>
            
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="<?php echo $prefix; ?>index.php">Home</a></li>
                    <li><a href="<?php echo $prefix; ?>products/index.php">Browse Parts</a></li>
                    <li><a href="<?php echo $prefix; ?>products/build-calculator.php">Build Calculator</a></li>
                    <li><a href="<?php echo $prefix; ?>about.php">About Us</a></li>
                    <li><a href="<?php echo $prefix; ?>contact.php">Contact</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4>Help & Support</h4>
                <ul>
                    <li><a href="<?php echo $prefix; ?>wiki/index.php">Help Wiki</a></li>
                    <li><a href="<?php echo $prefix; ?>wiki/faq.php">FAQ</a></li>
                    <li><a href="<?php echo $prefix; ?>wiki/how-to-build.php">How to Build</a></li>
                    <li><a href="<?php echo $prefix; ?>wiki/how-to-buy.php">How to Buy</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4>Contact Info</h4>
                <p>Email: info@wafitechparts.com</p>
                <p>Phone: (555) 123-4567</p>
                <p>Hours: Mon-Fri 9AM-6PM</p>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> WafiTechParts. All rights reserved. | 
               <a href="<?php echo $prefix; ?>privacy.php">Privacy Policy</a> | 
               <a href="<?php echo $prefix; ?>terms.php">Terms of Service</a>
            </p>
        </div>
    </footer>
    
    <!-- Theme Switcher JavaScript -->
    <script>
        function changeTheme(theme) {
            // Send AJAX request to update theme
            fetch('<?php echo $prefix; ?>user/update-theme.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'theme=' + theme
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Reload page to apply new theme
                    window.location.reload();
                }
            })
            .catch(error => {
                console.error('Error changing theme:', error);
            });
        }
        
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileToggle = document.querySelector('.mobile-menu-toggle');
            const navLinks = document.querySelector('.nav-links');
            
            if (mobileToggle && navLinks) {
                mobileToggle.addEventListener('click', function() {
                    navLinks.classList.toggle('active');
                    mobileToggle.classList.toggle('active');
                });
            }
        });
    </script>
</body>
</html>
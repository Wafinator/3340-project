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
    
    <!-- App scripts are loaded via assets/js/main.js -->
</body>
</html>
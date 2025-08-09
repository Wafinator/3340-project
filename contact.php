<?php 
$page_title = "Contact Us";
include 'includes/header.php'; 
?>

<div class="container">
    <section class="contact-hero">
        <h1>Contact WafiTechParts</h1>
        <p class="contact-subtitle">We're here to help you build your dream PC!</p>
    </section>

    <div class="contact-content">
        <div class="contact-info">
            <h2>Get in Touch</h2>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-icon">📧</div>
                    <h3>Email</h3>
                    <p>info@wafitechparts.com</p>
                    <p>support@wafitechparts.com</p>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">📞</div>
                    <h3>Phone</h3>
                    <p>Main: (555) 123-4567</p>
                    <p>Support: (555) 123-4568</p>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">🏢</div>
                    <h3>Address</h3>
                    <p>123 Tech Street</p>
                    <p>Windsor, ON N9A 1A1</p>
                    <p>Canada</p>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">🕒</div>
                    <h3>Hours</h3>
                    <p>Monday - Friday: 9AM - 6PM</p>
                    <p>Saturday: 10AM - 4PM</p>
                    <p>Sunday: Closed</p>
                </div>
            </div>
        </div>

        <div class="contact-form-section">
            <h2>Send us a Message</h2>
            <form class="contact-form" data-validate="true" method="post" action="contact-process.php">
                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name">First Name *</label>
                        <input type="text" id="first_name" name="first_name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="last_name">Last Name *</label>
                        <input type="text" id="last_name" name="last_name" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="subject">Subject *</label>
                    <select id="subject" name="subject" required>
                        <option value="">Select a subject</option>
                        <option value="general">General Inquiry</option>
                        <option value="technical">Technical Support</option>
                        <option value="order">Order Status</option>
                        <option value="returns">Returns & Refunds</option>
                        <option value="build-help">PC Build Help</option>
                        <option value="product-info">Product Information</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="message">Message *</label>
                    <textarea id="message" name="message" rows="6" required 
                              placeholder="Tell us about your inquiry or PC building needs..."></textarea>
                </div>
                
                <div class="form-group">
                    <label class="checkbox-label">
                        <input type="checkbox" name="newsletter" value="1">
                        Subscribe to our newsletter for PC building tips and special offers
                    </label>
                </div>
                
                <button type="submit" class="btn">Send Message</button>
            </form>
        </div>
    </div>

    <section class="map-section">
        <h2>Find Us</h2>
        <div class="map-container">
            <!-- Interactive Google Maps Embed -->
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2958.5!2d-83.0!3d42.3!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDLCsDE4JzAwLjAiTiA4M8KwMDAnMDAuMCJX!5e0!3m2!1sen!2sca!4v1234567890"
                width="100%" 
                height="400" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </section>

    <section class="faq-section">
        <h2>Frequently Asked Questions</h2>
        <div class="faq-grid">
            <div class="faq-item">
                <h3>How long does shipping take?</h3>
                <p>Most orders ship within 24 hours. Standard shipping takes 3-5 business days, while express shipping takes 1-2 business days.</p>
            </div>
            
            <div class="faq-item">
                <h3>Do you offer warranty on products?</h3>
                <p>Yes! All our products come with manufacturer warranty. We also offer our 30-day satisfaction guarantee.</p>
            </div>
            
            <div class="faq-item">
                <h3>Can you help me build a PC?</h3>
                <p>Absolutely! Our team of experts can help you choose the perfect components and guide you through the building process.</p>
            </div>
            
            <div class="faq-item">
                <h3>What payment methods do you accept?</h3>
                <p>We accept all major credit cards, PayPal, and bank transfers. We also offer financing options for larger purchases.</p>
            </div>
        </div>
    </section>

    <section class="social-section">
        <h2>Connect With Us</h2>
        <div class="social-links">
            <a href="#" class="social-link">
                <span class="social-icon">📘</span>
                <span>Facebook</span>
            </a>
            <a href="#" class="social-link">
                <span class="social-icon">🐦</span>
                <span>Twitter</span>
            </a>
            <a href="#" class="social-link">
                <span class="social-icon">📷</span>
                <span>Instagram</span>
            </a>
            <a href="#" class="social-link">
                <span class="social-icon">💼</span>
                <span>LinkedIn</span>
            </a>
            <a href="#" class="social-link">
                <span class="social-icon">📺</span>
                <span>YouTube</span>
            </a>
        </div>
    </section>
</div>



<?php include 'includes/footer.php'; ?>

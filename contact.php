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

<style>
.contact-hero {
    text-align: center;
    padding: 80px 0;
    background: linear-gradient(135deg, rgba(100, 181, 246, 0.1), rgba(25, 118, 210, 0.1));
    border-radius: 15px;
    margin-bottom: 40px;
    position: relative;
    overflow: hidden;
}

.contact-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 50% 50%, rgba(100, 181, 246, 0.1), transparent 70%);
    pointer-events: none;
}

.contact-hero h1 {
    position: relative;
    z-index: 1;
    text-shadow: 0 0 20px rgba(100, 181, 246, 0.5);
}

.contact-subtitle {
    font-size: 1.3em;
    margin: 20px 0;
    color: #ccc;
    position: relative;
    z-index: 1;
}

.contact-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    margin: 60px 0;
}

.contact-info h2,
.contact-form-section h2 {
    margin-bottom: 30px;
    color: #64b5f6;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 30px;
}

.info-item {
    text-align: center;
    padding: 30px 20px;
    background: rgba(255, 255, 255, 0.08);
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.info-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, #64b5f6, #1976d2, #64b5f6);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.info-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 50px rgba(100, 181, 246, 0.2);
    background: rgba(255, 255, 255, 0.12);
}

.info-item:hover::before {
    opacity: 1;
}

.info-icon {
    font-size: 2.5em;
    margin-bottom: 15px;
}

.info-item h3 {
    color: #64b5f6;
    margin-bottom: 15px;
}

.info-item p {
    margin-bottom: 5px;
    color: #ccc;
}

.contact-form {
    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(10px);
    padding: 40px;
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.15);
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    position: relative;
    overflow: hidden;
}

.contact-form::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, #64b5f6, #1976d2, #64b5f6);
    opacity: 0.8;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.checkbox-label {
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
}

.checkbox-label input[type="checkbox"] {
    width: auto;
    margin: 0;
}

.map-section {
    margin: 60px 0;
}

.map-container {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.faq-section {
    margin: 60px 0;
}

.faq-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.faq-item {
    padding: 30px;
    background: rgba(255, 255, 255, 0.08);
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.faq-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 50px rgba(100, 181, 246, 0.15);
    background: rgba(255, 255, 255, 0.12);
}

.faq-item h3 {
    color: #64b5f6;
    margin-bottom: 15px;
}

.social-section {
    margin: 60px 0;
    text-align: center;
}

.social-links {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
    margin-top: 40px;
}

.social-link {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    padding: 20px;
    background: rgba(255, 255, 255, 0.08);
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    text-decoration: none;
    color: #fff;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    min-width: 120px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

.social-link:hover {
    background: rgba(100, 181, 246, 0.15);
    border-color: rgba(100, 181, 246, 0.5);
    transform: translateY(-8px);
    box-shadow: 0 15px 40px rgba(100, 181, 246, 0.3);
}

.social-icon {
    font-size: 2em;
}

@media (max-width: 768px) {
    .contact-content {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .form-row {
        grid-template-columns: 1fr;
    }
    
    .info-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .social-links {
        gap: 20px;
    }
    
    .social-link {
        min-width: 100px;
    }
}
</style>

<?php include 'includes/footer.php'; ?>
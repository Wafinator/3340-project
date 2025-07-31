<?php 
$page_title = "FAQ";
include '../includes/header.php'; 
?>

<div class="container">
    <section class="faq-hero">
        <h1>Frequently Asked Questions</h1>
        <p class="faq-subtitle">Find answers to common questions about PC building, ordering, and our services</p>
    </section>

    <div class="faq-content">
        <div class="faq-categories">
            <button class="category-btn active" onclick="showCategory('general')">General</button>
            <button class="category-btn" onclick="showCategory('building')">PC Building</button>
            <button class="category-btn" onclick="showCategory('ordering')">Ordering</button>
            <button class="category-btn" onclick="showCategory('technical')">Technical</button>
            <button class="category-btn" onclick="showCategory('support')">Support</button>
        </div>

        <div class="faq-sections">
            <!-- General Questions -->
            <div id="general" class="faq-section active">
                <h2>General Questions</h2>
                
                <div class="faq-item">
                    <h3>What is WafiTechParts?</h3>
                    <div class="faq-answer">
                        <p>WafiTechParts is your trusted source for custom PC components and builds. We specialize in helping customers build their dream computers, whether for gaming, work, or everyday use. Our team of experts provides personalized guidance and we stock only the highest quality components from trusted manufacturers.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>Do you offer pre-built PCs?</h3>
                    <div class="faq-answer">
                        <p>While we primarily focus on custom builds and individual components, we do offer some pre-configured systems for customers who prefer a ready-to-use solution. However, we always recommend custom builds as they offer better value and allow you to choose exactly what you need.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>What brands do you carry?</h3>
                    <div class="faq-answer">
                        <p>We carry all major brands including Intel, AMD, NVIDIA, ASUS, MSI, Gigabyte, Corsair, Samsung, Western Digital, Seagate, and many more. We carefully select our inventory to ensure we only offer reliable, high-quality components.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>Do you ship internationally?</h3>
                    <div class="faq-answer">
                        <p>Currently, we ship within Canada and the continental United States. We're working on expanding our shipping options to other countries. Contact us for specific shipping inquiries.</p>
                    </div>
                </div>
            </div>

            <!-- PC Building Questions -->
            <div id="building" class="faq-section">
                <h2>PC Building Questions</h2>
                
                <div class="faq-item">
                    <h3>How difficult is it to build a PC?</h3>
                    <div class="faq-answer">
                        <p>Building a PC is easier than most people think! With the right guidance and tools, anyone can build their own computer. We provide comprehensive guides, video tutorials, and our build calculator to make the process simple. Most first-time builders complete their build in 2-4 hours.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>What tools do I need to build a PC?</h3>
                    <div class="faq-answer">
                        <p>At minimum, you'll need a Phillips head screwdriver. We recommend our <a href="tool-kit.php">PC Building Tool Kit</a> which includes all the essential tools. You'll also need a clean workspace and good lighting. Anti-static wrist straps are recommended but not required.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>How do I know if components are compatible?</h3>
                    <div class="faq-answer">
                        <p>Our <a href="../products/build-calculator.php">Build Calculator</a> automatically checks compatibility between components. Key things to watch for: CPU socket type matching motherboard, RAM type (DDR4/DDR5), power supply wattage, and case size compatibility.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>What's the difference between Intel and AMD processors?</h3>
                    <div class="faq-answer">
                        <p>Both Intel and AMD make excellent processors. Intel typically offers better single-core performance (great for gaming), while AMD often provides better multi-core performance (great for productivity tasks). The choice depends on your specific needs and budget.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>How much RAM do I need?</h3>
                    <div class="faq-answer">
                        <p>For most users, 16GB is the sweet spot. 8GB is sufficient for basic tasks, 16GB is great for gaming and multitasking, 32GB is ideal for content creation and heavy multitasking, and 64GB+ is for professional workstations.</p>
                    </div>
                </div>
            </div>

            <!-- Ordering Questions -->
            <div id="ordering" class="faq-section">
                <h2>Ordering Questions</h2>
                
                <div class="faq-item">
                    <h3>What payment methods do you accept?</h3>
                    <div class="faq-answer">
                        <p>We accept all major credit cards (Visa, MasterCard, American Express), PayPal, and bank transfers. We also offer financing options for purchases over $500 through our partner lenders.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>How long does shipping take?</h3>
                    <div class="faq-answer">
                        <p>Most orders ship within 24 hours. Standard shipping takes 3-5 business days, while express shipping takes 1-2 business days. Free shipping is available on orders over $100.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>Do you offer warranty on products?</h3>
                    <div class="faq-answer">
                        <p>Yes! All our products come with manufacturer warranty. We also offer our 30-day satisfaction guarantee. If you're not happy with your purchase, we'll help you return or exchange it.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>Can I cancel or modify my order?</h3>
                    <div class="faq-answer">
                        <p>You can modify or cancel your order within 2 hours of placing it, as long as it hasn't been shipped yet. Contact our customer service team immediately if you need to make changes.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>Do you offer price matching?</h3>
                    <div class="faq-answer">
                        <p>Yes, we offer price matching on identical products from authorized retailers. Contact us within 7 days of your purchase with proof of the lower price, and we'll match it or refund the difference.</p>
                    </div>
                </div>
            </div>

            <!-- Technical Questions -->
            <div id="technical" class="faq-section">
                <h2>Technical Questions</h2>
                
                <div class="faq-item">
                    <h3>What's the difference between DDR4 and DDR5 RAM?</h3>
                    <div class="faq-answer">
                        <p>DDR5 is the newer, faster standard with higher bandwidth and lower power consumption. However, DDR4 is still excellent for most users and is more affordable. DDR5 requires specific motherboards (Intel 12th gen+ or AMD AM5), while DDR4 works with most current systems.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>How do I choose the right power supply?</h3>
                    <div class="faq-answer">
                        <p>Use our <a href="../products/build-calculator.php">Build Calculator</a> to estimate your power needs. Generally, budget builds need 450-550W, mid-range builds need 650-750W, and high-end builds need 850W+. Always choose a reputable brand and 80+ certified unit.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>What's the difference between SATA and NVMe SSDs?</h3>
                    <div class="faq-answer">
                        <p>NVMe SSDs are significantly faster than SATA SSDs (up to 7x faster). SATA SSDs are still great for most users and are more affordable. NVMe is ideal for gaming, content creation, and anyone who wants maximum performance.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>Do I need liquid cooling?</h3>
                    <div class="faq-answer">
                        <p>Liquid cooling isn't necessary for most builds. Air cooling is often sufficient and more reliable. Liquid cooling is beneficial for high-end CPUs, overclocking, or if you prefer the aesthetic. Our build calculator will recommend appropriate cooling solutions.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>What's the difference between RTX and GTX graphics cards?</h3>
                    <div class="faq-answer">
                        <p>RTX cards feature ray tracing technology and are newer/more powerful than GTX cards. RTX cards also have DLSS for better performance. For gaming, RTX cards offer better future-proofing, while GTX cards can still handle most games at good settings.</p>
                    </div>
                </div>
            </div>

            <!-- Support Questions -->
            <div id="support" class="faq-section">
                <h2>Support Questions</h2>
                
                <div class="faq-item">
                    <h3>How can I contact customer support?</h3>
                    <div class="faq-answer">
                        <p>You can reach us through multiple channels: Email at support@wafitechparts.com, phone at (555) 123-4568, or through our <a href="../contact.php">contact form</a>. We typically respond within 2-4 hours during business hours.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>Do you offer technical support for custom builds?</h3>
                    <div class="faq-answer">
                        <p>Yes! We offer comprehensive technical support for all components purchased from us. This includes troubleshooting, compatibility issues, and general PC building questions. We also have a detailed <a href="troubleshooting.php">troubleshooting guide</a> on our website.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>What if my component arrives damaged?</h3>
                    <div class="faq-answer">
                        <p>Contact us immediately if you receive damaged items. We'll arrange a replacement or refund. Take photos of the damage and keep all packaging. We handle all shipping costs for damaged items.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>Do you offer assembly services?</h3>
                    <div class="faq-answer">
                        <p>Yes, we offer professional PC assembly services. Our technicians will build your PC, install the operating system, and test everything thoroughly. This service includes a 1-year warranty on the build and free technical support.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>Can you help me choose components for my specific needs?</h3>
                    <div class="faq-answer">
                        <p>Absolutely! Our team of experts can help you choose the perfect components based on your budget, intended use, and preferences. Contact us or use our <a href="../products/build-calculator.php">Build Calculator</a> to get started.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="faq-contact">
            <h2>Still Have Questions?</h2>
            <p>Can't find the answer you're looking for? Our support team is here to help!</p>
            <div class="contact-buttons">
                <a href="../contact.php" class="btn">Contact Support</a>
                <a href="../products/build-calculator.php" class="btn btn-secondary">Try Build Calculator</a>
            </div>
        </div>
    </div>
</div>

<style>
.faq-hero {
    text-align: center;
    padding: 60px 0;
}

.faq-subtitle {
    font-size: 1.3em;
    margin: 20px 0;
    color: #ccc;
}

.faq-content {
    max-width: 1000px;
    margin: 0 auto;
}

.faq-categories {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin: 40px 0;
    flex-wrap: wrap;
}

.category-btn {
    padding: 12px 24px;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 25px;
    color: #fff;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 16px;
}

.category-btn:hover,
.category-btn.active {
    background: #64b5f6;
    border-color: #64b5f6;
    color: #000;
}

.faq-sections {
    margin: 40px 0;
}

.faq-section {
    display: none;
}

.faq-section.active {
    display: block;
}

.faq-section h2 {
    color: #64b5f6;
    margin-bottom: 30px;
    text-align: center;
}

.faq-item {
    margin-bottom: 30px;
    padding: 25px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    cursor: pointer;
    transition: all 0.3s ease;
}

.faq-item:hover {
    background: rgba(255, 255, 255, 0.08);
    border-color: rgba(100, 181, 246, 0.3);
}

.faq-item h3 {
    color: #64b5f6;
    margin-bottom: 15px;
    font-size: 1.2em;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.faq-item h3::after {
    content: '+';
    font-size: 1.5em;
    color: #64b5f6;
    transition: transform 0.3s ease;
}

.faq-item.active h3::after {
    transform: rotate(45deg);
}

.faq-answer {
    display: none;
    margin-top: 15px;
    padding-top: 15px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.faq-item.active .faq-answer {
    display: block;
}

.faq-answer p {
    line-height: 1.6;
    color: #ccc;
}

.faq-answer a {
    color: #64b5f6;
    text-decoration: none;
}

.faq-answer a:hover {
    text-decoration: underline;
}

.faq-contact {
    text-align: center;
    margin: 60px 0;
    padding: 40px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.faq-contact h2 {
    color: #64b5f6;
    margin-bottom: 15px;
}

.faq-contact p {
    margin-bottom: 30px;
    color: #ccc;
}

.contact-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
}

@media (max-width: 768px) {
    .faq-categories {
        flex-direction: column;
        align-items: center;
    }
    
    .category-btn {
        width: 200px;
    }
    
    .contact-buttons {
        flex-direction: column;
        align-items: center;
    }
}
</style>

<script>
function showCategory(category) {
    // Hide all sections
    document.querySelectorAll('.faq-section').forEach(section => {
        section.classList.remove('active');
    });
    
    // Remove active class from all buttons
    document.querySelectorAll('.category-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    
    // Show selected section
    document.getElementById(category).classList.add('active');
    
    // Add active class to clicked button
    event.target.classList.add('active');
}

// FAQ item toggle functionality
document.addEventListener('DOMContentLoaded', function() {
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        item.addEventListener('click', function() {
            // Close other open items
            faqItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('active');
                }
            });
            
            // Toggle current item
            item.classList.toggle('active');
        });
    });
});
</script>

<?php include '../includes/footer.php'; ?>

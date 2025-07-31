<?php 
$page_title = "About Us";
include 'includes/header.php'; 
?>

<div class="container">
    <section class="about-hero">
        <h1>About WafiTechParts</h1>
        <p class="about-subtitle">Your Trusted Partner in Custom PC Building</p>
    </section>

    <section class="business-case">
        <h2>Our Business Case</h2>
        <div class="case-content">
            <p>
                WafiTechParts was founded with a simple mission: to make custom PC building accessible to everyone. 
                In today's digital world, having a powerful, reliable computer is essential for work, gaming, content creation, 
                and everyday tasks. However, the process of building a custom PC can be overwhelming for many people.
            </p>
            
            <p>
                Our business addresses this challenge by providing a comprehensive platform that combines:
            </p>
            
            <ul class="case-points">
                <li><strong>Quality Components:</strong> We carefully curate our inventory to include only the best parts from trusted manufacturers like Intel, AMD, NVIDIA, ASUS, MSI, and Corsair.</li>
                <li><strong>Expert Guidance:</strong> Our team of PC building experts provides personalized recommendations based on your specific needs and budget.</li>
                <li><strong>Interactive Tools:</strong> Our build calculator helps users create the perfect system by automatically checking compatibility and providing real-time pricing.</li>
                <li><strong>Educational Resources:</strong> We provide comprehensive guides, tutorials, and support to help users understand what they're buying and how to build their PC.</li>
            </ul>
            
            <p>
                Whether you're a first-time builder looking to create a budget-friendly office PC, a gaming enthusiast 
                seeking maximum performance, or a professional needing a powerful workstation, WafiTechParts has the 
                components, expertise, and tools to make your custom PC dreams a reality.
            </p>
        </div>
    </section>

    <section class="company-stats">
        <h2>Why Choose WafiTechParts?</h2>
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">500+</div>
                <div class="stat-label">Products Available</div>
                <p>From entry-level to high-end components</p>
            </div>
            <div class="stat-card">
                <div class="stat-number">1000+</div>
                <div class="stat-label">Happy Customers</div>
                <p>Building their dream PCs with us</p>
            </div>
            <div class="stat-card">
                <div class="stat-number">24/7</div>
                <div class="stat-label">Expert Support</div>
                <p>Always here to help you succeed</p>
            </div>
            <div class="stat-card">
                <div class="stat-number">99%</div>
                <div class="stat-label">Satisfaction Rate</div>
                <p>Customer satisfaction guaranteed</p>
            </div>
        </div>
    </section>

    <section class="our-mission">
        <h2>Our Mission</h2>
        <div class="mission-content">
            <p>
                At WafiTechParts, we believe that everyone deserves access to high-quality computer components 
                and the knowledge to build their own custom PC. Our mission is to democratize PC building by:
            </p>
            
            <div class="mission-points">
                <div class="mission-point">
                    <h3>🏗️ Simplifying the Process</h3>
                    <p>We break down the complex world of PC components into easy-to-understand categories and provide clear, detailed product descriptions.</p>
                </div>
                
                <div class="mission-point">
                    <h3>💰 Making It Affordable</h3>
                    <p>We offer competitive pricing and flexible payment options to make custom PC building accessible to all budgets.</p>
                </div>
                
                <div class="mission-point">
                    <h3>🎓 Educating Our Customers</h3>
                    <p>We provide comprehensive guides, tutorials, and one-on-one support to help you understand what you're buying.</p>
                </div>
                
                <div class="mission-point">
                    <h3>🛡️ Ensuring Quality</h3>
                    <p>We only stock components from reputable manufacturers and provide detailed compatibility checking.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="team">
        <h2>Meet Our Team</h2>
        <div class="team-grid">
            <div class="team-member">
                <div class="member-avatar">👨‍💻</div>
                <h3>Ahmed Hassan</h3>
                <p class="member-role">Founder & CEO</p>
                <p>PC building enthusiast with 10+ years of experience in custom builds and system optimization.</p>
            </div>
            
            <div class="team-member">
                <div class="member-avatar">👩‍🔧</div>
                <h3>Sarah Chen</h3>
                <p class="member-role">Technical Specialist</p>
                <p>Certified PC technician specializing in gaming rigs and workstation builds.</p>
            </div>
            
            <div class="team-member">
                <div class="member-avatar">👨‍💼</div>
                <h3>Mike Rodriguez</h3>
                <p class="member-role">Customer Support</p>
                <p>Dedicated to helping customers find the perfect components for their needs.</p>
            </div>
            
            <div class="team-member">
                <div class="member-avatar">👩‍🎨</div>
                <h3>Emily Watson</h3>
                <p class="member-role">Content Creator</p>
                <p>Creates educational content and guides to help users understand PC building.</p>
            </div>
        </div>
    </section>

    <section class="values">
        <h2>Our Values</h2>
        <div class="values-grid">
            <div class="value-card">
                <h3>Quality First</h3>
                <p>We never compromise on quality. Every component we sell meets our strict standards for reliability and performance.</p>
            </div>
            
            <div class="value-card">
                <h3>Customer Success</h3>
                <p>Your success is our success. We're committed to helping you build the perfect PC for your needs.</p>
            </div>
            
            <div class="value-card">
                <h3>Transparency</h3>
                <p>We believe in honest pricing, clear product descriptions, and open communication with our customers.</p>
            </div>
            
            <div class="value-card">
                <h3>Innovation</h3>
                <p>We stay ahead of the curve, always offering the latest and greatest components and building techniques.</p>
            </div>
        </div>
    </section>

    <section class="contact-cta">
        <h2>Ready to Start Your Build?</h2>
        <p>Our team is here to help you create the perfect custom PC. Get in touch or start browsing our components today!</p>
        <div class="cta-buttons">
            <a href="contact.php" class="btn">Contact Us</a>
            <a href="products/index.php" class="btn btn-secondary">Browse Products</a>
        </div>
    </section>
</div>

<style>
.about-hero {
    text-align: center;
    padding: 60px 0;
}

.about-subtitle {
    font-size: 1.3em;
    margin: 20px 0;
    color: #ccc;
}

.business-case {
    margin: 60px 0;
}

.case-content {
    max-width: 800px;
    margin: 0 auto;
    line-height: 1.8;
}

.case-points {
    margin: 30px 0;
    padding-left: 20px;
}

.case-points li {
    margin-bottom: 15px;
    line-height: 1.6;
}

.company-stats {
    margin: 60px 0;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.stat-card {
    text-align: center;
    padding: 30px 20px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.stat-number {
    font-size: 2.5em;
    font-weight: bold;
    color: #64b5f6;
    margin-bottom: 10px;
}

.stat-label {
    font-size: 1.2em;
    font-weight: bold;
    margin-bottom: 10px;
    color: #fff;
}

.our-mission {
    margin: 60px 0;
}

.mission-content {
    max-width: 800px;
    margin: 0 auto;
}

.mission-points {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.mission-point {
    padding: 20px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.mission-point h3 {
    color: #64b5f6;
    margin-bottom: 15px;
}

.team {
    margin: 60px 0;
}

.team-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.team-member {
    text-align: center;
    padding: 30px 20px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.member-avatar {
    font-size: 3em;
    margin-bottom: 15px;
}

.member-role {
    color: #64b5f6;
    font-weight: bold;
    margin-bottom: 15px;
}

.values {
    margin: 60px 0;
}

.values-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.value-card {
    padding: 30px 20px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    text-align: center;
}

.value-card h3 {
    color: #64b5f6;
    margin-bottom: 15px;
}

.contact-cta {
    text-align: center;
    margin: 60px 0;
    padding: 40px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.cta-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 30px;
}

@media (max-width: 768px) {
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .team-grid {
        grid-template-columns: 1fr;
    }
    
    .values-grid {
        grid-template-columns: 1fr;
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
}
</style>

<?php include 'includes/footer.php'; ?>

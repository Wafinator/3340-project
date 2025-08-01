<?php 
$page_title = "Home";
include 'includes/header.php'; 
?>

<div class="container">
    <section class="hero">
        <h1>Welcome to <span class="highlight">WafiTechParts</span></h1>
        <p class="hero-subtitle">Your one-stop shop for all custom PC parts and builds!</p>
        <div class="hero-buttons">
            <a href="products/index.php" class="btn">Browse Parts</a>
            <a href="products/build-calculator.php" class="btn btn-secondary">Build Calculator</a>
        </div>
    </section>

    <section class="features">
        <h2>Why Choose WafiTechParts?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🖥️</div>
                <h3>Premium Components</h3>
                <p>We stock only the highest quality parts from trusted manufacturers like Intel, AMD, NVIDIA, and more.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔧</div>
                <h3>Expert Support</h3>
                <p>Our team of PC building experts is here to help you choose the perfect components for your needs.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🚚</div>
                <h3>Fast Shipping</h3>
                <p>Free shipping on orders over $100. Most orders ship within 24 hours.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🛡️</div>
                <h3>Warranty Protection</h3>
                <p>All our products come with manufacturer warranty and our 30-day satisfaction guarantee.</p>
            </div>
        </div>
    </section>

    <section class="featured-products">
        <h2>Featured Products</h2>
        <div class="product-grid">
            <?php
            // Get featured products from static data
            require_once 'includes/db.php';
            $featured_products = array_filter($products, function($product) {
                return $product['featured'] == 1;
            });
            $featured_products = array_slice($featured_products, 0, 6);
            
            foreach ($featured_products as $product):
            ?>
            <div class="product-card" data-category="<?php echo htmlspecialchars($product['category']); ?>">
                <img src="assets/images/<?php echo htmlspecialchars($product['image']); ?>" 
                     alt="<?php echo htmlspecialchars($product['name']); ?>" 
                     class="product-image">
                <h3 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h3>
                <p class="product-description"><?php echo htmlspecialchars($product['description']); ?></p>
                <div class="product-price">$<?php echo number_format($product['price'], 2); ?></div>
                <a href="products/view.php?id=<?php echo $product['id']; ?>" class="btn">View Details</a>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center">
            <a href="products/index.php" class="btn btn-secondary">View All Products</a>
        </div>
    </section>

    <section class="build-guide">
        <h2>Not Sure Where to Start?</h2>
        <p>Use our interactive build calculator to create the perfect PC for your needs and budget.</p>
        <div class="guide-steps">
            <div class="step">
                <div class="step-number">1</div>
                <h3>Choose Your Budget</h3>
                <p>Select from our pre-configured builds or start from scratch</p>
            </div>
            <div class="step">
                <div class="step-number">2</div>
                <h3>Pick Your Components</h3>
                <p>Select CPU, GPU, motherboard, and other essential parts</p>
            </div>
            <div class="step">
                <div class="step-number">3</div>
                <h3>Get Your Quote</h3>
                <p>See the total cost and estimated performance of your build</p>
            </div>
        </div>
        <a href="products/build-calculator.php" class="btn">Start Building</a>
    </section>

    <section class="testimonials">
        <h2>What Our Customers Say</h2>
        <div class="testimonials-grid">
            <div class="testimonial">
                <p>"Amazing selection and great prices. My gaming PC runs perfectly!"</p>
                <cite>- Alex M., Gaming Enthusiast</cite>
            </div>
            <div class="testimonial">
                <p>"The build calculator helped me stay within budget. Highly recommend!"</p>
                <cite>- Sarah K., Student</cite>
            </div>
            <div class="testimonial">
                <p>"Fast shipping and excellent customer service. Will buy again!"</p>
                <cite>- Mike R., IT Professional</cite>
            </div>
        </div>
    </section>
</div>

<style>
.hero {
    text-align: center;
    padding: 60px 0;
}

.hero-subtitle {
    font-size: 1.3em;
    margin: 20px 0 30px;
    color: #ccc;
}

.hero-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
}

.highlight {
    color: #64b5f6;
    text-shadow: 0 0 10px #64b5f6;
}

.features {
    margin: 60px 0;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.feature-card {
    text-align: center;
    padding: 30px 20px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.feature-icon {
    font-size: 3em;
    margin-bottom: 20px;
}

.feature-card h3 {
    margin-bottom: 15px;
    color: #64b5f6;
}

.featured-products {
    margin: 60px 0;
}

.text-center {
    text-align: center;
    margin-top: 40px;
}

.build-guide {
    margin: 60px 0;
    text-align: center;
}

.guide-steps {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 30px;
    margin: 40px 0;
}

.step {
    padding: 20px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.step-number {
    width: 40px;
    height: 40px;
    background: #64b5f6;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    margin: 0 auto 15px;
}

.testimonials {
    margin: 60px 0;
}

.testimonials-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.testimonial {
    padding: 30px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    text-align: center;
}

.testimonial p {
    font-style: italic;
    margin-bottom: 15px;
    font-size: 1.1em;
}

.testimonial cite {
    color: #64b5f6;
    font-weight: bold;
}

@media (max-width: 768px) {
    .hero-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .guide-steps {
        grid-template-columns: 1fr;
    }
    
    .testimonials-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<?php include 'includes/footer.php'; ?>

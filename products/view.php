<?php 
$page_title = "Product Details";
require_once '../includes/db.php';
include '../includes/header.php'; 

// Get product ID from URL
$product_id = $_GET['id'] ?? 0;

if (!$product_id) {
    header("Location: index.php");
    exit;
}

// Get product details
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$product_id]);
$product = $stmt->fetch();

if (!$product) {
    header("Location: index.php");
    exit;
}

// Get related products (same category, different brand)
$stmt = $pdo->prepare("SELECT * FROM products WHERE category = ? AND id != ? LIMIT 4");
$stmt->execute([$product['category'], $product_id]);
$related_products = $stmt->fetchAll();

$page_title = $product['name'] . " - Product Details";
?>

<div class="container">
    <div class="product-detail-content">
        <!-- Breadcrumb -->
        <nav class="breadcrumb">
            <a href="../index.php">Home</a>
            <span class="separator">›</span>
            <a href="index.php">Products</a>
            <span class="separator">›</span>
            <a href="index.php?category=<?= urlencode($product['category']) ?>"><?= htmlspecialchars($product['category']) ?></a>
            <span class="separator">›</span>
            <span class="current"><?= htmlspecialchars($product['name']) ?></span>
        </nav>

        <div class="product-detail-grid">
            <!-- Product Images -->
            <div class="product-images">
                <div class="main-image">
                    <img src="../assets/images/<?= htmlspecialchars($product['image']) ?>" 
                         alt="<?= htmlspecialchars($product['name']) ?>"
                         onerror="this.src='../assets/images/placeholder.jpg'">
                </div>
                <div class="image-thumbnails">
                    <img src="../assets/images/<?= htmlspecialchars($product['image']) ?>" 
                         alt="Thumbnail 1" class="thumbnail active"
                         onerror="this.src='../assets/images/placeholder.jpg'">
                    <!-- Additional thumbnails can be added here -->
                </div>
            </div>

            <!-- Product Info -->
            <div class="product-info">
                <div class="product-header">
                    <div class="product-category"><?= htmlspecialchars($product['category']) ?></div>
                    <h1 class="product-title"><?= htmlspecialchars($product['name']) ?></h1>
                    <div class="product-brand">by <?= htmlspecialchars($product['brand']) ?></div>
                </div>

                <div class="product-price-section">
                    <div class="product-price">$<?= number_format($product['price'], 2) ?></div>
                    <div class="product-availability">
                        <span class="availability-badge in-stock">In Stock</span>
                    </div>
                </div>

                <div class="product-description">
                    <h3>Description</h3>
                    <p><?= nl2br(htmlspecialchars($product['description'])) ?></p>
                </div>

                <div class="product-specifications">
                    <h3>Specifications</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <span class="spec-label">Category:</span>
                            <span class="spec-value"><?= htmlspecialchars($product['category']) ?></span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label">Brand:</span>
                            <span class="spec-value"><?= htmlspecialchars($product['brand']) ?></span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label">Price:</span>
                            <span class="spec-value">$<?= number_format($product['price'], 2) ?></span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label">SKU:</span>
                            <span class="spec-value"><?= htmlspecialchars($product['id']) ?></span>
                        </div>
                    </div>
                </div>

                <div class="product-actions">
                    <button class="btn btn-primary add-to-calculator" 
                            data-product-id="<?= $product['id'] ?>"
                            data-product-name="<?= htmlspecialchars($product['name']) ?>"
                            data-product-price="<?= $product['price'] ?>">
                        Add to Build Calculator
                    </button>
                    <a href="../products/build-calculator.php" class="btn btn-secondary">View Calculator</a>
                    <button class="btn btn-outline share-product">Share Product</button>
                </div>

                <div class="product-features">
                    <h3>Key Features</h3>
                    <ul class="features-list">
                        <li>✅ High-quality <?= htmlspecialchars($product['category']) ?> from <?= htmlspecialchars($product['brand']) ?></li>
                        <li>✅ Compatible with most modern systems</li>
                        <li>✅ Manufacturer warranty included</li>
                        <li>✅ Fast shipping available</li>
                        <li>✅ Expert support for installation</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Product Tabs -->
        <div class="product-tabs">
            <div class="tab-buttons">
                <button class="tab-btn active" data-tab="details">Product Details</button>
                <button class="tab-btn" data-tab="specs">Full Specifications</button>
                <button class="tab-btn" data-tab="compatibility">Compatibility</button>
                <button class="tab-btn" data-tab="reviews">Reviews</button>
            </div>

            <div class="tab-content">
                <!-- Details Tab -->
                <div class="tab-pane active" id="details">
                    <h3>Product Overview</h3>
                    <p><?= nl2br(htmlspecialchars($product['description'])) ?></p>
                    
                    <h3>Why Choose This <?= htmlspecialchars($product['category']) ?>?</h3>
                    <ul>
                        <li><strong>Performance:</strong> Designed for optimal performance and reliability</li>
                        <li><strong>Compatibility:</strong> Works with a wide range of systems and configurations</li>
                        <li><strong>Quality:</strong> Manufactured by <?= htmlspecialchars($product['brand']) ?>, a trusted name in PC components</li>
                        <li><strong>Support:</strong> Backed by our expert technical support team</li>
                    </ul>
                </div>

                <!-- Specifications Tab -->
                <div class="tab-pane" id="specs">
                    <h3>Technical Specifications</h3>
                    <div class="specs-table">
                        <div class="spec-row">
                            <span class="spec-name">Product Name</span>
                            <span class="spec-value"><?= htmlspecialchars($product['name']) ?></span>
                        </div>
                        <div class="spec-row">
                            <span class="spec-name">Brand</span>
                            <span class="spec-value"><?= htmlspecialchars($product['brand']) ?></span>
                        </div>
                        <div class="spec-row">
                            <span class="spec-name">Category</span>
                            <span class="spec-value"><?= htmlspecialchars($product['category']) ?></span>
                        </div>
                        <div class="spec-row">
                            <span class="spec-name">Price</span>
                            <span class="spec-value">$<?= number_format($product['price'], 2) ?></span>
                        </div>
                        <div class="spec-row">
                            <span class="spec-name">Warranty</span>
                            <span class="spec-value">Manufacturer warranty included</span>
                        </div>
                        <div class="spec-row">
                            <span class="spec-name">Availability</span>
                            <span class="spec-value">In Stock</span>
                        </div>
                    </div>
                </div>

                <!-- Compatibility Tab -->
                <div class="tab-pane" id="compatibility">
                    <h3>Compatibility Information</h3>
                    <p>This <?= htmlspecialchars($product['category']) ?> is compatible with most modern systems. Here are some general compatibility guidelines:</p>
                    
                    <div class="compatibility-info">
                        <h4>System Requirements</h4>
                        <ul>
                            <li>Compatible with most modern motherboards</li>
                            <li>Standard form factor support</li>
                            <li>No additional power requirements</li>
                            <li>Plug-and-play installation</li>
                        </ul>
                        
                        <h4>Recommended System Specs</h4>
                        <ul>
                            <li>Modern operating system (Windows 10/11, Linux)</li>
                            <li>Adequate power supply</li>
                            <li>Proper cooling system</li>
                            <li>Updated drivers</li>
                        </ul>
                    </div>
                </div>

                <!-- Reviews Tab -->
                <div class="tab-pane" id="reviews">
                    <h3>Customer Reviews</h3>
                    <div class="reviews-summary">
                        <div class="rating">
                            <span class="stars">★★★★★</span>
                            <span class="rating-text">4.8 out of 5</span>
                        </div>
                        <p>Based on customer reviews</p>
                    </div>
                    
                    <div class="review-item">
                        <div class="review-header">
                            <span class="reviewer-name">Alex M.</span>
                            <span class="review-date">2 weeks ago</span>
                            <span class="review-rating">★★★★★</span>
                        </div>
                        <p class="review-text">"Excellent <?= htmlspecialchars($product['category']) ?>! Works perfectly with my build. Great performance and the price was right."</p>
                    </div>
                    
                    <div class="review-item">
                        <div class="review-header">
                            <span class="reviewer-name">Sarah K.</span>
                            <span class="review-date">1 month ago</span>
                            <span class="review-rating">★★★★★</span>
                        </div>
                        <p class="review-text">"Very happy with this purchase. Installation was straightforward and it's been running smoothly for weeks."</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        <?php if (!empty($related_products)): ?>
        <div class="related-products">
            <h3>Related Products</h3>
            <div class="related-grid">
                <?php foreach ($related_products as $related): ?>
                <div class="related-card">
                    <div class="related-image">
                        <img src="../assets/images/<?= htmlspecialchars($related['image']) ?>" 
                             alt="<?= htmlspecialchars($related['name']) ?>"
                             onerror="this.src='../assets/images/placeholder.jpg'">
                    </div>
                    <div class="related-info">
                        <h4><?= htmlspecialchars($related['name']) ?></h4>
                        <div class="related-brand"><?= htmlspecialchars($related['brand']) ?></div>
                        <div class="related-price">$<?= number_format($related['price'], 2) ?></div>
                        <a href="view.php?id=<?= $related['id'] ?>" class="btn btn-small">View Details</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<style>
.breadcrumb {
    margin-bottom: 30px;
    padding: 15px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.breadcrumb a {
    color: #64b5f6;
    text-decoration: none;
}

.breadcrumb a:hover {
    text-decoration: underline;
}

.breadcrumb .separator {
    color: #666;
    margin: 0 10px;
}

.breadcrumb .current {
    color: #ccc;
}

.product-detail-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.product-detail-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    margin-bottom: 60px;
}

.product-images {
    position: sticky;
    top: 20px;
}

.main-image {
    margin-bottom: 20px;
    border-radius: 10px;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.main-image img {
    width: 100%;
    height: 400px;
    object-fit: cover;
}

.image-thumbnails {
    display: flex;
    gap: 10px;
}

.thumbnail {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 5px;
    cursor: pointer;
    border: 2px solid transparent;
    transition: border-color 0.3s ease;
}

.thumbnail.active,
.thumbnail:hover {
    border-color: #64b5f6;
}

.product-header {
    margin-bottom: 30px;
}

.product-category {
    color: #64b5f6;
    text-transform: uppercase;
    font-weight: bold;
    font-size: 0.9em;
    margin-bottom: 10px;
}

.product-title {
    font-size: 2em;
    margin-bottom: 10px;
    color: #fff;
}

.product-brand {
    color: #ccc;
    font-size: 1.1em;
}

.product-price-section {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 30px;
}

.product-price {
    font-size: 2.5em;
    font-weight: bold;
    color: #64b5f6;
}

.availability-badge {
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.9em;
    font-weight: bold;
}

.availability-badge.in-stock {
    background: rgba(76, 175, 80, 0.2);
    color: #4CAF50;
    border: 1px solid #4CAF50;
}

.product-description,
.product-specifications {
    margin-bottom: 30px;
}

.product-description h3,
.product-specifications h3 {
    color: #64b5f6;
    margin-bottom: 15px;
}

.specs-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
}

.spec-item {
    display: flex;
    justify-content: space-between;
    padding: 10px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 5px;
}

.spec-label {
    color: #ccc;
    font-weight: bold;
}

.spec-value {
    color: #fff;
}

.product-actions {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    margin-bottom: 30px;
}

.product-features h3 {
    color: #64b5f6;
    margin-bottom: 15px;
}

.features-list {
    list-style: none;
    padding: 0;
}

.features-list li {
    margin-bottom: 10px;
    color: #ccc;
}

.product-tabs {
    margin-bottom: 60px;
}

.tab-buttons {
    display: flex;
    gap: 10px;
    margin-bottom: 30px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.tab-btn {
    padding: 15px 25px;
    background: none;
    border: none;
    color: #ccc;
    cursor: pointer;
    border-bottom: 3px solid transparent;
    transition: all 0.3s ease;
}

.tab-btn.active,
.tab-btn:hover {
    color: #64b5f6;
    border-bottom-color: #64b5f6;
}

.tab-pane {
    display: none;
}

.tab-pane.active {
    display: block;
}

.tab-pane h3 {
    color: #64b5f6;
    margin-bottom: 20px;
}

.specs-table {
    display: grid;
    gap: 10px;
}

.spec-row {
    display: flex;
    justify-content: space-between;
    padding: 15px;
    background: rgba(255, 255, 255, 0.08);
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(5px);
    transition: all 0.3s ease;
}

.spec-row:hover {
    background: rgba(255, 255, 255, 0.12);
    transform: translateX(5px);
}

.spec-name {
    color: #ccc;
    font-weight: bold;
}

.compatibility-info h4 {
    color: #64b5f6;
    margin: 20px 0 10px;
}

.compatibility-info ul {
    margin-bottom: 20px;
}

.reviews-summary {
    text-align: center;
    margin-bottom: 30px;
    padding: 25px;
    background: rgba(255, 255, 255, 0.08);
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
}

.reviews-summary:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(100, 181, 246, 0.15);
}

.rating {
    margin-bottom: 10px;
}

.stars {
    color: #FFD700;
    font-size: 1.5em;
}

.rating-text {
    color: #64b5f6;
    font-weight: bold;
    margin-left: 10px;
}

.review-item {
    margin-bottom: 20px;
    padding: 25px;
    background: rgba(255, 255, 255, 0.08);
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
}

.review-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(100, 181, 246, 0.1);
}

.review-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.reviewer-name {
    color: #64b5f6;
    font-weight: bold;
}

.review-date {
    color: #666;
    font-size: 0.9em;
}

.review-rating {
    color: #FFD700;
}

.review-text {
    color: #ccc;
    line-height: 1.5;
}

.related-products {
    margin-top: 60px;
}

.related-products h3 {
    color: #64b5f6;
    margin-bottom: 30px;
}

.related-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 30px;
}

.related-card {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    overflow: hidden;
    transition: all 0.3s ease;
}

.related-card:hover {
    transform: translateY(-5px);
    border-color: #64b5f6;
}

.related-image {
    height: 150px;
    overflow: hidden;
}

.related-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.related-info {
    padding: 20px;
}

.related-info h4 {
    color: #fff;
    margin-bottom: 8px;
}

.related-brand {
    color: #ccc;
    font-size: 0.9em;
    margin-bottom: 10px;
}

.related-price {
    color: #64b5f6;
    font-weight: bold;
    margin-bottom: 15px;
}

.btn-small {
    padding: 8px 16px;
    font-size: 0.9em;
}

@media (max-width: 1024px) {
    .product-detail-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .product-images {
        position: static;
    }
}

@media (max-width: 768px) {
    .product-actions {
        flex-direction: column;
    }
    
    .tab-buttons {
        flex-wrap: wrap;
    }
    
    .related-grid {
        grid-template-columns: 1fr;
    }
    
    .specs-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<script>
// Tab switching
document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const tabId = this.dataset.tab;
        
        // Remove active class from all buttons and panes
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        document.querySelectorAll('.tab-pane').forEach(p => p.classList.remove('active'));
        
        // Add active class to clicked button and corresponding pane
        this.classList.add('active');
        document.getElementById(tabId).classList.add('active');
    });
});

// Add to calculator functionality
document.querySelector('.add-to-calculator').addEventListener('click', function() {
    const productId = this.dataset.productId;
    const productName = this.dataset.productName;
    const productPrice = this.dataset.productPrice;
    
    // Store in localStorage for calculator
    const calculatorItems = JSON.parse(localStorage.getItem('calculatorItems') || '[]');
    calculatorItems.push({
        id: productId,
        name: productName,
        price: parseFloat(productPrice)
    });
    localStorage.setItem('calculatorItems', JSON.stringify(calculatorItems));
    
    // Show feedback
    this.textContent = 'Added to Calculator!';
    this.style.background = '#4CAF50';
    setTimeout(() => {
        this.textContent = 'Add to Build Calculator';
        this.style.background = '';
    }, 2000);
});

// Share product functionality
document.querySelector('.share-product').addEventListener('click', function() {
    if (navigator.share) {
        navigator.share({
            title: '<?= htmlspecialchars($product['name']) ?>',
            text: 'Check out this <?= htmlspecialchars($product['category']) ?> from WafiTechParts!',
            url: window.location.href
        });
    } else {
        // Fallback: copy URL to clipboard
        navigator.clipboard.writeText(window.location.href).then(() => {
            this.textContent = 'Link Copied!';
            setTimeout(() => {
                this.textContent = 'Share Product';
            }, 2000);
        });
    }
});

// Image thumbnail switching
document.querySelectorAll('.thumbnail').forEach(thumb => {
    thumb.addEventListener('click', function() {
        const mainImage = document.querySelector('.main-image img');
        mainImage.src = this.src;
        
        document.querySelectorAll('.thumbnail').forEach(t => t.classList.remove('active'));
        this.classList.add('active');
    });
});
</script>

<?php include '../includes/footer.php'; ?> 
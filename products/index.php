<?php
$page_title = "Browse Products";
require_once '../includes/db.php';
include '../includes/header.php'; 

// Get filter parameters
$category_filter = $_GET['category'] ?? '';
$brand_filter = $_GET['brand'] ?? '';
$price_min = $_GET['price_min'] ?? '';
$price_max = $_GET['price_max'] ?? '';
$search = $_GET['search'] ?? '';
$sort = $_GET['sort'] ?? 'name';

// Build the SQL query with filters
$sql = "SELECT * FROM products WHERE 1=1";
$params = [];

if ($category_filter) {
    $sql .= " AND category = ?";
    $params[] = $category_filter;
}

// Brand filter removed - brand column doesn't exist in current database

if ($price_min !== '') {
    $sql .= " AND price >= ?";
    $params[] = $price_min;
}

if ($price_max !== '') {
    $sql .= " AND price <= ?";
    $params[] = $price_max;
}

if ($search) {
    $sql .= " AND (name LIKE ? OR description LIKE ?)";
    $search_term = "%$search%";
    $params[] = $search_term;
    $params[] = $search_term;
}

// Add sorting
switch ($sort) {
    case 'price_low':
        $sql .= " ORDER BY price ASC";
        break;
    case 'price_high':
        $sql .= " ORDER BY price DESC";
        break;
    case 'brand':
        $sql .= " ORDER BY name ASC"; // Brand column doesn't exist, fallback to name
        break;
    default:
        $sql .= " ORDER BY name ASC";
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$products = $stmt->fetchAll();

// Get unique categories for filters
$categories = $pdo->query("SELECT DISTINCT category FROM products ORDER BY category")->fetchAll();
// Brand filter removed - brand column doesn't exist in current database
?>

<div class="container">
    <section class="products-hero">
        <h1>Browse PC Parts</h1>
        <p class="products-subtitle">Find the perfect components for your custom PC build</p>
    </section>

    <div class="products-content">
        <!-- Filters Sidebar -->
        <aside class="filters-sidebar">
            <div class="filter-section">
                <h3>Search & Filters</h3>
                
                <form method="GET" class="filter-form">
                    <!-- Search -->
                    <div class="filter-group">
                        <label for="search">Search Products</label>
                        <input type="text" id="search" name="search" value="<?= htmlspecialchars($search) ?>" 
                               placeholder="Search by name or description...">
                    </div>

                    <!-- Category Filter -->
                    <div class="filter-group">
                        <label for="category">Category</label>
                        <select id="category" name="category">
                            <option value="">All Categories</option>
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?= htmlspecialchars($cat['category']) ?>" 
                                        <?= $category_filter === $cat['category'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($cat['category']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Brand Filter - Disabled (brand column doesn't exist) -->
                    <div class="filter-group">
                        <label for="brand">Brand</label>
                        <select id="brand" name="brand" disabled>
                            <option value="">Brand filter not available</option>
                        </select>
                        <small>Brand filtering not available in current database</small>
                    </div>

                    <!-- Price Range -->
                    <div class="filter-group">
                        <label for="price_min">Price Range</label>
                        <div class="price-inputs">
                            <input type="number" id="price_min" name="price_min" 
                                   value="<?= htmlspecialchars($price_min) ?>" placeholder="Min" min="0">
                            <span>to</span>
                            <input type="number" id="price_max" name="price_max" 
                                   value="<?= htmlspecialchars($price_max) ?>" placeholder="Max" min="0">
                        </div>
                    </div>

                    <!-- Sort -->
                    <div class="filter-group">
                        <label for="sort">Sort By</label>
                        <select id="sort" name="sort">
                            <option value="name" <?= $sort === 'name' ? 'selected' : '' ?>>Name A-Z</option>
                            <option value="brand" <?= $sort === 'brand' ? 'selected' : '' ?>>Brand</option>
                            <option value="price_low" <?= $sort === 'price_low' ? 'selected' : '' ?>>Price: Low to High</option>
                            <option value="price_high" <?= $sort === 'price_high' ? 'selected' : '' ?>>Price: High to Low</option>
                        </select>
                    </div>

                    <div class="filter-actions">
                        <button type="submit" class="btn">Apply Filters</button>
                        <a href="index.php" class="btn btn-secondary">Clear All</a>
                    </div>
                </form>
            </div>

            <!-- Quick Stats -->
            <div class="filter-section">
                <h3>Quick Stats</h3>
                <div class="stats">
                    <div class="stat-item">
                        <span class="stat-number"><?= count($products) ?></span>
                        <span class="stat-label">Products Found</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number"><?= count($categories) ?></span>
                        <span class="stat-label">Categories</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number"><?= count($brands) ?></span>
                        <span class="stat-label">Brands</span>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Products Grid -->
        <main class="products-main">
            <div class="products-header">
                <h2>Products (<?= count($products) ?> found)</h2>
                <div class="view-options">
                    <button class="view-btn active" data-view="grid">Grid</button>
                    <button class="view-btn" data-view="list">List</button>
                </div>
            </div>

            <?php if (empty($products)): ?>
                <div class="no-products">
                    <div class="no-products-icon">🔍</div>
                    <h3>No products found</h3>
                    <p>Try adjusting your filters or search terms.</p>
                    <a href="index.php" class="btn">Clear Filters</a>
                </div>
            <?php else: ?>
                <div class="products-grid" id="products-container">
                    <?php foreach ($products as $product): ?>
                        <div class="product-card" data-category="<?= htmlspecialchars($product['category']) ?>" 
                             data-brand="<?= htmlspecialchars($product['brand']) ?>" 
                             data-price="<?= $product['price'] ?>">
                            <div class="product-image">
                                <img src="../assets/images/<?= htmlspecialchars($product['image']) ?>" 
                                     alt="<?= htmlspecialchars($product['name']) ?>"
                                     onerror="this.src='../assets/images/placeholder.jpg'">
                                <div class="product-overlay">
                                    <a href="view.php?id=<?= $product['id'] ?>" class="btn">View Details</a>
                                </div>
                            </div>
                            
                            <div class="product-info">
                                <div class="product-category"><?= htmlspecialchars($product['category']) ?></div>
                                <h3 class="product-title"><?= htmlspecialchars($product['name']) ?></h3>
                                <div class="product-brand"><?= htmlspecialchars($product['brand']) ?></div>
                                <p class="product-description"><?= htmlspecialchars(substr($product['description'], 0, 100)) ?>...</p>
                                <div class="product-price">$<?= number_format($product['price'], 2) ?></div>
                                
                                <div class="product-actions">
                                    <a href="view.php?id=<?= $product['id'] ?>" class="btn">View Details</a>
                                    <button class="btn btn-secondary add-to-calculator" 
                                            data-product-id="<?= $product['id'] ?>"
                                            data-product-name="<?= htmlspecialchars($product['name']) ?>"
                                            data-product-price="<?= $product['price'] ?>">
                                        Add to Calculator
                                    </button>
                                </div>
                            </div>
                        </div>
        <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </main>
    </div>
</div>

<style>
.products-hero {
    text-align: center;
    padding: 60px 0;
}

.products-subtitle {
    font-size: 1.3em;
    margin: 20px 0;
    color: #ccc;
}

.products-content {
    display: grid;
    grid-template-columns: 300px 1fr;
    gap: 40px;
    max-width: 1400px;
    margin: 0 auto;
    padding: 20px;
}

.filters-sidebar {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    padding: 30px;
    height: fit-content;
    position: sticky;
    top: 20px;
}

.filter-section {
    margin-bottom: 30px;
}

.filter-section h3 {
    color: #64b5f6;
    margin-bottom: 20px;
    font-size: 1.2em;
}

.filter-group {
    margin-bottom: 20px;
}

.filter-group label {
    display: block;
    margin-bottom: 8px;
    color: #ccc;
    font-weight: bold;
}

.filter-group input,
.filter-group select {
    width: 100%;
    padding: 10px;
    border: 1px solid #444;
    border-radius: 5px;
    background: rgba(255, 255, 255, 0.1);
    color: #fff;
    font-size: 14px;
}

.filter-group input:focus,
.filter-group select:focus {
    outline: none;
    border-color: #64b5f6;
    box-shadow: 0 0 10px rgba(100, 181, 246, 0.3);
}

.price-inputs {
    display: flex;
    gap: 10px;
    align-items: center;
}

.price-inputs input {
    flex: 1;
}

.price-inputs span {
    color: #ccc;
}

.filter-actions {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
}

.stat-item {
    text-align: center;
    padding: 15px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 5px;
}

.stat-number {
    display: block;
    font-size: 1.5em;
    font-weight: bold;
    color: #64b5f6;
}

.stat-label {
    font-size: 0.9em;
    color: #ccc;
}

.products-main {
    min-height: 500px;
}

.products-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.products-header h2 {
    color: #64b5f6;
    margin: 0;
}

.view-options {
    display: flex;
    gap: 10px;
}

.view-btn {
    padding: 8px 16px;
    border: 1px solid #444;
    background: rgba(255, 255, 255, 0.1);
    color: #ccc;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.view-btn.active,
.view-btn:hover {
    background: #64b5f6;
    color: white;
    border-color: #64b5f6;
}

.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 30px;
}

.product-card {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    overflow: hidden;
    transition: all 0.3s ease;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    border-color: #64b5f6;
}

.product-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.product-card:hover .product-image img {
    transform: scale(1.05);
}

.product-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.product-card:hover .product-overlay {
    opacity: 1;
}

.product-info {
    padding: 20px;
}

.product-category {
    font-size: 0.9em;
    color: #64b5f6;
    text-transform: uppercase;
    font-weight: bold;
    margin-bottom: 8px;
}

.product-title {
    font-size: 1.2em;
    margin-bottom: 8px;
    color: #fff;
}

.product-brand {
    font-size: 0.9em;
    color: #ccc;
    margin-bottom: 10px;
}

.product-description {
    color: #ccc;
    font-size: 0.9em;
    line-height: 1.4;
    margin-bottom: 15px;
}

.product-price {
    font-size: 1.3em;
    font-weight: bold;
    color: #64b5f6;
    margin-bottom: 15px;
}

.product-actions {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.product-actions .btn {
    flex: 1;
    min-width: 120px;
    text-align: center;
}

.no-products {
    text-align: center;
    padding: 60px 20px;
}

.no-products-icon {
    font-size: 4em;
    margin-bottom: 20px;
}

.no-products h3 {
    color: #64b5f6;
    margin-bottom: 10px;
}

.no-products p {
    color: #ccc;
    margin-bottom: 30px;
}

/* List View */
.products-grid.list-view {
    grid-template-columns: 1fr;
}

.products-grid.list-view .product-card {
    display: grid;
    grid-template-columns: 200px 1fr auto;
    gap: 20px;
    align-items: center;
}

.products-grid.list-view .product-image {
    height: 150px;
}

.products-grid.list-view .product-info {
    padding: 20px 0;
}

.products-grid.list-view .product-actions {
    flex-direction: column;
    min-width: 150px;
}

@media (max-width: 1024px) {
    .products-content {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .filters-sidebar {
        position: static;
        order: 2;
    }
    
    .products-main {
        order: 1;
    }
}

@media (max-width: 768px) {
    .products-header {
        flex-direction: column;
        gap: 15px;
        align-items: stretch;
    }
    
    .products-grid {
        grid-template-columns: 1fr;
    }
    
    .products-grid.list-view .product-card {
        grid-template-columns: 1fr;
        text-align: center;
    }
    
    .product-actions {
        justify-content: center;
    }
}
</style>

<script>
// View switching
document.querySelectorAll('.view-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.view-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        
        const view = this.dataset.view;
        const container = document.getElementById('products-container');
        
        if (view === 'list') {
            container.classList.add('list-view');
        } else {
            container.classList.remove('list-view');
        }
    });
});

// Add to calculator functionality
document.querySelectorAll('.add-to-calculator').forEach(btn => {
    btn.addEventListener('click', function() {
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
        this.textContent = 'Added!';
        this.style.background = '#4CAF50';
        setTimeout(() => {
            this.textContent = 'Add to Calculator';
            this.style.background = '';
        }, 2000);
    });
});

// Auto-submit form on filter change
document.querySelectorAll('.filter-form select, .filter-form input').forEach(element => {
    element.addEventListener('change', function() {
        if (this.type !== 'text') {
            this.closest('form').submit();
        }
    });
});
</script>

<?php include '../includes/footer.php'; ?>

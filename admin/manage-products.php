<?php
session_start();
require_once '../includes/db.php';

// Check if user is logged in and is admin
if (!isset($_SESSION['user_id']) || empty($_SESSION['is_admin'])) {
    header("Location: ../user/login.php");
    exit;
}

// Demo mode - product actions simulation for myweb hosting
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    switch ($action) {
        case 'add':
            $success_message = "Product added successfully! (Demo mode - not permanently saved)";
            break;
            
        case 'update':
            $id = intval($_POST['id'] ?? 0);
            $name = trim($_POST['name'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $price = floatval($_POST['price'] ?? 0);
            $category = trim($_POST['category'] ?? '');
            $subcategory = trim($_POST['subcategory'] ?? '');
            $brand = trim($_POST['brand'] ?? '');
            $stock_quantity = intval($_POST['stock_quantity'] ?? 0);
            $featured = isset($_POST['featured']) ? 1 : 0;
            
            $success_message = "Product updated successfully! (Demo mode - not permanently saved)";
            break;
            
        case 'delete':
            $success_message = "Product deleted successfully! (Demo mode)";
            break;
    }
}

// Get all products with pagination
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$per_page = 10;
$offset = ($page - 1) * $per_page;

// Get total number of products for pagination
$stmt = $pdo->query("SELECT COUNT(*) as total FROM products");
$total_products = $stmt->fetch()['total'];
$total_pages = ceil($total_products / $per_page);

$stmt = $pdo->prepare("SELECT * FROM products ORDER BY created_at DESC LIMIT ? OFFSET ?");
$stmt->execute([$per_page, $offset]);
$products = $stmt->fetchAll();

$page_title = "Manage Products";
include '../includes/header.php';
?>

<div class="container">
    <section class="admin-hero">
        <h1>Manage Products</h1>
        <p class="admin-subtitle">Add, edit, and manage your product catalog</p>
    </section>

    <div class="admin-content">
        <div class="admin-sidebar">
            <nav class="admin-nav">
                <a href="dashboard.php" class="admin-nav-item">Dashboard</a>
                <a href="manage-products.php" class="admin-nav-item active">Manage Products</a>
                <a href="manage-users.php" class="admin-nav-item">Manage Users</a>
                <a href="settings.php" class="admin-nav-item">Settings</a>
                <a href="../user/logout.php" class="admin-nav-item">Logout</a>
            </nav>
        </div>

        <div class="admin-main">
            <?php if (isset($success_message)): ?>
                <div class="alert alert-success"><?php echo $success_message; ?></div>
            <?php endif; ?>
            
            <?php if (isset($error_message)): ?>
                <div class="alert alert-error"><?php echo $error_message; ?></div>
            <?php endif; ?>

            <section class="add-product">
                <h2>Add New Product</h2>
                <form method="post" class="product-form">
                    <input type="hidden" name="action" value="add">
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Product Name *</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="price">Price *</label>
                            <input type="number" id="price" name="price" step="0.01" min="0" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="category">Category *</label>
                            <select id="category" name="category" required>
                                <option value="">Select Category</option>
                                <option value="CPU">CPU</option>
                                <option value="GPU">GPU</option>
                                <option value="Motherboard">Motherboard</option>
                                <option value="RAM">RAM</option>
                                <option value="Storage">Storage</option>
                                <option value="Power Supply">Power Supply</option>
                                <option value="Case">Case</option>
                                <option value="Cooling">Cooling</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="subcategory">Subcategory</label>
                            <input type="text" id="subcategory" name="subcategory">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="brand">Brand</label>
                            <input type="text" id="brand" name="brand">
                        </div>
                        
                        <div class="form-group">
                            <label for="stock_quantity">Stock Quantity</label>
                            <input type="number" id="stock_quantity" name="stock_quantity" min="0" value="0">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" rows="4"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label class="checkbox-label">
                            <input type="checkbox" name="featured" value="1">
                            Featured Product
                        </label>
                    </div>
                    
                    <button type="submit" class="btn">Add Product</button>
                </form>
            </section>

            <section class="product-list">
                <h2>Product List (<?php echo $total_products; ?> products)</h2>
                
                <?php if (empty($products)): ?>
                    <p>No products found.</p>
                <?php else: ?>
                    <div class="products-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Featured</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $product): ?>
                                <tr>
                                    <td><?php echo $product['id']; ?></td>
                                    <td>
                                        <strong><?php echo htmlspecialchars($product['name']); ?></strong>
                                        <?php if ($product['brand']): ?>
                                            <br><small><?php echo htmlspecialchars($product['brand']); ?></small>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo htmlspecialchars($product['category']); ?></td>
                                    <td>$<?php echo number_format($product['price'], 2); ?></td>
                                    <td><?php echo $product['stock_quantity']; ?></td>
                                    <td>
                                        <span class="status-badge <?php echo $product['featured'] ? 'featured' : 'normal'; ?>">
                                            <?php echo $product['featured'] ? 'Yes' : 'No'; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-small" onclick="editProduct(<?php echo $product['id']; ?>)">Edit</button>
                                            <form method="post" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                                <input type="hidden" name="action" value="delete">
                                                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                                                <button type="submit" class="btn-small btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <?php if ($total_pages > 1): ?>
                    <div class="pagination">
                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <a href="?page=<?php echo $i; ?>" class="page-link <?php echo $i === $page ? 'active' : ''; ?>">
                                <?php echo $i; ?>
                            </a>
                        <?php endfor; ?>
                    </div>
                    <?php endif; ?>
                <?php endif; ?>
            </section>
        </div>
    </div>
</div>

<!-- Edit Product Modal -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Edit Product</h2>
        <form method="post" class="product-form">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" id="edit_id">
            
            <div class="form-row">
                <div class="form-group">
                    <label for="edit_name">Product Name *</label>
                    <input type="text" id="edit_name" name="name" required>
                </div>
                
                <div class="form-group">
                    <label for="edit_price">Price *</label>
                    <input type="number" id="edit_price" name="price" step="0.01" min="0" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="edit_category">Category *</label>
                    <select id="edit_category" name="category" required>
                        <option value="">Select Category</option>
                        <option value="CPU">CPU</option>
                        <option value="GPU">GPU</option>
                        <option value="Motherboard">Motherboard</option>
                        <option value="RAM">RAM</option>
                        <option value="Storage">Storage</option>
                        <option value="Power Supply">Power Supply</option>
                        <option value="Case">Case</option>
                        <option value="Cooling">Cooling</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="edit_subcategory">Subcategory</label>
                    <input type="text" id="edit_subcategory" name="subcategory">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="edit_brand">Brand</label>
                    <input type="text" id="edit_brand" name="brand">
                </div>
                
                <div class="form-group">
                    <label for="edit_stock_quantity">Stock Quantity</label>
                    <input type="number" id="edit_stock_quantity" name="stock_quantity" min="0">
                </div>
            </div>
            
            <div class="form-group">
                <label for="edit_description">Description</label>
                <textarea id="edit_description" name="description" rows="4"></textarea>
            </div>
            
            <div class="form-group">
                <label class="checkbox-label">
                    <input type="checkbox" id="edit_featured" name="featured" value="1">
                    Featured Product
                </label>
            </div>
            
            <button type="submit" class="btn">Update Product</button>
        </form>
    </div>
</div>

<style>
.admin-hero {
    text-align: center;
    padding: 80px 0;
    background: linear-gradient(135deg, rgba(100, 181, 246, 0.1), rgba(25, 118, 210, 0.1));
    border-radius: 15px;
    margin-bottom: 40px;
    position: relative;
    overflow: hidden;
}

.admin-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 50% 50%, rgba(100, 181, 246, 0.1), transparent 70%);
    pointer-events: none;
}

.admin-hero h1 {
    position: relative;
    z-index: 1;
    text-shadow: 0 0 20px rgba(100, 181, 246, 0.5);
}

.admin-subtitle {
    font-size: 1.3em;
    margin: 10px 0;
    color: #ccc;
    position: relative;
    z-index: 1;
}

.admin-content {
    display: grid;
    grid-template-columns: 250px 1fr;
    gap: 40px;
    margin: 40px 0;
}

.admin-sidebar {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    padding: 20px;
    height: fit-content;
}

.admin-nav {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.admin-nav-item {
    padding: 15px 20px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 8px;
    text-decoration: none;
    color: #fff;
    transition: all 0.3s ease;
    border: 1px solid transparent;
}

.admin-nav-item:hover,
.admin-nav-item.active {
    background: rgba(100, 181, 246, 0.1);
    border-color: #64b5f6;
    color: #64b5f6;
}

.admin-main {
    display: flex;
    flex-direction: column;
    gap: 40px;
}

.add-product h2,
.product-list h2 {
    margin-bottom: 20px;
    color: #64b5f6;
}

.product-form {
    background: rgba(255, 255, 255, 0.05);
    padding: 30px;
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
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

.products-table {
    overflow-x: auto;
}

.products-table table {
    width: 100%;
    border-collapse: collapse;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    overflow: hidden;
}

.products-table th,
.products-table td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.products-table th {
    background: rgba(100, 181, 246, 0.1);
    color: #64b5f6;
    font-weight: bold;
}

.products-table tr:hover {
    background: rgba(255, 255, 255, 0.05);
}

.status-badge.featured {
    background: rgba(76, 175, 80, 0.2);
    color: #4caf50;
}

.status-badge.normal {
    background: rgba(158, 158, 158, 0.2);
    color: #9e9e9e;
}

.action-buttons {
    display: flex;
    gap: 10px;
}

.btn-small {
    padding: 8px 16px;
    font-size: 14px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    background: #64b5f6;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-small:hover {
    background: #1976d2;
}

.btn-danger {
    background: #f44336;
}

.btn-danger:hover {
    background: #d32f2f;
}

.pagination {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 30px;
}

.page-link {
    padding: 10px 15px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 5px;
    text-decoration: none;
    color: #fff;
    transition: all 0.3s ease;
}

.page-link:hover,
.page-link.active {
    background: #64b5f6;
    color: white;
}

/* Modal Styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background: #1e1e1e;
    margin: 5% auto;
    padding: 30px;
    border-radius: 10px;
    width: 80%;
    max-width: 600px;
    max-height: 80vh;
    overflow-y: auto;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover {
    color: #64b5f6;
}

@media (max-width: 768px) {
    .admin-content {
        grid-template-columns: 1fr;
    }
    
    .form-row {
        grid-template-columns: 1fr;
    }
    
    .products-table {
        font-size: 14px;
    }
    
    .action-buttons {
        flex-direction: column;
    }
    
    .modal-content {
        width: 95%;
        margin: 10% auto;
    }
}
</style>

<script>
function editProduct(id) {
    // In a real application, you would fetch the product data via AJAX
    // For now, we'll show a simple alert
    alert('Edit functionality would load product data for ID: ' + id);
    
    // Show the modal
    document.getElementById('editModal').style.display = 'block';
}

// Close modal when clicking on X
document.querySelector('.close').onclick = function() {
    document.getElementById('editModal').style.display = 'none';
}

// Close modal when clicking outside of it
window.onclick = function(event) {
    var modal = document.getElementById('editModal');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
</script>

<?php include '../includes/footer.php'; ?>

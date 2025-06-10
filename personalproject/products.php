<?php
$page_title = "Products - PHP SQL Project";
include 'includes/header.php';
include 'config/database.php';

// Get database connection
$database = new Database();
$db = $database->getConnection();

// Handle form submission
if ($_POST) {
    if (isset($_POST['add_product'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        
        try {
            $query = "INSERT INTO products (name, description, price, category, created_at) VALUES (?, ?, ?, ?, NOW())";
            $stmt = $db->prepare($query);
            $stmt->execute([$name, $description, $price, $category]);
            $success_message = "Product added successfully!";
        } catch(PDOException $e) {
            $error_message = "Error adding product: " . $e->getMessage();
        }
    }
}

// Get all products
try {
    $query = "SELECT * FROM products ORDER BY created_at DESC";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $products = [];
    $error_message = "Error fetching products: " . $e->getMessage();
}
?>

<div class="row">
    <div class="col-12">
        <h2><i class="fas fa-box"></i> Products Management</h2>
        <p class="text-muted">Manage your product catalog and inventory.</p>
    </div>
</div>

<?php if (isset($success_message)): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle"></i> <?php echo $success_message; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?php if (isset($error_message)): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle"></i> <?php echo $error_message; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-plus-circle"></i> Add New Product</h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price ($)</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="">Select Category</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Clothing">Clothing</option>
                            <option value="Books">Books</option>
                            <option value="Home">Home & Garden</option>
                            <option value="Sports">Sports</option>
                        </select>
                    </div>
                    <button type="submit" name="add_product" class="btn btn-success">
                        <i class="fas fa-plus"></i> Add Product
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-list"></i> Products Catalog</h5>
            </div>
            <div class="card-body">
                <?php if (empty($products)): ?>
                    <div class="text-center py-4">
                        <i class="fas fa-box fa-3x text-muted mb-3"></i>
                        <p class="text-muted">No products found. Add your first product!</p>
                    </div>
                <?php else: ?>
                    <div class="row">
                        <?php foreach ($products as $product): ?>
                            <div class="col-md-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h6 class="card-title">
                                            <i class="fas fa-tag text-primary"></i>
                                            <?php echo htmlspecialchars($product['name']); ?>
                                        </h6>
                                        <p class="card-text">
                                            <?php echo htmlspecialchars($product['description'] ?? 'No description'); ?>
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="badge bg-secondary">
                                                <?php echo htmlspecialchars($product['category']); ?>
                                            </span>
                                            <strong class="text-success">
                                                $<?php echo number_format($product['price'], 2); ?>
                                            </strong>
                                        </div>
                                        <small class="text-muted">
                                            Added: <?php echo date('M j, Y', strtotime($product['created_at'])); ?>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

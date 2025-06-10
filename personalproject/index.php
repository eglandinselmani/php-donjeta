<?php
$page_title = "Home - PHP SQL Project";
include 'includes/header.php';
include 'config/database.php';

// Get database connection
$database = new Database();
$db = $database->getConnection();

// Get some statistics
try {
    $user_count = $db->query("SELECT COUNT(*) FROM users")->fetchColumn();
    $product_count = $db->query("SELECT COUNT(*) FROM products")->fetchColumn();
} catch(PDOException $e) {
    $user_count = 0;
    $product_count = 0;
}
?>

<div class="row">
    <div class="col-12">
        <div class="jumbotron bg-primary text-white p-5 rounded mb-4">
            <h1 class="display-4">Welcome to PHP SQL Project</h1>
            <p class="lead">A complete web application demonstrating PHP and MySQL integration with multiple interconnected pages.</p>
            <hr class="my-4">
            <p>Explore our users, products, and learn more about our project.</p>
            <a class="btn btn-light btn-lg" href="users.php" role="button">
                <i class="fas fa-users"></i> View Users
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body text-center">
                <i class="fas fa-users fa-3x text-primary mb-3"></i>
                <h5 class="card-title">Users Management</h5>
                <p class="card-text">Manage user accounts, view profiles, and handle user data efficiently.</p>
                <h3 class="text-primary"><?php echo $user_count; ?></h3>
                <p class="text-muted">Total Users</p>
                <a href="users.php" class="btn btn-primary">View Users</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body text-center">
                <i class="fas fa-box fa-3x text-success mb-3"></i>
                <h5 class="card-title">Products Catalog</h5>
                <p class="card-text">Browse our product catalog, manage inventory, and track product details.</p>
                <h3 class="text-success"><?php echo $product_count; ?></h3>
                <p class="text-muted">Total Products</p>
                <a href="products.php" class="btn btn-success">View Products</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body text-center">
                <i class="fas fa-chart-line fa-3x text-warning mb-3"></i>
                <h5 class="card-title">Analytics</h5>
                <p class="card-text">View detailed analytics and reports about your data and system performance.</p>
                <h3 class="text-warning">Live</h3>
                <p class="text-muted">Real-time Data</p>
                <a href="about.php" class="btn btn-warning">Learn More</a>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-info-circle"></i> Project Features</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success"></i> PHP & MySQL Integration</li>
                            <li><i class="fas fa-check text-success"></i> Responsive Bootstrap Design</li>
                            <li><i class="fas fa-check text-success"></i> CRUD Operations</li>
                            <li><i class="fas fa-check text-success"></i> Database Connection Management</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success"></i> Multi-page Navigation</li>
                            <li><i class="fas fa-check text-success"></i> Form Handling</li>
                            <li><i class="fas fa-check text-success"></i> Error Handling</li>
                            <li><i class="fas fa-check text-success"></i> Modern UI Components</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

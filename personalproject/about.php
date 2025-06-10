<?php
$page_title = "About - PHP SQL Project";
include 'includes/header.php';
include 'config/database.php';

// Get database connection for statistics
$database = new Database();
$db = $database->getConnection();

// Get statistics
try {
    $user_count = $db->query("SELECT COUNT(*) FROM users")->fetchColumn();
    $product_count = $db->query("SELECT COUNT(*) FROM products")->fetchColumn();
    $latest_user = $db->query("SELECT name FROM users ORDER BY created_at DESC LIMIT 1")->fetchColumn();
    $latest_product = $db->query("SELECT name FROM products ORDER BY created_at DESC LIMIT 1")->fetchColumn();
} catch(PDOException $e) {
    $user_count = 0;
    $product_count = 0;
    $latest_user = "None";
    $latest_product = "None";
}
?>

<div class="row">
    <div class="col-12">
        <h2><i class="fas fa-info-circle"></i> About This Project</h2>
        <p class="lead">Learn more about our PHP and MySQL integrated web application.</p>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-code"></i> Project Overview</h5>
            </div>
            <div class="card-body">
                <p>This is a comprehensive PHP web application that demonstrates the integration of PHP with MySQL database. The project showcases modern web development practices with a clean, responsive design.</p>
                
                <h6><i class="fas fa-star"></i> Key Features:</h6>
                <ul>
                    <li><strong>Database Integration:</strong> Full MySQL database connectivity with PDO</li>
                    <li><strong>CRUD Operations:</strong> Create, Read, Update, and Delete functionality</li>
                    <li><strong>Responsive Design:</strong> Bootstrap-powered responsive layout</li>
                    <li><strong>Multi-page Navigation:</strong> Seamless navigation between pages</li>
                    <li><strong>Form Handling:</strong> Secure form processing and validation</li>
                    <li><strong>Error Management:</strong> Comprehensive error handling and user feedback</li>
                </ul>

                <h6><i class="fas fa-tools"></i> Technologies Used:</h6>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <li><i class="fab fa-php text-primary"></i> PHP 7.4+</li>
                            <li><i class="fas fa-database text-info"></i> MySQL Database</li>
                            <li><i class="fab fa-bootstrap text-purple"></i> Bootstrap 5</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <li><i class="fab fa-html5 text-danger"></i> HTML5</li>
                            <li><i class="fab fa-css3-alt text-primary"></i> CSS3</li>
                            <li><i class="fab fa-js text-warning"></i> JavaScript</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5><i class="fas fa-database"></i> Database Structure</h5>
            </div>
            <div class="card-body">
                <p>The application uses two main database tables:</p>
                
                <div class="row">
                    <div class="col-md-6">
                        <h6><i class="fas fa-table text-primary"></i> Users Table</h6>
                        <ul class="small">
                            <li>id (Primary Key)</li>
                            <li>name (VARCHAR)</li>
                            <li>email (VARCHAR)</li>
                            <li>phone (VARCHAR)</li>
                            <li>created_at (TIMESTAMP)</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6><i class="fas fa-table text-success"></i> Products Table</h6>
                        <ul class="small">
                            <li>id (Primary Key)</li>
                            <li>name (VARCHAR)</li>
                            <li>description (TEXT)</li>
                            <li>price (DECIMAL)</li>
                            <li>category (VARCHAR)</li>
                            <li>created_at (TIMESTAMP)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-chart-bar"></i> Live Statistics</h5>
            </div>
            <div class="card-body">
                <div class="text-center mb-3">
                    <h3 class="text-primary"><?php echo $user_count; ?></h3>
                    <p class="text-muted mb-0">Total Users</p>
                </div>
                <div class="text-center mb-3">
                    <h3 class="text-success"><?php echo $product_count; ?></h3>
                    <p class="text-muted mb-0">Total Products</p>
                </div>
                <hr>
                <div class="small">
                    <p><strong>Latest User:</strong><br>
                    <span class="text-muted"><?php echo htmlspecialchars($latest_user ?: 'None'); ?></span></p>
                    <p><strong>Latest Product:</strong><br>
                    <span class="text-muted"><?php echo htmlspecialchars($latest_product ?: 'None'); ?></span></p>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5><i class="fas fa-link"></i> Quick Links</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="users.php" class="btn btn-outline-primary">
                        <i class="fas fa-users"></i> Manage Users
                    </a>
                    <a href="products.php" class="btn btn-outline-success">
                        <i class="fas fa-box"></i> Manage Products
                    </a>
                    <a href="contact.php" class="btn btn-outline-info">
                        <i class="fas fa-envelope"></i> Contact Us
                    </a>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5><i class="fas fa-info"></i> Project Info</h5>
            </div>
            <div class="card-body small">
                <p><strong>Version:</strong> 1.0.0</p>
                <p><strong>Created:</strong> <?php echo date('Y'); ?></p>
                <p><strong>License:</strong> MIT</p>
                <p><strong>Status:</strong> <span class="badge bg-success">Active</span></p>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

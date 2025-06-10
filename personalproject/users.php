<?php
$page_title = "Users - PHP SQL Project";
include 'includes/header.php';
include 'config/database.php';

// Get database connection
$database = new Database();
$db = $database->getConnection();

// Handle form submission
if ($_POST) {
    if (isset($_POST['add_user'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        
        try {
            $query = "INSERT INTO users (name, email, phone, created_at) VALUES (?, ?, ?, NOW())";
            $stmt = $db->prepare($query);
            $stmt->execute([$name, $email, $phone]);
            $success_message = "User added successfully!";
        } catch(PDOException $e) {
            $error_message = "Error adding user: " . $e->getMessage();
        }
    }
}

// Get all users
try {
    $query = "SELECT * FROM users ORDER BY created_at DESC";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $users = [];
    $error_message = "Error fetching users: " . $e->getMessage();
}
?>

<div class="row">
    <div class="col-12">
        <h2><i class="fas fa-users"></i> Users Management</h2>
        <p class="text-muted">Manage user accounts and view user information.</p>
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
                <h5><i class="fas fa-user-plus"></i> Add New User</h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone">
                    </div>
                    <button type="submit" name="add_user" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add User
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-list"></i> Users List</h5>
            </div>
            <div class="card-body">
                <?php if (empty($users)): ?>
                    <div class="text-center py-4">
                        <i class="fas fa-users fa-3x text-muted mb-3"></i>
                        <p class="text-muted">No users found. Add your first user!</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($user['id']); ?></td>
                                        <td>
                                            <i class="fas fa-user text-primary"></i>
                                            <?php echo htmlspecialchars($user['name']); ?>
                                        </td>
                                        <td>
                                            <i class="fas fa-envelope text-muted"></i>
                                            <?php echo htmlspecialchars($user['email']); ?>
                                        </td>
                                        <td>
                                            <i class="fas fa-phone text-muted"></i>
                                            <?php echo htmlspecialchars($user['phone'] ?? 'N/A'); ?>
                                        </td>
                                        <td>
                                            <small class="text-muted">
                                                <?php echo date('M j, Y', strtotime($user['created_at'])); ?>
                                            </small>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

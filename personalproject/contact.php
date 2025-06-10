<?php
$page_title = "Contact - PHP SQL Project";
include 'includes/header.php';
include 'config/database.php';

// Get database connection
$database = new Database();
$db = $database->getConnection();

// Handle form submission
if ($_POST) {
    if (isset($_POST['send_message'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        
        try {
            // Create contacts table if it doesn't exist
            $create_table = "CREATE TABLE IF NOT EXISTS contacts (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100) NOT NULL,
                email VARCHAR(100) NOT NULL,
                subject VARCHAR(200) NOT NULL,
                message TEXT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";
            $db->exec($create_table);
            
            // Insert contact message
            $query = "INSERT INTO contacts (name, email, subject, message, created_at) VALUES (?, ?, ?, ?, NOW())";
            $stmt = $db->prepare($query);
            $stmt->execute([$name, $email, $subject, $message]);
            $success_message = "Thank you! Your message has been sent successfully.";
        } catch(PDOException $e) {
            $error_message = "Error sending message: " . $e->getMessage();
        }
    }
}
?>

<div class="row">
    <div class="col-12">
        <h2><i class="fas fa-envelope"></i> Contact Us</h2>
        <p class="text-muted">Get in touch with us. We'd love to hear from you!</p>
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
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-paper-plane"></i> Send us a Message</h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" name="send_message" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-info-circle"></i> Contact Information</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <h6><i class="fas fa-map-marker-alt text-danger"></i> Address</h6>
                    <p class="text-muted small">123 Web Development Street<br>
                    Code City, CC 12345<br>
                    United States</p>
                </div>
                
                <div class="mb-3">
                    <h6><i class="fas fa-phone text-success"></i> Phone</h6>
                    <p class="text-muted small">+1 (555) 123-4567</p>
                </div>
                
                <div class="mb-3">
                    <h6><i class="fas fa-envelope text-primary"></i> Email</h6>
                    <p class="text-muted small">info@phpproject.com</p>
                </div>
                
                <div class="mb-3">
                    <h6><i class="fas fa-clock text-warning"></i> Business Hours</h6>
                    <p class="text-muted small">
                        Monday - Friday: 9:00 AM - 6:00 PM<br>
                        Saturday: 10:00 AM - 4:00 PM<br>
                        Sunday: Closed
                    </p>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5><i class="fas fa-question-circle"></i> FAQ</h5>
            </div>
            <div class="card-body">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                                How do I add users?
                            </button>
                        </h2>
                        <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body small">
                                Navigate to the Users page and use the "Add New User" form to create new user accounts.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                                How do I manage products?
                            </button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body small">
                                Go to the Products page where you can add new products and view your product catalog.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

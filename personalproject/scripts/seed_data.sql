-- Use the database
USE php_project_db;

-- Insert sample users
INSERT INTO users (name, email, phone) VALUES
('John Doe', 'john.doe@example.com', '+1-555-0101'),
('Jane Smith', 'jane.smith@example.com', '+1-555-0102'),
('Mike Johnson', 'mike.johnson@example.com', '+1-555-0103'),
('Sarah Wilson', 'sarah.wilson@example.com', '+1-555-0104'),
('David Brown', 'david.brown@example.com', '+1-555-0105');

-- Insert sample products
INSERT INTO products (name, description, price, category) VALUES
('Laptop Computer', 'High-performance laptop for work and gaming', 999.99, 'Electronics'),
('Wireless Headphones', 'Noise-cancelling wireless headphones', 199.99, 'Electronics'),
('Cotton T-Shirt', 'Comfortable 100% cotton t-shirt', 24.99, 'Clothing'),
('Programming Book', 'Learn PHP and MySQL development', 49.99, 'Books'),
('Garden Tools Set', 'Complete set of gardening tools', 79.99, 'Home'),
('Basketball', 'Official size basketball', 29.99, 'Sports'),
('Smartphone', 'Latest model smartphone with advanced features', 699.99, 'Electronics'),
('Jeans', 'Classic blue denim jeans', 59.99, 'Clothing');

-- Insert sample contact messages
INSERT INTO contacts (name, email, subject, message) VALUES
('Alice Cooper', 'alice@example.com', 'Great Project!', 'I love the design and functionality of this PHP project.'),
('Bob Martin', 'bob@example.com', 'Question about Features', 'Can you add more advanced features to the user management?'),
('Carol Davis', 'carol@example.com', 'Feedback', 'The product catalog works perfectly. Great job!');

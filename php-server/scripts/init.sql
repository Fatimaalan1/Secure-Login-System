CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, -- Ensure this can hold the hash length
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username, password, role) VALUES ('admin_username', '$2y$10$gCi3aXJg4/oZcqpRKHbkaOj4m3Z.i9o/p6h2AySXhNko1/3zxwg3y', 'admin');

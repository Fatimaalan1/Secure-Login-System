CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, -- Ensure this can hold the hash length
    role VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert the admin with a SHA2 hash (change 'admin_password' to your desired password)
INSERT INTO users (username, password, role) 
VALUES ('admin_username', SHA2('password', 256), 'admin');
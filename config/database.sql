CREATE DATABASE IF NOT EXISTS naruto_anime_wiki;
USE naruto_anime_wiki;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Password: admin123 / user123 (hashed with password_hash)
INSERT INTO users (username, password, role) VALUES
('admin', '$2y$10$LSuk2ePh/q0KuOMivwNiPuCztta1zalqU4TYWo6sttjAI4NKLgp0G', 'admin'),
('user', '$2y$10$AAkka8fQ93GaEQq3KY/SquUa0hJirMfCS9nwQv9/5X417RWkjhH.u', 'user');
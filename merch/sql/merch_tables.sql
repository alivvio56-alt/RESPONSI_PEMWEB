-- Jalankan file ini di database naruto_anime_wiki.
-- File config/database.php tidak diubah.

CREATE TABLE IF NOT EXISTS merch_products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    category VARCHAR(80) NOT NULL,
    price INT NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    image VARCHAR(255) NOT NULL DEFAULT '../img/naruto-poster.jpg',
    description TEXT NULL,
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS merch_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    user_id INT NULL,
    buyer_name VARCHAR(120) NOT NULL,
    buyer_phone VARCHAR(30) NOT NULL,
    buyer_address TEXT NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    total_price INT NOT NULL,
    status ENUM('pending','processed','completed','cancelled') NOT NULL DEFAULT 'pending',
    notes TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_merch_orders_product FOREIGN KEY (product_id) REFERENCES merch_products(id) ON DELETE RESTRICT,
    CONSTRAINT fk_merch_orders_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

INSERT INTO merch_products (name, category, price, stock, image, description, is_active) VALUES
('Akatsuki Hoodie', 'Apparel', 250000, 10, '../img/shippuden.jpg', 'Hoodie tema Akatsuki untuk koleksi fan Naruto.', 1),
('Naruto Collector Poster', 'Poster', 85000, 20, '../img/naruto-poster.jpg', 'Poster kolektor Naruto.', 1),
('Boruto Collector Poster', 'Poster', 85000, 20, '../img/boruto-poster.jpg', 'Poster kolektor Boruto.', 1),
('Shippuden Collector Poster', 'Poster', 95000, 15, '../img/shippuden-poster.jpg', 'Poster kolektor Shippuden.', 1),
('Naruto Logo Tee', 'Apparel', 145000, 12, '../img/narutoo.jpg', 'Kaos logo Naruto.', 1),
('Boruto Blue Vortex Print', 'Art Print', 75000, 18, '../img/boruto.container.jpg', 'Art print Boruto Blue Vortex.', 1)
ON DUPLICATE KEY UPDATE name = VALUES(name);

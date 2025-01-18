-- Buat database jika belum ada
CREATE DATABASE IF NOT EXISTS financial_records;
USE financial_records;

-- Buat tabel users
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL, -- Password plaintext
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Buat tabel records
CREATE TABLE IF NOT EXISTS records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    description VARCHAR(255) NOT NULL,
    amount FLOAT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Masukkan pengguna dengan password plaintext
INSERT INTO users (username, password) 
VALUES ('admin', '12345'); -- Password langsung disimpan

-- Masukkan contoh data records
INSERT INTO records (user_id, description, amount) 
VALUES (1, 'Initial deposit', 1000.00);

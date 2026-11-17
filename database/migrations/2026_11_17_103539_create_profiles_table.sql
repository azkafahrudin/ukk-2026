CREATE TABLE IF NOT EXISTS `profiles` (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_user INT UNSIGNED NOT NULL,
    nama_lengkap VARCHAR(255) NULL,
    nis_nisn VARCHAR(50) NULL,
    kelas VARCHAR(50) NULL,
    no_telepon VARCHAR(20) NULL,
    alamat TEXT NULL,
    created_at DATETIME NULL,
    updated_at DATETIME NULL,
    FOREIGN KEY (id_user) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
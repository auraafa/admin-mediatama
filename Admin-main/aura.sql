
use aura_db;

CREATE DATABASE aura_db;
CREATE TABLE dokumen_admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_file VARCHAR(255),
    path_file VARCHAR(255),
    tanggal_upload DATETIME DEFAULT CURRENT_TIMESTAMP
);

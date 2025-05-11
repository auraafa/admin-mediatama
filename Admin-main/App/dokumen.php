<?php

// Proses upload file
if (isset($_POST['upload'])) {
    $file = $_FILES['file'];
    $namaFile = basename($file['name']);
    $targetDir = "uploads/";
    $targetPath = $targetDir . $namaFile;
    $fileType = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));
    $allowedTypes = ['pdf', 'docx', 'doc', 'xls', 'xlsx'];

    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    if (!in_array($fileType, $allowedTypes)) {
        $pesan = "❌ Tipe file tidak diizinkan.";
    } elseif (move_uploaded_file($file['tmp_name'], $targetPath)) {
        $stmt = $koneksi->prepare("INSERT INTO tb_dokumen (nama_file, path_file) VALUES (?, ?)");
        $stmt->bind_param("ss", $namaFile, $targetPath);
        $stmt->execute();
        $pesan = "✅ File berhasil diupload.";
    } else {
        $pesan = "❌ Upload gagal.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Dokumen</title>
    <style>
        body { font-family: Arial; padding: 20px; background-color:hsl(240, 2.10%, 90.80%); }
        .box {
            max-width: 800px;
            margin: auto;
            background: white;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 8px rgba(0,0,0,0.1);
        }
        button, a.btn {
            padding: 6px 12px;
            margin-right: 5px;
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        a.btn-download { background-color: #28a745; }
        a.btn-view { background-color: #17a2b8; }
        a.btn-delete { background-color: #dc3545; }
        .pesan { margin: 10px 0; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Dokumen</h2>

        <?php if (isset($pesan)) echo "<div class='pesan'>$pesan</div>"; ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <label>Pilih File:</label><br> <input type="file" name="file" required>
            
            <button type="submit" name="upload">Upload</button>
        </form>

        <hr>

        <h3>Daftar Dokumen</h3>
        <table>
            <tr>
                <th>Nama File</th>
                <th>Tanggal Upload</th>
                <th>Aksi</th>
            </tr>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM tb_dokumen ORDER BY tanggal_upload DESC");
            while ($d = mysqli_fetch_array($query)) {
                $file = $d['path_file'];
                echo "<tr>
                    <td>{$d['nama_file']}</td>
                    <td>{$d['tanggal_upload']}</td>
                    <td>
                        <a class='btn btn-view' href='{$file}' target='_blank'>Lihat</a>
                        <a class='btn btn-download' href='{$file}' download>Download</a>
                        <a class='btn btn-delete' href='backend/hapus_dokumen.php?id={$d['id']}' onclick='return confirm(\"Yakin hapus file?\")'>Hapus</a>
                    </td>
                </tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>

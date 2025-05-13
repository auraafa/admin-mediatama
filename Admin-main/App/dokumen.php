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
        .box {
            max-width: 900px; /* widened container */
            margin: auto;
            background: white;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .pesan {
            margin: 10px 0;
            font-weight: bold;
            background-color: #e7f3fe;
            color: #31708f;
            border: 1px solid #bce8f1;
            padding: 10px;
            border-radius: 5px;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        input[type="file"] {
            margin-bottom: 10px;
        }
        button, a.btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 12px;
            margin-right: 5px;
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: background-color 0.3s;
            white-space: nowrap;
        }
        button:hover, a.btn:hover {
            opacity: 0.85;
        }
        a.btn-download { background-color: #28a745; }
        a.btn-view { background-color: #17a2b8; }
        a.btn-delete { background-color: #dc3545; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 0.9rem;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            vertical-align: middle;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        /* Flex container for action buttons to keep them horizontal and with spacing */
        td.action-buttons {
            display: flex;
            gap: 6px;
            padding: 10px 8px;
        }
        td.action-buttons > a.btn {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="box">
        <h2>Arsip Dokumen</h2>

        <?php if (isset($pesan)) echo "<div class='pesan'>$pesan</div>"; ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <label>Pilih File:</label>
            <input type="file" name="file" required>
            <button type="submit" name="upload">Upload</button>
        </form>

        <hr>

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
                    <td class='action-buttons'>
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


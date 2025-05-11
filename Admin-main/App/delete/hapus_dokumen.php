<?php
include('../../conf/config.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Ambil data file berdasarkan ID
    $result = mysqli_query($conn, "SELECT * FROM tb_dokumen WHERE id = $id");
    $data = mysqli_fetch_assoc($result);

    if ($data) {
        $filePath = $data['path_file'];

        // Hapus file fisik
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Hapus dari database
        mysqli_query($conn, "DELETE FROM tb_dokumen WHERE id = $id");
    }
}

header('Location: ../index.php?page=dokumen');
exit;
?>

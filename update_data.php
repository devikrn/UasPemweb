<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];

    $sql = "UPDATE data_buku SET judul='$judul', penulis='$penulis', penerbit='$penerbit' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: form_buku.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

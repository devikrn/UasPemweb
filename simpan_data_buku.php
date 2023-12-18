<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tersedia = $_POST['tersedia']; // Assuming this corresponds to the radio button value (1 or 0)

    $sql = "INSERT INTO data_buku (judul, penulis, penerbit, tersedia) VALUES ('$judul', '$penulis', '$penerbit', $tersedia)";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: form_buku.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

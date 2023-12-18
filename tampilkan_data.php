<?php
include 'koneksi.php';

$filter_judul = isset($_GET['filter_judul']) ? $_GET['filter_judul'] : '';
$filter_condition = $filter_judul ? "WHERE judul LIKE '%$filter_judul%'" : '';

$sql = "SELECT * FROM data_buku $filter_condition";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['judul'] . "</td>";
        echo "<td>" . $row['penulis'] . "</td>";
        echo "<td>" . $row['penerbit'] . "</td>";
        echo "<td>" . ($row['tersedia'] ? 'Tersedia' : 'Tidak Tersedia') . "</td>";
        echo "<td><a href='edit_data_buku.php?id=" . $row['id'] . "'>Edit</a> | <a href='hapus_data_buku.php?id=" . $row['id'] . "'>Hapus</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
}

$conn->close();
?>

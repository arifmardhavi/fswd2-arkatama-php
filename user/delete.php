// delete.php
<?php
 include 'koneksi.php';

 session_start();

// Pengecekan sesi
if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: index.php");
    exit();
} 


// Ambil data ID dari URL
$id = $_GET["id"];
// Query untuk menghapus data berdasarkan ID
$sql = "DELETE FROM users WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    // Redirect ke halaman utama setelah berhasil menghapus data
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
?>

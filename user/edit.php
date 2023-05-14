
<?php
 include 'koneksi.php';

 session_start();

// Pengecekan sesi
if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: index.php");
    exit();
} 


 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $role = $_POST["role"];
    $password = $_POST["password"];

    // Query untuk membaca data avatar berdasarkan ID
    $sqlAvatar = "SELECT avatar FROM users WHERE id='$id'";
    $resultAvatar = $conn->query($sqlAvatar);

    if ($resultAvatar->num_rows == 1) {
        $rowAvatar = $resultAvatar->fetch_assoc();
        $avatar = $rowAvatar["avatar"];
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }

    // Mengambil data file avatar yang diunggah
    $avatarFile = $_FILES['avatar']['name'];

    // Cek apakah ada file avatar yang diunggah
    if (!empty($avatarFile)) {
        $ekstensi_diperbolehkan = array('png', 'jpg');
        $x = explode('.', $avatarFile);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['avatar']['tmp_name'];

        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            // Mengupload avatar baru
            move_uploaded_file($file_tmp, 'avatar/' . $avatarFile);
            $avatar = $avatarFile;
        }
    }

    // Query untuk mengubah data ke tabel
    $sql = "UPDATE users SET name='$name', email='$email', avatar='$avatar', address='$address', phone='$phone', role='$role', password='$password' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        // Redirect ke halaman utama setelah berhasil mengubah data
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Ambil data ID dari URL
$id = $_GET["id"];

// Mengambil data role dari tabel role
$sqlRole = "SELECT * FROM role";
$resultRole = $conn->query($sqlRole);
// Query untuk membaca data berdasarkan ID
$sql = "SELECT * FROM users WHERE id='$id'";
$result = $conn->query($sql);

// Memeriksa apakah data ditemukan
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $name = $row["name"];
    $email = $row["email"];
    $avatar = $row["avatar"];
    $address = $row["address"];
    $phone = $row["phone"];
    $role = $row["role"];
    $password = $row["password"];
} else {
    echo "Data tidak ditemukan.";
    exit();
}

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>tambah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>   
    <div class="container">
    <h2 class="mb-3 mt-3">Edit pengguna</h2>
    <form action="edit.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $id ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nama lengkap" value="<?= $name ?>" required>
        </div>
        <div class="mb-3 row">
            <div class="col-md-6">
            <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="">Pilih Role</option>
                            <?php
                            while ($rowRole = $resultRole->fetch_assoc()) {
                                $role_id = $rowRole["id"];
                                $role_name = $rowRole["role_name"];
                                echo "<option value=\"$role_id\">$role_name</option>";
                            }
                            ?>
                        </select>
                    </div>
            </div>
            <div class="col-md-6">
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?= $password ?>">
            </div>
            </div>
        </div>
        
        <div class="mb-3 row">
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="<?= $email ?>">
            </div>
            <div class="col-md-6">
            <div class="mb-3">
                <label for="phone" class="form-label">Telp</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="08199987262" value="<?= $phone ?>">
            </div>
            </div>
        </div>
        <div class="mb-3">
                <label for="address" class="form-label">Alamat lengkap</label>
                <textarea type="text" class="form-control" id="address" name="address" ><?= $address ?></textarea>
        </div>
        <div class="mb-3">
                <label for="avatar" class="form-label">Unggah Foto</label>
                <input type="hidden" name="oldImage" value=<?= $avatar ?>>
                <?php
                    if (isset($_POST["avatar"])) {
                    echo "<img src=\"avatar/{$_POST["avatar"]}\" class='img-preview img-fluid mb-3 col-sm-5 d-block'>";
                    }
                    else {
                    echo "<img class='img-preview'>";
                    }
                ?>
                <input type="file" class="form-control" id="avatar" name="avatar" onchange="previewImage()">
        </div>
        <button type="submit" class="btn btn-primary mb-3">Edit</button>
    </div>
    </form>
</body>
<script>
    function previewImage(){
        const image = document.querySelector('#avatar');
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
</html>

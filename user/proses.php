<?php
session_start();

include 'koneksi.php';
echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ' crossorigin='anonymous'>";
if(isset($_SESSION['isLoggedIn'])){
	$isLoggedIn = $_SESSION['isLoggedIn'] ? true : false;
}else{
	$isLoggedIn = false;
}

if($isLoggedIn){
	// echo "User already login"; 
    header("Location: dashboard.php");
}else{
	$postedEmail= isset($_POST['email']) ? $_POST['email'] : null;
	$postedPassword= isset($_POST['password']) ? $_POST['password'] : null;
	
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    
    // Memeriksa apakah ada data yang ditemukan
    if ($result->num_rows > 0) {
        // Menampilkan data
        while ($row = $result->fetch_assoc()) {
            if($postedEmail == $row['email']){
                $passwordValid = $postedPassword ==  $row['password'];
                
                if($passwordValid){
                    $_SESSION["email"] = $row['email'];
                    $_SESSION["isLoggedIn"] = true;
                    header("Location: dashboard.php");
                    exit();
                }else{
                    echo "<div class='cantainer ps-5 pe-5'>";
                    echo "<div class='alert alert-danger mt-3' role='alert'> Password salah </div>";
                    echo "</div>";
                }
                break;
            }else{
                echo "<div class='cantainer ps-5 pe-5'>";
                echo "<div class='alert alert-danger mt-3' role='alert'> Email salah </div>";
                echo "</div>";
            }
        }
    }		
}
<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        // Proses login
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Contoh verifikasi sederhana
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashed_password_from_database = $row['password'];

            // Verifikasi password
            if (password_verify($password, $hashed_password_from_database)) {
                // Login berhasil
                echo "Login berhasil";
                
                // Redirect to home page
                header("Location: home.html");
                exit(); // Make sure to exit to stop further script execution
            } else {
                // Password salah
                echo "Login gagal";
            }
        } else {
            // Email tidak ditemukan
            echo "Login gagal";
        }
    } elseif (isset($_POST['signup'])) {
        // Proses signup
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Contoh enkripsi sederhana
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users (full_name, email, password) VALUES ('$full_name', '$email', '$hashed_password')";
        if ($conn->query($sql) === TRUE) {
            echo "Signup berhasil";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
$conn->close();
?>

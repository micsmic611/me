<?php
// เชื่อมต่อกับฐานข้อมูล MySQL
$servername = "localhost";
$username = "ชื่อผู้ใช้";
$password = "รหัสผ่าน";
$dbname = "ชื่อฐานข้อมูล";
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับข้อมูลจากแบบฟอร์ม
$username = $_POST['username'];
$password = $_POST['password'];

// ตรวจสอบข้อมูลการเข้าสู่ระบบ
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // หากพบบัญชีผู้ใช้
    session_start();
    $_SESSION['username'] = $username;
    // เข้าสู่ระบบสำเร็จ ให้ redirect ไปยัง main.html
    header('Location: หน้าหลัก.html');
    exit();
} else {
    // หากไม่พบบัญชีผู้ใช้
    echo "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
}

$conn->close();
?>

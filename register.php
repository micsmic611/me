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
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

// ตรวจสอบความถูกต้องของข้อมูล (สามารถทำเพิ่มเติมได้ตามที่ต้องการ)

// เพิ่มข้อมูลผู้ใช้ใหม่ลงในฐานข้อมูล
$sql = "INSERT INTO users (firstname, lastname, email, username, password) VALUES ('$firstname', '$lastname', '$email', '$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "บัญชีผู้ใช้ถูกสร้างเรียบร้อยแล้ว";
    header('Location: หน้าหลัก.html');
    exit();
} else {
    echo "เกิดข้อผิดพลาดในการสร้างบัญชีผู้ใช้: " . $conn->error;
}

$conn->close();
?>

<?php
// ตรวจสอบการส่งข้อมูลจากฟอร์ม
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // เชื่อมต่อฐานข้อมูล (ค่าต้องเปลี่ยนเป็นข้อมูลการเชื่อมต่อจริง)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "invoicemgsys";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // ตรวจสอบการเชื่อมต่อ
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // รับข้อมูลจากฟอร์ม
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // สร้างคำสั่ง SQL เพื่อเพิ่มข้อมูลลงในฐานข้อมูล
    $sql = "INSERT INTO users (name, username, email, phone, password) VALUES ('$name', '$username', '$email', '$phone', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "User added successfully.";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'user_list.php';
                }, 3000); // 3000 milliseconds = 3 seconds
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    

    // ปิดการเชื่อมต่อ
    $conn->close();
    
}
?>

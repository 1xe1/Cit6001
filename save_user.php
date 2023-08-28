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
    $id = $_POST["id"];
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Get the maximum motorcycle_id
    $max_motorcycle_id_query = "SELECT MAX(id) AS max_motorcycle_id FROM users";
        $max_motorcycle_id_result = $conn->query($max_motorcycle_id_query);
        $max_motorcycle_id_row = $max_motorcycle_id_result->fetch_assoc();
        $max_motorcycle_id = $max_motorcycle_id_row['max_motorcycle_id'];
    
    // Increment the maximum motorcycle_id
    $new_motorcycle_id = $max_motorcycle_id + 1;

    // สร้างคำสั่ง SQL เพื่อเพิ่มข้อมูลลงในฐานข้อมูล
    $sql = "INSERT INTO users (id, name, username, email, phone, password) VALUES ('$new_motorcycle_id','$name', '$username', '$email', '$phone', '$password')";

    if ($conn->query($sql) === TRUE) {
        // echo "User added successfully.";
        // echo "<script>
        //         setTimeout(function() {
        //             window.location.href = 'user_list.php';
        //         }, 3000); // 3000 milliseconds = 3 seconds
        //       </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    

    // ปิดการเชื่อมต่อ
    $conn->close();
    
}
?>

<?php
// ทำการเชื่อมต่อฐานข้อมูล MySQL
$connection = mysqli_connect("localhost", "root", "", "invoicemgsys");

// ตรวจสอบการเชื่อมต่อ
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // อัปเดตข้อมูลผู้ใช้ในฐานข้อมูล
    $query = "UPDATE users SET name = '$name', email = '$email', phone = '$phone', password = '$password' WHERE id = $id";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "User updated successfully.";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'user_list.php';
                }, 3000); // 3000 milliseconds = 3 seconds
              </script>";
    } else {
        echo "Error updating user: " . mysqli_error($connection);
    }
}

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($connection);
?>

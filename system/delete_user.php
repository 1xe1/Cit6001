<?php
// ทำการเชื่อมต่อฐานข้อมูล MySQL
$connection = mysqli_connect("localhost", "root", "", "invoicemgsys");

// ตรวจสอบการเชื่อมต่อ
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['username'])) {
    $username = $_GET['username'];

    // ลบผู้ใช้งานจากฐานข้อมูล
    $deleteQuery = "DELETE FROM users WHERE username = '$username'";
    $deleteResult = mysqli_query($connection, $deleteQuery);

    if ($deleteResult) {
        // ทำการลบข้อมูลสำเร็จ
        echo "User '$username' has been deleted successfully.";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'user_list.php';
                }, 3000); // 3000 milliseconds = 3 seconds
              </script>";
    } else {
        // ไม่สามารถลบข้อมูลได้
        echo "Error deleting user: " . mysqli_error($connection);
    }

}

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($connection);
?>

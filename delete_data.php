<?php
// เชื่อมต่อฐานข้อมูล MySQL
$connection = mysqli_connect("localhost", "root", "", "invoicemgsys");

// ตรวจสอบการเชื่อมต่อ
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // ลบสินค้าจากตาราง "products"
    $deleteQuery = "DELETE FROM products WHERE product_id = '$product_id'";
    $deleteResult = mysqli_query($connection, $deleteQuery);

    if ($deleteResult) {
        // ทำการลบข้อมูลสินค้าสำเร็จ
        echo "Product with ID '$product_id' has been deleted successfully.";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'ProductList.php';
                }, 3000); // 3000 milliseconds = 3 seconds
              </script>";
    } else {
        // ไม่สามารถลบข้อมูลสินค้าได้
        echo "Error deleting product: " . mysqli_error($connection);
    }
}

if (isset($_GET['username'])) {
    $username = $_GET['username'];

    // ลบผู้ใช้งานจากฐานข้อมูล
    $deleteQuery = "DELETE FROM users WHERE username = '$username'";
    $deleteResult = mysqli_query($connection, $deleteQuery);

    if ($deleteResult) {
        // ทำการลบข้อมูลผู้ใช้สำเร็จ
        echo "User '$username' has been deleted successfully.";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'user_list.php';
                }, 3000); // 3000 milliseconds = 3 seconds
              </script>";
    } else {
        // ไม่สามารถลบข้อมูลผู้ใช้ได้
        echo "Error deleting user: " . mysqli_error($connection);
    }
}

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($connection);
?>

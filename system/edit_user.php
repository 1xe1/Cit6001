<?php
// ทำการเชื่อมต่อฐานข้อมูล MySQL
$connection = mysqli_connect("localhost", "root", "", "invoicemgsys");

// ตรวจสอบการเชื่อมต่อ
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['username'])) {
    $username = $_GET['username'];
    
    // ดึงข้อมูลผู้ใช้จากฐานข้อมูล
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        // ไม่พบผู้ใช้
        echo "User not found.";
        exit();
    }
} else {
    // ไม่ได้รับค่า username
    echo "Invalid request.";
    exit();
}

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($connection);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <style>
        /* เพิ่มการกำหนดรูปแบบการแสดงผลสำหรับฟอร์มแก้ไขผู้ใช้ */
        .content {
            margin: 20px;
        }
        
        form {
            width: 50%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        
        label {
            display: inline-block;
            width: 100px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="dashboard-container">
    <?php include('../sidebar.php');?>
    <div class="dashboard-container">
        <div class="content">
            <h2>Edit User</h2>
            <form action="update_user.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <label>Name:</label>
                <input type="text" name="name" value="<?php echo $user['name']; ?>">
                <label>Username:</label>
                <input type="text" name="username" value="<?php echo $user['username']; ?>" readonly>
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo $user['email']; ?>">
                <label>Phone:</label>
                <input type="tel" name="phone" value="<?php echo $user['phone']; ?>">
                <label>Password:</label>
                <input type="password" name="password" value="<?php echo $user['password']; ?>">
                <input type="submit" value="Update">
            </form>
        </div>
    </div>
</body>
</html>
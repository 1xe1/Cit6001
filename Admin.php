<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
</head>
<style>
    .sidebar {
            background-color: #333;
            width: 250px;
            height: 100vh;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            padding-top: 20px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .sidebar ul li {
            padding: 10px 20px;
            border-bottom: 1px solid #555;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
        }
        .sidebar ul li ul {
            padding-left: 20px;
        }
</style>
<body>
    <div class="dashboard-container">
        <div class="sidebar">
            <ul>
                <li><a href="Dashborad.php">Dashboard</a></li>
                <li><a href="#">Invoices</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Customers</a></li>
                <li><a href="#">System Users</a>
                    <ul>
                        <li><a href="add_user.php">Add User</a></li>
                        <li><a href="user_list.php">Manage Users</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="content">
            <!-- ส่วนเนื้อหาของแต่ละเมนูจะถูกแสดงที่นี่ -->
        </div>
    </div>
</body>
</html>

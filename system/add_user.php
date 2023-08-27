<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
</head>
<body>
<div class="dashboard-container">
        <div class="sidebar">
            <ul>
                <li><a href="../Dashborad.php">Dashboard</a></li>
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
            <h2>Add User</h2>
            <form action="save_user.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" name="name" required><br>
                
                <label for="username">Username:</label>
                <input type="text" name="username" required><br>
                
                <label for="email">Email:</label>
                <input type="email" name="email" required><br>
                
                <label for="phone">Phone:</label>
                <input type="text" name="phone" required><br>
                
                <label for="password">Password:</label>
                <input type="password" name="password" required><br>
                
                <input type="submit" value="Add User">
            </form>
        </div>
    </div>
</body>
</html>

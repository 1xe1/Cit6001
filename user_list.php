<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
      $conn = new PDO("mysql:host=$servername;dbname=invoicemgsys", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
    <link rel="stylesheet" type="text/css" href="./css/dashboard.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });

        function confirmDelete(username) {
            var result = confirm("Are you sure you want to delete the user?");
            if (result) {
                window.location.href = "delete_data.php?username=" + username;
            }
        }
    </script>
</head>
<style>
    a {
        color: black;
        text-decoration: none;
    }
    button{
        width: 70px;
        height: 40px;
        margin-right: 10px;
    }

    myTable{
        border: 1px solid black;
    }
</style>
<body>
    <div class="dashboard-container">
        <?php include('sidebar.php');?>

        <div class="content">
            <h2>User List</h2>
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                $stmt = $conn->query("SELECT * FROM users");
                $users = $stmt->fetchAll();
                foreach ($users as $user) {
            ?>
                    <tr>
                        <td><?php echo $user['id'];?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['phone']; ?></td>
                        <td>
                            <button class="btn"><a href='add_user.php?username=<?php echo $user['username']; ?>'>Edit</a></button>
                            <button onclick="confirmDelete('<?php echo $user['username']; ?>')">Delete</button>
                        </td>
                    </tr>
            <?php
                }
            ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
    }
    
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
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .sidebar li {
        padding: 10px;
    }

    .sidebar a {
        color: white;
        text-decoration: none;
    }

    .sidebar ul ul {
        list-style-type: none;
        padding-left: 20px;
    }

    .sidebar ul ul li {
        padding: 5px;
    }

    .sidebar a:hover {
        text-decoration: underline;
    }

    .content {
        margin-left: 250px;
        padding: 20px;
        transition: margin-left 0.3s ease-in-out;
    }

    .row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .col-lg-3 {
        flex: 0 0 23%;
        background-color: #fff;
        padding: 15px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .small-box {
        text-align: center;
    }

    .inner {
        padding: 20px;
    }

    .icon {
        padding: 10px;
        background-color: #f0f0f0;
    }

    .ion {
        font-size: 36px;
        color: #666;
    }

    h3 {
        margin: 0;
        font-size: 28px;
        color: #333;
    }

    p {
        margin: 5px 0;
        color: #666;
    }
</style>
<body>
<div class="sidebar">
    <ul>
        <li><a href="Dashborad.php">Dashboard</a></li>
        <li><a href="#">Invoices</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Customers</a></li>
        <li>
            <a href="#">System Users</a>
            <ul>
                <li><a href="./system/add_user.php">Add User</a></li>
                <li><a href="./system/user_list.php">Manage Users</a></li>
            </ul>
        </li>
    </ul>
</div>
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <?php
        $mysqli = new mysqli("localhost", "root", "", "invoicemgsys");

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }
        
        function getCount($query) {
            global $mysqli;
            $result = $mysqli->query($query);
            return $result->num_rows;
        }
        
        function getSum($query) {
            global $mysqli;
            $result = $mysqli->query($query);
            $row = $result->fetch_assoc();
            return $row['value_sum'];
        }
        ?>
        
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo getSum('SELECT SUM(subtotal) AS value_sum FROM invoices WHERE status = "paid"'); ?></h3>
                    <p>Sales Amount</p>
                </div>
                <div class="icon">
                    <i class="ion ion-social-usd"></i>
                </div>
            </div>
        </div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
<!-- small box -->
<div class="small-box bg-purple">
<div class="inner">
<h3><?php

$sql = "SELECT * FROM invoices";
$query = $mysqli->query($sql);

echo "$query->num_rows";
?></h3>

<p>Total Invoices</p>

</div>
<div class="icon">
<i class="ion ion-printer"></i>
</div>

</div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
<!-- small box -->
<div class="small-box bg-yellow">
<div class="inner">
<h3><?php

$sql = "SELECT * FROM invoices WHERE status = 'open'";
$query = $mysqli->query($sql);

echo "$query->num_rows";
?></h3>

<p>Pending Bills</p>
</div>
<div class="icon">

<i class="ion ion-load-a"></i>
</div>

</div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
<!-- small box -->
<div class="small-box bg-red">
<div class="inner">
<h3><?php

$result = mysqli_query($mysqli, 'SELECT SUM(subtotal) AS value_sum FROM
invoices WHERE status = "open"');
$row = mysqli_fetch_assoc($result);
$sum = $row['value_sum'];
echo $sum;
?></h3>

<p>Due Amount</p>
</div>
<div class="icon">
<i class="ion ion-alert-circled"></i>

</div>

</div>
</div>
<!-- ./col -->
</div>
<!-- /.row -->

<!-- 2nd row -->
<div class="row">
<div class="col-lg-3 col-xs-6">
<!-- small box -->
<div class="small-box bg-primary">
<div class="inner">
<h3><?php

$sql = "SELECT * FROM products";
$query = $mysqli->query($sql);

echo "$query->num_rows";
?></h3>

<p>Total Products</p>
</div>
<div class="icon">
<i class="ion ion-social-dropbox"></i>
</div>

</div>
</div>

<div class="col-lg-3 col-xs-6">
<!-- small box -->
<div class="small-box bg-maroon">
<div class="inner">
<h3><?php

$sql = "SELECT * FROM store_customers";
$query = $mysqli->query($sql);

echo "$query->num_rows";
?></h3>

<p>Total Customers</p>
</div>

<div class="icon">
<i class="ion ion-ios-people"></i>
</div>

</div>
</div>

<div class="col-lg-3 col-xs-6">
<!-- small box -->
<div class="small-box bg-olive">
<div class="inner">
<h3><?php

$sql = "SELECT * FROM invoices WHERE status = 'paid'";
$query = $mysqli->query($sql);

echo "$query->num_rows";
?></h3>

<p>Paid Bills</p>
</div>
<div class="icon">
<i class="ion ion-ios-paper"></i>

</div>

</div>
</div>
</div>

</section>
<!-- /.content -->
</body>
</html>
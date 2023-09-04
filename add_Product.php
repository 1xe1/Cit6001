<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" type="text/css" href="./css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="./Products/add_Product.css">

</head>
<body>
    <div class="dashboard-container">
        <?php include('sidebar.php'); ?>
        <div class="content">
            <h2>Add Product</h2>
            <form action="save_product.php" method="POST">
                <label for="product_name">Product Name:</label>
                <input type="text" name="product_name" required><br>
                
                <label for="product_desc">Product Description:</label>
                <textarea name="product_desc" required></textarea><br>
                
                <label for="product_price">Product Price:</label>
                <input type="text" name="product_price" required><br>
                
                <input type="submit" value="Add Product">
            </form>
        </div>
    </div>
</body>
</html>

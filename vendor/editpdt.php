<?php
include "authguard.php";
include "../shared/connection.php";
include "menu.html";


if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];

    // Retrieve the product information from the database
    $productQuery = "SELECT * FROM product WHERE pid = $pid";
    $productResult = mysqli_query($conn, $productQuery);

    if ($productResult && mysqli_num_rows($productResult) > 0) {
        $productData = mysqli_fetch_assoc($productResult);
    } else {
        echo "Product not found.";
        exit();
    }

    // Process the form submission for updating the product
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newName = $_POST['new_name'];
        $newPrice = $_POST['new_price'];
        $newDetail = $_POST['new_detail'];

        // Update the product in the database
        $updateQuery = "UPDATE product SET name = ?, price = ?, detail = ? WHERE pid = ?";
        $stmt = mysqli_prepare($conn, $updateQuery);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssi", $newName, $newPrice, $newDetail, $pid);

            if (mysqli_stmt_execute($stmt)) {
                header("Location:view.php"); // Redirect to a success page
                exit();
            } else {
                echo "Failed to update the product.";
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Failed to prepare the statement.";
        }
    }
} else {
    echo "Invalid product ID.";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h1 class="align-items-center">Edit Product</h1>
    <div class="d-flex justify-content-center align-items-center">
    <form method="POST" class="bg-warning p-4" enctype="multipart/form-data">

        <label for="new_name" >Product Name:</label>
        <input type="text" name="new_name" class="form-control mt-2"value="<?php echo $productData['name']; ?>" required><br>
        
        <label for="new_price">Price:</label>
        <input type="number" name="new_price" class="form-control mt-2" value="<?php echo $productData['price']; ?>" required><br>
        
        <label for="new_detail">Product Detail:</label>
        <textarea name="new_detail" class="form-control mt-2"required><?php echo $productData['detail']; ?></textarea><br>
        
        <button type="submit" class="btn btn-success">Update Product</button>
    </form>
    </div>
</body>
</html>

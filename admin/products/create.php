<?php
include_once 'products.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'name'        => $_POST['name'],
        'description' => $_POST['description'],
        'price'       => $_POST['price']
    ];
    $id = createProduct($data);
    header("Location: edit.php?id=$id");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New Product</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Create New Product</h2>
        <form method="post">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="5" required></textarea>
            </div>
            <div class="mb-3">
                <label>Price</label>
                <input type="number" name="price" class="form-control" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="index.php" class="btn btn-secondary">Back to List</a>
        </form>
    </div>
</body>
</html>

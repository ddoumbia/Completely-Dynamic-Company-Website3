<?php
include_once 'products.php';

$products = getAllProducts();
if (!is_array($products)) {
    $products = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Products</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Products</h2>
        <a href="create.php" class="btn btn-primary mb-3">Create New Product</a>
        <?php if (empty($products)): ?>
            <p>No products found. Please create a new product.</p>
        <?php else: ?>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($products as $id => $product): ?>
                <tr>
                    <td><?= $id; ?></td>
                    <td><?= htmlspecialchars($product['name']); ?></td>
                    <td>
                        <a href="detail.php?id=<?= $id; ?>" class="btn btn-info btn-sm">View</a>
                        <a href="edit.php?id=<?= $id; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete.php?id=<?= $id; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>

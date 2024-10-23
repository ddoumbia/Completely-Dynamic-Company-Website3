<?php
include_once 'products.php';

$id = $_GET['id'];
$product = getProduct($id);

if (!$product) {
    echo "Product not found!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'name'        => $_POST['name'],
        'description' => $_POST['description'],
        'price'       => $_POST['price']
    ];
    updateProduct($id, $data);
    header("Location: edit.php?id=$id&success=1");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Product</h2>
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success">Changes saved successfully!</div>
        <?php endif; ?>
        <form method="post">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($product['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="5" required><?= htmlspecialchars($product['description']); ?></textarea>
            </div>
            <div class="mb-3">
                <label>Price</label>
                <input type="number" name="price" class="form-control" step="0.01" value="<?= htmlspecialchars($product['price']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="detail.php?id=<?= $id; ?>" class="btn btn-secondary">Back to Detail</a>
        </form>
    </div>
</body>
</html>

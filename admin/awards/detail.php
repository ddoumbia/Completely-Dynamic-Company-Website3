<?php
include_once 'awards.php';

$id = $_GET['id'];
$award = getAward($id);

if (!$award) {
    echo "Award not found!";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Award Detail</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2><?= htmlspecialchars($award['title']); ?></h2>
        <p><strong>Description:</strong></p>
        <p><?= nl2br(htmlspecialchars($award['description'])); ?></p>
        <p><strong>Year:</strong> <?= htmlspecialchars($award['year']); ?></p>
        <a href="edit.php?id=<?= $id; ?>" class="btn btn-warning">Edit</a>
        <a href="delete.php?id=<?= $id; ?>" class="btn btn-danger">Delete</a>
        <a href="index.php" class="btn btn-secondary">Back to List</a>
    </div>
</body>
</html>

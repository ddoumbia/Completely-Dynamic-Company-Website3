<?php
include_once 'awards.php';

$id = $_GET['id'];
$award = getAward($id);

if (!$award) {
    echo "Award not found!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    deleteAward($id);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Award</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Delete Award</h2>
        <p>Are you sure you want to delete this award?</p>
        <form method="post">
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
            <a href="detail.php?id=<?= $id; ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>

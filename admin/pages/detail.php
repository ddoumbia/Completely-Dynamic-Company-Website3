<?php
// File: admin/pages/detail.php
require_once '../../classes/PageManager.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    die('Invalid ID');
}

$pageManager = new PageManager();
$page = $pageManager->getPageById($id);

if (!$page) {
    die('Page not found');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= htmlspecialchars($page->getTitle()); ?> - Details</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container mt-5">
    <h1><?= htmlspecialchars($page->getTitle()); ?></h1>
    <p><?= nl2br(htmlspecialchars($page->getContent())); ?></p>
    <a href="edit.php?id=<?= urlencode($page->getId()); ?>" class="btn btn-warning">Edit</a>
    <a href="delete.php?id=<?= urlencode($page->getId()); ?>" class="btn btn-danger">Delete</a>
    <a href="index.php" class="btn btn-secondary">Back to List</a>
</div>
<script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>

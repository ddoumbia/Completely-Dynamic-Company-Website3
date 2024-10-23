<?php
// File: admin/pages/delete.php
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pageManager->deletePage($id);
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete Page</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container mt-5">
    <h1>Delete Page</h1>
    <p>Are you sure you want to delete the page titled "<strong><?= htmlspecialchars($page->getTitle()); ?></strong>"?</p>
    <form method="post">
        <button type="submit" class="btn btn-danger">Yes, Delete</button>
        <a href="detail.php?id=<?= urlencode($page->getId()); ?>" class="btn btn-secondary">No, Go Back</a>
    </form>
</div>
<script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// File: admin/pages/index.php
require_once '../../classes/PageManager.php';

$pageManager = new PageManager();
$pages = $pageManager->getAllPages();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pages - Admin Panel</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container mt-5">
    <h1>Pages</h1>
    <a href="create.php" class="btn btn-primary mb-3">Create New Page</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pages as $page): ?>
            <tr>
                <td><?= htmlspecialchars($page->getId()); ?></td>
                <td>
                    <a href="detail.php?id=<?= urlencode($page->getId()); ?>">
                        <?= htmlspecialchars($page->getTitle()); ?>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// File: admin/pages/edit.php
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
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');

    if ($title && $content) {
        $page->setTitle($title);
        $page->setContent($content);
        $pageManager->updatePage($page);
        header('Location: detail.php?id=' . urlencode($page->getId()));
        exit();
    } else {
        $error = 'Title and content are required.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Page</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container mt-5">
    <h1>Edit Page</h1>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error); ?></div>
    <?php endif; ?>
    <form method="post">
        <div class="mb-3">
            <label>Title:</label>
            <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($page->getTitle()); ?>">
        </div>
        <div class="mb-3">
            <label>Content:</label>
            <textarea name="content" class="form-control" rows="5"><?= htmlspecialchars($page->getContent()); ?></textarea>
        </div>
        <button type="submit" class="btn btn-success">Save Changes</button>
        <a href="detail.php?id=<?= urlencode($page->getId()); ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>

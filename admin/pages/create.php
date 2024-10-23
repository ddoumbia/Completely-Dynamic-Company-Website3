<?php
// File: admin/pages/create.php
require_once '../../classes/PageManager.php';

$pageManager = new PageManager();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');

    if ($title && $content) {
        $page = new Page(null, $title, $content);
        $pageManager->addPage($page);
        header('Location: index.php');
        exit();
    } else {
        $error = 'Title and content are required.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create New Page</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container mt-5">
    <h1>Create New Page</h1>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error); ?></div>
    <?php endif; ?>
    <form method="post">
        <div class="mb-3">
            <label>Title:</label>
            <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($_POST['title'] ?? ''); ?>">
        </div>
        <div class="mb-3">
            <label>Content:</label>
            <textarea name="content" class="form-control" rows="5"><?= htmlspecialchars($_POST['content'] ?? ''); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// File: admin/team/detail.php
include 'team.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;
if (!$id) {
    echo "No ID specified.";
    exit();
}

$member = getTeamMember($id);
if (!$member) {
    echo "Team member not found.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Team Member Detail - <?= htmlspecialchars($member['name']); ?></title>
    <!-- Include your CSS files here -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../css/style.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container mt-5">
        <h1><?= htmlspecialchars($member['name']); ?></h1>
        <p><strong>Role:</strong> <?= htmlspecialchars($member['role']); ?></p>
        <?php if (!empty($member['image'])): ?>
            <img src="<?= htmlspecialchars($member['image']); ?>" alt="<?= htmlspecialchars($member['name']); ?>" class="img-fluid picture" />
        <?php endif; ?>
        <br><br>
        <a href="edit.php?id=<?= urlencode($member['id']); ?>" class="btn btn-warning">Edit</a>
        <a href="delete.php?id=<?= urlencode($member['id']); ?>" class="btn btn-danger">Delete</a>
        <a href="index.php" class="btn btn-secondary">Back to List</a>
    </div>
    <script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>

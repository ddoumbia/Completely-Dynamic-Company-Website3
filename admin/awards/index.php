<?php
// File: admin/awards/index.php
require_once '../../classes/AwardManager.php';

$awardManager = new AwardManager();
$awards = $awardManager->getAllAwards();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Awards - Admin Panel</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container mt-5">
    <h1>Awards</h1>
    <a href="create.php" class="btn btn-primary mb-3">Add New Award</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($awards as $award): ?>
            <tr>
                <td><?= htmlspecialchars($award->getId()); ?></td>
                <td>
                    <a href="detail.php?id=<?= urlencode($award->getId()); ?>">
                        <?= htmlspecialchars($award->getName()); ?>
                    </a>
                </td>
                <td><?= htmlspecialchars($award->getDate()); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>

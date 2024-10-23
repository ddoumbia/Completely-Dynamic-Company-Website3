<?php
// File: admin/team/index.php
include 'team.php';
$team = getAllTeamMembers();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Team Members - Admin Panel</title>
    <!-- Include your CSS files here -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../css/style.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container mt-5">
        <h1>Team Members</h1>
        <a href="create.php" class="btn btn-primary mb-3">Add New Member</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($team as $member): ?>
                <tr>
                    <td><?= htmlspecialchars($member['id']); ?></td>
                    <td>
                        <a href="detail.php?id=<?= urlencode($member['id']); ?>">
                            <?= htmlspecialchars($member['name']); ?>
                        </a>
                    </td>
                    <td><?= htmlspecialchars($member['role']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>

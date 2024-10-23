<?php
// File: admin/team/delete.php
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    deleteTeamMember($id);
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Team Member - <?= htmlspecialchars($member['name']); ?></title>
    <!-- Include your CSS files here -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../css/style.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container mt-5">
        <h1>Delete Team Member</h1>
        <p>Are you sure you want to delete the team member "<strong><?= htmlspecialchars($member['name']); ?></strong>"?</p>
        <form method="post" action="">
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
            <a href="detail.php?id=<?= urlencode($id); ?>" class="btn btn-secondary">No, Go Back</a>
        </form>
    </div>
    <script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>

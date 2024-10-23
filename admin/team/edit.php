<?php
// File: admin/team/edit.php
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
    $name = trim($_POST['name'] ?? '');
    $role = trim($_POST['role'] ?? '');
    $image = trim($_POST['image'] ?? '');

    // Simple validation
    if (empty($name) || empty($role)) {
        $error = "Name and role are required.";
    } else {
        $data = [
            'name' => $name,
            'role' => $role,
            'image' => $image
        ];
        updateTeamMember($id, $data);
        header("Location: detail.php?id=" . urlencode($id));
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Team Member - <?= htmlspecialchars($member['name']); ?></title>
    <!-- Include your CSS files here -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../css/style.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Team Member</h1>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <form method="post" action="">
            <div class="mb-3">
                <label class="form-label">Name:</label>
                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($member['name']); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Role:</label>
                <input type="text" name="role" class="form-control" value="<?= htmlspecialchars($member['role']); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Image URL:</label>
                <input type="text" name="image" class="form-control" value="<?= htmlspecialchars($member['image']); ?>">
                <small class="form-text text-muted">Provide the path to the member's image (e.g., images/john_doe.jpg).</small>
            </div>
            <button type="submit" class="btn btn-success">Save Changes</button>
            <a href="detail.php?id=<?= urlencode($id); ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    <script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>

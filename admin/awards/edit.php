<?php
include_once 'awards.php';

$id = $_GET['id'];
$award = getAward($id);

if (!$award) {
    echo "Award not found!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'title'       => $_POST['title'],
        'description' => $_POST['description'],
        'year'        => $_POST['year']
    ];
    updateAward($id, $data);
    header("Location: edit.php?id=$id&success=1");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Award</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Award</h2>
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success">Changes saved successfully!</div>
        <?php endif; ?>
        <form method="post">
            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($award['title']); ?>" required>
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="5" required><?= htmlspecialchars($award['description']); ?></textarea>
            </div>
            <div class="mb-3">
                <label>Year</label>
                <input type="number" name="year" class="form-control" value="<?= htmlspecialchars($award['year']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="detail.php?id=<?= $id; ?>" class="btn btn-secondary">Back to Detail</a>
        </form>
    </div>
</body>
</html>

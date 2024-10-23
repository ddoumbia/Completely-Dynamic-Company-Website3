<?php
include_once 'awards.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'title'       => $_POST['title'],
        'description' => $_POST['description'],
        'year'        => $_POST['year']
    ];
    $id = createAward($data);
    header("Location: edit.php?id=$id");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New Award</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Create New Award</h2>
        <form method="post">
            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="5" required></textarea>
            </div>
            <div class="mb-3">
                <label>Year</label>
                <input type="number" name="year" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="index.php" class="btn btn-secondary">Back to List</a>
        </form>
    </div>
</body>
</html>

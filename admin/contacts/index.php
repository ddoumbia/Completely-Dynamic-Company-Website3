<?php
include_once 'contacts.php';

$contacts = getAllContacts();
if (!is_array($contacts)) {
    $contacts = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Requests</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Contact Requests</h2>
        <?php if (empty($contacts)): ?>
            <p>No contact requests found.</p>
        <?php else: ?>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date Submitted</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($contacts as $id => $contact): ?>
                <tr>
                    <td><?= $id; ?></td>
                    <td><?= htmlspecialchars($contact['name']); ?></td>
                    <td><?= htmlspecialchars($contact['email']); ?></td>
                    <td><?= htmlspecialchars($contact['date_submitted'] ?? 'N/A'); ?></td>
                    <td>
                        <a href="detail.php?id=<?= $id; ?>" class="btn btn-info btn-sm">View</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>

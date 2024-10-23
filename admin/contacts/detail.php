<?php
include_once 'contacts.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $contacts = getAllContacts();

    if (isset($contacts[$id])) {
        $contact = $contacts[$id];
    } else {
        echo "Contact not found.";
        exit;
    }
} else {
    echo "No contact ID provided.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Detail</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Contact Detail</h2>
        <p><strong>Name:</strong> <?= htmlspecialchars($contact['name']); ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($contact['email']); ?></p>
        <p><strong>Date Submitted:</strong> <?= htmlspecialchars($contact['date_submitted'] ?? 'N/A'); ?></p>
        <p><strong>Message:</strong> <?= nl2br(htmlspecialchars($contact['message'])); ?></p>
        <a href="index.php" class="btn btn-secondary">Back to Contacts</a>
    </div>
</body>
</html>

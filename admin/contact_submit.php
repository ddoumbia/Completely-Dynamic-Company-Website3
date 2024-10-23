<?php
// contact_submit.php
require_once '../classes/JsonFileHandler.php';

$dataFile = __DIR__ . '/data/contacts.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name && $email && $message) {
        $contact = [
            'id' => uniqid(),
            'name' => $name,
            'email' => $email,
            'message' => $message,
            'date' => date('Y-m-d H:i:s'),
        ];

        $contacts = JsonFileHandler::readAll($dataFile);
        $contacts[] = $contact;
        JsonFileHandler::writeAll($dataFile, $contacts);

        header('Location: thank_you.php');
        exit();
    } else {
        $error = 'All fields are required.';
    }
}
?>

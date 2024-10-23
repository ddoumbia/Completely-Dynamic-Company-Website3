<?php
function getAllContacts() {
    $contacts = [];
    $filename = __DIR__ . '/../data/contacts.txt';

    if (file_exists($filename)) {
        // Read the file and parse contacts
        $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            // Assuming each line is a JSON object
            $contact = json_decode($line, true);
            if ($contact) {
                $contacts[] = $contact;
            } else {
                error_log("Failed to parse contact: $line");
            }
        }
    } else {
        // Log an error or handle the missing file
        error_log("contacts.txt not found at $filename");
    }

    return $contacts;
}
?>

<?php
// File: classes/JsonFileHandler.php

class JsonFileHandler {
    public static function readAll($filePath) {
        if (!file_exists($filePath)) {
            // Automatically create an empty JSON file if it doesn't exist
            file_put_contents($filePath, '[]');
        }
        $jsonData = file_get_contents($filePath);
        return json_decode($jsonData, true) ?? [];
    }

    public static function writeAll($filePath, $data) {
        $jsonData = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents($filePath, $jsonData);
    }
}
?>

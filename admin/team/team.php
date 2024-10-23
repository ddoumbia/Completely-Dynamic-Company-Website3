<?php
// File: admin/team/team.php

function getAllTeamMembers() {
    $team = [];
    $file = fopen('team.txt', 'r');
    while (($line = fgets($file)) !== false) {
        $team[] = json_decode(trim($line), true);
    }
    fclose($file);
    return $team;
}

function getTeamMember($id) {
    $team = getAllTeamMembers();
    foreach ($team as $member) {
        if ($member['id'] == $id) {
            return $member;
        }
    }
    return null;
}

function createTeamMember($data) {
    $data['id'] = uniqid(); // Generates a unique ID
    $file = fopen('team.txt', 'a');
    fwrite($file, json_encode($data) . PHP_EOL);
    fclose($file);
    return $data['id'];
}

function updateTeamMember($id, $data) {
    $team = getAllTeamMembers();
    $file = fopen('team.txt', 'w');
    foreach ($team as $member) {
        if ($member['id'] == $id) {
            $member = array_merge($member, $data);
        }
        fwrite($file, json_encode($member) . PHP_EOL);
    }
    fclose($file);
}

function deleteTeamMember($id) {
    $team = getAllTeamMembers();
    $file = fopen('team.txt', 'w');
    foreach ($team as $member) {
        if ($member['id'] != $id) {
            fwrite($file, json_encode($member) . PHP_EOL);
        }
    }
    fclose($file);
}
?>

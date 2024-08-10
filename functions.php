<?php
require_once 'config.php';

// get user data by id

function getUserData($colname, $id){
    global $conn;
    global $users;
    $sql = "select * from $users where ID = $id";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
    return $row[$colname];
}


function countTotalMyNotes($userID) {
    global $conn;
    global $notes;
    $sql = "SELECT COUNT(*) as total_notes FROM $notes WHERE note_createby_userID = $userID  AND note_status = 'publish'";
    $result = $conn->query($sql);
    if ($result) {
        $row = $result->fetch_assoc();
        return $row['total_notes'];
    } else {
        return '0';
    }
}

function countTotalMyDraftNotes($userID) {
    global $conn;
    global $notes;
    $sql = "SELECT COUNT(*) as total_notes FROM $notes WHERE note_createby_userID = $userID AND note_status = 'draft'";
    $result = $conn->query($sql);
    if ($result) {
        $row = $result->fetch_assoc();
        return $row['total_notes'];
    } else {
        return '0';
    }
}


function countTotalShareNotes($userID) {
    global $conn;
    global $notes;
    $userEmail = getUserData('user_email',$userID);

    $sql = "SELECT COUNT(*) as total_sharewithme_notes FROM $notes WHERE note_share_with_user = '$userEmail'";
    $result = $conn->query($sql);
    if ($result) {
        $row = $result->fetch_assoc();
        return $row['total_sharewithme_notes'];
    } else {
        return '0';
    }
}




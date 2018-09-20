<?php
require_once('database.php');

// Get Comments
$visitorID = filter_input(INPUT_POST, 'visitorID', FILTER_VALIDATE_INT);
$employeeID= filter_input(INPUT_POST, 'employeeID', FILTER_VALIDATE_INT);

// Delete the comments from the database
if ($visitorID != false && $employeeID != false) {
    $query = 'DELETE FROM visitor
              WHERE visitorID = :visitorID';
    $statement = $db->prepare($query);
    $statement->bindValue(':visitorID', $visitorID);
    $success = $statement->execute();
    $statement->closeCursor();  
    // echo ($comments);
}

// Display the Admin page
include('admin.php');
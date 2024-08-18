<?php
session_start();

// Check if the user is logged in and if session data is set
if (!isset($_SESSION["user"]) || !is_array($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

// Fetch user ID from session
$user_id = $_SESSION["user"]["id"];

// Check if assignment ID is provided
if (!isset($_POST['assignment_id'])) {
    die("Invalid request");
}

$assignment_id = $_POST['assignment_id'];

// Database connection
require_once "database.php";

// Prepare and execute the query to fetch the assignment
$sql = "SELECT * FROM assignments WHERE id = ? AND user_id = ?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    die("SQL error");
}
mysqli_stmt_bind_param($stmt, "ii", $assignment_id, $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$assignment = mysqli_fetch_assoc($result);

// Check if assignment data was retrieved
if (!$assignment) {
    die("Assignment not found or you don't have permission to delete it");
}

// Delete the file from the server
if (file_exists($assignment['file_path'])) {
    unlink($assignment['file_path']);
}

// Prepare and execute the query to delete the assignment from the database
$sql_delete = "DELETE FROM assignments WHERE id = ? AND user_id = ?";
$stmt_delete = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt_delete, $sql_delete)) {
    die("SQL error");
}
mysqli_stmt_bind_param($stmt_delete, "ii", $assignment_id, $user_id);
mysqli_stmt_execute($stmt_delete);

mysqli_close($conn);

header("Location: profile.php");
exit();
?>

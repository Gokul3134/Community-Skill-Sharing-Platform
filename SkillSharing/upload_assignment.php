<?php
session_start();
require_once "database.php";

if (!isset($_SESSION["user"]) || !is_array($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user"]["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["assignmentFile"])) {
    $assignmentTitle = $_POST["assignmentTitle"];
    $assignmentFile = $_FILES["assignmentFile"]["name"];
    $uploadDirectory = "uploads/";
    $uploadFile = $uploadDirectory . basename($assignmentFile);

    if (move_uploaded_file($_FILES["assignmentFile"]["tmp_name"], $uploadFile)) {
        $sql = "INSERT INTO assignments (user_id, title, file_path) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "iss", $user_id, $assignmentTitle, $uploadFile);
            mysqli_stmt_execute($stmt);

            // Fetch the newly inserted assignment to return for AJAX
            $sql_assignments = "SELECT assignments.id, assignments.title, assignments.file_path, users.full_name, users.branch, users.institute
                                FROM assignments 
                                JOIN users ON assignments.user_id = users.id
                                WHERE assignments.user_id = ?";
            $stmt_assignments = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmt_assignments, $sql_assignments)) {
                mysqli_stmt_bind_param($stmt_assignments, "i", $user_id);
                mysqli_stmt_execute($stmt_assignments);
                $result_assignments = mysqli_stmt_get_result($stmt_assignments);
                $assignment = mysqli_fetch_assoc($result_assignments);

                if ($assignment) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($assignment['full_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($assignment['branch']) . "</td>";
                    echo "<td>" . htmlspecialchars($assignment['institute']) . "</td>";
                    echo "<td>";
                    echo "<a href=\"" . htmlspecialchars($assignment['file_path']) . "\" target=\"_blank\">" . htmlspecialchars($assignment['title']) . "</a>";
                    echo "<form action=\"delete_assignment.php\" method=\"post\" style=\"display:inline; margin-left: 10px;\">";
                    echo "<input type=\"hidden\" name=\"assignment_id\" value=\"" . htmlspecialchars($assignment['id']) . "\">";
                    echo "<button style=\"padding:2px 6px\" type=\"submit\">Delete</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            }
        } else {
            die("SQL error");
        }
    } else {
        die("File upload error");
    }
    mysqli_close($conn);
}
?>

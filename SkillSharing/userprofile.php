<?php
session_start();

// Check if the user is logged in and if session data is set
if (!isset($_SESSION["user"]) || !is_array($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

// Fetch user ID from session
$user_id = $_SESSION["user"]["id"];

// Database connection
require_once "database.php";

// Prepare and execute the query to fetch user data
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    die("SQL error");
}
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

// Check if user data was retrieved
if (!$user) {
    die("User not found");
}

// Prepare and execute the query to fetch assignments
$sql_assignments = "SELECT assignments.id, assignments.title, assignments.file_path, assignments.user_id, users.full_name, users.branch, users.institute
                    FROM assignments 
                    JOIN users ON assignments.user_id = users.id";
$result_assignments = mysqli_query($conn, $sql_assignments);
$assignments = [];
if ($result_assignments) {
    while ($row = mysqli_fetch_assoc($result_assignments)) {
        $assignments[] = $row;
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" type="image/x-icon" href="img/logo1.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Profile</title>
    <link rel="stylesheet" href="userstyle.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar menu here -->
        <div class="sidebar">
            <div class="profile">
                <img src="https://as2.ftcdn.net/v2/jpg/02/10/70/13/1000_F_210701394_juARL2AoYEzgYZWI5zHmcGXmqWwQS8L2.jpg" alt="profile_picture" />
                <h3><?php echo htmlspecialchars($user['full_name']); ?></h3>
                <p><?php echo htmlspecialchars($user['branch']); ?></p>
            </div>
            <!-- Sidebar menu items here -->
            <ul>
                <li>
                    <a href="userprofile.php" class="active">
                        <span class="icon"><i class="fas fa-desktop"></i></span>
                        <span class="item">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="#assignment">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">Assignment</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
                        <span class="item"><a href="profile.php">Dashboard</a></span>
                    </a>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
        <div class="main_content">
            <h2 class="user-profile-style"> Your Profile</h2>
            <table>
                <tr>
                    <td>Name</td>
                    <td><?php echo htmlspecialchars($user['full_name']); ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                </tr>
                <tr>
                    <td>Number</td>
                    <td><?php echo htmlspecialchars($user['number']); ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><?php echo htmlspecialchars($user['address']); ?></td>
                </tr>
                <tr>
                    <td>Institute</td>
                    <td><?php echo htmlspecialchars($user['institute']); ?></td>
                </tr>
                <tr>
                    <td>Branch</td>
                    <td><?php echo htmlspecialchars($user['branch']); ?></td>
                </tr>
            </table>
            <div class="assignment-section" id="assignment">
                <h2 class="assignment-heading">Assignment Submission</h2>
                <form id="assignmentForm" action="upload_assignment.php" method="post" enctype="multipart/form-data">
                    <div class="pb-3">
                        <label for="assignmentTitle">Assignment Title :</label>
                        <input type="text" id="assignmentTitle" name="assignmentTitle" required>
                    </div><br />
                    <div class="pb-3">
                        <label for="assignmentFile">Upload Assignment :</label>
                        <input type="file" id="assignmentFile" name="assignmentFile" required>
                    </div><br />
                    <div class="mb-5">
                        <button type="submit">Submit Assignment</button>
                    </div>
                </form>
                <div class="submitted-files" id="submittedFiles">
                    <h2>Submitted Assignments</h2>
                    <table style="margin-top:40px">
                        <tr>
                            <th>Name</th>
                            <th>Institute</th>
                            <th>Branch</th>
                            <th>Submitted Assignment</th>
                        </tr>
                        <?php 
                        foreach ($assignments as $assignment) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($assignment['full_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($assignment['institute']) . "</td>";
                            echo "<td>" . htmlspecialchars($assignment['branch']) . "</td>";
                            echo "<td>";
                            echo "<a href=\"" . htmlspecialchars($assignment['file_path']) . "\" target=\"_blank\">" . htmlspecialchars($assignment['title']) . "</a>";
                            if ($assignment['user_id'] == $user_id) {
                                echo "<form class=\"delete-assignment-form\" action=\"delete_assignment.php\" method=\"post\" style=\"display:inline; margin-left: 10px;\">";
                                echo "<input type=\"hidden\" name=\"assignment_id\" value=\"" . htmlspecialchars($assignment['id']) . "\">";
                                echo "<button style=\"padding:2px 6px\" type=\"submit\">Delete</button>";
                                echo "</form>";
                            }
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $('#assignmentForm').submit(function(event) {
            event.preventDefault(); // Prevent the form from submitting the traditional way
            
            var formData = new FormData(this);

            $.ajax({
                url: 'upload_assignment.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    var assignmentData = $(response).find('tr'); // Assuming your response contains only the new <tr>
                    var assignmentTitle = assignmentData.find('a').text().trim();

                    // Check if the exact assignment title already exists in the table
                    var existingAssignment = $('#submittedFiles table').find('a').filter(function() {
                        return $(this).text().trim() === assignmentTitle;
                    });

                    if (existingAssignment.length === 0) {
                        // Append the new assignment to the table
                        $('#submittedFiles table').append(assignmentData);

                        // SweetAlert notification
                        Swal.fire({
                            icon: 'success',
                            title: 'Assignment Uploaded Successfully!',
                            text: 'Your assignment has been uploaded and will appear in the list below.',
                            showConfirmButton: true
                        });

                        // Optionally, clear the form fields
                        $('#assignmentForm')[0].reset();
                    } else {
                        // Notify the user that the assignment already exists
                        Swal.fire({
                            icon: 'warning',
                            title: 'Duplicate Assignment!',
                            text: 'This assignment has already been uploaded and exists in the list.',
                            showConfirmButton: true
                        });
                    }
                },
                error: function() {
                    alert('There was an error submitting the assignment.');
                }
            });
        });

        // Handle the deletion of assignments
        $('body').on('submit', '.delete-assignment-form', function(event) {
            event.preventDefault(); // Prevent the form from submitting the traditional way
            
            var form = $(this);
            var formData = form.serialize();

            $.ajax({
                url: 'delete_assignment.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Remove the deleted assignment row from the table
                    form.closest('tr').remove();

                    // SweetAlert notification
                    Swal.fire({
                        icon: 'success',
                        title: 'Assignment Deleted Successfully!',
                        text: 'The assignment has been deleted.',
                        showConfirmButton: true
                    });
                },
                error: function() {
                    alert('There was an error deleting the assignment.');
                }
            });
        });
    });
    </script>
</body>
</html>

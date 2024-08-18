<?php
// Check if the session is already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user data is available in the session
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION["user"]; // Fetch user data from session
$user_id = $user["id"];
$user_full_name = $user["full_name"];
$user_email = $user["email"];

include 'database.php';

$sql = "SELECT * FROM course";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<img src='" . $row['image_url'] . "' alt='" . $row['course_name'] . "' style='width:320px;height:250px;border-radius: 10px;'>"; // Display course image
        echo "<h2>" . $row['course_name'] . "</h2>";
        echo "<h5> Prof. "  . $row['faculty'] . " is currently teaching this course, and he is also bringing his deep knowledge and experience to the classroom.</h5>";
        echo "<p>Price: ₹" . $row['price'] . " <br>For 3 Months </p>";
        echo "<button style='margin-left:84px;' onclick='toggleDescription(" . $row['id'] . ")' class='btn btn-info'>See About Course</button>"; // Show Description
        echo "<div id='desc-" . $row['id'] . "' class='course-description' style='display:none; margin-top:10px; text-align:justify;'>" . $row['description'] . "</div>";
        echo "<a href='booking.php?user_id=" . $user_id . "&user_full_name=" . urlencode($user_full_name) . "&user_email=" . urlencode($user_email) . "&course_id=" . $row['id'] . "&course_name=" . urlencode($row['course_name']) . "&price=" . $row['price'] . "' class='btn btn-primary' style='margin-top:10px;'>Unlock Now</a>";
        echo "</div>";
    }
} else {
    echo "No courses available";
}

$conn->close();
?>

<script>
let currentVisibleId = null;

function toggleDescription(id) {
    const allDescriptions = document.querySelectorAll('.course-description');

    // Hide all descriptions if any is currently visible
    allDescriptions.forEach(desc => {
        if (desc.id !== 'desc-' + id && desc.style.display === 'block') {
            desc.style.display = 'none';
        }
    });

    // Toggle the selected description
    const descElement = document.getElementById('desc-' + id);
    if (descElement.style.display === 'none') {
        descElement.style.display = 'block';
        descElement.style.width = '94%';
        currentVisibleId = id;
    } else {
        descElement.style.display = 'none';
        currentVisibleId = null;
    }
}
</script>

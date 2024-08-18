<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $user_id = $_POST['user_id'];
    $user_full_name = $_POST['user_full_name'];
    $user_email = $_POST['user_email'];
    $course_id = $_POST['course_id'];
    $course_name = $_POST['course_name'];
    $total_price = $_POST['price'];

    // Insert the booking details into the database
    $sql = "INSERT INTO bookings (user_id, user_full_name, user_email, course_id, course_name, price) 
            VALUES ('$user_id', '$user_full_name', '$user_email', '$course_id', '$course_name', '$total_price')";

    if ($conn->query($sql) === TRUE) {
        // Get the last inserted booking ID
        $booking_id = $conn->insert_id;
        
        // Redirect to payment.php with booking ID and price
        header("Location: payment.php?success=1&booking_id=$booking_id&price=$total_price");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    // Redirect back to the booking page if the request method is not POST
    header("Location: booking.php");
    exit();
}
?>

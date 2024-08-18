<?php
include 'database.php';

// Fetch booking_id and price from the query string
$booking_id = isset($_GET['booking_id']) ? htmlspecialchars($_GET['booking_id'], ENT_QUOTES) : '';
$price = isset($_GET['price']) ? htmlspecialchars($_GET['price'], ENT_QUOTES) : '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_id = $_POST['booking_id'];
    $payment_method = $_POST['payment_method'];
    $amount = $_POST['amount'];

    // Insert payment details into the payments table
    $sql = "INSERT INTO payments (booking_id, payment_method, amount) VALUES ('$booking_id', '$payment_method', '$amount')";

    if ($conn->query($sql) === TRUE) {
        $payment_id = $conn->insert_id;

        // Fetch the user_id and course_id from the bookings table using the booking_id
        $booking_query = "SELECT user_id, course_id FROM bookings WHERE id = '$booking_id'";
        $booking_result = $conn->query($booking_query);

        if ($booking_result->num_rows > 0) {
            $booking_row = $booking_result->fetch_assoc();
            $user_id = $booking_row['user_id'];
            $course_id = $booking_row['course_id'];

            // Insert the course into the unlocked_courses table
            $unlock_sql = "INSERT INTO unlocked_courses (user_id, course_id) VALUES ('$user_id', '$course_id')";

            if ($conn->query($unlock_sql) === TRUE) {
                // Redirect to generate_bill.php with payment_id and booking_id
                header("Location: generate_bill.php?payment_id=$payment_id&booking_id=$booking_id");
                exit();
            } else {
                echo "Error unlocking course: " . $conn->error;
            }
        } else {
            echo "Booking not found.";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/logo1.png">
    <title>Process Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="payment.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
    <header>
        <nav>
            <div class="nav-left">
                <ul>
                    <li><a href="booking.php#home">Home</a></li>
                    <li><a href="generate_bill.php">Receipt</a></li>
                </ul>
            </div>
            <div class="nav-center">
            </div>
            <div class="nav-right">
            </div>
        </nav>
    </header>

    <section id="payment" class="pay">
        <div class="form">
            <form action="payment.php" method="POST">
                <label for="booking_id">Booking ID:</label>
                <input type="text" id="booking_id" name="booking_id" value="<?php echo $booking_id; ?>" required>
                
                <label for="payment_method">Payment Method:</label>
                <select id="payment_method" name="payment_method" required>
                    <option value="select">Select</option>
                    <option value="Credit Card">Credit Card</option>
                    <option value="Debit Card">Debit Card</option>
                    <option value="PayPal">PayPal</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                </select>
                <br>
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" step="0.01" value="<?php echo $price; ?>" required>
                
                <button type="submit">Proceed to Pay</button>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

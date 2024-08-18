<?php
include 'database.php';

// Get payment_id and booking_id from the query string
$payment_id = isset($_GET['payment_id']) ? htmlspecialchars($_GET['payment_id'], ENT_QUOTES) : '';
$booking_id = isset($_GET['booking_id']) ? htmlspecialchars($_GET['booking_id'], ENT_QUOTES) : '';

// Fetch booking details if payment_id is provided
if ($payment_id) {
    $booking_sql = "SELECT * FROM bookings WHERE id = (SELECT booking_id FROM payments WHERE payment_id = '$payment_id')";
    $booking_result = $conn->query($booking_sql);
    $booking = $booking_result->fetch_assoc();

    // Fetch payment details
    $payment_sql = "SELECT * FROM payments WHERE payment_id = '$payment_id'";
    $payment_result = $conn->query($payment_sql);
    $payment = $payment_result->fetch_assoc();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="receipt.css">

    <style>
        /* Reset default browser styles for a more consistent baseline */
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        }

        /* Set base font styles */
        body {
        font-family: sans-serif; /* Choose a suitable font family */
        font-size: 16px; /* Adjust for preferred font size */
        background: rgb(2, 0, 36);
        background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgb(130, 155, 239) 0%,  rgba(172, 212, 231, 1) 62%);
      
        
        }

        /* Style the header section */
        header {
        background-color: #f5f5f5;
        padding: 1rem 2rem;
        background-color: rgb(255, 255, 255, 0.001);
        }

        /* Style the navigation bar */
        nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        }

        .nav-left ul {
        list-style: none;
        padding: 0;
        margin: 0;
        }

        .nav-left li {
        display: inline-block;
        margin-right: 1rem;
        }

        .nav-left a {
        text-decoration: none;
        color: #333; /* Adjust link color */
        }

        /* Style the main content area */
        .container {
        max-width: 900px; /* Set a maximum width for responsiveness */
        margin: 0 auto; /* Center the content horizontally */
        padding: 2rem;
        }

        /* Style the receipt title */
        h2 {
        text-align: center;
        margin-bottom: 2rem;
        }

        /* Style the receipt table */
        .receipt-table table {
        width: 100%;
        border-collapse: collapse;
        }

        .receipt-table th,
        .receipt-table td {
        padding: 0.75rem 1rem;
        border: 1px solid #ddd;
        text-align: left; /* Align content to the left */
        }

        .receipt-table thead th {
        background-color: #f5f5f5;
        font-weight: bold;
        }

        /* Style for specific rows (optional) */
        .receipt-table .course-details td,
        .receipt-table .booking-details td,
        .receipt-table .payment-details td {
        font-weight: bold; /* Emphasize details */
        }

        /* Responsive considerations */
        @media (max-width: 768px) {
            .container {
                padding: 1rem; /* Adjust padding on smaller screens */
            }
            .receipt-table table {
                font-size: 14px; /* Adjust font size for mobile readability */
            }
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="nav-left">
                <ul>
                    <li><a href="profile.php#home">Home</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container mt-5">
        <!-- Search bar -->
        <form class="mb-4" method="GET" action="generate_bill.php">
            <div class="input-group">
                <input type="text" class="form-control" name="payment_id" placeholder="Enter Payment ID" value="<?php echo htmlspecialchars($payment_id); ?>" required>
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>

        <?php if ($payment_id && $booking && $payment): ?>
            <h2 class="text-center">Payment Receipt</h2>
            <div class="receipt-table">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="2" class="text-center">User Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>User ID</th>
                            <td><?php echo $booking['user_id']; ?></td>
                        </tr>
                        <tr>
                            <th>User Full Name</th>
                            <td><?php echo $booking['user_full_name']; ?></td>
                        </tr>
                        <tr>
                            <th>User Email</th>
                            <td><?php echo $booking['user_email']; ?></td>
                        </tr>
                    </tbody>

                    <thead>
                        <tr>
                            <th colspan="2" class="text-center">Course Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Course ID</th>
                            <td><?php echo $booking['course_id']; ?></td>
                        </tr>
                        <tr>
                            <th>Course Name</th>
                            <td><?php echo $booking['course_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Total Price</th>
                            <td><?php echo $booking['price']; ?></td>
                        </tr>
                    </tbody>

                    <thead>
                        <tr>
                            <th colspan="2" class="text-center">Booking Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Booking ID</th>
                            <td><?php echo $booking['id']; ?></td>
                        </tr>
                        <tr>
                            <th>Booking Date</th>
                            <td><?php echo $booking['booking_date']; ?></td>
                        </tr>
                        
                    </tbody>

                    <thead>
                        <tr>
                            <th colspan="2" class="text-center">Payment Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Payment ID</th>
                            <td><?php echo $payment_id; ?></td>
                        </tr>
                        <tr>
                            <th>Payment Method</th>
                            <td><?php echo $payment['payment_method']; ?></td>
                        </tr>
                        <tr>
                            <th>Amount Paid</th>
                            <td><?php echo $payment['amount']; ?></td>
                        </tr>
                        <tr>
                            <th>Payment Date</th>
                            <td><?php echo $payment['payment_date']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php elseif ($payment_id): ?>
            <p class="text-center text-danger">No payment details found for Payment ID: <?php echo htmlspecialchars($payment_id); ?></p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/logo1.png">
    <title>Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        body{
            /* padding:50px; */
            padding-top:0;
            background: rgb(2, 0, 36);
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgb(130, 155, 239) 0%,  rgba(172, 212, 231, 1) 62%);
            
        }

        /* Header Styles */
        header {
            /* background-color: #ffffff; */
            /* color: white; */
            padding: 10px 0; 
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000; /* Ensure header stays on top */
            background-color: rgb(255, 255, 255, 0.001);
            
        }

        /* Navigation Styles */
        nav {
            display: flex;
            justify-content: space-between; /* Adjust to space out the three sections */
            align-items: center; /* Center items vertically */
            padding: 0 20px; /* Add padding to nav */
        }

        .nav-left {
            display: flex;
            align-items: center; /* Center image vertically */
        }


        /* Adjust padding and margin for left, center, and right divs */
        .nav-left {
            padding: 10px 0; /* Add padding to the divs */
        }

        nav ul li a {
            padding: 10px; /* Simplify padding to make it consistent */
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 20px; /* Adjust gap between navbar items */
        }

        nav ul li {
            display: inline;
            font-family:sans-serif;
            font-size: 20px;
        }

        nav ul li a {
            color: rgb(0, 0, 0);
            text-decoration: none;
            /* padding: 10px 20px; */
            padding: 5px;
            border-radius: 5px;
            /* background-color: rgba(255, 255, 255, 0.3); */
            /* display: block;  */
            /* Ensure proper spacing around links */
            
        }
        #booking form {
            display: flex;
            flex-direction: column;
            padding: 20px;
            max-width: 600px;
            margin: 80px auto;
            background-color: rgba(255, 255, 255, 0.6);
            border-radius: 20px;
        }
        #booking form select {
            padding: 10px;
            margin-top: 5px;
        }

        #booking form label {
            margin-top: 10px;
        }

        #booking form input, #booking form select {
            padding: 10px;
            margin-top: 5px;
        }

        #booking form button {
            margin-top: 20px;
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="nav-left">
                <ul>
                    <li><a href="profile.php#course">Home</a></li>
                    <li><a href="payment.php">Payment</a></li>
                </ul>
            </div>
            <div class="nav-center">
            </div>
            <div class="nav-right">
            </div>
        </nav>
    </header>

        
    <section id="booking" class="book">
        <div class="form">
            <form action="book_course.php" method="POST" enctype="multipart/form-data">
                <label for="user_id">User ID:</label>
                <input type="text" id="user_id" name="user_id" value="<?php echo htmlspecialchars($_GET['user_id'] ?? '', ENT_QUOTES); ?>" required>


                <label for="username">Username:</label>
                <input type="text" id="username" name="user_full_name" value="<?php echo htmlspecialchars($_GET['user_full_name'] ?? '', ENT_QUOTES); ?>" required>

                <label for="user_email">User Email:</label>
                <input type="email" id="user_email" name="user_email" value="<?php echo htmlspecialchars($_GET['user_email'] ?? '', ENT_QUOTES); ?>" required>


                <label for="course_id">Course ID:</label>
                <input type="text" id="course_id" name="course_id" value="<?php echo htmlspecialchars($_GET['course_id'] ?? '', ENT_QUOTES); ?>" required>

                <label for="course_name">Course Name:</label>
                <input type="text" id="course_name" name="course_name" value="<?php echo htmlspecialchars($_GET['course_name'] ?? '', ENT_QUOTES); ?>" required>

                <label for="total_price">Total Price:</label>
                <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($_GET['price'] ?? '', ENT_QUOTES); ?>" required>

                <button type="submit">Book Now</button>
            </form>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

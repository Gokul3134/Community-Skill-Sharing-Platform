<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION["user"];

include 'database.php';

// Fetch unlocked courses for the current user
$sql = "
    SELECT course.course_name, course.faculty, course.description, course.price, course.image_url 
    FROM unlocked_courses 
    JOIN course ON unlocked_courses.course_id = course.id 
    WHERE unlocked_courses.user_id = ?
";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user['id']);
$stmt->execute();
$result = $stmt->get_result();

$unlocked_courses = [];
while ($row = $result->fetch_assoc()) {
    $unlocked_courses[] = $row;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="img/logo1.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <!-- <link rel="stylesheet" href="profile.css"> -->
    <title>Dashboard</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            
            
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            overflow-x: hidden;
            padding-top: 20px;
        }

        .logo {
            display: block;
            text-align: center;
            color: white;
            padding: 15px;
            font-size: 1.5em;
            text-decoration: none;
        }

        .sidebar a {
            padding: 10px 16px;
            text-decoration: none;
            font-size: 1.2em;
            color: white;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #ddd;
            color: black;
        }

        .home-card-container {
            margin-left: 250px;
            padding: 20px;
            
        }

        .home-card-container h1 {
            text-align: center;
            font-family: monospace;
            font-weight: bold;
        }
        .course_catalog {
            display: flex;
            flex-wrap: wrap;
            /* justify-content: space-around; */
            padding: 20px;
            margin-left: 40px;
            /* background-color: white; */
            
        }

        .course_catalog div {
            border: 1px solid #ccc;
            margin: 10px;
            padding: 10px;
            width: 30%;
            background-color: white;
            border-radius: 10px;
            background-image: url(img/body3.jpg);
            /* border-radius: 8px; */
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
            
            
        }

        .course_catalog div:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            
        }

        h1{
            color:rgb(114, 6, 168);
        }

        .course_catalog img {
            
            border-radius: 10px;
        }

        .course_catalog h2 {
            text-align: center;
        }
        .course_catalog h5 {
            color:green;
            text-align:justify;
            padding:20px;
        }

        .course_catalog p {
            text-align: center;
            color:red;
            
        }

        .course_catalog a.btn {
            display: inline-block; /* Make the anchor behave like a block for margin */
            margin: 10px auto; /* Center the button */
            padding: 10px 20px;
            background-color: #007bff; /* Bootstrap primary color */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-left: 100px;
        }

        .course_catalog a.btn:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .course-card {
            background-color: white;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            width: 30%;
            max-width: 350px;
            transition: transform 0.2s, box-shadow 0.2s;
            background-image: url(img/body3.jpg);
            /* transition: transform 0.3s ease-in-out; */
        }

        .course-card:hover {
            transform: translateY(-5px);
            /* transition: scale(1.05); */
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        }

        .course-card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-left:5px;
        }

        .course-card h2 {
            font-size: 1.9em;
            margin-top: 10px;
            text-align:center;
            font-weight: bold; 
        }

        .course-card h5 {
            color:green;
            text-align:justify;
            padding:15px;
        }

        .course-card p {
            margin-top: 8px;
            font-size: 1.0em;
            color: #777;
            text-align:justify;
        }

        /* Adjust sidebar for tablets and mobile devices */
    @media screen and (max-width: 1024px) {
        .sidebar {
            width: 200px;
        }

        .home-card-container {
            margin-left: 200px;
        }
    }

    @media screen and (max-width: 768px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
            top: 0;
            left: 0;
        }

        .home-card-container {
            margin-left: 0;
        }

        .course_catalog div {
            width: 100%;
        }

        .course-card {
            width: 100%;
            max-width: none;
        }

        .course-card img {
            width: 100%;
        }
    }

    @media screen and (max-width: 576px) {
        .sidebar a {
            font-size: 1em;
        }

        .home-card-container h1 {
            font-size: 1.5em;
        }

        .course-card {
            width: 100%;
            max-width: none;
            margin: 0 auto;
        }

        .course-card h2 {
            font-size: 1.5em;
        }

        .course-card h5, .course-card p {
            font-size: 1em;
        }
    }

    
    </style>
</head>

<body>
    <div class="sidebar">
        <span class="logo">LEARNING PLATFORM</span>
        <a href="userprofile.php">Profile</a>
        <a href="#dashboard" style="color: #0c7db1;background: #f4f4f4;">Dashboard</a>
        <a href="#Courses">Courses</a>
        <a href="#MyCourses">My Courses</a> <!-- Updated link -->
        <a href="logout.php">Logout</a>
    </div>

    <div id="dashboard" class="home-card-container">
        <h1>Welcome to SkillUp</h1>
        <img src="img/background7.jpg" alt="back photo" width="100%" height="600px">
        
    </div>

    <div id="Courses" class="home-card-container">
        <h1>Our Courses</h1>
        <br />
        <div class="card-container">
            <div class="course_catalog">
                <?php include 'course_catalog.php'; ?>
            </div>
        </div>
    </div>

    <div id="MyCourses" class="home-card-container" style="padding-bottom: 100px;">
        <h1>My Courses</h1>
        <br />
        <div class="card-container">
            <?php if (count($unlocked_courses) > 0): ?>
                <?php foreach ($unlocked_courses as $course): ?>
                    <div class="course-card">
                        <img src="<?php echo htmlspecialchars($course['image_url']); ?>" alt="Course Image" style="width:320px;height:250px;">
                        <h2><?php echo htmlspecialchars($course['course_name']); ?></h2>
                        <h5> Prof.  <?php echo htmlspecialchars($course['faculty']); ?> is currently teaching this course, and he is also bringing his deep knowledge and experience to the classroom. </h5>
                        <p style="padding:10px;"><?php echo htmlspecialchars($course['description']); ?></p>
                        <p style="text-align:center;">Price: ₹<?php echo htmlspecialchars($course['price']); ?> For 3 Months</p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>You have not unlocked any courses yet.</p>
            <?php endif; ?>
        </div>
    </div>

    <script type="text/javascript" src="https://d1tgh8fmlzexmh.cloudfront.net/ccbp-static-website/js/ccbp-ui-kit.js"></script>
</body>

</html>

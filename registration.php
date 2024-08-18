<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: profile.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="img/logo1.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Include SweetAlert2 -->
    
</head>
<body>
    <header>
        <nav>
            <div class="nav-left">
                <ul>
                    <li><a href="login.php">Back</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container" style="margin-top: 10px;">
        <?php
        if (isset($_POST["submit"])) {
            $fullName = $_POST["fullname"];
            $email = $_POST["email"];
            $number = $_POST["number"];
            $address = $_POST["address"];
            $institute = $_POST["institute"];
            $branch = $_POST["branch"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["repeat_password"];
            
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $errors = array();
            
            if (empty($fullName) || empty($email) || empty($number) || empty($address) || $institute === "" || $branch === "" || empty($password) || empty($passwordRepeat)) {
                array_push($errors, "All fields are required");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Email is not valid");
            }
            if (strlen($password) < 8) {
                array_push($errors, "Password must be at least 8 characters long");
            }
            if ($password !== $passwordRepeat) {
                array_push($errors, "Password does not match");
            }
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if ($rowCount > 0) {
                array_push($errors, "Email already exists!");
            }
            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            } else {
                $sql = "INSERT INTO users (full_name, email, number, address, institute, branch, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt, "sssssss", $fullName, $email, $number, $address, $institute, $branch, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>You are registered successfully.</div>";
                    echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'Registration Successful!',
                                showConfirmButton: true
                            });
                        });
                    </script>";
                } else {
                    die("Something went wrong");
                }
            }
        }
        ?>
        <h1>User Registration</h1>
        <form action="registration.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="fullname">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="number">Number:</label>
                <input type="text" class="form-control" name="number">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" name="address">
            </div>
            <div class="form-group">
                <label for="institute">Institute:</label>
                <select id="institute" class="form-control" name="institute">
                    <option value="select">Select</option>
                    <option value="Amity University, Kolkata">Amity University, Kolkata</option>
                    <option value="Institute of Engineering & Management, Kolkata">Institute of Engineering & Management, Kolkata</option>
                    <option value="Sister Nivedita University, Kolkata">Sister Nivedita University, Kolkata</option>
                    <option value="University of Engineering & Management, Kolkata">University of Engineering & Management, Kolkata</option>
                </select>
            </div>
            <!-- const branchesFaculty = ['Select', 'University of Engineering & Management, Kolkata', 'Institute of Engineering & Management, Kolkata', 'Amity University, Kolkata', 'Sister Nivedita University, Kolkata'];
            const branchesStudent = ['Select','B.Tech', 'BCA', 'BBA', 'M.Tech', 'MCA',  'MBA'];
             -->
            <div class="form-group">
                <label for="branch">Branch:</label>
                <select id="branch" class="form-control" name="branch">
                    <option value="select">Select</option>
                    <option value="B.Tech">B.Tech</option>
                    <option value="BCA">BCA</option>
                    <option value="BBA">BBA</option>
                    <option value="M.Tech">M.Tech</option>
                    <option value="MCA">MCA</option>
                    <option value="MBA">MBA</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label for="password">Confirm-Password:</label>
                <input type="password" class="form-control" name="repeat_password">
            </div>
            
            <div class="form-btn" style="padding-bottom: 10px;">
                <button type="submit" name="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
        <div>
            <p>Already Registered! <a href="login.php">Login Here</a></p>
        </div>
    </div>
</body>
</html>

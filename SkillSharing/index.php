<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Skill Sharing Platform</title>
    <link rel="icon" type="image/x-icon" href="img/logo1.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
    <header>
        <nav>
            <div class="nav-left">
                <img src="img/logo1.png" alt="Logo" style="width: 120px; height: 60px;border-radius:26px;margin-left:50px">
            </div>
            <div class="nav-center">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#services">Our Services</a></li>
                    <li><a href="#partners">Our Partners</a></li>
                    <!-- <li><a href="#curriculum">Curriculum</a></li> -->
                    <li><a href="#contact">Contact Us</a></li>
                </ul>
            </div>
            <div class="nav-right">
                <ul>
                    
                    <li><a href="login.php" id="loginBtn" style="color: rgb(40, 96, 216);"><i class="fas fa-user"></i> Login</a></li>

                </ul>
            </div>
        </nav>
    </header>


    <section id="home">
        <div class="hero-banner">
            <div class="slides">
                <img src="img/background4.jpg" alt="Hero Banner 2">
                <div class="hero-text">
                    <h1><span class="typing-text"></span></h1>
                    <!-- <a href="registation.php" class="btn btn-primary">Click Here<br> For Registation</a> -->
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="about">
        <div class="about-section">
            
            <div class="about-text">
                <h1 style="font-weight:bold">About Us</h1>
                <!-- <hr class="new1"> -->
                <p>
                    Welcome to our Community Skill Sharing Platform, where learning is transformed through the collective expertise of professionals. Our platform connects users with valuable skills and knowledge, drawn from the experiences of experts who have mastered their fields. Users gain access to a wealth of online tools, training, and real-world insights, available anytime, anywhere. This dynamic resource ensures that anyone, anywhere can benefit from the best educational experiences and skill development opportunities.
                </p>
            </div>
            <div class="about-image">
                <img src="img/background.jpg" alt="About Us" style="width: 43rem;height: 25rem">
            </div>
        </div>
    </section>


    <!-- Our Services Section -->
    <section id="services" class="services-section text-center">
        <div class="container">
            <h2 class="about-heading" style="font-family:serif; margin-left: 0;padding-bottom:20px; font-weight:bold">Our Services</h2>
            <!-- <hr class="new4"> -->
            <div class="row">
                <!-- Sample cards -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://img.freepik.com/free-vector/online-tutorials-concept_52683-37480.jpg?size=626&" class="card-img-top" alt="Service Image">
                        <div class="card-body">
                            <h3 class="card-title">Courses and Lessons</h3>
                            <a href="profile.php" class="btn btn-orange">Learn More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://img.freepik.com/free-vector/online-tutorials-concept_52683-37481.jpg?size=626&" class="card-img-top" alt="Service Image">
                        <div class="card-body">
                            <h3 class="card-title">Live Classes and Webinars</h3>
                            <a href="profile.php" class="btn btn-orange">Learn More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://img.freepik.com/free-vector/employees-with-laptops-learning-professional-trainig-internal-education-employee-education-professional-development-program-concept_335657-806.jpg?size=626&" class="card-img-top" alt="Service Image">
                        <div class="card-body">
                            <h3 class="card-title">Lifelong Learning and Upskilling</h3>
                            <a href="profile.php" class="btn btn-orange">Learn More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Add more cards with similar structure -->
            </div>
        </div>
    </section>

    <section id="partners" class="clients-section text-center">
        <h2 class="about-heading" style="font-family:serif; margin-left: 0; font-weight:bold">Our Partners</h2>
        <!-- <hr class="new2"> -->
        <div class="clients-container">
            <div class="clients-list">
                <img src="img/ibm2.png" alt="Client 1">
                <img src="img/google.png" alt="Client 2">
                <img src="img/microsoft.png" alt="Client 3">
                <img src="img/amazon.png" alt="Client 4">
                
            </div>
            <br>
            <div class="clients-list">
                
                <img src="img/hcl.png" alt="Client 5" style="width: 330px;height: 400px">
                <img src="img/tcs.png" alt="Client 6">
            </div>
        </div>
    </section>

    <section id="contact" class="conta">
        <h2 style="font-family:serif; font-weight:bold">Contact Us</h2>
        <!-- <hr class="new3"> -->
        <div class="form">
            <form id="contactForm" action="contact.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
                <button type="submit" style="background-color:#0d6efd ">Submit</button>
            </form>
        </div>
    </section>
    
    <footer>
        <div class="row">
            <div class="contact_info">
                <h3>Contact Info:</h3>
                <hr>
                <div class="row">
                    <div class="call">
                        <h5>Call Us:</h5>
                        <p>+91 9648571234</p>
                        <p>+91 9875642317</p>
                    </div>
                    <div class="mail">
                        <h5>E-mail Us:</h5>
                        <p>skillup@gmail.com</p>
                        <p>skillshare@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="follow">
                <h3>Follow Us:</h3>
                <hr>
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-linkedin"></a>
                <a href="#" class="fa fa-youtube"></a>
                <a href="#" class="fa fa-instagram"></a>
                <p style="padding-top: 35px;">© SKILLUP, 2024. All Rights Reserved.</p>
            </div>
            <!-- <p>© SKILLUP, 2024. All Rights Reserved.</p> -->
        </div>
        <!-- <p>Copyright © all writes are reserved</p> -->
        <!-- <p>© SKILLUP, 2024. All Rights Reserved.</p> -->
        
    </footer>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Perform form validation and submission using AJAX (if needed)
            var form = event.target;
            var formData = new FormData(form);

            // Example AJAX request (replace with your actual AJAX call)
            fetch(form.action, {
                method: form.method,
                body: formData
            }).then(response => response.json())
            .then(data => {
                // Assuming the server returns a success message in JSON format
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Your message has been sent successfully!',
                    });
                    form.reset(); // Reset the form after successful submission
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'There was an error sending your message. Please try again later.',
                    });
                }
            }).catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'There was an error sending your message. Please try again later.',
                });
            });
        });
    </script>
    <script>
        const text = "Welcome to our Community Skill Sharing Platform, where you can exchange skills and knowledge.";
        let index = 0;
    
        function typeText() {
            if (index < text.length) {
                document.querySelector('.typing-text').textContent += text.charAt(index);
                index++;
                setTimeout(typeText, 100); // Adjust typing speed by changing the delay time
            }
        }
    
        document.addEventListener('DOMContentLoaded', typeText);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

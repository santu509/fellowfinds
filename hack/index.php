<?php
session_start();
include_once('connection.php');
?>
<style>
    /* Base Navbar Gradient */
    .custom-navbar {
        background: linear-gradient(135deg, #626ded 0%, #7d57a6 100%);
    }

    /* Logo Constraint */
    .nav-logo {
        max-height: 50px;
        width: auto;
        object-fit: contain;
    }

    /* Hamburger Menu Icon Color */
    .custom-navbar .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    .custom-navbar .navbar-toggler:focus {
        box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 0.25);
    }

    /* Navigation Links */
    .nav-link {
        color: #ffffff !important;
        font-weight: 500;
        font-size: 16px;
        transition: color 0.3s ease;
    }

    .nav-link:hover {
        color: rgba(255, 255, 255, 0.7) !important;
    }

    .login-link {
        transition: opacity 0.3s ease;
    }

    .login-link:hover {
        opacity: 0.8;
    }

    /* Sign Up Button */
    .btn-custom-primary {
        background-color: #188ef6;
        color: #ffffff;
        border: none;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-custom-primary:hover {
        background-color: #1579d4;
        color: #ffffff;
        transform: translateY(-2px);
    }

    .section-padding {
        padding: 80px 0;
    }

    .text-gradient {
        background: linear-gradient(135deg, #626ded 0%, #7d57a6 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Category Card */
    .category-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
        border: none;
        border-radius: 12px;
    }

    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }

    .category-icon {
        font-size: 2.5rem;
        color: #7d57a6;
        margin-bottom: 15px;
    }

    /* Testimonial Card Hover */
    .testimonial-card {
        transition: transform 0.3s;
        border-radius: 16px;
    }

    .testimonial-card:hover {
        transform: scale(1.02);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08) !important;
    }

    /* Contact Address Cards Modern Style */
    .contact-box {
        display: flex;
        align-items: center;
        background: #f8f9fa;
        padding: 20px;
        border-radius: 12px;
        margin-bottom: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
        transition: all 0.3s ease;
        border-left: 5px solid transparent;
    }

    .contact-box:hover {
        background: #ffffff;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        transform: translateX(5px);
    }

    .contact-box.location:hover {
        border-left-color: #dc3545;
    }

    .contact-box.email:hover {
        border-left-color: #0d6efd;
    }

    .contact-box.phone:hover {
        border-left-color: #198754;
    }

    .contact-icon {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 1.5rem;
        margin-right: 15px;
    }

    /* Rating Stars */
    .rating-stars i {
        color: #ffc107;
        cursor: pointer;
        font-size: 1.5rem;
        transition: transform 0.2s;
    }

    .rating-stars i:hover {
        transform: scale(1.2);
    }

    .map-container {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        height: 400px;
    }

    @media (max-width: 991px) {
        .navbar-nav {
            padding-top: 1rem;
        }

        .nav-item {
            margin-bottom: 0.5rem;
        }

        .map-container {
            height: 280px;
        }
    }
    .heading{
        text-decoration: none;
    }
    
</style>
</head>

<div class="bg-light">

    <!-- Navbar -->
    <?php include_once('nav.php') ?>

    <!-- Hero Banner Section -->
    <section class="section-padding bg-white hero-section">
        <div class="container">
            <div class="row align-items-center text-center text-lg-start">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h1 class="display-4 fw-bold mb-4">Empower Your Learning with <span class="text-gradient">ShareMyNotes</span></h1>
                    <p class="lead text-muted mb-4">Discover, download, and share high-quality study materials, lecture notes, and guides created by top students globally.</p>
                    <div class="d-flex flex-column flex-sm-row justify-content-center justify-content-lg-start gap-3">
                        <a href="#" class="btn btn-custom-primary btn-info btn-lg rounded-pill px-4 shadow-sm">Explore Notes</a>
                        <a href="#" class="btn btn-outline-secondary btn-lg rounded-pill px-4">Upload Yours</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                   
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section id="categories" class="section-padding">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Browse by Category</h2>
                <p class="text-muted">Find exactly what you need from our organized collections.</p>
            </div>

            <div class="row g-4">
                <?php
                function category()
                {
                    global $connect;
                    $sql = "SELECT * FROM categories";
                    $run = mysqli_query($connect, $sql);
                    if (mysqli_num_rows($run)) {
                        return mysqli_fetch_all($run, MYSQLI_ASSOC);
                    }
                }

                $alldata = category();
                foreach ($alldata as $data) {
                ?>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="view_details.php" class="heading">
                        <div class="card category-card text-center p-4 shadow-sm h-100 bg-white">
                            <i class="fa-solid fa-brain category-icon"></i>
                            <h5 class="fw-bold"><?php echo $data['category_name']; ?></h5>
                            <p class="text-muted small"><?php echo $data['description']; ?></p>
                        </div>
                        </a>
                    </div>

                <?php } ?>
            </div>


        </div>
    </section>

    <!-- Testimonials Slider Section -->
   <section class="section-padding bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">What Our Users Say</h2>
                <p class="text-muted">Join thousands of successful students worldwide.</p>
            </div>

            <div id="testimonialSlider" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators" style="bottom: -50px;">
                    <button type="button" data-bs-target="#testimonialSlider" data-bs-slide-to="0" class="active" aria-current="true"></button>
                    <button type="button" data-bs-target="#testimonialSlider" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#testimonialSlider" data-bs-slide-to="2"></button>
                </div>

                <div class="carousel-inner pb-5">
                    <?php
                    
                    function get_feedbacks() {
                        global $connect;
                        $sql = "SELECT * FROM feedback";
                        $run = mysqli_query($connect, $sql);
                        if ($run && mysqli_num_rows($run) > 0) {
                            return mysqli_fetch_all($run, MYSQLI_ASSOC);
                        }
                        return [];
                    }

                   
                    function get_user_details($id) {
                        global $connect;
                        $sql = "SELECT * FROM users WHERE id='$id'";
                        $run = mysqli_query($connect, $sql);
                        if ($run && mysqli_num_rows($run) > 0) {
                            return mysqli_fetch_assoc($run);
                        }
                        return null;
                    }

                    $alldata = get_feedbacks();
                    $is_first = true; 

                    if (!empty($alldata)) {
                        foreach ($alldata as $data) {
                            $user_id = $data['user_id'];
                            $user_info = get_user_details($user_id);
                            $user_name = $user_info ? $user_info['name'] : 'Unknown User';
                            
                            
                            $feedback_text = isset($data['review']) ? $data['review'] : "The psychology notes I found here saved my midterms! The formatting is so clean and easy to read. Highly recommended!";
                    ?>

                    <div class="carousel-item <?php echo $is_first ? 'active' : ''; ?>">
                        <div class="col-11 col-md-8 col-lg-6 mx-auto">
                            <div class="card border-0 shadow-sm p-4 p-md-5 text-center bg-light testimonial-card">
                                <div class="text-warning mb-3 fs-4">
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                </div>
                                <p class="fst-italic text-muted fs-5">"<?php echo htmlspecialchars($feedback_text); ?>"</p>
                                <h6 class="fw-bold mt-4 mb-1 fs-5">- <?php echo htmlspecialchars($user_name); ?></h6>
                                <small class="text-muted">Student</small>
                            </div>
                        </div>
                    </div>

                    <?php 
                            $is_first = false; 
                        } 
                    } else {
                        echo '<p class="text-center">No reviews found.</p>';
                    }
                    ?>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialSlider" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialSlider" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <!-- Map, Address & Rating Section -->
    <section id="contact" class="section-padding">
        <div class="container">
            <div class="row g-5">

                <!-- Left Side: Modern Contact Details -->
                <div class="col-lg-6">
                    <div class="mb-5">
                        <h3 class="fw-bold mb-4">Get In Touch</h3>

                        <!-- New Modified Address Block 1 -->
                        <div class="contact-box location">
                            <div class="contact-icon bg-danger text-white shadow-sm">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1 fs-5">Our Campus</h6>
                                <p class="text-muted mb-0">123 University Boulevard, Tech Valley, Sector 52, 700091</p>
                            </div>
                        </div>

                        <!-- New Modified Address Block 2 -->
                        <div class="contact-box email">
                            <div class="contact-icon bg-primary text-white shadow-sm">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1 fs-5">Email Address</h6>
                                <p class="text-muted mb-0">support@sharemynotes.com</p>
                            </div>
                        </div>

                        <!-- New Modified Address Block 3 -->
                        <div class="contact-box phone">
                            <div class="contact-icon bg-success text-white shadow-sm">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1 fs-5">Phone Number</h6>
                                <p class="text-muted mb-0">+91 98765 43210</p>
                            </div>
                        </div>
                    </div>

                    <div class="map-container w-100">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3684.270631627091!2d88.4299596149595!3d22.56863118518451!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0275ade542f70d%3A0x6b95b4c1ea9f6c0!2sSector%20V%2C%20Bidhannagar%2C%20Kolkata%2C%20West%20Bengal!5e0!3m2!1sen!2sin!4v1690000000000!5m2!1sen!2sin"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <!-- Right Side: Review Form -->
                <div class="col-lg-6">
                    <div class="card shadow border-0 rounded-4 p-4 p-md-5 bg-white h-100">
                        <div class="mb-4 text-center text-lg-start">
                            <h3 class="fw-bold">Leave a Review</h3>
                            <p class="text-muted">We value your feedback to improve our platform.</p>
                        </div>

                        <form action="All-Action.php" enctype="multipart/form-data" method="POST">
                            <!-- Interactive Stars -->
                            <div class="rating-stars mb-4 text-center text-lg-start">
                                <span class="fw-bold me-2 fs-5 text-dark">Rate Us: </span>
                                <i class="fa-regular fa-star" title="1 Star"></i>
                                <i class="fa-regular fa-star" title="2 Stars"></i>
                                <i class="fa-regular fa-star" title="3 Stars"></i>
                                <i class="fa-regular fa-star" title="4 Stars"></i>
                                <i class="fa-regular fa-star" title="5 Stars"></i>
                            </div>

                            <div class="mb-3">
                                <label for="userName" class="form-label fw-medium">Your Name</label>
                                <input type="text" class="form-control form-control-lg bg-light border-0" id="userName" placeholder="Enter your full name">
                            </div>

                            <div class="mb-4">
                                <label for="userFeedback" class="form-label fw-medium">Your Feedback</label>
                                <textarea class="form-control form-control-lg bg-light border-0" id="userFeedback" name="feedback" rows="10" placeholder="Tell us about your experience..."></textarea>
                            </div>

                            <div class="d-grid mt-auto pt-5">
                                <button type="submit" class="btn btn-custom-primary btn-primary btn-lg rounded-pill shadow-sm" name="submit_review">Submit Review</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div>
            <?php include_once('footer.php') ?>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Rating Script -->
    <script>
        const stars = document.querySelectorAll('.rating-stars i');
        stars.forEach((star, index) => {
            star.addEventListener('click', () => {
                // Reset all stars
                stars.forEach(s => {
                    s.classList.remove('fa-solid');
                    s.classList.add('fa-regular');
                });
                // Highlight clicked star and all before it
                for (let i = 0; i <= index; i++) {
                    stars[i].classList.remove('fa-regular');
                    stars[i].classList.add('fa-solid');
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
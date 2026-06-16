<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FellowFinds - Login & Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background: #f8f9fa;
        }

        .brand-color {
            color: #6E64C5;
        }

        .btn-brand {
            background: #6E64C5;
            color: white;
        }

        .btn-brand:hover {
            background: #5a52a3;
            color: white;
        }

        .right-panel {
            background: linear-gradient(135deg, #ebe9fb, #ffffff);
        }

        .illustration-card {
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row min-vh-100">

            <div class="col-lg-6 d-flex align-items-center justify-content-center bg-white">
                <div style="width:100%; max-width:450px;">

                    <div class="text-center mb-5">
                        <h1 class="fw-bold brand-color">FellowFinds</h1>
                    </div>

                    <div id="login-section">
                        <div class="text-center mb-4">
                            <h3 class="fw-bold">Welcome Back</h3>
                            <p class="text-muted">Log in to your account</p>
                        </div>
                        <form action="All-Action.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                                    <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                            </div>
                            <button type="submit" name="login_btn" class="btn btn-brand w-100">Login</button>
                        </form>
                        <div class="text-center mt-4">
                            Don't have an account?
                            <button type="button" class="btn btn-link text-decoration-none" onclick="toggleForms()">Sign Up</button>
                        </div>
                    </div>

                    <div id="register-section" style="display:none;">
                        <div class="text-center mb-4">
                            <h3 class="fw-bold">Create Account</h3>
                            <p class="text-muted">Join FellowFinds</p>
                        </div>

                        <form action="All-Action.php" method="POST" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Department</label>
                                <input type="text" name="department" class="form-control" placeholder="E.g. Computer Science" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <div class="input-group">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                                    <button type="button" class="btn btn-brand" id="verifyEmailBtn">Verify</button>
                                </div>
                            </div>

                            <div id="passwordSection" style="display:none;">
                                <div class="alert alert-success py-2"> Valid Email Address!</div>

                                <div class="mb-3">
                                    <label class="form-label">Profile Image <span class="text-muted">(optional)</span></label>
                                    <input type="file" name="profile_image" class="form-control" accept="image/*">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Create a password" required minlength="8">
                                </div>

                                <button type="submit" name="register_btn" class="btn btn-brand w-100">Create Account</button>
                            </div>

                        </form>
                        <div class="text-center mt-4">
                            Already have an account?
                            <button type="button" name="login" class="btn btn-link text-decoration-none" onclick="toggleForms()">Login</button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center right-panel">
                <div class="p-5">
                    <h2 class="fw-bold mb-4">Your Campus Marketplace, Simplified.</h2>
                    <p class="text-muted mb-5">Connect with verified students to buy, sell and exchange resources safely within your college community.</p>
                </div>
            </div>

        </div>
    </div>

    <script>
        function toggleForms() {
            const login = document.getElementById("login-section");
            const register = document.getElementById("register-section");
            login.style.display = login.style.display === "none" ? "block" : "none";
            register.style.display = register.style.display === "none" ? "block" : "none";
        }

        // ── JS Email Validation ──────────────────────────────────────────────────────────
        document.getElementById("verifyEmailBtn").addEventListener("click", function() {
            const emailInput = document.getElementById("email");
            const email = emailInput.value.trim();

            // Standard Regex for Email Validation
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!email) {
                alert("Please enter your email first!");
                return;
            }

            if (!emailPattern.test(email)) {
                alert("Please enter a valid email format (e.g., student@college.edu)!");
                return;
            }

            // If email is valid format, show the password section
            document.getElementById("passwordSection").style.display = "block";

            // Lock the email field and hide the verify button
            emailInput.readOnly = true;
            this.style.display = "none";
        });
    </script>
</body>

</html>
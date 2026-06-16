<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap NoteShare Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&family=Inter:wght@100..900&family=JetBrains+Mono:wght@100..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    <style>
        /* Base Navbar Gradient */
        .custom-navbar {
            background: linear-gradient(135deg, #626ded 0%, #7d57a6 100%);
        }

        /* Logo Constraint - CRITICAL for responsiveness */
        .nav-logo {
            max-height: 60px;
            width: auto;
            object-fit: contain;
        }

        /* Hamburger Menu Icon Color */
        .custom-navbar .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Subtle glow on mobile menu click */
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

        /* Sign Up Button */
        .btn-custom-signup {
            background-color: #188ef6;
            color: #ffffff;
            border: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-custom-signup:hover {
            background-color: #1579d4;
            color: #ffffff;
            transform: translateY(-2px);
        }

        /* Mobile specific spacing adjustments */
        @media (max-width: 991px) {
            .navbar-nav {
                padding-top: 1rem;
            }

            .nav-item {
                margin-bottom: 0.5rem;
            }

            /* Center align dropdown items on mobile */
            .dropdown-menu {
                text-align: center;
                border: 1px solid rgba(0, 0, 0, .1) !important;
                margin-top: 10px;
            }
        }

        .dropdown-menu {
            z-index: 9999 !important;
        }
    </style>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg px-5 custom-navbar shadow-sm">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="asset/Untitled design (2)-Photoroom.png" alt="ShareMyNotes Logo" class="nav-logo">
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-lg-4 text-center text-lg-start">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about_us.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="upload_notes.php">Upload Note</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view_details.php">View Resources</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact_us.php">Contact Us</a>
                </li>
            </ul>

            <ul class="navbar-nav text-center text-lg-start d-flex align-items-center mt-3 mt-lg-0">
                <?php if (isset($_SESSION['user_id'])) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center justify-content-center gap-2" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php
                            // Profile Image Logic Update
                            $profile_img_src = 'default.png'; // Make sure default.png is in your main folder
                            if (!empty($_SESSION['profile_image'])) {
                                $db_image = $_SESSION['profile_image'];
                                // Check if 'uploads/' is missing from the database value
                                if (strpos($db_image, 'uploads/') === false) {
                                    $profile_img_src = 'uploads/' . $db_image;
                                } else {
                                    $profile_img_src = $db_image;
                                }
                            }
                            ?>
                            <img src="asset/pro.jpg"
                                alt="Profile"
                                width="45"
                                height="45"
                                class="rounded-circle border border-2 border-white shadow-sm"
                                style="object-fit:cover;">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="profileDropdown">
                            <li class="px-3 py-2 text-center text-lg-start">
                                <h6 class="mb-0 fw-bold"><?php echo isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : 'User'; ?></h6>
                                <small class="text-muted"><?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?></small>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            
                            <li>
                                <a class="dropdown-item text-danger" href="logout.php"> Logout</a>
                            </li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li class="nav-item ms-lg-3">
                        <a href="login.php" class="btn btn-custom-signup rounded-pill px-4 fw-semibold shadow-sm">
                            Sign Up/Login
                        </a>
                    </li>
                <?php } ?>
            </ul>

        </div>
    </nav>
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title fw-bold" id="addCategoryModalLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="All-Action.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label fw-semibold">Category Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="categoryName" name="category_name" placeholder="e.g., Programming, Mathematics" required>
                        </div>

                        <div class="mb-3">
                            <label for="categoryDescription" class="form-label fw-semibold">Description (Optional)</label>
                            <textarea class="form-control" id="categoryDescription" name="category_description" rows="3" placeholder="Write a short description about this category..."></textarea>
                        </div>
                    </div>

                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-info px-4" name="add_category_btn">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
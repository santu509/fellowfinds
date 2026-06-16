<?php
include_once('nav.php');
include_once('connection.php');
global $connect;
if (!$connect) {
    die("Database Connection Failed");
}

// আপনার অথেন্টিকেশন সিস্টেম অনুযায়ী সেশন থেকে লগইন করা ইউজারের ID নিন
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
?>

<style>
    /* Modern Card Design */
    .resource-card {
        transition: all 0.4s ease;
        border-radius: 18px;
        border: 1px solid rgba(0, 0, 0, 0.05);
        background: #ffffff;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        overflow: hidden;
        /* Keeps image corners rounded */
    }

    .resource-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12) !important;
    }

    /* Image Zoom Effect on Hover */
    .img-container {
        overflow: hidden;
        height: 220px;
        border-top-left-radius: 18px;
        border-top-right-radius: 18px;
    }

    .card-img-top {
        transition: transform 0.5s ease;
        object-fit: cover;
    }

    .resource-card:hover .card-img-top {
        transform: scale(1.08);
        /* Slight zoom in */
    }

    /* Modern Price Badge */
    .price-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        padding: 6px 16px;
        border-radius: 30px;
        font-weight: 700;
        font-size: 0.85rem;
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
        z-index: 10;
        letter-spacing: 0.5px;
    }
    .price-badge.bg-purchased {
        background: linear-gradient(135deg, #17a2b8, #0dcaf0);
        color: white !important;
        box-shadow: 0 4px 12px rgba(23, 162, 184, 0.3);
    }

    .status-badge {
        font-size: 0.75rem;
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 600;
        letter-spacing: 0.3px;
    }

    /* Modern Buttons */
    .btn-modern {
        border-radius: 25px;
        font-weight: 600;
        padding: 8px 15px;
        transition: all 0.3s ease;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
    }

    .btn-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
    }

    /* PDF Placeholder */
    .pdf-placeholder {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    }
</style>

<div class="container py-5">

    <?php if (isset($_GET['msg']) && isset($_GET['text'])): ?>
        <?php
        $alert_type = 'info';
        if ($_GET['msg'] == 'success') $alert_type = 'success';
        if ($_GET['msg'] == 'error') $alert_type = 'danger';
        ?>
        <div id="statusAlert" class="alert alert-<?= $alert_type; ?> alert-dismissible fade show text-center shadow-sm mb-4 fw-bold" role="alert" style="border-radius: 12px;">
            <?= htmlspecialchars($_GET['text']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <script>
            setTimeout(function() {
                var alertBox = document.getElementById('statusAlert');
                if (alertBox) {
                    alertBox.style.transition = "opacity 0.5s ease";
                    alertBox.style.opacity = "0";
                    setTimeout(function() {
                        alertBox.remove();
                    }, 500); // Remove from DOM after fade out
                }
            }, 3500); // 3.5 seconds
        </script>
    <?php endif; ?>

    <div class="text-center mb-5">
        <h1 class="fw-bold" style="color: #2c3e50;">Browse Resources</h1>
        <p class="text-muted" style="font-size: 1.1rem;">Find notes, books, and study materials easily.</p>
    </div>

    <?php
    $cat_sql = "SELECT * FROM categories ORDER BY category_name ASC";
    $cat_result = mysqli_query($connect, $cat_sql);

    if (mysqli_num_rows($cat_result) > 0) {
        while ($category = mysqli_fetch_assoc($cat_result)) {
            $cat_id = $category['id'];

            $res_sql = "SELECT * FROM resources 
                        WHERE category_id='$cat_id' 
                        ORDER BY created_at DESC";

            $res_result = mysqli_query($connect, $res_sql);

            if (mysqli_num_rows($res_result) > 0) {
    ?>
                <div class="mb-5">
                    <h3 class="mb-4 text-primary text-center border-bottom pb-2 fw-bold" style="letter-spacing: 0.5px;">
                        <?= htmlspecialchars($category['category_name']); ?>
                    </h3>

                    <div class="row">
                        <?php
                        while ($resource = mysqli_fetch_assoc($res_result)) {
                            $file_path = $resource['image'];
                            $extension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));

                            // ফ্রী নাকি পেইড তা নির্ধারণের লজিক
                            $is_free = false;
                            $price_display = "";
                            $price = floatval($resource['price']);

                            if ($resource['type'] == 'donate' || $price == 0) {
                                $price_display = "Free";
                                $is_free = true;
                            } elseif ($resource['type'] == 'exchange') {
                                $price_display = "Exchange";
                                $is_free = true;
                            } else {
                                $price_display = "₹" . htmlspecialchars($resource['price']);
                            }

                            // ডাটাবেজ চেক: ইউজার এই পেইড ফাইলটি ইতিমধ্যে কিনেছেন কিনা
                            $has_purchased = false;
                            if (!$is_free && $user_id) {
                                $check_purchase = mysqli_query($connect, "SELECT id FROM purchases WHERE user_id='$user_id' AND resource_id='{$resource['id']}' AND status='success'");
                                if (mysqli_num_rows($check_purchase) > 0) {
                                    $has_purchased = true;
                                }
                            }
                        ?>

                            <div class="col-md-4 mb-4">
                                <div class="card h-100 resource-card position-relative">

                                    <div class="price-badge <?= $has_purchased ? 'bg-purchased' : '' ?>">
                                        <?= $has_purchased ? '<i class="fas fa-check-circle"></i> Purchased' : $price_display; ?>
                                    </div>

                                    <?php
                                    // ফাইলটি পেইড এবং কেনা না থাকলে ইমেজটি ব্লার (ঝাপসা) করে লক করা হবে
                                    $blur_style = (!$is_free && !$has_purchased) ? 'filter: blur(6px); pointer-events: none; transform: scale(1);' : '';

                                    if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                                    ?>
                                        <div class="img-container">
                                            <img src="<?= htmlspecialchars($file_path); ?>"
                                                class="card-img-top w-100 h-100"
                                                style="<?= $blur_style ?>">
                                        </div>
                                    <?php
                                    } elseif ($extension == 'pdf') {
                                    ?>
                                        <div class="img-container d-flex align-items-center justify-content-center pdf-placeholder" style="<?= $blur_style ?>">
                                            <div class="text-center text-danger">
                                                <h1 style="font-size: 3.5rem; text-shadow: 2px 2px 5px rgba(0,0,0,0.1);">📄</h1>
                                                <p class="mb-0 fw-bold">PDF Document</p>
                                            </div>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="img-container">
                                            <img src="https://via.placeholder.com/400x220?text=No+Preview"
                                                class="card-img-top w-100 h-100"
                                                style="<?= $blur_style ?>">
                                        </div>
                                    <?php
                                    }
                                    ?>

                                    <div class="card-body d-flex flex-column pt-4">
                                        <h5 class="card-title fw-bold text-dark mb-2" style="font-size: 1.15rem;">
                                            <?= htmlspecialchars($resource['title']); ?>
                                        </h5>

                                        <p class="card-text text-muted mb-3 flex-grow-1" style="font-size: 0.9rem; line-height: 1.5;">
                                            <?= substr(htmlspecialchars($resource['description']), 0, 80) . '...'; ?>
                                        </p>

                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <span class="badge bg-light text-dark border status-badge">
                                                🔖 <?= ucfirst(htmlspecialchars($resource['type'])); ?>
                                            </span>
                                            <span class="badge bg-light text-success border status-badge">
                                                ✔️ <?= ucfirst(htmlspecialchars($resource['status'])); ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="card-footer bg-transparent border-top-0 d-flex gap-2 pb-3 px-3">
                                        <?php if ($is_free || $has_purchased): ?>
                                            <button type="button" class="btn btn-primary btn-modern flex-fill" data-bs-toggle="modal" data-bs-target="#previewModal<?= $resource['id']; ?>">
                                                👁️ View
                                            </button>

                                            <?php if ($file_path): ?>
                                                <a href="<?= htmlspecialchars($file_path); ?>" download class="btn btn-outline-success btn-modern flex-fill text-center">
                                                    ⬇️ Download
                                                </a>
                                            <?php endif; ?>

                                        <?php else: ?>
                                            <button type="button" class="btn btn-warning btn-modern flex-fill text-dark" onclick="payWithRazorpay(<?= $resource['id']; ?>, <?= $price; ?>, '<?= htmlspecialchars(addslashes($resource['title'])); ?>')">
                                                💳 Buy Now - ₹<?= $price; ?>
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <?php if ($is_free || $has_purchased): ?>
                                <div class="modal fade" id="previewModal<?= $resource['id']; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content" style="border-radius: 16px; overflow: hidden;">
                                            <div class="modal-header bg-light border-0">
                                                <h5 class="modal-title fw-bold"><?= htmlspecialchars($resource['title']); ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center p-0 bg-dark">
                                                <?php if ($extension == 'pdf'): ?>
                                                    <iframe src="<?= htmlspecialchars($file_path); ?>" width="100%" height="600px" style="border: none;"></iframe>
                                                <?php elseif (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])): ?>
                                                    <img src="<?= htmlspecialchars($file_path); ?>" class="img-fluid" alt="Preview Image" style="max-height: 80vh; object-fit: contain;">
                                                <?php else: ?>
                                                    <div class="p-5 text-white">
                                                        <p>Preview is not available for this file type.</p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="modal-footer border-0 bg-light">
                                                <a href="<?= htmlspecialchars($file_path); ?>" download class="btn btn-success btn-modern">
                                                    ⬇️ Download File
                                                </a>
                                                <button type="button" class="btn btn-secondary btn-modern" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                        <?php
                        }
                        ?>
                    </div>
                </div>
    <?php
            }
        }
    } else {
        echo "<div class='alert alert-warning text-center shadow-sm' style='border-radius: 12px;'>No Categories Found</div>";
    }

    mysqli_close($connect);
    ?>

</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    function payWithRazorpay(resourceId, price, title) {
        var loggedInUserId = '<?= $user_id; ?>';
        if (!loggedInUserId) {
            alert("Please login first to purchase this resource!");
            return;
        }

        var amountInPaise = price * 100;

        var options = {
            "key": "rzp_test_T2HvcFW4HI2pEi",
            "amount": amountInPaise,
            "currency": "INR",
            "name": "FellowFinds",
            "description": "Payment for " + title,
            "image": "https://yourwebsite.com/logo.png",
            "handler": function(response) {
                var paymentId = response.razorpay_payment_id;
                window.location.href = "verify_payment.php?resource_id=" + resourceId + "&payment_id=" + paymentId + "&amount=" + price;
            },
            "prefill": {
                "name": "",
                "email": "",
                "contact": ""
            },
            "theme": {
                "color": "#3399cc"
            }
        };

        var rzp1 = new Razorpay(options);
        rzp1.on('payment.failed', function(response) {
            alert("Payment Failed! Reason: " + response.error.description);
        });
        rzp1.open();
    }
</script>

<?php include_once('footer.php'); ?>
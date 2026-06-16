
    <?php include('nav.php');?>
    
    <style>
        :root {
            --bs-primary: #006a71;
            --bs-primary-rgb: 0, 106, 113;
        }

        body { font-family: 'Inter', sans-serif; background-color: #fdfcff; color: #1a1c1e; }

        /* Shared Animated Background */
        .aurora-bg {
            position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; z-index: -1;
            background: linear-gradient(135deg, #fdfcff 0%, #f0f7f8 100%);
        }
        .aurora-bg::before {
            content: ''; position: absolute; width: 150vw; height: 150vh;
            background: radial-gradient(circle at 50% 50%, rgba(0, 106, 113, 0.08) 0%, transparent 70%);
            animation: float 20s ease-in-out infinite alternate;
        }
        @keyframes float { 0% { transform: translate(-5%, -5%); } 100% { transform: translate(5%, 5%); } }

        h1, h2, h3 { font-family: 'Sora', sans-serif; font-weight: 700; }
        .glass-panel {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.8);
            border-radius: 1rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.04);
        }
        .form-control { background: rgba(255,255,255,0.5); border: 1px solid rgba(0,106,113,0.1); }
        .btn-primary { background: var(--bs-primary); border: none; transition: 0.3s; }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 10px 20px rgba(0, 106, 113, 0.2); }
    </style>
</head>

<div class="aurora-bg"></div>
<?php if(isset($_GET['success'])) { ?>
<div class="container mt-3">
    <div class="alert alert-success">
        Message sent successfully.
    </div>
</div>
<?php } ?>

<?php if(isset($_GET['error'])) { ?>
<div class="container mt-3">
    <div class="alert alert-danger">
        Failed to send message.
    </div>
</div>
<?php } ?>

<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <!-- Header -->
            <div class="text-center mb-5">
                <h1 class="display-4 text-primary">Get in Touch</h1>
                <p class="text-muted">Have a question or need technical support? We're here to help.</p>
            </div>

            <div class="row g-4">
                <!-- Contact Form -->
                <div class="col-lg-7">
                    <div class="glass-panel p-4 p-md-5 h-100">
                        <form action="contact_action.php" method="POST">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Name</label>
                                    <input type="text"
       class="form-control"
       name="name"
       required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Email</label>
                                    <input type="email"
       class="form-control"
       name="email"
       required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-bold">Subject</label>
                                    <select class="form-select" name="subject">
                                        <option>General Inquiry</option>
                                        <option>Technical Support</option>
                                        <option>Partnership</option>
                                        <option>Security Report</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-bold">Message</label>
                                    <textarea class="form-control"
          rows="5"
          name="message"
          required></textarea>
                                </div>
                                <div class="col-12">
<button type="submit"
        name="contact_submit"
        class="btn btn-primary w-100 py-3 fw-bold text-white">
    Send Message
</button>                       </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Contact Sidebar -->
                <div class="col-lg-5">
                    <div class="d-flex flex-column gap-4 h-100">
                        <!-- Info Card -->
                        <div class="glass-panel p-4">
                            <h3 class="h5 mb-3">Support Channels</h3>
                            <div class="d-flex align-items-center mb-3">
                                <span class="material-symbols-outlined text-primary me-3">mail</span>
                                <span>support@fellowfindes.edu</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-symbols-outlined text-primary me-3">schedule</span>
                                <span>Response time: ~2 hours</span>
                            </div>
                        </div>

                        <!-- FAQ Hint -->
                        <div class="glass-panel p-4 bg-primary bg-opacity-10">
                            <h3 class="h5 text-primary">Need instant answers?</h3>
                            <p class="small text-muted">Check out our Help Center for quick troubleshooting on common login or verification issues.</p>
                            <a href="#" class="btn btn-outline-primary btn-sm">Visit Help Center</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include('footer.php');?>
<script>
setTimeout(function() {
    let alerts = document.querySelectorAll('.alert');

    alerts.forEach(function(alert) {
        alert.style.transition = "all 0.5s ease";
        alert.style.opacity = "0";

        setTimeout(function() {
            alert.remove();
        }, 500);
    });

}, 1000);
</script>
<!-- ==========================================
     RELEVANT, CUSTOM & ATTRACTIVE FOOTER 
     ========================================== -->
<style>
    /* --- Custom Attractive Footer --- */
.custom-footer {
    /* Deep, professional dark gradient to anchor the page */
    background: linear-gradient(135deg, #1a1625 0%, #2d2446 100%);
    color: #ffffff;
    padding: 70px 0 30px 0;
    margin-top: 50px;
    position: relative;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Colorful top border to match the hero theme */
.custom-footer::before {
    content: "";
    position: absolute;
    top: 0; left: 0; right: 0; height: 5px;
    background: linear-gradient(90deg, #626ded, #188ef6, #7d57a6);
}

.footer-heading {
    font-size: 1.1rem;
    font-weight: 700;
    letter-spacing: 1px;
    color: #ffffff;
    margin-bottom: 22px;
    position: relative;
    text-transform: uppercase;
}

.footer-heading::after {
    content: '';
    display: block;
    width: 40px;
    height: 3px;
    background-color: #188ef6;
    margin-top: 10px;
    border-radius: 2px;
    transition: width 0.3s ease;
}

/* Hover effect for footer column headers */
[class*="col-"]:hover .footer-heading::after { width: 65px; }

.footer-link {
    display: block;
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    margin-bottom: 12px;
    font-size: 0.95rem;
    transition: all 0.3s ease;
}

/* Subtle slide & glow on hover */
.footer-link:hover {
    color: #ffffff;
    padding-left: 8px;
    text-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
}

.social-links a {
    display: inline-flex; align-items: center; justify-content: center;
    width: 40px; height: 40px; border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.1);
    color: #fff; margin-right: 12px; font-size: 1.1rem;
    transition: all 0.3s ease; text-decoration: none;
}

.social-links a:hover {
    background-color: #188ef6; color: #ffffff;
    transform: translateY(-4px); box-shadow: 0 8px 15px rgba(24, 142, 246, 0.3);
}

.footer-divider { border-top: 1px solid rgba(255, 255, 255, 0.1); margin: 40px 0 20px 0; }
.copyright-text { font-size: 0.9rem; color: rgba(255, 255, 255, 0.6); }
.bottom-link { font-size: 0.9rem; display: inline-block; transition: color 0.3s; }
.bottom-link:hover { color: #ffffff !important; }

@media (max-width: 991px) {
    .footer-heading { margin-top: 25px; }
}
</style>

<footer class="custom-footer">
    <div class="container">
        <div class="row g-4">
            
            <!-- Column 1: Brand Info & Bio -->
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 pe-lg-4">
                <h4 class="fw-bold text-white mb-3 d-flex align-items-center">
                    <i class="fa-solid fa-book-open text-primary me-2"></i> Fellow Finds
                </h4>
                <p class="text-white-50" style="font-size: 0.95rem; line-height: 1.6;">
                    Your ultimate educational hub for discovering, downloading, and sharing top-tier study materials. We empower students to learn collaboratively and achieve academic success together.
                </p>
            </div>

            <!-- Column 2: Top Categories -->
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12 mt-lg-0 mt-4">
                <h6 class="footer-heading">Top Subjects</h6>
                <a href="#" class="footer-link">Psychology</a>
                <a href="#" class="footer-link">Computer Science</a>
                <a href="#" class="footer-link">Mathematics</a>
                <a href="#" class="footer-link">Biology</a>
                <a href="#" class="footer-link">Literature</a>
            </div>

            <!-- Column 3: Quick Links -->
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 mt-lg-0 mt-4">
                <h6 class="footer-heading">Quick Links</h6>
                <a href="#" class="footer-link">Upload a Note</a>
                <a href="#" class="footer-link">Browse Library</a>
                <a href="#" class="footer-link">Student Forum</a>
                <a href="#" class="footer-link">Become a Contributor</a>
                <a href="#" class="footer-link">About Our Mission</a>
            </div>

            <!-- Column 4: Support & Social Connect -->
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 mt-lg-0 mt-4">
                <h6 class="footer-heading">Connect & Support</h6>
                <a href="#" class="footer-link">Help Center & FAQ</a>
                <a href="#contact" class="footer-link mb-3">Contact Support</a>
                
                <!-- Interactive Social Network Links -->
                <div class="social-links mt-3">
                    <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" title="Twitter"><i class="fab fa-x-twitter"></i></a>
                    <a href="#" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

        </div>

        <!-- Bottom Copyright Section -->
        <div class="footer-divider"></div>
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <p class="copyright-text mb-0">&copy; 2026 ShareMyNotes. Built By The Team-Fellow Finds </p>
            </div>
            <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
                <a href="#" class="bottom-link text-white-50 text-decoration-none me-3 mb-0">Privacy Policy</a>
                <a href="#" class="bottom-link text-white-50 text-decoration-none mb-0">Terms of Use</a>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
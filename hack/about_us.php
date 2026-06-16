
    <?php include('nav.php');?>
    
    <style>
        :root {
            --bs-primary: #006a71;
            --bs-primary-rgb: 0, 106, 113;
            --bs-secondary: #6a46bd;
            --bs-secondary-rgb: 106, 70, 189;
            --surface-variant: #dae4e4;
            --on-surface-variant: #404848;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: #1a1c1e;
            overflow-x: hidden;
            background-color: #fdfcff;
        }

        .aurora-bg {
            position: fixed;
            top: 0; left: 0; width: 100vw; height: 100vh;
            z-index: -1;
            overflow: hidden;
            background: linear-gradient(135deg, #fdfcff 0%, #f0f7f8 100%);
        }
        
        .aurora-bg::before, .aurora-bg::after {
            content: '';
            position: absolute;
            width: 150vw; height: 150vh;
            top: -25%; left: -25%;
            background: radial-gradient(circle at 50% 50%, rgba(0, 106, 113, 0.08) 0%, rgba(106, 70, 189, 0.05) 40%, transparent 70%);
            animation: float 25s ease-in-out infinite alternate;
            mix-blend-mode: multiply;
        }
        
        .aurora-bg::after {
            background: radial-gradient(circle at 70% 30%, rgba(106, 70, 189, 0.06) 0%, rgba(0, 212, 255, 0.05) 40%, transparent 70%);
            animation: float 20s ease-in-out infinite alternate-reverse;
            animation-delay: -5s;
        }

        @keyframes float {
            0% { transform: translate(0, 0) rotate(0deg) scale(1); }
            50% { transform: translate(5%, 5%) rotate(5deg) scale(1.05); }
            100% { transform: translate(-5%, -5%) rotate(-5deg) scale(0.95); }
        }

        h1, h2, h3, .font-display {
            font-family: 'Sora', sans-serif;
            font-weight: 700;
        }

        .text-primary { color: var(--bs-primary) !important; }
        .text-secondary-custom { color: var(--bs-secondary) !important; }
        .bg-primary { background-color: var(--bs-primary) !important; }
        
        .btn-primary { 
            background-color: var(--bs-primary); 
            border-color: var(--bs-primary); 
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary:hover { 
            background-color: #004f54; 
            border-color: #004f54; 
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 106, 113, 0.2);
        }
        .glass-panel {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.04);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 1rem;
        }

        .glass-panel:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 106, 113, 0.08);
        }

        .hero-banner {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 1.5rem;
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        }

        .icon-box {
            width: 56px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .badge-edu {
            padding: 0.35rem 0.85rem;
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(0, 106, 113, 0.2);
            color: var(--bs-primary);
            font-family: 'JetBrains Mono', monospace;
            font-size: 13px;
            font-weight: 600;
            border-radius: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        }

        .step-number {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px dashed rgba(var(--bs-primary-rgb), 0.4);
            margin: 0 auto 1.5rem;
            font-family: 'Sora', sans-serif;
            font-size: 1.75rem;
            color: var(--bs-primary);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            background: #fff;
        }

        .step-item:hover .step-number {
            border-style: solid;
            transform: scale(1.15) rotate(10deg);
            box-shadow: 0 10px 20px rgba(var(--bs-primary-rgb), 0.15);
        }

        .stat-number {
            font-size: 3.5rem;
            font-weight: 800;
            background: linear-gradient(45deg, var(--bs-primary), var(--bs-secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0px 10px 20px rgba(0, 106, 113, 0.1);
        }

        .reveal-section {
            opacity: 0;
            transform: translateY(30px);
            transition: all 1s cubic-bezier(0.2, 1, 0.3, 1);
        }

        .reveal-section.active {
            opacity: 1;
            transform: translateY(0);
        }
        
        .protocol-line {
            position: absolute;
            top: 35px;
            left: 10%;
            right: 10%;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(var(--bs-primary-rgb), 0.3), transparent);
            z-index: -1;
        }
        .img-mask {
            mask-image: linear-gradient(to bottom, black 80%, transparent 100%);
            -webkit-mask-image: linear-gradient(to bottom, black 80%, transparent 100%);
        }
    </style>


<div class="aurora-bg"></div>

<main>
    <!-- Hero Section -->
    <section class="reveal-section active pt-5 pb-3">
        <div class="container text-center">
            <h1 class="display-3 mb-4 text-primary">About <span class="text-secondary-custom">FellowFindes</span></h1>
            <p class="lead text-muted mx-auto mb-5" style="max-width: 700px;">
                Redefining the campus economy. We build digital bridges for physical connections, making student-to-student exchange safer, smarter, and strictly localized.
            </p>
            <div class="position-relative px-lg-5">
                <img alt="Students collaborating on campus" class="hero-banner img-mask" src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=2070&auto=format&fit=crop">
            </div>
        </div>
    </section>

    <section class="py-5 reveal-section">
        <div class="container py-lg-5">
            <div class="row align-items-center g-5">
                <div class="col-md-6">
                    <div class="glass-panel p-3">
                        <img alt="Student collaboration" class="img-fluid rounded" style="object-fit: cover; height: 400px; width: 100%;" src="https://images.unsplash.com/photo-1515162816999-a0c47dc192f7?q=80&w=2070&auto=format&fit=crop">
                    </div>
                </div>
                <div class="col-md-6 ps-lg-5">
                    <h2 class="display-5 text-primary mb-4">Trust by Default, Safety by Design</h2>
                    
                    <div class="d-flex mb-4 gap-4 align-items-start glass-panel p-4">
                        <div class="icon-box bg-white shadow-sm text-primary rounded-circle">
                            <span class="material-symbols-outlined fs-3">security</span>
                        </div>
                        <div>
                            <h3 class="h4 mb-2">Our Mission</h3>
                            <p class="text-muted mb-0">To eliminate the friction and uncertainty of general marketplaces by creating a walled garden exclusively for verified students.</p>
                        </div>
                    </div>
                    
                    <div class="d-flex gap-4 align-items-start glass-panel p-4">
                        <div class="icon-box bg-primary text-white shadow-sm rounded-circle">
                            <span class="material-symbols-outlined fs-3">visibility</span>
                        </div>
                        <div>
                            <h3 class="h4 mb-2">Our Vision</h3>
                            <p class="text-muted mb-0">Empowering student communities to recycle value within their own campus, fostering sustainability, affordability, and mutual trust.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 reveal-section">
        <div class="container">
            <div class="glass-panel p-5 text-center">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="stat-number">20+</div>
                        <h4 class="h5 text-muted mt-2">Verified Campuses</h4>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-number">1k+</div>
                        <h4 class="h5 text-muted mt-2">Active Students</h4>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-number">₹10k</div>
                        <h4 class="h5 text-muted mt-2">Saved Monthly</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 reveal-section">
        <div class="container py-lg-5">
            <div class="text-center mb-5">
                <h2 class="display-5 text-primary">Foundational Pillars</h2>
                <p class="text-muted fs-5">Why students choose FellowFindes over any other platform.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="glass-panel p-5 h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-inline-flex bg-primary bg-opacity-10 p-3 rounded-circle mb-4">
                                <span class="material-symbols-outlined text-primary fs-1">verified_user</span>
                            </div>
                            <h3 class="h2 mb-3">Verified Identity</h3>
                            <p class="text-muted mb-4 fs-5" style="max-width: 500px;">No bots. No scammers. Every single user is authenticated through their official <strong>.edu</strong> institutional email address, ensuring you're only dealing with real peers.</p>
                        </div>
                        <div class="d-flex flex-wrap gap-3">
                            <span class="badge-edu">CCLMS.EDU</span>
                            <span class="badge-edu">OLIVACADEMY.EDU</span>
                            <span class="badge-edu">MAKAUT.EDU</span>

                        </div>
                    </div>
                </div>
                
                <div class="col-lg-5">
                    <div class="glass-panel p-5 h-100 text-center d-flex flex-column align-items-center justify-content-center">
                        <div class="mb-4 d-inline-flex align-items-center justify-content-center rounded-circle border border-primary p-4 bg-white" style="width: 100px; height: 100px;">
                            <span class="material-symbols-outlined text-primary display-4 mb-0" style="font-variation-settings: 'FILL' 1;">handshake</span>
                        </div>
                        <h3 class="h2 mb-3">Student Trust Score</h3>
                        <p class="text-muted">Built on a dynamic reputation system that rewards fair trading, quick responses, and active community contribution.</p>
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="glass-panel p-5">
                        <div class="row align-items-center g-5">
                            <div class="col-lg-5">
                                <div class="d-inline-flex bg-primary bg-opacity-10 p-3 rounded-circle mb-4">
                                    <span class="material-symbols-outlined text-primary fs-1">pin_drop</span>
                                </div>
                                <h3 class="h2 mb-3">Secure On-Campus Meetups</h3>
                                <p class="text-muted fs-5 mb-0">Stay within the safe perimeter of your university. We integrate with campus maps to suggest high-traffic, camera-monitored zones (like student unions or libraries) for every exchange.</p>
                            </div>
                            <div class="col-lg-7">
                                <div class="rounded-4 overflow-hidden position-relative shadow-sm" style="height: 300px; background: #e9ecef;">
                                    <img alt="Campus map interface" class="w-100 h-100 object-fit-cover" src="https://images.unsplash.com/photo-1524661135-423995f22d0b?q=80&w=2074&auto=format&fit=crop">
                                    <div class="position-absolute top-50 start-50 translate-middle bg-white p-3 rounded-circle shadow">
                                        <span class="material-symbols-outlined text-primary fs-2 mb-0 d-block">location_on</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 reveal-section">
        <div class="container py-lg-5">
            <div class="text-center mb-5">
                <h2 class="display-5 text-primary">The FellowFindes Protocol</h2>
                <p class="text-muted fs-5">Simple. Fast. Secure. Get started in minutes.</p>
            </div>
            <div class="row g-5 position-relative mt-2">
                
                <div class="d-none d-lg-block protocol-line"></div>
                
            
                <div class="col-md-4 text-center step-item z-1">
                    <div class="step-number glass-panel shadow-sm">1</div>
                    <h3 class="h5 text-uppercase fw-bold tracking-wider mb-3">Join</h3>
                    <p class="text-muted px-4">Sign up with your .edu email and select your specific university branch to unlock the network.</p>
                </div>
                
               
                <div class="col-md-4 text-center step-item z-1">
                    <div class="step-number glass-panel shadow-sm">2</div>
                    <h3 class="h5 text-uppercase fw-bold tracking-wider mb-3">List</h3>
                    <p class="text-muted px-4">Snap photos of your textbooks, dorm gear, or electronics. Set your price and publish instantly.</p>
                </div>
                
                <div class="col-md-4 text-center step-item z-1">
                    <div class="step-number glass-panel shadow-sm">3</div>
                    <h3 class="h5 text-uppercase fw-bold tracking-wider mb-3">Exchange</h3>
                    <p class="text-muted px-4">Chat securely in-app and meet in a designated campus safe zone to complete the deal.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 reveal-section mb-5">
        <div class="container">
            <div class="glass-panel p-5 text-center position-relative overflow-hidden">
            
                <div class="position-absolute top-0 start-0 w-100 h-100" style="background: radial-gradient(circle at top right, rgba(0, 106, 113, 0.05), transparent 50%); pointer-events: none;"></div>
                
                <div class="py-5 position-relative z-1">
                    <h2 class="display-4 text-primary mb-4 fw-bold">Ready to join the network?</h2>
                    <p class="text-muted fs-5 mb-5 mx-auto" style="max-width: 600px;">
                        Connect with your campus community today. Safe, sustainable, and exclusively for students like you.
                    </p>
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <form class="d-flex flex-column flex-md-row gap-3">
                                <input aria-label="Email address" class="form-control form-control-lg border-0 shadow-sm px-4" placeholder="Enter your .edu email" type="email" required>
                                <button class="btn btn-primary btn-lg px-5 fw-bold text-white shadow-sm" type="submit">
                                    Verify &amp; Join
                                </button>
                            </form>
                        </div>
                    </div>
                    <p class="mt-4 text-muted small fw-medium"><span class="text-success">●</span> Join 5,000+ students actively trading on campus.</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include('footer.php');?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    
    document.addEventListener("DOMContentLoaded", () => {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: "0px 0px -50px 0px"
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                    
                }
            });
        }, observerOptions);

        document.querySelectorAll('.reveal-section').forEach((section, index) => {
            // Stagger initial load if elements are already in viewport
            if(index < 2) {
                setTimeout(() => {
                    section.classList.add('active');
                }, index * 200);
            } else {
                observer.observe(section);
            }
        });
    });
</script>
</body>
</html>
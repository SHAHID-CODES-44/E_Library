<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Library | Digital Reading Platform</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark fixed-top">
      <div class="container">
        <a class="navbar-brand fw-bold" href="#">E Library</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <div class="navbar-nav ms-auto">
            <a class="nav-link" href="about.php"><i class="fas fa-user me-1"></i> About Me</a>
            <a class="nav-link" href="report.php"><i class="fas fa-bug me-1"></i> Report Issue</a>
            <a class="nav-link" href="premium.php"><i class="fas fa-crown me-1"></i> Premium</a>
          </div>
          <div class="d-flex ms-lg-3 mt-2 mt-lg-0">
            <a href="Alogin.php" class="btn btn-light me-2"><i class="fas fa-sign-in-alt me-1"></i> Login As Admin</a>
          </div>
          <div class="d-flex ms-lg-3 mt-2 mt-lg-0">
            <a href="Slogin.php" class="btn btn-light me-2"><i class="fas fa-sign-in-alt me-1"></i> Login</a>
            <a href="Ssignup.php" class="btn btn-outline-light"><i class="fas fa-user-plus me-1"></i> Sign Up</a>
          </div>
        </div>
      </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
      <div class="container text-center">
        <h1 id="text1">Welcome to the Digital Library</h1>
        <p class="lead">Discover thousands of books at your fingertips. Please login or sign up to continue your reading journey.</p>
        <a href="Slogin.php" class="btn btn-light btn-lg px-4 me-2"><i class="fas fa-sign-in-alt me-1"></i> Login</a>
        <a href="Ssignup.php" class="btn btn-outline-light btn-lg px-4"><i class="fas fa-user-plus me-1"></i> Sign Up</a>
      </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
      <div class="container my-5">
        <div class="row justify-content-center text-center">
          <div class="col-md-4 mb-4">
            <div class="card shadow h-100">
              <div class="card-body d-flex flex-column justify-content-center p-4">
                <div class="feature-icon">
                  <i class="fas fa-book-open"></i>
                </div>
                <h5 class="card-title">Browse Books</h5>
                <p class="card-text">Explore our vast library collection and find your next favorite read among thousands of titles.</p>
                <a href="#" class="btn btn-outline-primary mt-auto">Explore</a>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-4">
            <div class="card shadow h-100">
              <div class="card-body d-flex flex-column justify-content-center p-4">
                <div class="feature-icon">
                  <i class="fas fa-star"></i>
                </div>
                <h5 class="card-title">New Arrivals</h5>
                <p class="card-text">Check out the latest books and trending titles recently added to our library.</p>
                <a href="#" class="btn btn-outline-primary mt-auto">View New</a>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-4">
            <div class="card shadow h-100">
              <div class="card-body d-flex flex-column justify-content-center p-4">
                <div class="feature-icon">
                  <i class="fas fa-headset"></i>
                </div>
                <h5 class="card-title">Contact Support</h5>
                <p class="card-text">Need help? Our support team is available 24/7 to assist with your queries.</p>
                <a href="#" class="btn btn-outline-primary mt-auto">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="custom-footer text-white">
      <div class="container py-5">
        <div class="row">
          <div class="col-lg-4 mb-4">
            <h5 class="mb-3">E Library</h5>
            <p>Your one-stop digital platform to explore, borrow, and enjoy books online anytime, anywhere.</p>
            <div class="social-icons">
              <a href="#" class="me-3"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="me-3"><i class="fab fa-twitter"></i></a>
              <a href="#" class="me-3"><i class="fab fa-instagram"></i></a>
              <a href="#" class="me-3"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <h5 class="mb-3">Quick Links</h5>
            <ul class="list-unstyled">
              <li class="mb-2"><a href="#" class="footer-link"><i class="fas fa-chevron-right me-2"></i> Home</a></li>
              <li class="mb-2"><a href="#" class="footer-link"><i class="fas fa-chevron-right me-2"></i> About Us</a></li>
              <li class="mb-2"><a href="#" class="footer-link"><i class="fas fa-chevron-right me-2"></i> Support</a></li>
              <li class="mb-2"><a href="#" class="footer-link"><i class="fas fa-chevron-right me-2"></i> Browse Books</a></li>
              <li class="mb-2"><a href="Slogin.php" class="footer-link"><i class="fas fa-chevron-right me-2"></i> Login / Sign Up</a></li>
            </ul>
          </div>
          <div class="col-lg-4 mb-4">
            <h5 class="mb-3">Contact</h5>
            <p><i class="fas fa-envelope me-2"></i> support@elibrary.com</p>
            <p><i class="fas fa-phone me-2"></i> +91-1234567890</p>
            <p><i class="fas fa-map-marker-alt me-2"></i> Virtual Campus, India</p>
            <div class="mt-4">
              <h6>Newsletter</h6>
              <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Your Email">
                <button class="btn btn-primary" type="button">Subscribe</button>
              </div>
            </div>
          </div>
        </div>
        <div class="copyright">
          <p class="mb-0">&copy; 2023 E-Library. All rights reserved.</p>
        </div>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      // Navbar scroll effect
      window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
          navbar.classList.add('scrolled');
        } else {
          navbar.classList.remove('scrolled');
        }
      });
      
      // Smooth scroll for anchor links
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
          e.preventDefault();
          document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
          });
        });
      });
    </script>
  </body>
</html>
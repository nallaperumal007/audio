</div> <!-- Closing container from header -->

<!-- Footer -->
<footer class="footer text-white mt-5">
    <div class="container py-5">
        <div class="row">
            <!-- Company Info -->
            <div class="col-md-4">
                <h5 class="footer-title"><i class="fa-solid fa-music"></i> Audio Converter</h5>
                <p>Convert your audio files to different formats quickly and easily with our powerful online tool.</p>
                <p><i class="fa-solid fa-envelope"></i> support@audioconverter.com</p>
                <p><i class="fa-solid fa-phone"></i> +1 (234) 567-890</p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-4">
                <h5 class="footer-title"><i class="fa-solid fa-link"></i> Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/') }}" class="footer-link"><i class="fa-solid fa-house"></i> Home</a></li>
                    <li><a href="{{ url('/formats') }}" class="footer-link"><i class="fa-solid fa-file-audio"></i> Supported Formats</a></li>
                    <li><a href="{{ url('/about') }}" class="footer-link"><i class="fa-solid fa-circle-info"></i> About Us</a></li>
                    <li><a href="{{ url('/contact') }}" class="footer-link"><i class="fa-solid fa-envelope"></i> Contact</a></li>
                </ul>
            </div>

            <!-- Social Media & Newsletter -->
            <div class="col-md-4">
                <h5 class="footer-title"><i class="fa-solid fa-share-nodes"></i> Follow Us</h5>
                <div class="social-icons">
                    <a href="#" class="social-icon"><i class="fa-brands fa-facebook fa-lg"></i></a>
                    <a href="#" class="social-icon"><i class="fa-brands fa-twitter fa-lg"></i></a>
                    <a href="#" class="social-icon"><i class="fa-brands fa-instagram fa-lg"></i></a>
                    <a href="#" class="social-icon"><i class="fa-brands fa-youtube fa-lg"></i></a>
                </div>
                <h5 class="footer-title mt-3"><i class="fa-solid fa-envelope-open-text"></i> Subscribe</h5>
                <form class="newsletter-form">
                    <input type="email" class="form-control" placeholder="Enter your email" required>
                    <button type="submit" class="btn btn-warning mt-2">Subscribe</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Copyright Section -->
    <div class="text-center py-3 footer-bottom">
        <p class="mb-0">&copy; 2025 Audio Converter | All rights reserved.</p>
    </div>
</footer>

<!-- Styles for Footer -->
<style>
    .footer {
        background: #007bff; /* Solid Blue Background */
        color: white;
    }
    .footer-title {
        font-weight: bold;
        color: #ffeb3b; /* Yellow Accent */
        margin-bottom: 15px;
    }
    .footer-link {
        color: white;
        text-decoration: none;
        display: block;
        padding: 5px 0;
        transition: 0.3s;
    }
    .footer-link:hover {
        color: #ffeb3b;
        padding-left: 10px;
    }
    .social-icons {
        display: flex;
        gap: 10px;
    }
    .social-icon {
        color: white;
        font-size: 20px;
        transition: 0.3s;
    }
    .social-icon:hover {
        color: #ffeb3b;
        transform: scale(1.2);
    }
    .newsletter-form input {
        border-radius: 5px;
    }
    .footer-bottom {
        background-color: #0056b3; /* Darker Blue */
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

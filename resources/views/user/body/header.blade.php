<!-- Main Header -->
<header class="main-header">
    <!-- Header Top -->
    <div class="py-2 header-top bg-light">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Column -->
                <div class="col-12 col-md-9 d-flex align-items-center">
                    <ul class="flex-wrap mb-0 list-unstyled d-flex me-md-4">
                        <li class="mb-2 d-flex align-items-center me-3 mb-md-0">
                            <i class="fas fa-map-marker-alt me-2"></i> No.123, 5th Channel, Anuradhapura
                        </li>
                        <li class="mb-2 d-flex align-items-center me-3 mb-md-0">
                            <i class="far fa-clock me-2"></i> 
                            <span id="current-date-time" class="current-date-time"></span>
                        </li>
                        <li class="mb-2 d-flex align-items-center mb-md-0">
                            <i class="fas fa-phone me-2"></i> <a href="tel:+94763241451">+94-763-241-451</a>
                        </li>
                    </ul>
                </div>
                <!-- Right Column -->
                <div class="col-12 col-md-3 d-flex justify-content-end align-items-center">
                    <ul class="flex-wrap mb-0 list-unstyled d-flex me-md-4">
                        <li class="me-2"><a href="index.html" class="text-decoration-none"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="me-2"><a href="index.html" class="text-decoration-none"><i class="fab fa-twitter"></i></a></li>
                        <li class="me-2"><a href="index.html" class="text-decoration-none"><i class="fab fa-pinterest-p"></i></a></li>
                        <li class="me-2"><a href="index.html" class="text-decoration-none"><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a href="index.html" class="text-decoration-none"><i class="fab fa-vimeo-v"></i></a></li>
                    </ul>
                    <a href="{{ route('admin.login') }}" class="btn btn-outline-secondary d-flex align-items-center ms-3">
                        <i class="fas fa-user me-2"></i> Sign In
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Top End -->

    <!-- Navbar -->
    <nav class="bg-white border-gray-200 navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('frontend/investment.png') }}" class="align-top d-inline-block" alt="Logo" style="height: 32px;">
                <span class="ms-2 text-dark">
                    <div class="loader-wrap">
                        <div class="preloader">
                            <div class="preloader-close"><i class="far fa-times"></i></div>
                            <div id="handle-preloader" class="handle-preloader">
                                <div class="animation-preloader">
                                    <div class="spinner"></div>
                                    <div class="txt-loading">
                                        <span data-text-preloader="E" class="letters-loading">E</span>
                                        <span data-text-preloader="A" class="letters-loading">A</span>
                                        <span data-text-preloader="S" class="letters-loading">S</span>
                                        <span data-text-preloader="Y" class="letters-loading">Y</span>
                                        <span data-text-preloader="L" class="letters-loading">L</span>
                                        <span data-text-preloader="A" class="letters-loading">A</span>
                                        <span data-text-preloader="N" class="letters-loading">N</span>
                                        <span data-text-preloader="D" class="letters-loading">D</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="easyland-text">E A S Y L A N D</span>
                </span>
            </a>
            <!-- Mobile Menu Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Mobile Menu Toggle End -->

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse d-flex justify-content-center align-items-center" id="navbarNav">
                <ul class="mb-2 navbar-nav mb-lg-0 text-bold">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="homeDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Home
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="homeDropdown">
                            <li><a class="dropdown-item" href="index.html">Main Home</a></li>
                            <li><a class="dropdown-item" href="index-2.html">Home Modern</a></li>
                            <li><a class="dropdown-item" href="index-3.html">Home Map</a></li>
                            <li><a class="dropdown-item" href="index-4.html">Home Half Map</a></li>
                            <li><a class="dropdown-item" href="index-5.html">Home Agent</a></li>
                            <li><a class="dropdown-item" href="index-onepage.html">OnePage Home</a></li>
                            <li><a class="dropdown-item" href="index-rtl.html">RTL Home</a></li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Header Style</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="index.html">Header Style 01</a></li>
                                    <li><a class="dropdown-item" href="index-2.html">Header Style 02</a></li>
                                    <li><a class="dropdown-item" href="index-3.html">Header Style 03</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="propertyDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Property
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="propertyDropdown">
                            <li><a class="dropdown-item" href="property-list.html">Property List</a></li>
                            <li><a class="dropdown-item" href="property-grid.html">Property Grid</a></li>
                            <li><a class="dropdown-item" href="property-list-2.html">Property List Full View</a></li>
                            <li><a class="dropdown-item" href="property-grid-2.html">Property Grid Full View</a></li>
                            <li><a class="dropdown-item" href="property-list-3.html">Property List Half View</a></li>
                            <li><a class="dropdown-item" href="property-grid-3.html">Property Grid Half View</a></li>
                            <li><a class="dropdown-item" href="property-details.html">Property Details 01</a></li>
                            <li><a class="dropdown-item" href="property-details-2.html">Property Details 02</a></li>
                            <li><a class="dropdown-item" href="property-details-3.html">Property Details 03</a></li>
                            <li><a class="dropdown-item" href="property-details-4.html">Property Details 04</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="allpagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Pages
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="allpagesDropdown">
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Pages
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="pagesDropdown">
                                    <li><a class="dropdown-item" href="about.html">About Us</a></li>
                                    <li><a class="dropdown-item" href="services.html">Our Services</a></li>
                                    <li><a class="dropdown-item" href="faq.html">Faq's Page</a></li>
                                    <li><a class="dropdown-item" href="pricing.html">Pricing Table</a></li>
                                    <li><a class="dropdown-item" href="compare-roperties.html">Compare Properties</a></li>
                                    <li><a class="dropdown-item" href="categories.html">Categories Page</a></li>
                                    <li><a class="dropdown-item" href="career.html">Career Opportunity</a></li>
                                    <li><a class="dropdown-item" href="testimonials.html">Testimonials</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#" id="blogContactDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Blog & Contact
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="blogContactDropdown">
                                    <li><a class="dropdown-item" href="blog-1.html">Blog 01</a></li>
                                    <li><a class="dropdown-item" href="blog-2.html">Blog 02</a></li>
                                    <li><a class="dropdown-item" href="blog-3.html">Blog 03</a></li>
                                    <li><a class="dropdown-item" href="blog-details.html">Blog Details</a></li>
                                    <li><a class="dropdown-item" href="agency-list.html">Agency List</a></li>
                                    <li><a class="dropdown-item" href="agency-grid.html">Agency Grid</a></li>
                                    <li><a class="dropdown-item" href="agency-details.html">Agency Details</a></li>
                                    <li><a class="dropdown-item" href="contact.html">Contact Us</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#" id="morePagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    More Pages
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="morePagesDropdown">
                                    <li><a class="dropdown-item" href="gallery.html">Our Gallery</a></li>
                                    <li><a class="dropdown-item" href="profile.html">My Profile</a></li>
                                    <li><a class="dropdown-item" href="signin.html">Sign In</a></li>
                                    <li><a class="dropdown-item" href="signup.html">Sign Up</a></li>
                                    <li><a class="dropdown-item" href="error.html">404</a></li>
                                    <li><a class="dropdown-item" href="agents-list.html">Agents List</a></li>
                                    <li><a class="dropdown-item" href="agents-grid.html">Agents Grid</a></li>
                                    <li><a class="dropdown-item" href="agents-details.html">Agent Details</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="agencyDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Agency
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="agencyDropdown">
                            <li><a class="dropdown-item" href="agency-list.html">Agency List</a></li>
                            <li><a class="dropdown-item" href="agency-grid.html">Agency Grid</a></li>
                            <li><a class="dropdown-item" href="agency-details.html">Agency Details</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="blogDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Blog
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="blogDropdown">
                            <li><a class="dropdown-item" href="blog-1.html">Blog 01</a></li>
                            <li><a class="dropdown-item" href="blog-2.html">Blog 02</a></li>
                            <li><a class="dropdown-item" href="blog-3.html">Blog 03</a></li>
                            <li><a class="dropdown-item" href="blog-details.html">Blog Details</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
            <button type="button" class="btn btn-success ms-2">+ Add Listing</button>
        </div>
    </nav>
    <!-- Navbar End -->
</header>
<!-- Main Header End -->

<!DOCTYPE html>

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="wpOceans">

    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png">

<?php

    wp_head();



if (is_page('about-us')) {

    $title = "About Us | Coworking – Abuja's Modern Workspace for Tech & Business Teams";

    $description = "Suqat is Abuja’s modern coworking hub for tech and business professionals. We provide reliable infrastructure, event spaces, and startup support.";

} elseif (is_category('courses')) {

    $title = "Courses | Startup, Design Sprint & Branding Training";

    $description = "Browse Suqat’s wide range of professional and personal development courses.";

} elseif (is_category('events')) {

    $title = "Events | Workshops, Pitch Nights & Networking";

    $description = "Join Suqat’s vibrant events in Abuja—workshops, pitch nights, and networking meetups for tech and business professionals. Gain insights, build connections, and grow together.";

} elseif (is_page('booking')) {

    $title = "Booking | Reserve Coworking, Events & Courses in Abuja";

    $description = "Book your spot at Suqat in Abuja—secure a coworking desk, register for events, or enroll in courses like No-Code Tools for Startups. Reserve now quickly!";

} elseif (is_page('contact')) {

    $title = "Contact Us | Coworking in Abuja | Reach Us by Phone or Email";

    $description = "Connect with Suqat in Abuja – your modern coworking hub for tech and business professionals. Discover our spaces, events, and courses designed to help you grow.";

} elseif (is_page('terms-and-conditions')) {

    $title = "Terms & Conditions | Coworking Policies in Abuja";

    $description = "Review Suqat's Terms & Conditions for coworking, events, and courses in Abuja. Understand our policies, booking terms, and user responsibilities.";

} elseif (is_front_page() || is_home() ) {

    $title = "Home | Tech Workspace, Event Space & Startup Courses";

    $description = "Suqat in Abuja is a modern coworking hub for tech and business professionals. Enjoy high-speed Wi-Fi, onsite tech support, late-night access, flexible event spaces, and startup courses.";

} elseif (is_page('donate')) {

    $title = "Donate | Support Innovation & Coworking in Abuja";

    $description = "Support Suqat in Abuja by donating to help us empower tech and business professionals. Your contribution fuels coworking, events, and startup growth.";

}  elseif (is_page('galllery')) {

    $title = "Galllery | Coworking Spaces, Events & Community";

    $description = "Explore the Stack & Hustle Gallery showcasing modern coworking spaces, vibrant events, and our creative community. See where innovation and collaboration thrive.";

} else {

    // Fallback for posts, homepage, or unknown pages

    $title = get_the_title() . " | Suqat";

    $description = strip_tags(get_the_excerpt());

}

?>

<title><?php echo esc_html($title); ?></title>

<meta name="description" content="<?php echo esc_attr($description); ?>">

<meta property="og:url" content="<?php echo esc_url(home_url(add_query_arg(array(), $wp->request))); ?>">



<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png">





    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/themify-icons.css" rel="stylesheet">

    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/flaticon.css" rel="stylesheet">

    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/animate.css" rel="stylesheet">

    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/owl.carousel.css" rel="stylesheet">

    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/owl.theme.css" rel="stylesheet">

    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/slick.css" rel="stylesheet">

    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/slick-theme.css" rel="stylesheet">

    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/swiper.min.css" rel="stylesheet">

    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/owl.transitions.css" rel="stylesheet">

    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/jquery.fancybox.css" rel="stylesheet">

    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/odometer-theme-default.css" rel="stylesheet">

    <link href="<?php echo get_template_directory_uri(); ?>/assets/sass/style.css" rel="stylesheet">

<!-- Lightbox2 CSS -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet">



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" />





</head>









<body <?php body_class(); ?>>



    <!-- start page-wrapper -->

    <div class="page-wrapper">

        <!-- start preloader -->

        <div class="preloader">

            <div class="vertical-centered-box">

                <div class="content">

                    <div class="loader-circle"></div>

                    <div class="loader-line-mask">

                        <div class="loader-line"></div>

                    </div>

                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/preloader.png" alt="">

                </div>

            </div>

        </div>

        <!-- end preloader -->



        <!-- start header -->

        <header id="header">

            <div class="wpo-site-header wpo-header-style-4">

                <nav class="navigation navbar navbar-expand-lg navbar-light">

                    <div class="container">

                        <div class="row align-items-center">

                            <div class="col-lg-3 col-md-3 col-3 d-lg-none dl-block">

                                <div class="mobail-menu">

                                    <button type="button" class="navbar-toggler open-btn">

                                        <span class="sr-only">Toggle navigation</span>

                                        <span class="icon-bar first-angle"></span>

                                        <span class="icon-bar middle-angle"></span>

                                        <span class="icon-bar last-angle"></span>

                                    </button>

                                </div>

                            </div>

                            <div class="col-lg-2 col-md-6 col-6">

                                <div class="navbar-header">

                                    <a class="navbar-brand" href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/stack-and-hustle-logo.png"

                                            alt="logo"></a>

                                </div>

                            </div>

                            <div class="col-lg-8 col-md-1 col-1">

                                <div id="navbar" class="collapse navbar-collapse navigation-holder">

                                    <button class="menu-close"><i class="ti-close"></i></button>

                                    <ul class="nav navbar-nav mb-2 mb-lg-0">

                                        <li>

                                            <a class="active" href="<?php echo site_url(); ?>">Home</a>

                                         

                                        </li>

                                        <li><a href="<?php echo site_url(); ?>/about-us/">About us</a></li>



                                         <li>

                                            <a href="<?php echo site_url(); ?>/category/courses/">Courses</a>

                                        

                                        </li> 

                                         <li>

                                            <a href="<?php echo site_url(); ?>/category/events/">Events</a>

                                        

                                        </li> 
                                        
                                        <li>

                                            <a href="<?php echo site_url(); ?>/pricing/">Pricing</a>

                                          

                                        </li>


                                          <li>

                                            <a href="<?php echo site_url(); ?>/galllery/">Galllery</a>

                                          

                                        </li>
                                         

                                      

                                        <li><a href="<?php echo site_url(); ?>/contact/">Contact</a></li>

                                    </ul>

                                </div><!-- end of nav-collapse -->

                            </div>

                            <div class="col-lg-2 col-md-2 col-2">

                                <div class="header-right">

                                    <div class="btns">

                                        <a href="<?php echo site_url(); ?>/book-space/" class="price-btn">

                                            <!-- <span>initial price:</span> -->

                                            <p>BOOK SPACE</p>

                                            <!-- <i class="ti-arrow-top-right"></i> -->

                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div><!-- end of container -->

                </nav>

            </div>

        </header>

        <!-- end of header -->




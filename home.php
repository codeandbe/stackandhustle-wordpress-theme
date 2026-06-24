<?php
/**
 * Template Name: Home 2 Template
 */

?>




 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpOceans">
    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png">
    <title>Home | Tech Workspace, Event Space & Startup Courses</title>
    <meta name="description" content="Suqat in Abuja is a modern coworking hub for tech and business professionals. Enjoy high-speed Wi-Fi, onsite tech support, late-night access, flexible event spaces, and startup courses like No-Code Tools for Startups. Book your workspace today!">

     <meta property="og:title" content="Suqat | Tech Workspace, Event Space & Startup Courses">
<meta property="og:description" content="Suqat in Abuja is a modern coworking hub for tech and business professionals. Enjoy high-speed Wi-Fi, onsite tech support, late-night access, flexible event spaces, and startup courses.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://if-sandbox.com/suqat/">
<meta property="og:image" content="https://if-sandbox.com/suqat/wp-content/themes/suqat/assets/images/favicon.png">


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
</head>




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
                                    <a class="navbar-brand" href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/stack-and-hustle-logo.png" alt="logo"></a>
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

      

      <!-- start of wpo-hero-section-1 -->
<section class="wpo-hero-slider">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php
            $hero_query = new WP_Query(array(
                'category_name' => 'hero-slider',
                'posts_per_page' => 5
            ));

            if ($hero_query->have_posts()):
                while ($hero_query->have_posts()): $hero_query->the_post();
                    $background_img = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    $video_url = get_post_meta(get_the_ID(), 'video_url', true); // dynamic video URL
                    $button_url = get_post_meta(get_the_ID(), 'button_url', true); // dynamic button URL
                    $button_text = get_post_meta(get_the_ID(), 'button_text', true); // dynamic button text

            ?>
                    <div class="swiper-slide">
                        <div class="slide-inner slide-bg-image" data-background="<?php echo esc_url($background_img); ?>">
                            <div class="container">
                                <div class="slide-content">
                                    <div data-swiper-parallax="300" class="slide-title-sub">
                                        <span><i class="fi flaticon-placeholder"></i> Central Area, Abuja Nigeria</span>
                                    </div>
                                    <div data-swiper-parallax="300" class="slide-title">
                                        <h2><?php the_title(); ?></h2>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div data-swiper-parallax="500" class="slide-btns">
                                        <?php if (!empty($button_url)): ?>
                                            <a href="<?php echo esc_url($button_url); ?>" class="theme-btn">
                                                  <?php echo !empty($button_text) ? esc_html($button_text) : 'BOOK SPACE'; ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end slide-inner -->

                        
                    </div> <!-- end swiper-slide -->
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div> <!-- end swiper-wrapper -->

        <!-- swipper controls -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>


    <!-- Dynamic video button per slide -->
                        <?php if (!empty($video_url)): ?>
                            <div class="hero-right-video">
                                <div class="hero-right-video-wrap">
                                    <div class="circular-text text-roted">
                                        <p class="text none">Watch Intro Video</p>
                                        <a href="<?php echo esc_url($video_url); ?>" class="video-btn" data-type="iframe"></a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
</section>
<!-- end of wpo-hero-section-1 -->



        <!-- end of wpo-hero-slide-section-->

        <!-- start features-content -->
        <div class="features-content">
            <div class="container">
                <div class="features-content-inner">
                    <div class="features-content-item">
                        <h2>65</h2>
                        <span>SQUARE FEET</span>
                    </div>
                    <div class="features-content-item">
                        <h2>40</h2>
                        <span>spaces</span>
                    </div>
                    <div class="features-content-item">
                        <h2>04</h2>
                        <span>PRIVATE BOOTHS</span>
                    </div>
                    <div class="features-content-item">
                        <h2>25</h2>
                        <span>power sockets</span>
                    </div>
                    <div class="features-content-item">
                        <h2>65</h2>
                        <span>square feet</span>
                    </div>
                    <div class="features-content-item">
                        <a href="https://stackandhustle.com/book-space/" class="theme-btn">take a tour</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end features-content -->

        <!-- start wpo-service-section -->
        <section class="wpo-service-section-s2 section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="left-img">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/service/left.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="wpo-service-wrapper">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <div class="wpo-section-title-s2 text-color">
                                        <h2>modern <span>amenities</span> of our coworking space.</h2>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="wpo-section-title-img">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/service/title2.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="wpo-service-wrap p-text">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="wpo-service-item">
                                            <div class="wpo-service-icon">
                                                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/service/wifi.svg" alt=""></span>
                                            </div>
                                            <div class="wpo-service-text">
                                                <h3><a href="">High -Speed WiFi</a></h3>
                                                <p>Stay connected at all time with blazing-fast, secure internet built for uninterrupted work and seamless video calls
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="wpo-service-item">
                                            <div class="wpo-service-icon">
                                                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/service/3.svg" alt=""></span>
                                            </div>
                                            <div class="wpo-service-text">
                                                <h3><a href="">Private Bookings</a></h3>
                                                <p>For special moments and corporate gatherings. Reserve a space for off-sites, investor meetings, or VIP sessions
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="wpo-service-item">
                                            <div class="wpo-service-icon">
                                                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/service/support.svg" alt=""></span>
                                            </div>
                                            <div class="wpo-service-text">
                                                <h3><a href="">Onsite Tech Support</a></h3>
                                                <p>Get instant help when you need it. Our dedicated IT support team is always available to assist with setups  or tech hiccups.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="wpo-service-item">
                                            <div class="wpo-service-icon">
                                                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/service/time.svg" alt=""></span>
                                            </div>
                                            <div class="wpo-service-text">
                                                <h3><a href="">Late Night Access</a></h3>
                                                <p>Work on your schedule even after hours. Our space stays open late so you can focus, meet deadlines, and finish strong 
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="wpo-service-item">
                                            <div class="wpo-service-icon">
                                                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/service/calender.svg" alt=""></span>
                                            </div>
                                            <div class="wpo-service-text">
                                                <h3><a href="">Event Space</a></h3>
                                                <p>Host meetups, launches, or workshops with ease. Book our flexible event area with seating, AV, and on-site support 
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="wpo-service-item">
                                            <div class="wpo-service-icon">
                                                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/service/music.svg" alt=""></span>
                                            </div>
                                            <div class="wpo-service-text">
                                                <h3><a href="">Music</a></h3>
                                                <p>Stay in the flow with curated Lo-fi beats. Gentle background music helps you focus without distraction.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end wpo-service-section-->
        
<section class="wpo-blog-section-s2 section-padding" style="padding:60px 0;">
    <div class="container" style="max-width:1200px; margin:0 auto;">
        <div class="blog-wrap">
            <div class="row">
                <div class="col-xl-7 col-lg-5">
                    <div class="wpo-section-title-s2">
                        <h2>check Out<br>Our <span>Spaces</span></h2>
                    </div>
                </div>
            </div>

            <div class="blog-slide-active owl-carousel">



<!-- Post Starts -->
<?php
query_posts('category_name=spaces&posts_per_page=6&orderby=date&order=dsc'); // query to show all posts independent from what is in the center;
if (have_posts()) :
   while (have_posts()) :the_post(); ?>
<!--Post attributes Start-->
 		<!-- Single Blog Item -->
                <div class="blog-item" style="background:#fff; border-radius:12px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.08); margin:10px;">

                <!-- Image Wrapper (Fixed Height + Inline CSS) -->
                <div class="image" style="width:100%; height:300px; overflow:hidden; border-radius:12px 12px 0 0;">
                        <?php the_post_thumbnail('large', [
                            'alt'   => get_the_title(),
                            'class' => 'img-fluid',
                            'style' => 'width:100%; height:100%; object-fit:cover; object-position:center;'
                        ]); ?>
                </div>
		<!-- Content -->
                    <div class="blog-content" style="padding:20px;">
                        
                        <div class="thumb" style="font-size:14px; color:#777; margin-bottom:10px;">
                            <span><?php echo get_the_date('F j, Y'); ?></span> <?php edit_post_link(); ?>
                        </div>

                        <h2 style="font-size:20px; font-weight:700; margin-bottom:10px;">
                            <a href="<?php the_permalink(); ?>" style="color:#222; text-decoration:none;">
                                <?php the_title(); ?>
                            </a>
                        </h2>

                        <?php
                        $button_url  = trim(get_post_meta(get_the_ID(), 'button_url', true));
                        $button_text = trim(get_post_meta(get_the_ID(), 'button_text', true));
                        ?>

                <!-- Register button: Link to the custom button URL or post permalink -->
                <a class="read-more" href="<?php echo !empty($button_url) ? esc_url($button_url) : get_permalink(); ?>">
                    <?php echo !empty($button_text) ? esc_html($button_text) : 'Read More'; ?>
                </a>

                    </div>
                </div>
				
 <!--Post attributes End-->


<?php  endwhile;
endif;
wp_reset_query();
?>

<!-- Post Ends -->

</div>

    </div>
</section>




        
        

        <!-- start wpo-plan-section -->
      <!--   <section class="wpo-plan-section-s2 section-padding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="wpo-section-title-s2">
                            <h2>spilon squat <span>property</span> floor plans.</h2>
                        </div>
                        <div class="wpo-plan-wrap">
                            <div class="row">
                                <div class="col-lg-5 col-md-6">
                                    <div class="wpo-plan-tab-menu">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="basement-tab" data-bs-toggle="tab"
                                                    href="#basement" role="tab" aria-controls="basement"
                                                    aria-selected="true">Basement</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="ground-floor-tab" data-bs-toggle="tab"
                                                    href="#ground-floor" role="tab" aria-controls="ground-floor"
                                                    aria-selected="false">ground floor</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="first-floor-tab" data-bs-toggle="tab"
                                                    href="#first-floor" role="tab" aria-controls="first-floor"
                                                    aria-selected="false">1st floor</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="second-floor-tab" data-bs-toggle="tab"
                                                    href="#second-floor" role="tab" aria-controls="second-floor"
                                                    aria-selected="false">2nd floor</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="rooftop-tab" data-bs-toggle="tab"
                                                    href="#rooftop" role="tab" aria-controls="rooftop"
                                                    aria-selected="false">rooftop</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-6">
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in" id="basement">
                                            <div class="wpo-plan-item">
                                                <div class="wpo-plan-content-box">
                                                    <div class="wpo-plan-content">
                                                        <ul>
                                                            <li>square feet <span>2,537</span></li>
                                                            <li>car parking<span>2</span></li>
                                                            <li>half baths<span>4</span></li>
                                                            <li>full baths<span>2</span></li>
                                                            <li>bed room<span>5</span></li>
                                                        </ul>
                                                        <a href="#">started now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade in show active" id="ground-floor">
                                            <div class="wpo-plan-item">
                                                <div class="wpo-plan-content-box">
                                                    <div class="wpo-plan-content">
                                                        <ul>
                                                            <li>square feet <span>2,537</span></li>
                                                            <li>car parking<span>2</span></li>
                                                            <li>half baths<span>4</span></li>
                                                            <li>full baths<span>2</span></li>
                                                            <li>bed room<span>5</span></li>
                                                        </ul>
                                                        <a href="#">started now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade in" id="first-floor">
                                            <div class="wpo-plan-item">
                                                <div class="wpo-plan-content-box">
                                                    <div class="wpo-plan-content">
                                                        <ul>
                                                            <li>square feet <span>2,537</span></li>
                                                            <li>car parking<span>2</span></li>
                                                            <li>half baths<span>4</span></li>
                                                            <li>full baths<span>2</span></li>
                                                            <li>bed room<span>5</span></li>
                                                        </ul>
                                                        <a href="#">started now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade in" id="second-floor">
                                            <div class="wpo-plan-item">
                                                <div class="wpo-plan-content-box">
                                                    <div class="wpo-plan-content">
                                                        <ul>
                                                            <li>square feet <span>2,537</span></li>
                                                            <li>car parking<span>2</span></li>
                                                            <li>half baths<span>4</span></li>
                                                            <li>full baths<span>2</span></li>
                                                            <li>bed room<span>5</span></li>
                                                        </ul>
                                                        <a href="#">started now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade in" id="rooftop">
                                            <div class="wpo-plan-item">
                                                <div class="wpo-plan-content-box">
                                                    <div class="wpo-plan-content">
                                                        <ul>
                                                            <li>square feet <span>2,537</span></li>
                                                            <li>car parking<span>2</span></li>
                                                            <li>half baths<span>4</span></li>
                                                            <li>full baths<span>2</span></li>
                                                            <li>bed room<span>5</span></li>
                                                        </ul>
                                                        <a href="#">started now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="wpo-plan-img">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/plan/plan-2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- end wpo-plan-section-->

        <!-- start wpo-payment-section -->
       <!--  <section class="wpo-payment-section-s2 section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col col-lg-6 col-12">
                        <div class="wpo-section-title">
                            <small>estimate</small>
                            <h2>your <span>payment</span> Estimate</h2>
                        </div>
                    </div>
                </div>
                <div class="wpo-payment-wrap">
                    <div class="row">
                        <div class="col col-lg-12">
                            <div class="payment-form-area">
                                <div class="form-group">
                                    <label>purchase price:</label>
                                    <input type="number" value="6382" id="purchase_price">
                                </div>
                                <div class="form-group">
                                    <label>down payment %:</label>
                                    <input type="number" value="20" id="down_payment">
                                </div>
                                <div class="form-group">
                                    <label>loan term Year:</label>
                                    <input type="number" value="35" id="loan_term">
                                </div>
                                <div class="form-group">
                                    <label>interest rate %:</label>
                                    <input type="number" value="5.5" id="interest_rate">
                                </div>
                                <div class="form-group text-center">
                                    <button class="theme-btn" onclick="estimatePayment()">estimate payment</button>
                                </div>
                            </div>
                        </div>
                        <div class="col col-lg-12 col-12">
                            <div class="payment-result">
                                <div class="result-item">
                                    <span>down payment:</span>
                                    <h3 id="down_payment_value">$1276.40</h3>
                                </div>
                                <div class="result-item">
                                    <span>monthly payment:</span>
                                    <h3 id="monthly_payment_value">$12.82</h3>
                                </div>
                                <div class="result-item">
                                    <span>Total loan amount:</span>
                                    <h3 id="load_amount_value">$5386.41</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section> -->
        <!-- end wpo-payment-section-->
        






        <!-- end of wpo-property-section -->
         <!-- start wpo-fun-fact-section -->
        <!--  <section class="wpo-fun-fact-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-fun-fact-grids clearfix">
                            <div class="grid">
                                <div class="info">
                                    <h3><span class="odometer" data-count="215">00</span>+</h3>
                                    <p>CURRENT CLIENTS</p>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="info">
                                    <h3><span class="odometer" data-count="50">00</span>+</h3>
                                    <p>AWARDS WINNING</p>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="info">
                                    <h3><span class="odometer" data-count="15">00</span>+</h3>
                                    <p>YEARS OF EXPERIENCE</p>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="info">
                                    <h3><span class="odometer" data-count="150">00</span>+</h3>
                                    <p>Property</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- end wpo-fun-fact-section -->

        <!-- start wpo-place-section -->
      <!--   <section class="wpo-place-section-s2 section-padding">
            <div class="container">
                <div class="place-wrap">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-md-12">
                            <div class="wpo-section-title">
                                <h2>nearby <span>places of</span> the property</h2>

                                <ul class="tabs">
                                    <li><button id="Location1" class="tab">school <span>- 1.8 Km</span></button></li>
                                    <li><button id="Location2" class="tab">restaurant <span>- 1.6 Km</span></button>
                                    </li>
                                    <li><button id="Location3" class="tab">mosque <span>- 2.0 Km</span></button></li>
                                    <li><button id="Location4" class="tab">park <span>- 0.96 Km</span></button></li>
                                    <li><button id="Location5" class="tab">hospital <span>- 1.6 Km</span></button></li>
                                </ul>

                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <div class="place-right-wrap clearfix">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/nearby/place2.jpg" alt="">
                                <div id="location-wrap">
                                    <div id="location1" class="location s1">
                                        <div class="pin">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/nearby/1.svg" alt="">
                                            <span>Corpus Christi School</span>
                                        </div>
                                    </div>
                                    <div id="location2" class="location s2">
                                        <div class="pin">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/nearby/2.svg" alt="">
                                            <span>KFC Resturent</span>
                                        </div>
                                    </div>
                                    <div id="location3" class="location s3">
                                        <div class="pin">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/nearby/3.svg" alt="">
                                            <span>Baitun Nor mosque</span>
                                        </div>
                                    </div>
                                    <div id="location4" class="location s4">
                                        <div class="pin">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/nearby/4.svg" alt="">
                                            <span>Central Park</span>
                                        </div>
                                    </div>
                                    <div id="location5" class="location s5">
                                        <div class="pin">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/nearby/5.svg" alt="">
                                            <span>Central Hospital</span>
                                        </div>
                                    </div>
                                    <div id="location6" class="location s6">
                                        <div class="pin">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/nearby/6.svg" alt="">
                                            <span>Prime Hospital</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- end wpo-place-section -->


<style>
    /* Custom Pagination */
.custom-pagination ul {
    display: flex;
    justify-content: center;
    list-style: none;
    padding: 0;
    margin: 30px 0 0;
}

.custom-pagination ul li {
    margin: 0 5px;
}

.custom-pagination ul li a,
.custom-pagination ul li span {
    display: block;
    padding: 8px 14px;
    background: #f5f5f5;
    color: #000;
    border-radius: 4px;
    text-decoration: none;
    font-weight: 500;
    transition: 0.3s ease;
}

.custom-pagination ul li a:hover {
    background: #ff5722;
    color: #fff;
}

.custom-pagination ul li span.current {
    background: #ff5722;
    color: #fff;
    font-weight: 600;
}

/* Course Item Design */
.courses-item {
    background: #fff;
    border-radius: 10px;
    padding: 30px 20px;
    text-align: center;
    margin-bottom: 30px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    transition: 0.3s ease;
}

.courses-item:hover {
    transform: translateY(-5px);
}

.courses-icon {
    margin-bottom: 20px;
}

.courses-icon img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 50%;
    border: 2px solid #eee;
    padding: 5px;
    background: #fff;
}

.courses-text h3 {
    font-size: 20px;
    margin-bottom: 0px;
}

.courses-text h3 a {
    color: #000;
    text-decoration: none;
    transition: 0.3s;
}

.courses-text h3 a:hover {
    color: #ff5722;
}

.courses-text p {
    font-size: 15px;
    color: #555;
}

</style>

<section class="courses-section section-padding bg-color-courses">
    <div class="container">
        <div class="courses-wrap">
            <div class="row">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                $args = array(
                    'post_type'      => 'post',
                    'category_name'  => 'courses',
                    'posts_per_page' => 6,
                    'orderby'        => 'date',
                    'order'          => 'ASC',
                    'paged'          => $paged
                );
                $courses = new WP_Query($args);

                if ($courses->have_posts()) :
                    while ($courses->have_posts()) : $courses->the_post(); ?>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="courses-item">
                                <div class="courses-icon">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('thumbnail'); ?>
                                        <?php else : ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/service/default.jpg" alt="<?php the_title(); ?>">
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="courses-text">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <?php 
                                        $custom_price = get_post_meta(get_the_ID(), 'custom_price', true);
                                        if (!empty($custom_price)) : ?>
                                            <span class="custom-price"><?php echo esc_html($custom_price); ?></span>
                                        <?php endif; ?> 
                                    <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>

                    <!-- Pagination -->
                    <div class="col-12">
                        <div class="custom-pagination">
                            <?php
                            echo paginate_links(array(
                                'total'   => $courses->max_num_pages,
                                'current' => $paged,
                                'prev_text' => '‹',
                                'next_text' => '›',
                                'type'    => 'list'
                            ));
                            ?>
                        </div>
                    </div>

                    <?php wp_reset_postdata();
                else : ?>
                    <p>No courses found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>



<section class="wpo-blog-section-s2 section-padding">
    <div class="container">
        <div class="blog-wrap">
            <div class="row">
                <div class="col-xl-7 col-lg-5">
                    <div class="wpo-section-title-s2">
                        <h2>check <br>our <span>Events</span></h2>
                    </div>
                </div>
            </div>

            <div class="blog-slide-active owl-carousel">



<!-- Post Starts -->
<?php query_posts('showposts=10&post_status=future&category=10'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<!--Post attributes Start-->

                <div class="blog-item">
                    <div class="image">
                        <?php the_post_thumbnail('medium', [
                            'alt'   => get_the_title(),
                            'class' => 'img-fluid'
                        ]); ?>
                    </div>
                    <div class="blog-content">
					                        <div class="thumb">
                            <span><?php echo get_the_date('F j, Y'); ?></span> <?php edit_post_link(); ?>
                        </div>

                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                         <!-- Register button: Link to the custom button URL or post permalink -->
                                    <a class="read-more" href="<?php echo !empty($button_url) ? esc_url($button_url) : get_the_permalink(); ?>">
                                        Register
                                    </a>
                    </div>
                </div>
				



<!--Post attributes End-->
<?php endwhile;
else: ?>
<h4><span>No Upcoming Events Scheduled.</span> </h4>
<?php endif; ?>
<!-- Post Ends -->


				


	
	
	
</div>

    </div>
</section>





      	<!-- start wpo-testimonial-section -->
   	<!--
	<section class="wpo-testimonial-section-s2 section-padding">
   	<div class="container">
        <div class="wpo-section-title-tp">
        <div class="row">
                <div class="col-lg-7">
                    <div class="wpo-section-title-s2">
                        <h2><span>Testimonials</span></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="wpo-testimonial-wrap owl-carousel">
            <?php
            $args = array(
                'post_type'      => 'post',
                'category_name'  => 'testimonial', // category slug
                'posts_per_page' => -1,
                'orderby'        => 'date',
                'order'          => 'ASC' 
            );
            $testimonial_query = new WP_Query($args);

            if ($testimonial_query->have_posts()) :
                while ($testimonial_query->have_posts()) : $testimonial_query->the_post();
            ?>
                    <div class="item">
                        <div class="testimonial-top-wrap">
                            <div class="testimonial-left-item">
                                <div class="image">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('full'); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="text">
                                    <h4><?php echo esc_html(get_post_meta(get_the_ID(), 'img_title', true)); ?></h4> <!-- Native WP custom field -->
                                   <!--- <span>Client</span>
                                </div>
                            </div>
                            <div class="ratting">
                                <ul>
                                    <li><i class="ti-star"></i></li>
                                    <li><i class="ti-star"></i></li>
                                    <li><i class="ti-star"></i></li>
                                    <li><i class="ti-star"></i></li>
                                    <li><i class="ti-star"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="testimonial-text">
                            <p><?php echo esc_html(get_post_meta(get_the_ID(), 'description', true)); ?></p> <!-- Native WP custom field -->
                      <!--  </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section> 
-->
<!-- end wpo-testimonial-section-s2 -->


        <!-- start wpo-faq-section -->
       <!--  <section class="wpo-faq-section section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="wpo-section-title">
                            <h2>some <span>question</span> and answer.</h2>
                        </div>
                    </div>
                    <div class="wpo-faq-wrapper">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="wpo-faq-left-img-wrap">
                                    <div class="wpo-faq-left-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/faq/img-1.jpg" alt=""></div>
                                    <div class="wpo-faq-left-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/faq/img-2.jpg" alt=""></div>
                                    <div class="wpo-faq-left-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/faq/img-3.jpg" alt=""></div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="wpo-benefits-item">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <h3 class="accordion-header" id="headingOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    01. What does your single property company specialize in?
                                                </button>
                                            </h3>
                                            <div id="collapseOne" class="accordion-collapse collapse show"
                                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                        enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                        nisi ut aliquip ex ea commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h3 class="accordion-header" id="headingTwo">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                    aria-expanded="false" aria-controls="collapseTwo">
                                                    02. Do you have a portfolio of properties available for sale or
                                                    rent?
                                                </button>
                                            </h3>
                                            <div id="collapseTwo" class="accordion-collapse collapse"
                                                aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                        enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                        nisi ut aliquip ex ea commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h3 class="accordion-header" id="headingThree">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                    aria-expanded="false" aria-controls="collapseThree">
                                                    03. Can your company help with legal processes?
                                                </button>
                                            </h3>
                                            <div id="collapseThree" class="accordion-collapse collapse"
                                                aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                        enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                        nisi ut aliquip ex ea commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <h3 class="accordion-header" id="headingFour">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                    aria-expanded="false" aria-controls="collapseFour">
                                                    04. How can I get in touch with your company for property inquiries?
                                                </button>
                                            </h3>
                                            <div id="collapseFour" class="accordion-collapse collapse"
                                                aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                        enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                        nisi ut aliquip ex ea commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h3 class="accordion-header" id="headingFive">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                    aria-expanded="false" aria-controls="collapseFive">
                                                    05. What does your company specialize in?
                                                </button>
                                            </h3>
                                            <div id="collapseFive" class="accordion-collapse collapse"
                                                aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                        enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                        nisi ut aliquip ex ea commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h3 class="accordion-header" id="headingSix">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                                    aria-expanded="false" aria-controls="collapseSix">
                                                    06. What marketing strategies do you use?
                                                </button>
                                            </h3>
                                            <div id="collapseSix" class="accordion-collapse collapse"
                                                aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                        enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                        nisi ut aliquip ex ea commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- end faq-section -->

        <!-- start wpo-blog-section -->
        <!-- <section class="wpo-blog-section-s2 section-padding">
            <div class="container">
                <div class="blog-wrap">
                    <div class="row">
                        <div class="col-xl-7 col-lg-5">
                            <div class="wpo-section-title-s2">
                                <h2>check our <span>latest blog</span> and article.</h2>
                            </div>
                        </div>
                    </div>
                    <div class="blog-slide-active owl-carousel">
                        <div class="blog-item">
                            <div class="image">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/img-1.jpg" alt="">
                                <div class="thumb">
                                    <span>April 26, 2023</span>
                                </div>
                            </div>
                            <div class="blog-content">
                                <h2><a href="blog-single.html">Making Informed Decisions for Home
                                        Financing.</a></h2>
                                <a class="read-more" href="blog-single.html">Read More</a>
                            </div>
                        </div>
                        <div class="blog-item">
                            <div class="image">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/img-2.jpg" alt="">
                                <div class="thumb">
                                    <span>April 24, 2023</span>
                                </div>
                            </div>
                            <div class="blog-content">
                                <h2><a href="blog-single.html">Selling Your Home? How to Stage it for
                                        Maximum Impact.</a></h2>
                                <a class="read-more" href="blog-single.html">Read More</a>
                            </div>
                        </div>
                        <div class="blog-item">
                            <div class="image">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/img-3.jpg" alt="">
                                <div class="thumb">
                                    <span>April 22, 2023</span>
                                </div>
                            </div>
                            <div class="blog-content">
                                <h2><a href="blog-single.html">Simple Steps to Enhance Your Home's Exterior.</a></h2>
                                <a class="read-more" href="blog-single.html">Read More</a>
                            </div>
                        </div>
                        <div class="blog-item">
                            <div class="image">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/img-4.jpg" alt="">
                                <div class="thumb">
                                    <span>April 21, 2023</span>
                                </div>
                            </div>
                            <div class="blog-content">
                                <h2><a href="blog-single.html">Trends and Innovations Shaping the Industry.</a></h2>
                                <a class="read-more" href="blog-single.html">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- end wpo-blog-section -->

        

</div>


<style>
    .wpo-header-style-4 .navigation {
  background: transparent !important;
  z-index: 11;
}

.wpo-header-style-4 .navigation.sticky-header{
    background: #000 !important;
  z-index: 111;
}

.wpo-header-style-4 #navbar > ul > li > a {
  color: #fff !important;
}


@media (max-width: 767px) { 
       .wpo-header-style-4 .navigation {
  background: transparent !important;
  z-index: 11;
}

.wpo-header-style-4 .navigation.sticky-header{
    background: #000 !important;
  z-index: 111;
}

.wpo-header-style-4 #navbar > ul > li > a {
  color: #fff !important;
}

}

.navbar.original .navbar-brand img {
  content: url("https://stackandhustle.com/wp-content/themes/stackandhustle/assets/images/stack-and-hustle-logo.png");
  max-height: 60px;
}
 

</style>

<?php get_footer(); ?>

<?php
/*
Template Name: About us
*/
get_header(); ?>


        <!-- start wpo-page-title -->
        <section class="wpo-page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2>About Us</h2>
                            <ol class="wpo-breadcumb-wrap">
                                <li><a href="<?php echo home_url(); ?>">Home</a></li>
                                <li>About</li>
                            </ol>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->



        <!-- start of wpo-about-area -->
        <div class="wpo-about-area section-padding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <div class="wpo-about-img">
                            <!-- Get Image from the customizer -->
                            <img src="<?php echo esc_url( get_theme_mod( 'about_us_image', get_template_directory_uri() . '/assets/images/about.jpg' ) ); ?>" alt="About Us Image">
                        
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 colsm-12 about-us-font-title">
                        <div class="wpo-about-text">
                            <div class="wpo-about-title">

                            <!-- Header and title dynamic -->
                                <span><?php echo esc_html( get_theme_mod( 'about_us_main_title', 'About Us' ) ); ?></span>
                                <h2><?php echo esc_html( get_theme_mod( 'about_us_main_subtitle', 'Modern Facilities of the Property.' ) ); ?></h2>
                            </div>

                            <h5><?php echo esc_html( get_theme_mod( 'about_us_description', 'Stack & Hustle is a modern coworking space built for tech and business professionals. We combine reliable infrastructure with friendly hospitality, so teams can focus, ship, and grow.' ) ); ?></h5>
                          

 <!-- Mission & Vision Section -->
                    <section class="mission-vision-section">
                        <div class="mv-item">
                            <div class="mv-icon">
                                <span>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/service/2.svg" alt="Mission">
                                </span>
                            </div>
                            <div class="mv-content">

                            <!-- Mission -->
                                <h3><?php echo esc_html( get_theme_mod( 'about_us_mission_title', 'Mission' ) ); ?></h3>
                                <p>
                                    <?php echo esc_html( get_theme_mod( 'about_us_mission_text', '“Quam viverra orci sagittis eu. Lorem ipsum dolor sit amet consectetur adipiscing elit. Adipiscing elit pellentesque habitant morbi tristique senectus et netus amet consectetur adipiscing suspendisse.”' ) ); ?>
                                </p>
                            </div>
                        </div>

                        <div class="mv-item">
                            <div class="mv-icon">
                                <span>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/service/3.svg" alt="Vision">
                                </span>
                            </div>
                            <div class="mv-content">
                                <!-- Vision -->
                                <h3><?php echo esc_html( get_theme_mod( 'about_us_vision_title', 'Vision' ) ); ?></h3>
                                <p>
                                    <?php echo esc_html( get_theme_mod( 'about_us_vision_text', '“Quam viverra orci sagittis eu. Lorem ipsum dolor sit amet consectetur adipiscing elit. Adipiscing elit pellentesque habitant morbi tristique senectus et netus amet consectetur adipiscing suspendisse.”' ) ); ?>
                                </p>
                            </div>
                        </div>
                    </section>


                         
                            <div class="btns">
                                <a href="https://stackandhustle.com/book-space/" class="theme-btn" tabindex="0">Book Space</a>
                                <ul>
                                    <li class="video-holder">
                                        <a href="https://www.youtube.com/embed/NjIkTXmPycY?autoplay=1" class="video-btn btn" data-type="iframe" tabindex="0"></a>
                                    </li>
                                    <li class="video-text">
                                        <a href="https://www.youtube.com/embed/NjIkTXmPycY?autoplay=1" class="video-btn" data-type="iframe" tabindex="0">
                                            Watch Our Video
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of wpo-about-area -->

        <!-- start wpo-fun-fact-section -->
        <section class="wpo-fun-fact-section-s2 section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-fun-fact-grids clearfix">
                            <div class="grid">
                                <div class="info">
                                    <h3><span class="odometer" data-count="65">00</span></h3>
                                    <p>Square Feet</p>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="info">
                                    <h3><span class="odometer" data-count="4">00</span></h3>
                                    <p>PRIVATE BOOTS</p>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="info">
                                    <h3><span class="odometer" data-count="25">00</span></h3>
                                    <p>POWER SOCKETS</p>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="info">
                                    <h3><span class="odometer" data-count="40">00</span></h3>
                                    <p>SPACES</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end wpo-fun-fact-section -->

        <!-- start wpo-plan-section -->
        <!-- <section class="wpo-plan-section section-<?php echo get_template_directory_uri(); ?>/padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="wpo-section-title">
                            <small>floor plans</small>
                            <h2>spilon squat <span>property</span> floor plans.</h2>
                        </div>
                    </div>
                </div>
                <div class="wpo-plan-wrap">
                    <div class="wpo-plan-tab-menu">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="basement-tab" data-bs-toggle="tab" href="#basement" role="tab"
                                    aria-controls="basement" aria-selected="true">Basement</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="ground-floor-tab" data-bs-toggle="tab"
                                    href="#ground-floor" role="tab" aria-controls="ground-floor"
                                    aria-selected="false">ground floor</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="first-floor-tab" data-bs-toggle="tab" href="#first-floor"
                                    role="tab" aria-controls="first-floor" aria-selected="false">1st floor</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="second-floor-tab" data-bs-toggle="tab" href="#second-floor"
                                    role="tab" aria-controls="second-floor" aria-selected="false">2nd floor</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="rooftop-tab" data-bs-toggle="tab" href="#rooftop" role="tab"
                                    aria-controls="rooftop" aria-selected="false">rooftop</a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in" id="basement">
                            <div class="wpo-plan-item">
                                <div class="row align-items-center">
                                    <div class="col-lg-8 col-md-12">
                                        <div class="wpo-plan-img">
                                            <img src="assets/images/plan/plan.png" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="wpo-plan-content-box">
                                            <div class="wpo-plan-content">
                                                <img src="assets/images/plan/img-2.jpg" alt="">
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
                        <div role="tabpanel" class="tab-pane fade in show active" id="ground-floor">
                            <div class="wpo-plan-item">
                                <div class="row align-items-center">
                                    <div class="col-lg-8 col-md-12">
                                        <div class="wpo-plan-img">
                                            <img src="assets/images/plan/plan.png" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="wpo-plan-content-box">
                                            <div class="wpo-plan-content">
                                                <img src="assets/images/plan/img-1.jpg" alt="">
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
                        <div role="tabpanel" class="tab-pane fade in" id="first-floor">
                            <div class="wpo-plan-item">
                                <div class="row align-items-center">
                                    <div class="col-lg-8 col-md-12">
                                        <div class="wpo-plan-img">
                                            <img src="assets/images/plan/plan.png" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="wpo-plan-content-box">
                                            <div class="wpo-plan-content">
                                                <img src="assets/images/plan/img-3.jpg" alt="">
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
                        <div role="tabpanel" class="tab-pane fade in" id="second-floor">
                            <div class="wpo-plan-item">
                                <div class="row align-items-center">
                                    <div class="col-lg-8 col-md-12">
                                        <div class="wpo-plan-img">
                                            <img src="assets/images/plan/plan.png" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="wpo-plan-content-box">
                                            <div class="wpo-plan-content">
                                                <img src="assets/images/plan/img-4.jpg" alt="">
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
                        <div role="tabpanel" class="tab-pane fade in" id="rooftop">
                            <div class="wpo-plan-item">
                                <div class="row align-items-center">
                                    <div class="col-lg-8 col-md-12">
                                        <div class="wpo-plan-img">
                                            <img src="assets/images/plan/plan.png" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="wpo-plan-content-box">
                                            <div class="wpo-plan-content">
                                                <img src="assets/images/plan/img-5.jpg" alt="">
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
        </section> -->
        <!-- end wpo-plan-section-->

        <!-- start wpo-place-section -->
       <!--  <section class="wpo-place-section section-<?php echo get_template_directory_uri(); ?>/padding">
            <div class="container-fluid">
                <div class="place-wrap">
                    <div class="row align-items-center">
                        <div class="col-xl-5 col-md-5">
                            <div class="wpo-section-title-s2">
                                <small>nearby places</small>
                                <h2>nearby <span>places of</span> the property</h2>
                                
                                <ul class="tabs">
                                    <li><button id="Location1" class="tab">school <span>- 1.8 Km</span></button></li>
                                    <li><button id="Location2" class="tab">restaurant <span>- 1.6 Km</span></button></li>
                                    <li><button id="Location3" class="tab">mosque <span>- 2.0 Km</span></button></li>
                                    <li><button id="Location4" class="tab">park <span>- 0.96 Km</span></button></li>
                                    <li><button id="Location5" class="tab">hospital <span>- 1.6 Km</span></button></li>
                                </ul>

                            </div>
                        </div>
                        <div class="col-xl-7 col-md-7">
                            <div class="place-right-wrap clearfix">
                                <img src="assets/images/nearby/place.jpg" alt="">
                                <div id="location-wrap">
                                    <div id="location1" class="location s1">
                                        <div class="pin">
                                            <img src="assets/images/nearby/1.svg" alt="">
                                            <span>Corpus Christi School</span>
                                        </div>
                                    </div>
                                    <div id="location2" class="location s2">
                                        <div class="pin">
                                            <img src="assets/images/nearby/2.svg" alt="">
                                            <span>KFC Resturent</span>
                                        </div>
                                    </div>
                                    <div id="location3" class="location s3">
                                        <div class="pin">
                                            <img src="assets/images/nearby/3.svg" alt="">
                                            <span>Baitun Nor mosque</span>
                                        </div>
                                    </div>
                                    <div id="location4" class="location s4">
                                        <div class="pin">
                                            <img src="assets/images/nearby/4.svg" alt="">
                                            <span>Central Park</span>
                                        </div>
                                    </div>
                                    <div id="location5" class="location s5">
                                        <div class="pin">
                                            <img src="assets/images/nearby/5.svg" alt="">
                                            <span>Central Hospital</span>
                                        </div>
                                    </div>
                                    <div id="location6" class="location s6">
                                        <div class="pin">
                                            <img src="assets/images/nearby/6.svg" alt="">
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

          <!-- start of wpo-property-section --> 
        <!-- <section class="wpo-property-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-12">
                        <div class="wpo-section-title">
                            <h2>Discover our <span>featured</span> property.</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="property-slider property-active owl-carousel">
                    <div class="card-single">
                        <div class="image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/1.jpg" alt="">
                            <ul>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/1.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        03 beds
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/2.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        04 baths
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/3.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        02 garage
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/4.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        800 sq ft
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="text">
                            <h2><a href="property-single.html">Beautiful Modern Villa</a></h2>
                            <span>12 Avenue, New York</span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div class="image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/2.jpg" alt="">
                            <ul>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/1.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        03 beds
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/2.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        04 baths
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/3.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        02 garage
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/4.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        800 sq ft
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="text">
                            <h2><a href="property-single.html">Modern Hill House</a></h2>
                            <span>120 Avenue, Willowville</span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div class="image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/3.jpg" alt="">
                            <ul>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/1.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        03 beds
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/2.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        04 baths
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/3.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        02 garage
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/4.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        800 sq ft
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="text">
                            <h2><a href="property-single.html">Lake View Modern House</a></h2>
                            <span>121 Avenue, USA</span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div class="image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/4.jpg" alt="">
                            <ul>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/1.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        03 beds
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/2.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        04 baths
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/3.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        02 garage
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/4.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        800 sq ft
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="text">
                            <h2><a href="property-single.html">Maplewood Estates</a></h2>
                            <span>123 Oak Avenue, Willowville</span>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- end of wpo-property-section -->



        <!-- Yakubu Custom Post For Team Display -->

        <!-- start wpo-team-section -->
        <section class="wpo-team-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-12">
                        <div class="wpo-section-title">
                            <h2>Meet Our <span>Creative</span> Team.</h2>
                        </div>
                    </div>
                </div>
<!-- Categories Start  -->
<div class="row">
                    <div class="col-12">
                        <div class="team-filters">
                            <button class="filter-btn active" data-filter="*">All</button>
                            <?php
                            $terms = get_terms( array(
                                'taxonomy'   => 'department',
                                'hide_empty' => true,
                            ) );
                            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                                foreach ( $terms as $term ) {
                                    echo '<button class="filter-btn" data-filter=".' . esc_attr( $term->slug ) . '">' . esc_html( $term->name ) . '</button>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
<!-- Categories End  -->

                <div class="row team-grid">

                    <?php
                    $args = array(
                        'post_type'      => 'team',
                        'posts_per_page' => -1,
                        'orderby'        => 'menu_order',
                        'order'          => 'ASC',
                    );
                    $team_query = new WP_Query( $args );

                    $social_icons = [
                        'facebook'  => 'ti-facebook',
                        'instagram' => 'ti-instagram',
                        'linkedin'  => 'ti-linkedin',
                        'pinterest' => 'ti-pinterest',
                    ];

                    if ( $team_query->have_posts() ) :
                        while ( $team_query->have_posts() ) : $team_query->the_post();
                            $role = get_post_meta( get_the_ID(), '_team_role', true );
                            $socials = [
                                'linkedin'  => get_post_meta( get_the_ID(), '_team_linkedin', true ),
                                'facebook'  => get_post_meta( get_the_ID(), '_team_facebook', true ),
                                'instagram' => get_post_meta( get_the_ID(), '_team_instagram', true ),
                                'pinterest' => get_post_meta( get_the_ID(), '_team_pinterest', true ),
                            ];

                            $departments = get_the_terms( get_the_ID(), 'department' );
                            $department_classes = '';
                            if ( ! empty( $departments ) && ! is_wp_error( $departments ) ) {
                                foreach ( $departments as $department ) {
                                    $department_classes .= ' ' . $department->slug;
                                }
                            }
                    ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 team-item<?php echo esc_attr( $department_classes ); ?>">
                        <a href="<?php the_permalink(); ?>" class="team-member-card-link">
                            <div class="team-member">
                                <div class="team-member-image">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php the_post_thumbnail( 'medium' ); ?>
                                    <?php endif; ?>
                                </div>

                                <!-- Fix team links -->
                                <div class="team-member-info">
                                    <h4><?php the_title(); ?></h4>
                                    <p><?php echo esc_html( $role ); ?></p>
                                    <?php if ( ! empty( array_filter( $socials ) ) ) : ?>
                                    <ul class="team-socials">
                                        <?php foreach ( $socials as $network => $link ) : ?>
                                            <?php if ( ! empty( $link ) ) : ?>
                                            <li><a href="<?php echo esc_url( $link ); ?>" target="_blank" onclick="event.stopPropagation();"><i class="<?php echo esc_attr( $social_icons[$network] ); ?>"></i></a></li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </section>
        <!-- end wpo-team-section -->

        
        <section class="wpo-property-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-12">
                        <div class="wpo-section-title">
                            <h2>Discover our <span>featured</span> SPACES.</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="property-slider property-active owl-carousel">
                    <div class="card-single">
                        <div class="image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/1.jpg" alt="">
                            <ul>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/1.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        03 beds
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/2.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        04 baths
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/3.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        02 garage
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/4.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        800 sq ft
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="text">
                            <h2><a href="https://stackandhustle.com/book-space/">Coworking SPace</a></h2>
                            <span>12 Avenue, New York</span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div class="image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/2.jpg" alt="">
                            <ul>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/1.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        03 beds
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/2.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        04 baths
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/3.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        02 garage
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/4.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        800 sq ft
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="text">
                            <h2><a href="https://stackandhustle.com/book-space/">Reading Lounge</a></h2>
                            <span>120 Avenue, Willowville</span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div class="image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/3.jpg" alt="">
                            <ul>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/1.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        03 beds
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/2.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        04 baths
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/3.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        02 garage
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/4.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        800 sq ft
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="text">
                            <h2><a href="https://stackandhustle.com/book-space/">VIP Tables</a></h2>
                            <span>121 Avenue, USA</span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div class="image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/4.jpg" alt="">
                            <ul>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/1.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        03 beds
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/2.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        04 baths
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/3.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        02 garage
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property/4.svg" alt="">
                                    </div>
                                    <div class="text-dos">
                                        800 sq ft
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="text">
                            <h2><a href="https://stackandhustle.com/book-space/">Maplewood Estates</a></h2>
                            <span>123 Oak Avenue, Willowville</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- wpo-partners-area-start -->
        <!-- <section class="partners-section pt-0">
            <h2 class="hidden">partner</h2>
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="partner-grids partners-slider owl-carousel clearfix">
                            <div class="grid">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partners/img-1.png" alt="">
                            </div>
                            <div class="grid">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partners/img-2.png" alt="">
                            </div>
                            <div class="grid">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partners/img-3.png" alt="">
                            </div>
                            <div class="grid">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partners/img-4.png" alt="">
                            </div>
                            <div class="grid">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partners/img-5.png" alt="">
                            </div>
                            <div class="grid">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partners/img-6.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- partners-area-end -->

    <?php get_footer(); ?>


<style>
    .mission-vision-section {
/*  padding: 60px 0;*/
}

.mv-item {
  display: flex;
  align-items: flex-start;
  margin-bottom: 30px;
}

.mv-icon {
  position: relative;
  margin-right: 20px;
}

.mv-icon span {
  position: relative;
  display: inline-flex;
  width: 80px;
  height: 80px;
  border-radius: 50%;
  justify-content: center;
  align-items: center;
  background: #fff;
  border: 2px dashed #ddd; /* circle dashed border */
}

.mv-icon span img {
  width: 35px;
  height: 35px;
}

.mv-content h3 {
  font-size: 18px;
  font-weight: 600;
  color: #FF4A17; /* Title color */
  margin-bottom: 10px;
}

.mv-content p {
  font-size: 14px;
  color: #555;
  line-height: 1.6;
  max-width: 500px;
}
.wpo-about-area .wpo-about-text h5{
    font-size: 18px !important;
}

.wpo-team-section .team-member {
    text-align: center;
    margin-bottom: 30px;
    background: #fff;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0px 5px 20px 0px rgba(62, 65, 159, 0.05);
    transition: all .3s ease-in-out;
}
.wpo-team-section .team-member:hover {
    transform: translateY(-5px);
    box-shadow: 0px 10px 30px 0px rgba(62, 65, 159, 0.1);
}
.wpo-team-section .team-member-image {
    margin-bottom: 20px;
    overflow: hidden;
    border-radius: 8px;
}
.wpo-team-section .team-member-image img {
    width: 100%;
    transition: transform 0.3s ease;
}
.wpo-team-section .team-member:hover .team-member-image img {
    transform: scale(1.05);
}
.wpo-team-section .team-member-info h4 {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 5px;
}
.wpo-team-section .team-member-info p {
    color: #FF4A17;
    margin-bottom: 15px;
    font-style: italic;
}
.wpo-team-section .team-socials { list-style: none; padding: 0; margin: 0; display: flex; justify-content: center; }
.wpo-team-section .team-socials li { margin: 0 5px; }
.wpo-team-section .team-socials li a {
    display: inline-block; width: 30px; height: 30px; line-height: 30px; border: 1px solid #ddd;
    border-radius: 50%; color: #555; transition: all 0.3s ease;
}
.wpo-team-section .team-socials li a:hover { background-color: #FF4A17; color: #fff; border-color: #FF4A17; }


/* Yakubu Custom Team Code  */
.team-member-card-link {
    display: block;
    color: inherit;
    text-decoration: none;
}

.team-member-card-link:hover {
    color: inherit;
    text-decoration: none;
}

/* Category Styles */
.team-filters {
    text-align: center;
    margin-bottom: 40px;
}
.team-filters .filter-btn {
    background: transparent;
    border: 1px solid #ddd;
    color: #555;
    padding: 8px 20px;
    margin: 0 5px 10px;
    border-radius: 20px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight: 500;
}
.team-filters .filter-btn:hover,
.team-filters .filter-btn.active {
    background-color: #FF4A17;
    color: #fff;
    border-color: #FF4A17;
}


</style>

<script>
jQuery(document).ready(function($) {
    // Handle filter button clicks
    $('.team-filters .filter-btn').on('click', function(e) {
        e.preventDefault();
        // Set active class on button
        $('.team-filters .filter-btn').removeClass('active');
        $(this).addClass('active');

        var filterValue = $(this).attr('data-filter');

        if (filterValue === '*') {
            // Show all team members
            $('.team-grid .team-item').fadeIn(400);
        } else {
            // Hide all, then show the filtered ones
            $('.team-grid .team-item').fadeOut(200).promise().done(function() {
                $('.team-grid .team-item' + filterValue).fadeIn(400);
            });
        }
    });
});
</script>
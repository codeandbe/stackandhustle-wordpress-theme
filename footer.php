  <!-- start of wpo-site-footer-section -->
        <footer class="wpo-site-footer">
            <div class="wpo-upper-footer">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="widget newsletter-widget title-color">
                                <div class="widget-title">
                                    <h3>subscribe now</h3>
                                </div>
                                <form>
                                    <div class="input-1">
                                        <input type="email" class="form-control" placeholder="Enter your email:"
                                            required="">
                                    </div>
                                    <div class="submit clearfix">
                                        <button type="submit">Subscribe now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col col-lg-3 offset-lg-1 col-md-6 col-sm-12 col-12">
                            <div class="widget wpo-contact-widget">
                                <div class="widget-title">
                                    <h3>Site map</h3>
                                </div>
                                <div class="contact-ft a-color">
                                     <ul>
            <li><a href="<?php echo home_url('/'); ?>">Home</a></li>
            <li><a href="<?php echo home_url('/about-us'); ?>">About Us</a></li>
            <li><a href="<?php echo home_url('/category/events'); ?>">Events</a></li>
            <li><a href="<?php echo home_url('/category/courses'); ?>">Courses</a></li>
            <li><a href="<?php echo home_url('/donate'); ?>">Donate</a></li>
             <li><a href="<?php echo home_url('/terms-and-conditions'); ?>">Terms And Conditions</a></li>
        </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col col-lg-3 offset-lg-1 col-md-6 col-sm-12 col-12">
                            <div class="widget wpo-contact-widget">
                                <div class="widget-title">
                                    <h3>Contact us</h3>
                                </div>
                                <div class="contact-ft">
                                    <ul>
                                        <li><i class="fi flaticon-placeholder"></i>Vault Mall plot 436 Ali Muhammad Zarah street,  central business district FCT Abuja.</li>
                                        <li><i class="fi flaticon-phone-call"></i><a class="i-icon-color" href="tel:+234 808 072 9882">+234 810 837 3034</a></li>
                                        <li><i class="fi flaticon-email"></i><a class="i-icon-color" href="mailto:stackandhustle@gmail.com">stackandhustle@gmail.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end container -->
            </div>
            <div class="wpo-middle-footer">
                <div class="container">
                    <div class="instagram-widget">
                        <h2>- FOLLOW US ON INSTAGRAM -</h2>

                        <div class="instagram-wrap">
						
						
								<!-- Post Starts -->
								<?php
								query_posts('category_name=instagram-posts&posts_per_page=10&orderby=date&order=dsc'); // query to show all posts independent from what is in the center;
								if (have_posts()) :
								   while (have_posts()) :the_post(); ?>
								<!--Post attributes Start-->

                            <div class="instagram-item">
                                <a href="property-single.html">
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                    <i class="ti-instagram"></i>
                                </a>
                            </div>



								 <!--Post attributes End-->


								<?php  endwhile;
								endif;
								wp_reset_query();
								?>

								<!-- Post Ends -->						
						
							
							
							
							
							
                        </div>
                    </div>
                </div>
            </div>
            <div class="wpo-lower-footer">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col col-lg-6 col-md-12 col-12">
                            <div class="social">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-linkedin"></i>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-12">
                            <ul class="copyright">
                                <li>Copyright &copy; 2025  <a href="">Stack and Hustle Ltd</a> | Designed by IF Media</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end of wpo-site-footer-section -->


    </div>
    <!-- end of page-wrapper -->

    <!-- All JavaScript files
    ================================================== -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.bundle.min.js"></script>
    <!-- Plugins for this template -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/modernizr.custom.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-plugin-collection.js"></script>
    <!-- Custom script for this template -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/script.js"></script>
    
    <!-- jQuery (ensure only one version is present) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Lightbox2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>

    <?php wp_footer(); ?>

<script>
// jQuery(document).ready(function($) {
//     var checkExist = setInterval(function() {
//         var $input = $(".bpa-custom-duration-select div input");

//         if ($input.length > 0) {
//             $input.attr("placeholder", "Select Duration");
//             clearInterval(checkExist); // Stop checking
//         }
//     }, 300); // Check every 300ms
// });
</script>


<script>
jQuery(document).ready(function($) {
    var tries = 0;
    var maxTries = 30;

    var interval = setInterval(function () {
        // 1. Set the visible field's placeholder
        var $durationField = $(".bpa-custom-duration-select input");

        $durationField.each(function () {
            var $el = $(this);
            var val = $el.val();

            if (!val || val === "" || val === "તારીખ અને સમય પસંદ કરો") {
                $el.val("Select Duration");
                $el.attr("placeholder", "Select Duration");
            }
        });

        // 2. Add "Select Duration" as the first dropdown option
        // Find the dropdown container (usually a UL list or div)
        var $dropdownList = $(".bpa-custom-duration-select ul, .bpa-custom-duration-select .choices__list");

        $dropdownList.each(function () {
            var $list = $(this);
            var $firstItem = $list.children().first();
            var firstText = $firstItem.text().trim();

            if (firstText !== "Select Duration") {
                $list.prepend('<li class="dropdown-item" data-value="">Select Duration</li>');
            }
        });

        tries++;
        if (tries >= maxTries) clearInterval(interval);
    }, 400);
});
</script>


</body>

</html>
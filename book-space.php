<?php
/*
Template Name: Book Your Space
*/
get_header(); ?>


<!-- start wpo-page-title -->
        <section class="wpo-page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2>Book Your Space</h2>
                            <ol class="wpo-breadcumb-wrap">
                                <li><a href="https://stackandhustle.com/">Home</a></li>
                                <li>Book Your Space</li>
                            </ol>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->


<!-- BookingPress Form Section -->
<section class="bookingpress-section py-5">
    <div class="container">
        <?php echo do_shortcode('[bookingpress_form]'); ?>
    </div>
</section>
<!-- End BookingPress Form Section -->

<?php get_footer(); ?>        
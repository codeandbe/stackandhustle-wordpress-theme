<?php
/**
 * Template Name: Terms and Conditions
 */
get_header();
?>

 <!-- start wpo-page-title -->
        <section class="wpo-page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2>Terms and Conditions</h2>
                            <ol class="wpo-breadcumb-wrap">
                                <li><a href="<?php echo site_url(); ?>">Home</a></li>
                                <li>Terms and Conditions</li>
                            </ol>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->


      

      

<!-- start wpo-blog-single-section -->
<section class="wpo-blog-single-section wpo-blog-single-left-sidebar-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-lg-10 col-12 offset-lg-1">
                <div class="wpo-blog-content">
                    <div class="post format-standard-image">
                        <?php 
                        if ( have_posts() ) : 
                            while ( have_posts() ) : the_post(); 
                                the_content(); 
                            endwhile; 
                        endif; 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end container -->
</section>
<!-- end wpo-blog-single-section -->

  
        

        

</div>
<?php get_footer(); ?>

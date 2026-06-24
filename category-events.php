<?php


get_header();
?>

<!-- start wpo-page-title -->
<section class="wpo-page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>Events</h2>
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="<?php echo home_url(); ?>">Home</a></li>
                        <li>Events</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end page-title -->

<!-- start wpo-blog-section -->
<section class="wpo-blog-section-s2 section-padding">
    <div class="container">
        <div class="blog-wrap">
            <div class="row">
                <?php
                // $args = array(
                //     'post_type'      => 'post',
                //     'posts_per_page' => 6,
                //     'category_name'  => 'events', // check slug: "event" or "events"
                // );

                      $args = array(
    'post_type'      => 'post',
    'category_name'  => 'events', // category slug
    'posts_per_page' => -1,
    'orderby'        => 'date',
    'order'          => 'ASC' 
);
                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        if (has_post_thumbnail()) : ?>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="blog-item">
                                    <div class="image">
                                        <?php the_post_thumbnail('medium', [
                                            'alt'   => get_the_title(),
                                            'class' => 'img-fluid'
                                        ]); ?>
                                        <div class="thumb">
                                            <span><?php echo get_the_date('F j, Y'); ?></span>
                                        </div>
                                    </div>
                                    <div class="blog-content">
                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        <a class="read-more" href="<?php the_permalink(); ?>">Register</a>
                                    </div>
                                </div>
                            </div>
                        <?php endif;
                    endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p>No events found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- end wpo-blog-section -->

<?php get_footer(); ?>

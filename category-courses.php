<?php
get_header(); ?>

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
  background: #ff5722; /* Active page */
  color: #fff;
  font-weight: 600;
}

</style>
<!-- start wpo-page-title -->
<section class="wpo-page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>Courses</h2>
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="<?php echo home_url(); ?>">Home</a></li>
                        <li>Courses</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end page-title -->

<!-- start wpo-service-section -->
<section class="wpo-service-section-s3 section-padding bg-color-courses">
    <div class="container">
        <div class="wpo-service-wrap">
            <div class="row">
                <?php
                // Pagination setup
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                // Fetch posts from "courses" category
                $args = array(
                    'post_type'      => 'post',
                    'category_name'  => 'courses', // category slug
                    'posts_per_page' => 6,
                    'orderby'        => 'date',
                    'order'          => 'ASC',
                    'paged'          => $paged
                );
                $courses = new WP_Query($args);

                if ($courses->have_posts()) :
                    while ($courses->have_posts()) : $courses->the_post(); ?>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="wpo-service-item">
                                <div class="wpo-service-icon icon-bg">
                                    <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/service/2.svg" alt=""></span>
                                </div>
                                <div class="wpo-service-text">
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
<!-- end wpo-service-section-->

<?php get_footer(); ?>

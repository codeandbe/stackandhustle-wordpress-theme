<?php
get_header();

if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        
        <!-- start wpo-page-title -->
        <section class="wpo-page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2><?php the_title(); ?></h2>
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

        <!-- start event-single-section -->
        <section class="wpo-shop-single-section section-padding">
            <div class="container">
                <div class="row">
                    <!-- Featured Image / Gallery -->
                    <div class="col col-lg-6 col-12">
                        <div class="shop-single-slider">
                            <div class="slider-for">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div><?php the_post_thumbnail('large', ['class' => 'img-fluid']); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Event Content -->
                    <div class="col col-lg-6 col-12">
                        <div class="product-details">
                            <h2><?php the_title(); ?></h2>
                            <div class="product-rt">
                                <span><?php echo get_the_date('F j, Y'); ?></span>
                            </div>
                            <div class="event-content">
                                <?php the_content(); ?>
                            </div>

                            <div class="submit-area">
                                <a href="https://stackandhustle.com/book-space/" class="theme-btn">Register</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabs (Description / Reviews) -->
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="product-info">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                        href="#Description" role="tab">Description</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="Review-tab" data-bs-toggle="tab"
                                        href="#Review" role="tab">Review</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="Description">
                                    <?php the_content(); ?>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="Review">
                                    <?php comments_template(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    <?php endwhile;
endif;

get_footer();

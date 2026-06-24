<?php
/*
 * The template for displaying the Team archive.
 */

get_header(); ?>


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

/* Yakubu Custom Team Code  */

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

<!-- start wpo-page-title -->
<section class="wpo-page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2><?php post_type_archive_title(); ?></h2>
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="<?php echo home_url(); ?>">Home</a></li>
                        <li><?php post_type_archive_title(); ?></li>
                    </ol>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- end page-title -->

<!-- Teams page start --> <!-- Yakubu Custom Post For Team Display -->

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
                    if ( have_posts() ) : // Use the default WordPress loop for archives
                        $social_icons = [
                            'facebook'  => 'ti-facebook',
                            'instagram' => 'ti-instagram',
                            'linkedin'  => 'ti-linkedin',
                            'pinterest' => 'ti-pinterest',
                        ];

                        while ( have_posts() ) : the_post();
                            $role = get_post_meta( get_the_ID(), '_team_role', true );
                            $socials = [
                                'linkedin'  => get_post_meta( get_the_ID(), '_team_linkedin', true ),
                                'facebook'  => get_post_meta( get_the_ID(), '_team_facebook', true ),
                                'instagram' => get_post_meta( get_the_ID(), '_team_instagram', true ),
                                'pinterest' => get_post_meta( get_the_ID(), '_team_pinterest', true ),
                            ];

                            // Added Categories 
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
                                </div><!-- Fix team links -->
                                <div class="team-member-info">
                                    <h4><?php the_title(); ?></h4>
                                    <p><?php echo esc_html( $role ); ?></p>
                                    <?php if ( ! empty( array_filter( $socials ) ) ) : ?>
                                    <ul class="team-socials">
                                        <?php foreach ( $socials as $network => $link ) : ?>
                                            <?php if ( ! empty( $link ) ) : ?>
                                            <li>
                                                
                                                <a href="<?php echo esc_url( $link ); ?>" target="_blank" onclick="event.stopPropagation();">
                                                <span style="padding:8px;">
                                                    <i class="<?php echo esc_attr( $social_icons[$network] ); ?>"></i>
                                                </span>
                                                </a>
                                            </li>
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
                    endif;
                    ?>
                </div>
            </div>
        </section>
        <!-- end wpo-team-section --><!-- Teams page end  -->

 <?php get_footer(); ?>

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
<?php
/**
 * The template for displaying single Team Member posts.
 */
get_header(); ?>

<!-- start wpo-page-title -->
<section class="wpo-page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2><?php the_title(); ?></h2>
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="<?php echo home_url(); ?>">Home</a></li>
                        <li><a href="<?php echo get_post_type_archive_link('team'); ?>">Team</a></li>
                        <li><?php the_title(); ?></li>
                    </ol>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- end page-title -->

<!-- start team-member-details-section -->
<section class="team-member-details-section section-padding">
    <div class="container">
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div class="member-image">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <!-- use img tag to display thumbnail with custom height and width 150 x 160                              -->
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php the_title_attribute(); ?>" width="" height="580">
                            
                            <?php 
                            // the_post_thumbnail( 'medium' ); 
                            ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="member-details">
                        <h2 class="member-name"><?php the_title(); ?></h2>
                        <?php
                            $role = get_post_meta( get_the_ID(), '_team_role', true );
                            if ( ! empty( $role ) ) :
                        ?>
                            <h4 class="member-role"><?php echo esc_html( $role ); ?></h4>
                        <?php endif; ?>

                        <div class="member-bio">
                            <?php the_content(); // This will display the biography from the editor ?>
                        </div>

                        <?php
                            $socials = [
                                'linkedin'  => get_post_meta( get_the_ID(), '_team_linkedin', true ),
                                'facebook'  => get_post_meta( get_the_ID(), '_team_facebook', true ),
                                'instagram' => get_post_meta( get_the_ID(), '_team_instagram', true ),
                                'pinterest' => get_post_meta( get_the_ID(), '_team_pinterest', true ),
                            ];
                            $social_icons = [
                                'facebook'  => 'ti-facebook',
                                'instagram' => 'ti-instagram',
                                'linkedin'  => 'ti-linkedin',
                                'pinterest' => 'ti-pinterest',
                            ];

                            if ( ! empty( array_filter( $socials ) ) ) :
                        ?>
                        <div class="member-socials">
                            <h5>Connect:</h5>
                            <ul class="social-links">
                                <?php foreach ( $socials as $network => $link ) : ?>
                                    <?php if ( ! empty( $link ) ) : ?>
                                    <li><a href="<?php echo esc_url( $link ); ?>" target="_blank"><i class="<?php echo esc_attr( $social_icons[$network] ); ?>"></i></a></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endwhile; // end of the loop. ?>
    </div>
</section>
<!-- end team-member-details-section -->

<?php get_footer(); ?>

<style>
/* Styles for Single Team Member Page */
.team-member-details-section .member-image img {
    width: 100%;
    border-radius: 8px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.team-member-details-section .member-details {
    padding-left: 30px;
}

@media (max-width: 991px) {
    .team-member-details-section .member-details {
        padding-left: 0;
        margin-top: 30px;
    }
}

.team-member-details-section .member-name {
    font-size: 36px;
    font-weight: 700;
    margin-bottom: 5px;
}

.team-member-details-section .member-role {
    font-size: 20px;
    font-weight: 500;
    color: #FF4A17;
    margin-bottom: 25px;
    font-style: italic;
}

.team-member-details-section .member-bio p {
    font-size: 16px;
    line-height: 1.7;
    color: #555;
    margin-bottom: 1em;
}

.team-member-details-section .member-socials { margin-top: 30px; }
.team-member-details-section .member-socials h5 { font-size: 18px; font-weight: 600; margin-bottom: 15px; }
.team-member-details-section .social-links { list-style: none; padding: 6px; margin: 0; display: flex; }
.team-member-details-section .social-links li { margin-right: 10px; }
.team-member-details-section .social-links li a { display: flex; justify-content: center; align-items: center; width: 40px; height: 40px; border: 1px solid #ddd; border-radius: 50%; color: #555; font-size: 16px; text-decoration: none; transition: all 0.3s ease; }
.team-member-details-section .social-links li a:hover { background-color: #FF4A17; color: #fff; border-color: #FF4A17; }
</style>

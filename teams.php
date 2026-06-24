<?php
/*
 * The template for displaying the Team archive.
 */

get_header(); ?>

<style>

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
                <div class="row">
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
                    ?>
                    <div class="col-lg-3 col-md-6 col-sm-12">
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
                                            <?php if ( $link ) : ?>
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
                    endif;
                    ?>
                </div>
            </div>
        </section>
        <!-- end wpo-team-section --><!-- Teams page end  -->

 <?php get_footer(); ?>
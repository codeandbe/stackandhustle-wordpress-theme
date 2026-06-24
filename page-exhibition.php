<?php
/**
 * Template Name: Exhibition
 *
 * Displays team members assigned to an exhibition taxonomy term.
 * Usage: Assign this template to a page, then visit it with ?exhibition=<term-slug>
 * or set the _linked_exhibition_slug meta on the page.
 */

get_header();

$exhibition_slug = ! empty( $_GET['exhibition'] )
    ? sanitize_text_field( $_GET['exhibition'] )
    : get_post_meta( get_the_ID(), '_linked_exhibition_slug', true );

$event_title = get_the_title();
$term        = null;

if ( $exhibition_slug ) {
    $term = get_term_by( 'slug', $exhibition_slug, 'exhibition_event' );
    if ( $term ) {
        $event_title = $term->name;
    }
}
?>

<style>
.ex-card-wrap {
    margin-bottom: 28px;
}

.ex-card {
    border-radius: 12px;
    overflow: visible;
    box-shadow: 0 4px 20px rgba(0,0,0,0.07);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-decoration: none;
    color: inherit;
    display: block;
    background: #fff;
}
.ex-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 14px 36px rgba(0,0,0,0.13);
    color: inherit;
    text-decoration: none;
}

/* Image — rounded top only, flat bottom to connect with card body */
.ex-card-img {
    width: 100%;
    aspect-ratio: 3 / 4;
    overflow: hidden;
    display: block;
    margin: 0;
    padding: 0;
    line-height: 0;
    border-radius: 12px 12px 0 0;
}
.ex-card-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: top center;
    display: block;
    margin: 0;
    padding: 0;
    transition: transform 0.4s ease;
}
.ex-card:hover .ex-card-img img {
    transform: scale(1.05);
}

/* Info — same white background, seamlessly continues the card */
.ex-card-body {
    background: #fff;
    padding: 14px 14px 16px;
    margin: 0;
    border-radius: 0 0 12px 12px;
    text-align: center;
}
.ex-card-body h4 {
    font-size: 16px;
    font-weight: 600;
    margin: 0 0 3px;
    line-height: 1.3;
}
.ex-card-body .ex-role {
    font-size: 12px;
    color: #FF4A17;
    font-style: italic;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    margin-bottom: 10px;
    line-height: 1.4;
    min-height: calc(12px * 1.4 * 2); /* reserve space for 2 lines always */
}

/* Squared social icons */
.ex-socials {
    display: flex;
    flex-wrap: wrap;
    gap: 5px;
    justify-content: center;
}
.ex-socials a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 28px;
    height: 28px;
    border-radius: 6px;
    background: #f4f4f4;
    color: #444;
    font-size: 13px;
    text-decoration: none;
    transition: background 0.2s ease, color 0.2s ease, transform 0.2s ease;
}
.ex-socials a:hover {
    background: #FF4A17;
    color: #fff;
    transform: translateY(-2px);
}

@media (max-width: 575px) {
    .ex-card-wrap { margin-bottom: 20px; }
    .ex-card-body { padding: 11px 11px 13px; }
    .ex-card-body h4 { font-size: 14px; }
    .ex-card-body .ex-role { font-size: 11px; min-height: calc(11px * 1.4 * 2); }
    .ex-socials a { width: 25px; height: 25px; font-size: 11px; }
}
</style>

<!-- page title -->
<section class="wpo-page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2><?php echo esc_html( $event_title ); ?></h2>
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="<?php echo home_url(); ?>">Home</a></li>
                        <li><?php echo esc_html( $event_title ); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="wpo-team-section section-padding">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="wpo-section-title">
                    <h2>Meet Our <span>Creative</span> Designers</h2>
                </div>
            </div>
        </div>

        <?php
        $args = array(
            'post_type'      => 'team',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
        );

        if ( $exhibition_slug ) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'exhibition_event',
                    'field'    => 'slug',
                    'terms'    => $exhibition_slug,
                ),
            );
        }

        $participants = new WP_Query( $args );

        $social_map = array(
            'instagram' => array( 'meta' => '_team_instagram', 'icon' => 'ti-instagram' ),
            'twitter'   => array( 'meta' => '_team_twitter',   'icon' => 'ti-twitter-alt' ),
            'linkedin'  => array( 'meta' => '_team_linkedin',  'icon' => 'ti-linkedin' ),
            'facebook'  => array( 'meta' => '_team_facebook',  'icon' => 'ti-facebook' ),
            'behance'   => array( 'meta' => '_team_behance',   'icon' => 'ti-palette' ),
            'dribbble'  => array( 'meta' => '_team_dribbble',  'icon' => 'ti-dribbble' ),
            'website'   => array( 'meta' => '_team_website',   'icon' => 'ti-world' ),
        );

        if ( $participants->have_posts() ) : ?>
        <div class="row">
            <?php while ( $participants->have_posts() ) : $participants->the_post();
                $pid  = get_the_ID();
                $role = get_post_meta( $pid, '_team_role', true );
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 ex-card-wrap">
                <a href="<?php the_permalink(); ?>" class="ex-card">

                    <div class="ex-card-img">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'medium_large' ); ?>
                        <?php endif; ?>
                    </div>

                    <div class="ex-card-body">
                        <h4><?php the_title(); ?></h4>
                        <?php if ( $role ) : ?>
                            <span class="ex-role"><?php echo esc_html( $role ); ?></span>
                        <?php endif; ?>

                        <?php
                        // Collect only filled socials first
                        $filled_socials = array();
                        foreach ( $social_map as $key => $s ) {
                            $url = get_post_meta( $pid, $s['meta'], true );
                            if ( $url ) $filled_socials[ $key ] = array_merge( $s, array( 'url' => $url ) );
                        }
                        // Skip first, show next 5
                        $display_socials = array_slice( $filled_socials, 1, 4 );
                        if ( ! empty( $display_socials ) ) : ?>
                        <div class="ex-socials">
                            <?php foreach ( $display_socials as $key => $s ) : ?>
                            <a href="<?php echo esc_url( $s['url'] ); ?>"
                               target="_blank"
                               rel="noopener noreferrer"
                               onclick="event.stopPropagation();"
                               title="<?php echo esc_attr( ucfirst( $key ) ); ?>">
                                <i class="<?php echo esc_attr( $s['icon'] ); ?>"></i>
                            </a>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>

                </a>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>

        <?php else : ?>
        <div class="row">
            <div class="col-12" style="text-align:center; padding:60px 0; color:#888;">
                <p>No participants found for this exhibition.</p>
            </div>
        </div>
        <?php endif; ?>

    </div>
</section>

<?php get_footer(); ?>

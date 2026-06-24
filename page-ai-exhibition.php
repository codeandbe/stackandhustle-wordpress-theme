<?php
/**
 * Template Name: AI Exhibition Template
 *
 * Displays profile cards for participants loaded from standard Posts
 * in the 'ai-exhibition' category.
 */

get_header();

$event_title = get_the_title();
$category    = get_category_by_slug( 'ai-exhibition' );
if ( $category ) {
    $event_title = $category->name;
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
.ex-card-img {
    width: 100%;
    aspect-ratio: 3 / 4;
    overflow: hidden;
    display: block;
    border-radius: 12px 12px 0 0;
    line-height: 0;
}
.ex-card-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: top center;
    display: block;
    transition: transform 0.4s ease;
}
.ex-card:hover .ex-card-img img {
    transform: scale(1.05);
}
.ex-card-body {
    background: #fff;
    padding: 14px 14px 16px;
    border-radius: 0 0 12px 12px;
    text-align: center;
}
.ex-card-body h4 {
    font-size: 16px;
    font-weight: 600;
    margin: 0 0 4px;
    line-height: 1.3;
    color: #111;
}
.ex-card-body .ex-role {
    font-size: 12px;
    color: #FF4A17;
    font-style: italic;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    line-height: 1.4;
    margin: 0;
}
.ex-card-view {
    display: inline-block;
    margin-top: 10px;
    font-size: 11px;
    font-weight: 700;
    color: #FF4A17;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    text-decoration: none;
    border-top: 1px solid #f0f0f0;
    padding-top: 10px;
    width: 100%;
}
@media (max-width: 575px) {
    .ex-card-wrap  { margin-bottom: 20px; }
    .ex-card-body  { padding: 11px 11px 13px; }
    .ex-card-body h4 { font-size: 14px; }
    .ex-card-body .ex-role { font-size: 11px; }
    .ex-card-view { font-size: 10px; }
}
</style>

<!-- page title -->
<section class="wpo-page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>
                        <?php 
                        echo "AI Image and Video Exhibition"; ?>
                    </h2>
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
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
                    <h2>Meet Our <span>AI Exhibition</span> Participants</h2>
                </div>
            </div>
        </div>

        <?php
        $participants = new WP_Query( array(
            'post_type'      => 'post',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'orderby'        => 'menu_order title',
            'order'          => 'ASC',
            'category_name'  => 'ai-exhibition',
        ) );

        if ( $participants->have_posts() ) : ?>
        <div class="row">
            <?php while ( $participants->have_posts() ) : $participants->the_post();
                $pid  = get_the_ID();
                $role = get_post_meta( $pid, '_ex_role', true );
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
                        <span class="ex-card-view">View Profile →</span>
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

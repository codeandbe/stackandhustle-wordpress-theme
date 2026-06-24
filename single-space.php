<?php
/*
Template Name: Book Space Single
*/
get_header();

// Get current slug
$slug = basename(get_permalink());

// Default service ID
$service_id = 1;

// Map slug → service ID
if ($slug == 'book-space-1') {
    $service_id = 1;
} elseif ($slug == 'book-space-2') {
    $service_id = 2;
} elseif ($slug == 'book-space-3') {
    $service_id = 3;
} elseif ($slug == 'stack-sofa-2') {
    $service_id = 16;
} elseif ($slug == 'private-executive-office-2') {
    $service_id = 3;
} elseif ($slug == 'vip-section') {
    $service_id = 6;
} elseif ($slug == 'circuit-table') {
    $service_id = 13;
} elseif ($slug == 'reading-lounge-2') {
    $service_id = 2;
}






?>

<!-- Page Title -->
<section class="wpo-page-title">
    <div class="container">
        <h2>Book Space <?php echo esc_html($service_id); ?></h2>
        <ol class="wpo-breadcumb-wrap">
            <li><a href="<?php echo home_url(); ?>">Home</a></li>
            <li>Book Space <?php echo esc_html($service_id); ?></li>
        </ol>
    </div>
</section>

<!-- Single Service Booking -->
<section class="bookingpress-section py-5">
    <div class="container">
        <?php echo do_shortcode('[bookingpress_form service="'.$service_id.'"]'); ?>
    </div>
</section>

<?php get_footer(); ?>

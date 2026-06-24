<?php
/**
 * Template Name: Exhibition Gallery
 *
 * Displays all exhibition participants' portfolio images in a masonry-style grid.
 * Tapping an image opens a fullscreen lightbox with participant info and a profile link.
 *
 * Usage: Create a page, assign "Exhibition Gallery" template.
 * Optionally filter by exhibition: ?exhibition=<term-slug>
 */

get_header();

$exhibition_slug = ! empty( $_GET['exhibition'] )
    ? sanitize_text_field( $_GET['exhibition'] )
    : get_post_meta( get_the_ID(), '_linked_exhibition_slug', true );

$page_title = get_the_title();
$term       = null;
if ( $exhibition_slug ) {
    $term = get_term_by( 'slug', $exhibition_slug, 'exhibition_event' );
    if ( $term ) $page_title = $term->name . ' — Gallery';
}

// Query all team members in the exhibition
$args = array(
    'post_type'      => 'team',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
);
if ( $exhibition_slug ) {
    $args['tax_query'] = array(
        array( 'taxonomy' => 'exhibition_event', 'field' => 'slug', 'terms' => $exhibition_slug ),
    );
}

$participants = new WP_Query( $args );

// Build flat list of all gallery entries: { img, name, role, profile_url, avatar }
$gallery_entries = array();
if ( $participants->have_posts() ) {
    while ( $participants->have_posts() ) {
        $participants->the_post();
        $pid           = get_the_ID();
        $portfolio_img = get_post_meta( $pid, '_team_portfolio_image', true );
        if ( ! $portfolio_img ) continue; // skip if no portfolio image

        $entry = array(
            'img'         => $portfolio_img,
            'name'        => get_the_title(),
            'role'        => get_post_meta( $pid, '_team_role', true ),
            'profile_url' => get_permalink(),
            'avatar'      => get_the_post_thumbnail_url( $pid, 'thumbnail' ),
        );

        // Extra images from _team_gallery (comma-separated URLs)
        $extra = get_post_meta( $pid, '_team_gallery', true );
        $all_imgs = array( $portfolio_img );
        if ( $extra ) {
            foreach ( array_map( 'trim', explode( ',', $extra ) ) as $u ) {
                if ( $u ) $all_imgs[] = $u;
            }
        }

        foreach ( $all_imgs as $img_url ) {
            $gallery_entries[] = array(
                'img'         => $img_url,
                'name'        => $entry['name'],
                'role'        => $entry['role'],
                'profile_url' => $entry['profile_url'],
                'avatar'      => $entry['avatar'],
            );
        }
    }
    wp_reset_postdata();
}
?>

<style>
/* ── Page ── */
.exgallery-page {
    background: #111;
    min-height: 100vh;
    padding-bottom: 80px;
}

/* ── Hero ── */
.exgallery-hero {
    background: #111;
    text-align: center;
    padding: 160px 20px 40px;
}
@media (max-width: 767px) {
    .exgallery-hero { padding-top: 100px; }
}
.exgallery-hero h1 {
    font-size: 32px;
    font-weight: 800;
    color: #fff;
    margin: 0 0 8px;
    letter-spacing: -0.5px;
}
.exgallery-hero p {
    font-size: 14px;
    color: #666;
    margin: 0;
}
.exgallery-hero span {
    color: #FF4A17;
}

/* ── Masonry grid ── */
.exgallery-grid {
    columns: 3;
    column-gap: 6px;
    padding: 6px;
}
@media (max-width: 767px) { .exgallery-grid { columns: 2; } }
@media (max-width: 400px) { .exgallery-grid { columns: 2; column-gap: 4px; padding: 4px; } }

/* ── Grid item ── */
.exgallery-item {
    break-inside: avoid;
    position: relative;
    margin-bottom: 6px;
    cursor: pointer;
    border-radius: 8px;
    overflow: hidden;
    background: #1a1a1a;
    display: block;
}
@media (max-width: 400px) { .exgallery-item { margin-bottom: 4px; border-radius: 6px; } }

.exgallery-item img {
    width: 100%;
    display: block;
    transition: transform 0.4s ease;
}
.exgallery-item:hover img,
.exgallery-item:active img { transform: scale(1.04); }

/* ── Hover overlay ── */
.exgallery-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.75) 0%, transparent 50%);
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 14px 12px;
}
.exgallery-item:hover .exgallery-overlay { opacity: 1; }

/* always show on touch devices */
@media (hover: none) {
    .exgallery-overlay { opacity: 1; }
}

.exgallery-overlay-name {
    font-size: 13px;
    font-weight: 700;
    color: #fff;
    line-height: 1.2;
    margin: 0 0 2px;
}
.exgallery-overlay-role {
    font-size: 11px;
    color: #FF4A17;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    margin: 0;
}

/* ── Mobile avatar link on grid item ── */
.exgallery-item-avatar {
    display: none;
}
@media (hover: none) {
    .exgallery-item-avatar {
        display: block;
        position: absolute;
        top: 8px;
        left: 8px;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        overflow: hidden;
        border: 2px solid rgba(255,255,255,0.7);
        background: #333;
        z-index: 2;
        text-decoration: none;
    }
    .exgallery-item-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: none;
    }
    .exgallery-item-avatar:hover img,
    .exgallery-item-avatar:active img { transform: none; }
    .exgallery-item-avatar-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        background: #444;
        color: #fff;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
    }
}

/* ── Lightbox ── */
.exgallery-lightbox {
    display: none;
    position: fixed;
    inset: 0;
    z-index: 99999;
    background: rgba(0,0,0,0.96);
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.exgallery-lightbox.active { display: flex; }

.exgallery-lb-img-wrap {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    padding: 60px 60px 0;
    box-sizing: border-box;
    min-height: 0;
}
@media (max-width: 480px) {
    .exgallery-lb-img-wrap { padding: 56px 12px 0; }
}

.exgallery-lb-img-wrap img {
    max-width: 100%;
    max-height: 70vh;
    border-radius: 8px;
    object-fit: contain;
    animation: lb-in 0.22s ease;
    display: block;
}

@keyframes lb-in {
    from { opacity: 0; transform: scale(0.95); }
    to   { opacity: 1; transform: scale(1); }
}

/* ── Lightbox top bar ── */
.exgallery-lb-topbar {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 16px;
    background: linear-gradient(to bottom, rgba(0,0,0,0.6), transparent);
}
.exgallery-lb-counter {
    font-size: 12px;
    color: rgba(255,255,255,0.5);
    font-weight: 600;
}
.exgallery-lb-close {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: rgba(255,255,255,0.1);
    border: none;
    color: #fff;
    font-size: 18px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.2s;
    line-height: 1;
}
.exgallery-lb-close:hover { background: #FF4A17; }

/* ── Lightbox nav arrows ── */
.exgallery-lb-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: rgba(255,255,255,0.1);
    border: none;
    color: #fff;
    font-size: 22px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.2s;
    z-index: 2;
}
.exgallery-lb-nav:hover { background: #FF4A17; }
.exgallery-lb-prev { left: 12px; }
.exgallery-lb-next { right: 12px; }
@media (max-width: 480px) {
    .exgallery-lb-nav { width: 36px; height: 36px; font-size: 18px; }
    .exgallery-lb-prev { left: 6px; }
    .exgallery-lb-next { right: 6px; }
}

/* ── Lightbox bottom info bar ── */
.exgallery-lb-info {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 16px 20px;
    background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
    gap: 12px;
    box-sizing: border-box;
    flex-shrink: 0;
}
@media (max-width: 480px) { .exgallery-lb-info { padding: 12px 14px; } }

.exgallery-lb-participant {
    display: flex;
    align-items: center;
    gap: 10px;
    min-width: 0;
}
.exgallery-lb-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid rgba(255,255,255,0.2);
    flex-shrink: 0;
    background: #333;
}
.exgallery-lb-avatar-placeholder {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #333;
    flex-shrink: 0;
}
.exgallery-lb-text { min-width: 0; }
.exgallery-lb-name {
    font-size: 14px;
    font-weight: 700;
    color: #fff;
    margin: 0 0 2px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.exgallery-lb-role {
    font-size: 11px;
    color: #FF4A17;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    margin: 0;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.exgallery-lb-profile-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 9px 16px;
    border-radius: 50px;
    background: #FF4A17;
    color: #fff;
    font-size: 12px;
    font-weight: 700;
    text-decoration: none;
    white-space: nowrap;
    flex-shrink: 0;
    transition: background 0.2s, transform 0.15s;
}
.exgallery-lb-profile-btn:hover {
    background: #e03d10;
    color: #fff;
    text-decoration: none;
    transform: translateY(-1px);
}

/* ── Empty state ── */
.exgallery-empty {
    text-align: center;
    padding: 100px 20px;
    color: #555;
    font-size: 15px;
}
</style>

<!-- Page -->
<div class="exgallery-page">

    <!-- Hero -->
    <div class="exgallery-hero">
        <h1><?php echo esc_html( $page_title ); ?></h1>
        <p><?php echo count( $gallery_entries ); ?> <span>design<?php echo count( $gallery_entries ) !== 1 ? 's' : ''; ?></span></p>
    </div>

    <!-- Grid -->
    <?php if ( ! empty( $gallery_entries ) ) : ?>
    <div class="exgallery-grid">
        <?php foreach ( $gallery_entries as $i => $entry ) : ?>
        <div class="exgallery-item" data-index="<?php echo $i; ?>">
            <img src="<?php echo esc_url( $entry['img'] ); ?>"
                 alt="<?php echo esc_attr( $entry['name'] ); ?>"
                 loading="lazy">
            <?php if ( $entry['avatar'] ) : ?>
            <a href="<?php echo esc_url( $entry['profile_url'] ); ?>"
               class="exgallery-item-avatar"
               aria-label="<?php echo esc_attr( $entry['name'] ); ?> profile"
               target="_blank" rel="noopener noreferrer"
               onclick="event.stopPropagation();">
                <img src="<?php echo esc_url( $entry['avatar'] ); ?>" alt="<?php echo esc_attr( $entry['name'] ); ?>">
            </a>
            <?php else : ?>
            <a href="<?php echo esc_url( $entry['profile_url'] ); ?>"
               class="exgallery-item-avatar"
               aria-label="<?php echo esc_attr( $entry['name'] ); ?> profile"
               target="_blank" rel="noopener noreferrer"
               onclick="event.stopPropagation();">
                <span class="exgallery-item-avatar-placeholder"><?php echo esc_html( mb_substr( $entry['name'], 0, 1 ) ); ?></span>
            </a>
            <?php endif; ?>
            <div class="exgallery-overlay">
                <p class="exgallery-overlay-name"><?php echo esc_html( $entry['name'] ); ?></p>
                <?php if ( $entry['role'] ) : ?>
                    <p class="exgallery-overlay-role"><?php echo esc_html( $entry['role'] ); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <?php else : ?>
    <div class="exgallery-empty">
        <p>No designs found for this exhibition.</p>
    </div>
    <?php endif; ?>

</div>

<!-- Lightbox -->
<div class="exgallery-lightbox" id="exgalleryLightbox" role="dialog" aria-modal="true" aria-label="Image viewer">

    <!-- Top bar -->
    <div class="exgallery-lb-topbar">
        <span class="exgallery-lb-counter" id="exLbCounter">1 / <?php echo count( $gallery_entries ); ?></span>
        <button class="exgallery-lb-close" id="exLbClose" aria-label="Close">&#x2715;</button>
    </div>

    <!-- Prev / Next -->
    <button class="exgallery-lb-nav exgallery-lb-prev" id="exLbPrev" aria-label="Previous">&#8249;</button>
    <button class="exgallery-lb-nav exgallery-lb-next" id="exLbNext" aria-label="Next">&#8250;</button>

    <!-- Image -->
    <div class="exgallery-lb-img-wrap">
        <img src="" id="exLbImg" alt="Design">
    </div>

    <!-- Participant info bar -->
    <div class="exgallery-lb-info">
        <div class="exgallery-lb-participant">
            <img src="" id="exLbAvatar" class="exgallery-lb-avatar" alt="">
            <div class="exgallery-lb-text">
                <p class="exgallery-lb-name" id="exLbName"></p>
                <p class="exgallery-lb-role" id="exLbRole"></p>
            </div>
        </div>
        <a href="#" id="exLbProfileBtn" class="exgallery-lb-profile-btn" target="_blank" rel="noopener noreferrer">
            View Profile
            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        </a>
    </div>

</div>

<script>
(function () {
    var entries = <?php echo wp_json_encode( $gallery_entries ); ?>;
    var total   = entries.length;
    var current = 0;

    var lightbox   = document.getElementById('exgalleryLightbox');
    var lbImg      = document.getElementById('exLbImg');
    var lbAvatar   = document.getElementById('exLbAvatar');
    var lbName     = document.getElementById('exLbName');
    var lbRole     = document.getElementById('exLbRole');
    var lbProfile  = document.getElementById('exLbProfileBtn');
    var lbCounter  = document.getElementById('exLbCounter');
    var lbClose    = document.getElementById('exLbClose');
    var lbPrev     = document.getElementById('exLbPrev');
    var lbNext     = document.getElementById('exLbNext');

    // Touch swipe support
    var touchStartX = 0;

    function openAt(index) {
        current = (index + total) % total;
        var e = entries[current];
        lbImg.src          = e.img;
        lbName.textContent = e.name;
        lbRole.textContent = e.role || '';
        lbProfile.href     = e.profile_url;
        lbCounter.textContent = (current + 1) + ' / ' + total;

        if ( e.avatar ) {
            lbAvatar.src   = e.avatar;
            lbAvatar.style.display = 'block';
        } else {
            lbAvatar.style.display = 'none';
        }

        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function close() {
        lightbox.classList.remove('active');
        document.body.style.overflow = '';
        setTimeout(function () { lbImg.src = ''; }, 300);
    }

    // Open on grid item click
    document.querySelectorAll('.exgallery-item').forEach(function (item) {
        item.addEventListener('click', function () {
            openAt( parseInt( this.dataset.index, 10 ) );
        });
    });

    lbClose.addEventListener('click', close);
    lbPrev.addEventListener('click', function (e) { e.stopPropagation(); openAt(current - 1); });
    lbNext.addEventListener('click', function (e) { e.stopPropagation(); openAt(current + 1); });

    // Close on backdrop click
    lightbox.addEventListener('click', function (e) {
        if ( e.target === lightbox || e.target === document.querySelector('.exgallery-lb-img-wrap') ) close();
    });

    // Keyboard
    document.addEventListener('keydown', function (e) {
        if ( ! lightbox.classList.contains('active') ) return;
        if ( e.key === 'Escape' )     close();
        if ( e.key === 'ArrowLeft' )  openAt(current - 1);
        if ( e.key === 'ArrowRight' ) openAt(current + 1);
    });

    // Touch swipe
    lightbox.addEventListener('touchstart', function (e) {
        touchStartX = e.changedTouches[0].screenX;
    }, { passive: true });

    lightbox.addEventListener('touchend', function (e) {
        var diff = touchStartX - e.changedTouches[0].screenX;
        if ( Math.abs(diff) > 50 ) {
            diff > 0 ? openAt(current + 1) : openAt(current - 1);
        }
    }, { passive: true });
})();
</script>

<?php get_footer(); ?>

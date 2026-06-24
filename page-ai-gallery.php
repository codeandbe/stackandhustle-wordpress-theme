<?php
/**
 * Template Name: AI Exhibition Gallery
 *
 * Displays portfolio images from Posts in the 'ai-exhibition' category.
 * Uses lazy loading and a fullscreen lightbox with participant info.
 */

get_header();
 
$page_title = get_the_title();

// Query all posts in ai-exhibition category
$participants = new WP_Query( array(
    'post_type'      => 'post',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'title',
    'order'          => 'ASC',
    'category_name'  => 'ai-exhibition',
) );

// Build flat gallery entries list
$gallery_entries = array();
if ( $participants->have_posts() ) {
    while ( $participants->have_posts() ) {
        $participants->the_post();
        $pid           = get_the_ID();
        $portfolio_img = get_post_meta( $pid, '_ex_portfolio_image', true );
        $portfolio_vid = get_post_meta( $pid, '_ex_portfolio_video', true );

        // Convert YouTube URL to embed
        $youtube_embed = '';
        if ( $portfolio_vid ) {
            preg_match( '/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_\-]{11})/', $portfolio_vid, $yt );
            if ( ! empty( $yt[1] ) ) {
                $youtube_embed = 'https://www.youtube.com/embed/' . $yt[1] . '?rel=0&modestbranding=1';
            }
        }

        if ( ! $portfolio_img && ! $youtube_embed ) continue;

        $gallery_entries[] = array(
            'img'         => $portfolio_img,
            'video'       => $youtube_embed,
            'name'        => get_the_title(),
            'role'        => get_post_meta( $pid, '_ex_role', true ),
            'profile_url' => get_permalink(),
            'avatar'      => get_the_post_thumbnail_url( $pid, 'thumbnail' ),
        );
    }
    wp_reset_postdata();
}
?>

<style>
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
@media (max-width: 767px) { .exgallery-hero { padding-top: 100px; } }
.exgallery-hero h1 {
    font-size: 32px; font-weight: 800; color: #fff;
    margin: 0 0 8px; letter-spacing: -0.5px;
}
.exgallery-hero p { font-size: 14px; color: #666; margin: 0; }
.exgallery-hero span { color: #FF4A17; }

/* ── Masonry grid ── */
.exgallery-grid { columns: 3; column-gap: 6px; padding: 6px; }
@media (max-width: 767px) { .exgallery-grid { columns: 2; } }
@media (max-width: 400px) { .exgallery-grid { columns: 2; column-gap: 4px; padding: 4px; } }

/* ── Grid item ── */
.exgallery-item {
    break-inside: avoid; position: relative;
    margin-bottom: 6px; cursor: pointer;
    border-radius: 8px; overflow: hidden;
    background: #1a1a1a; display: block;
}
@media (max-width: 400px) { .exgallery-item { margin-bottom: 4px; border-radius: 6px; } }

.exgallery-item img { width: 100%; display: block; transition: transform 0.4s ease; }
.exgallery-item:hover img,
.exgallery-item:active img { transform: scale(1.04); }

/* ── Video item ── */
.exgallery-item-video {
    position: relative;
    width: 100%;
    aspect-ratio: 16 / 9;
    background: #000;
    pointer-events: none; /* clicks go to parent for lightbox */
}
.exgallery-item-video iframe {
    position: absolute; inset: 0;
    width: 100%; height: 100%;
    border: none; display: block;
}

/* ── Hover overlay ── */
.exgallery-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.75) 0%, transparent 50%);
    opacity: 0; transition: opacity 0.3s ease;
    display: flex; flex-direction: column;
    justify-content: flex-end; padding: 14px 12px;
}
.exgallery-item:hover .exgallery-overlay { opacity: 1; }
@media (hover: none) { .exgallery-overlay { opacity: 1; } }

.exgallery-overlay-name { font-size: 13px; font-weight: 700; color: #fff; line-height: 1.2; margin: 0 0 2px; }
.exgallery-overlay-role { font-size: 11px; color: #FF4A17; font-weight: 600; text-transform: uppercase; letter-spacing: 0.6px; margin: 0; }

/* ── Mobile avatar ── */
.exgallery-item-avatar { display: none; }
@media (hover: none) {
    .exgallery-item-avatar {
        display: block; position: absolute; top: 8px; left: 8px;
        width: 32px; height: 32px; border-radius: 50%; overflow: hidden;
        border: 2px solid rgba(255,255,255,0.7); background: #333; z-index: 2; text-decoration: none;
    }
    .exgallery-item-avatar img { width: 100%; height: 100%; object-fit: cover; display: block; transition: none; }
    .exgallery-item-avatar:hover img,
    .exgallery-item-avatar:active img { transform: none; }
    .exgallery-item-avatar-placeholder {
        display: flex; align-items: center; justify-content: center;
        width: 100%; height: 100%; background: #444; color: #fff;
        font-size: 13px; font-weight: 700; text-transform: uppercase;
    }
}

/* ── Lightbox ── */
.exgallery-lightbox {
    display: none; position: fixed; inset: 0; z-index: 99999;
    background: rgba(0,0,0,0.96); flex-direction: column;
    align-items: center; justify-content: center;
}
.exgallery-lightbox.active { display: flex; }

.exgallery-lb-img-wrap {
    flex: 1; display: flex; align-items: center; justify-content: center;
    width: 100%; padding: 60px 60px 0; box-sizing: border-box; min-height: 0;
}
@media (max-width: 480px) { .exgallery-lb-img-wrap { padding: 56px 12px 0; } }

.exgallery-lb-img-wrap img {
    max-width: 100%; max-height: 70vh; border-radius: 8px;
    object-fit: contain; animation: lb-in 0.22s ease; display: block;
}
@keyframes lb-in { from { opacity:0; transform:scale(0.95); } to { opacity:1; transform:scale(1); } }

.exgallery-lb-topbar {
    position: absolute; top: 0; left: 0; right: 0;
    display: flex; align-items: center; justify-content: space-between;
    padding: 12px 16px;
    background: linear-gradient(to bottom, rgba(0,0,0,0.6), transparent);
}
.exgallery-lb-counter { font-size: 12px; color: rgba(255,255,255,0.5); font-weight: 600; }
.exgallery-lb-close {
    width: 36px; height: 36px; border-radius: 50%;
    background: rgba(255,255,255,0.1); border: none; color: #fff;
    font-size: 18px; cursor: pointer; display: flex;
    align-items: center; justify-content: center; transition: background 0.2s; line-height: 1;
}
.exgallery-lb-close:hover { background: #FF4A17; }

.exgallery-lb-nav {
    position: absolute; top: 50%; transform: translateY(-50%);
    width: 44px; height: 44px; border-radius: 50%;
    background: rgba(255,255,255,0.1); border: none; color: #fff;
    font-size: 22px; cursor: pointer; display: flex;
    align-items: center; justify-content: center; transition: background 0.2s; z-index: 2;
}
.exgallery-lb-nav:hover { background: #FF4A17; }
.exgallery-lb-prev { left: 12px; }
.exgallery-lb-next { right: 12px; }
@media (max-width: 480px) {
    .exgallery-lb-nav { width: 36px; height: 36px; font-size: 18px; }
    .exgallery-lb-prev { left: 6px; }
    .exgallery-lb-next { right: 6px; }
}

.exgallery-lb-info {
    width: 100%; display: flex; align-items: center; justify-content: space-between;
    padding: 16px 20px; background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
    gap: 12px; box-sizing: border-box; flex-shrink: 0;
}
@media (max-width: 480px) { .exgallery-lb-info { padding: 12px 14px; } }

.exgallery-lb-participant { display: flex; align-items: center; gap: 10px; min-width: 0; }
.exgallery-lb-avatar {
    width: 40px; height: 40px; border-radius: 50%; object-fit: cover;
    border: 2px solid rgba(255,255,255,0.2); flex-shrink: 0; background: #333;
}
.exgallery-lb-avatar-placeholder { width: 40px; height: 40px; border-radius: 50%; background: #333; flex-shrink: 0; }
.exgallery-lb-text { min-width: 0; }
.exgallery-lb-name {
    font-size: 14px; font-weight: 700; color: #fff; margin: 0 0 2px;
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
}
.exgallery-lb-role {
    font-size: 11px; color: #FF4A17; font-weight: 600; text-transform: uppercase;
    letter-spacing: 0.6px; margin: 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
}
.exgallery-lb-profile-btn {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 9px 16px; border-radius: 50px; background: #FF4A17;
    color: #fff; font-size: 12px; font-weight: 700; text-decoration: none;
    white-space: nowrap; flex-shrink: 0; transition: background 0.2s, transform 0.15s;
}
.exgallery-lb-profile-btn:hover { background: #e03d10; color: #fff; text-decoration: none; transform: translateY(-1px); }

.exgallery-empty { text-align: center; padding: 100px 20px; color: #555; font-size: 15px; }
</style>

<div class="exgallery-page">

    <div class="exgallery-hero">
        <h1><?php echo esc_html( $page_title ); ?></h1>
        <p><?php echo count( $gallery_entries ); ?> <span>design<?php echo count( $gallery_entries ) !== 1 ? 's' : ''; ?></span></p>
    </div>

    <?php if ( ! empty( $gallery_entries ) ) : ?>
    <div class="exgallery-grid">
        <?php foreach ( $gallery_entries as $i => $entry ) : ?>
        <div class="exgallery-item" data-index="<?php echo $i; ?>">

            <?php if ( $entry['video'] ) : ?>
            <div class="exgallery-item-video">
                <iframe src="<?php echo esc_url( $entry['video'] ); ?>"
                        title="<?php echo esc_attr( $entry['name'] ); ?>"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                        loading="lazy"></iframe>
            </div>
            <?php else : ?>
            <img src="<?php echo esc_url( $entry['img'] ); ?>"
                 alt="<?php echo esc_attr( $entry['name'] ); ?>"
                 loading="lazy"
                 decoding="async">
            <?php endif; ?>

            <?php if ( $entry['avatar'] ) : ?>
            <a href="<?php echo esc_url( $entry['profile_url'] ); ?>"
               class="exgallery-item-avatar"
               aria-label="<?php echo esc_attr( $entry['name'] ); ?> profile"
               onclick="event.stopPropagation();">
                <img src="<?php echo esc_url( $entry['avatar'] ); ?>"
                     alt="<?php echo esc_attr( $entry['name'] ); ?>"
                     loading="lazy">
            </a>
            <?php else : ?>
            <a href="<?php echo esc_url( $entry['profile_url'] ); ?>"
               class="exgallery-item-avatar"
               aria-label="<?php echo esc_attr( $entry['name'] ); ?> profile"
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
        <p>No designs found yet. Check back soon.</p>
    </div>
    <?php endif; ?>

</div>

<!-- Lightbox -->
<div class="exgallery-lightbox" id="exgalleryLightbox" role="dialog" aria-modal="true" aria-label="Image viewer">
    <div class="exgallery-lb-topbar">
        <span class="exgallery-lb-counter" id="exLbCounter">1 / <?php echo count( $gallery_entries ); ?></span>
        <button class="exgallery-lb-close" id="exLbClose" aria-label="Close">&#x2715;</button>
    </div>
    <button class="exgallery-lb-nav exgallery-lb-prev" id="exLbPrev" aria-label="Previous">&#8249;</button>
    <button class="exgallery-lb-nav exgallery-lb-next" id="exLbNext" aria-label="Next">&#8250;</button>
    <div class="exgallery-lb-img-wrap">
        <img src="" id="exLbImg" alt="Design">
    </div>
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
    var touchStartX = 0;

    var lightbox  = document.getElementById('exgalleryLightbox');
    var lbImg     = document.getElementById('exLbImg');
    var lbAvatar  = document.getElementById('exLbAvatar');
    var lbName    = document.getElementById('exLbName');
    var lbRole    = document.getElementById('exLbRole');
    var lbProfile = document.getElementById('exLbProfileBtn');
    var lbCounter = document.getElementById('exLbCounter');
    var lbClose   = document.getElementById('exLbClose');
    var lbPrev    = document.getElementById('exLbPrev');
    var lbNext    = document.getElementById('exLbNext');

    function openAt(index) {
        current = (index + total) % total;
        var e = entries[current];
        lbName.textContent    = e.name;
        lbRole.textContent    = e.role || '';
        lbProfile.href        = e.profile_url;
        lbCounter.textContent = (current + 1) + ' / ' + total;

        if ( e.avatar ) {
            lbAvatar.src           = e.avatar;
            lbAvatar.style.display = 'block';
        } else {
            lbAvatar.style.display = 'none';
        }

        // Video entry — open profile page directly, no lightbox
        if ( e.video ) {
            window.open( e.profile_url, '_blank', 'noopener,noreferrer' );
            return;
        }

        lbImg.src = e.img;
        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeLb() {
        lightbox.classList.remove('active');
        document.body.style.overflow = '';
        setTimeout(function () { lbImg.src = ''; }, 300);
    }

    document.querySelectorAll('.exgallery-item').forEach(function (item) {
        item.addEventListener('click', function () {
            openAt( parseInt( this.dataset.index, 10 ) );
        });
    });

    lbClose.addEventListener('click', closeLb);
    lbPrev.addEventListener('click', function (e) { e.stopPropagation(); openAt(current - 1); });
    lbNext.addEventListener('click', function (e) { e.stopPropagation(); openAt(current + 1); });

    lightbox.addEventListener('click', function (e) {
        if ( e.target === lightbox || e.target === document.querySelector('.exgallery-lb-img-wrap') ) closeLb();
    });

    document.addEventListener('keydown', function (e) {
        if ( ! lightbox.classList.contains('active') ) return;
        if ( e.key === 'Escape' )     closeLb();
        if ( e.key === 'ArrowLeft' )  openAt(current - 1);
        if ( e.key === 'ArrowRight' ) openAt(current + 1);
    });

    lightbox.addEventListener('touchstart', function (e) {
        touchStartX = e.changedTouches[0].screenX;
    }, { passive: true });

    lightbox.addEventListener('touchend', function (e) {
        var diff = touchStartX - e.changedTouches[0].screenX;
        if ( Math.abs(diff) > 50 ) diff > 0 ? openAt(current + 1) : openAt(current - 1);
    }, { passive: true });
})();
</script>

<?php get_footer(); ?>

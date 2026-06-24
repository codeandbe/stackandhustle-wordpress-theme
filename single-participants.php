<?php
/**
 * Template for displaying a single Exhibition Participant — linktree-style layout.
 */
get_header();

?>
<!-- Edit post on single Exhibition Participant page -->
<?php edit_post_link(); ?>

<style>
/* ── Hide the page-title breadcrumb on this template — linktree is full-bleed ── */
.wpo-page-title { display: none !important; }

/* ── Theme Variables — light default ── */
.participant-linktree {
    --bg:           #f2f2f2;
    --card-bg:      #ffffff;
    --card-border:  #e8e8e8;
    --card-shadow:  0 1px 3px rgba(0,0,0,0.06);
    --icon-bg:      #f5f5f5;
    --icon-border:  #e0e0e0;
    --icon-color:   #444;
    --text-primary: #111111;
    --text-muted:   #666;
    --text-link:    #aaa;
    --divider:      #e4e4e4;
}

.participant-linktree.dark-mode {
    --bg:           #0a0a0a;
    --card-bg:      #141414;
    --card-border:  #222;
    --card-shadow:  0 1px 4px rgba(0,0,0,0.5);
    --icon-bg:      #1e1e1e;
    --icon-border:  #2a2a2a;
    --icon-color:   #bbb;
    --text-primary: #f0f0f0;
    --text-muted:   #888;
    --text-link:    #555;
    --divider:      #1e1e1e;
}

/* ── Page Wrapper ── */
.participant-linktree {
    background: var(--bg);
    min-height: 100vh;
    padding: 120px 16px 80px;
    display: flex;
    justify-content: center;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    transition: background 0.3s ease;
    position: relative;
}

.participant-inner {
    width: 100%;
    max-width: 460px;
}

/* ── Theme Toggle ── */
.theme-toggle {
    position: absolute;
    top: 14px;
    right: 16px;
    display: flex;
    align-items: center;
    gap: 6px;
    cursor: pointer;
    user-select: none;
    z-index: 10;
}

.theme-toggle .toggle-label {
    font-size: 10px;
    font-weight: 700;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 0.6px;
    transition: color 0.3s;
}

.theme-toggle .switch {
    position: relative;
    width: 38px;
    height: 20px;
    flex-shrink: 0;
}

.theme-toggle .switch input {
    opacity: 0;
    width: 0;
    height: 0;
    position: absolute;
}

.theme-toggle .slider {
    position: absolute;
    inset: 0;
    background: #ccc;
    border-radius: 50px;
    transition: background 0.3s;
    cursor: pointer;
}

.theme-toggle .slider::before {
    content: '';
    position: absolute;
    width: 14px;
    height: 14px;
    left: 3px;
    top: 50%;
    transform: translateY(-50%);
    background: #fff;
    border-radius: 50%;
    transition: transform 0.3s ease;
    box-shadow: 0 1px 3px rgba(0,0,0,0.25);
}

.theme-toggle .switch input:checked + .slider { background: #FF4A17; }
.theme-toggle .switch input:checked + .slider::before { transform: translateY(-50%) translateX(18px); }

/* ── Profile ── */
.participant-profile {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 20px 0 18px;
}

.participant-profile .profile-img,
.participant-profile .profile-img-placeholder {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid var(--card-bg);
    box-shadow: 0 2px 10px rgba(0,0,0,0.12);
    background: var(--icon-bg);
    margin-bottom: 12px;
    display: block;
}

.participant-profile h2 {
    font-size: 18px;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 3px;
    transition: color 0.3s;
    line-height: 1.3;
}

.participant-profile .profile-role {
    font-size: 11px;
    color: #FF4A17;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin: 0 0 10px;
}

/* ── Bio expand/collapse ── */
.profile-bio-wrap {
    width: 100%;
    max-width: 340px;
    text-align: center;
}

.profile-bio {
    font-size: 13px;
    color: var(--text-muted);
    line-height: 1.6;
    margin: 0;
    transition: color 0.3s;
}

.profile-bio-full {
    font-size: 13px;
    color: var(--text-muted);
    line-height: 1.6;
    margin: 8px 0 0;
    overflow: hidden;
    max-height: 0;
    transition: max-height 0.4s ease, opacity 0.3s ease, color 0.3s;
    opacity: 0;
    text-align: left;
}

.profile-bio-full.expanded {
    max-height: 600px;
    opacity: 1;
}

.profile-bio-toggle {
    display: inline-block;
    margin-top: 6px;
    font-size: 11px;
    font-weight: 700;
    color: #FF4A17;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    cursor: pointer;
    background: none;
    border: none;
    padding: 0;
    transition: opacity 0.2s;
}
.profile-bio-toggle:hover { opacity: 0.75; }

/* ── Social Icon Row ── */
.participant-social-row {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-bottom: 22px;
    flex-wrap: wrap;
}

.participant-social-row a {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: var(--card-bg);
    border: 1px solid var(--card-border);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-primary);
    font-size: 15px;
    text-decoration: none;
    box-shadow: var(--card-shadow);
    transition: background 0.2s, color 0.2s, border-color 0.2s, transform 0.15s;
}

.participant-social-row a:hover {
    background: #FF4A17;
    border-color: #FF4A17;
    color: #fff;
    transform: translateY(-2px);
}

/* ── Section Label ── */
.participant-section-label {
    font-size: 11px;
    font-weight: 700;
    color: var(--text-muted);
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin: 0 0 8px;
    transition: color 0.3s;
}

/* ── Portfolio Header ── */
.participant-portfolio-header {
    text-align: center;
    margin-bottom: 10px;
}

.portfolio-exhibition-tag {
    display: inline-block;
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.2px;
    color: #fff;
    background: #FF4A17;
    border: 1px solid #FF4A17;
    border-radius: 20px;
    padding: 3px 12px;
    margin-bottom: 6px;
}

.portfolio-design-title {
    font-size: 15px;
    font-weight: 600;
    color: var(--text-primary);
    margin: 0;
    line-height: 1.4;
    letter-spacing: -0.2px;
    transition: color 0.3s;
    text-align: center;
}

/* ── Portfolio Image ── */
.participant-portfolio {
    width: 100%;
    border-radius: 14px;
    overflow: hidden;
    margin-bottom: 10px;
    background: var(--icon-bg);
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    position: relative;
}

.participant-portfolio img {
    width: 100%;
    display: block;
    aspect-ratio: 4 / 3;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.participant-portfolio:hover img { transform: scale(1.02); }

.portfolio-zoom-trigger {
    display: block;
    position: relative;
    text-decoration: none;
}

.portfolio-zoom-icon {
    position: absolute;
    top: 10px;
    right: 10px;
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background: rgba(0,0,0,0.45);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.2s ease;
    backdrop-filter: blur(4px);
}

.portfolio-zoom-trigger:hover .portfolio-zoom-icon { opacity: 1; }

.portfolio-design-title {
    font-size: 13px;
    font-weight: 600;
    color: var(--text-muted);
    text-align: center;
    margin: 0 0 18px;
    letter-spacing: 0.1px;
    line-height: 1.4;
    transition: color 0.3s;
}

/* ── Lightbox ── */
.portfolio-lightbox {
    display: none;
    position: fixed;
    inset: 0;
    z-index: 99999;
    background: rgba(0,0,0,0.92);
    align-items: center;
    justify-content: center;
    padding: 20px;
    cursor: zoom-out;
}

.portfolio-lightbox.active { display: flex; }

.portfolio-lightbox img {
    max-width: 100%;
    max-height: 90vh;
    border-radius: 8px;
    box-shadow: 0 8px 40px rgba(0,0,0,0.6);
    object-fit: contain;
    cursor: default;
    animation: lb-in 0.2s ease;
}

.portfolio-lightbox-close {
    position: absolute;
    top: 16px;
    right: 16px;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: rgba(255,255,255,0.12);
    border: none;
    color: #fff;
    font-size: 20px;
    line-height: 1;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.2s;
}

.portfolio-lightbox-close:hover { background: #FF4A17; }

@keyframes lb-in {
    from { opacity: 0; transform: scale(0.94); }
    to   { opacity: 1; transform: scale(1); }
}

.participant-portfolio img {
    width: 100%;
    display: block;
    aspect-ratio: 4 / 3;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.participant-portfolio:hover img { transform: scale(1.02); }

/* ── Link Buttons ── */
.participant-links {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.participant-link-btn {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 13px 14px;
    border-radius: 14px;
    background: var(--card-bg);
    border: 1px solid var(--card-border);
    box-shadow: var(--card-shadow);
    color: var(--text-primary);
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    transition: box-shadow 0.2s, transform 0.15s, background 0.3s, border-color 0.3s, color 0.3s;
}

.participant-link-btn:hover {
    box-shadow: 0 4px 18px rgba(0,0,0,0.1);
    transform: translateY(-1px);
    color: var(--text-primary);
    text-decoration: none;
}

.participant-link-btn .btn-left {
    display: flex;
    align-items: center;
    gap: 12px;
}

.participant-link-btn .link-icon-wrap {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    background: var(--icon-bg);
    border: 1px solid var(--icon-border);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 15px;
    color: var(--icon-color);
    flex-shrink: 0;
    transition: background 0.2s, color 0.2s, border-color 0.2s;
}

.participant-link-btn:hover .link-icon-wrap {
    background: #FF4A17;
    border-color: #FF4A17;
    color: #fff;
}

.participant-link-btn .btn-dots {
    display: flex;
    flex-direction: column;
    gap: 3px;
    padding: 4px;
    opacity: 0.2;
}

.participant-link-btn .btn-dots span {
    width: 3px;
    height: 3px;
    border-radius: 50%;
    background: var(--text-primary);
    display: block;
}

/* ── Back Link ── */
.participant-back {
    text-align: center;
    margin-top: 28px;
    padding-top: 18px;
    border-top: 1px solid var(--divider);
}

.participant-back a {
    font-size: 12px;
    color: var(--text-link);
    text-decoration: none;
    transition: color 0.2s;
}

.participant-back a:hover { color: #FF4A17; }

/* ── Vote Now Button ── */
.participant-link-btn.vote-btn {
    background: #FF4A17;
    border-color: #FF4A17;
    color: #fff;
    font-weight: 700;
}

.participant-link-btn.vote-btn .link-icon-wrap {
    background: rgba(255,255,255,0.2);
    border-color: rgba(255,255,255,0.3);
    color: #fff;
}

.participant-link-btn.vote-btn:hover {
    background: #e03d10;
    border-color: #e03d10;
    color: #fff;
}

.participant-link-btn.vote-btn:hover .link-icon-wrap {
    background: rgba(255,255,255,0.3);
    border-color: rgba(255,255,255,0.4);
    color: #fff;
}

.participant-link-btn.vote-btn .btn-dots span {
    background: rgba(255,255,255,0.6);
}

/* ── Mobile ── */
@media ( max-width: 480px ) {
    .participant-linktree { padding: 72px 14px 64px; }
    .theme-toggle { top: 12px; right: 14px; }
    .participant-profile { padding: 16px 0 14px; }
    .participant-profile h2 { font-size: 17px; }
    .participant-profile .profile-bio { font-size: 13px; }
    .participant-link-btn { padding: 12px 13px; border-radius: 12px; }
    .participant-portfolio { border-radius: 12px; }
}
</style>

<?php while ( have_posts() ) : the_post();
    $post_id       = get_the_ID();
    $portfolio_img = get_post_meta( $post_id, '_team_portfolio_image', true );
    $excerpt       = get_the_excerpt();
    $role          = get_post_meta( $post_id, '_team_role', true );
    $design_title      = get_post_meta( $post_id, '_team_design_title', true );
    $exhibition_topic  = get_post_meta( $post_id, '_team_exhibition_topic', true );
    $exhibitions   = get_the_terms( $post_id, 'exhibition_event' );
    $exhibition    = ( $exhibitions && ! is_wp_error( $exhibitions ) ) ? $exhibitions[0] : null;

    // Social icon row — quick-tap circular icons under role
    $social_row = array(
        array( 'url' => get_post_meta( $post_id, '_team_website',   true ), 'icon' => 'ti-world' ),
        array( 'url' => get_post_meta( $post_id, '_team_facebook',  true ), 'icon' => 'ti-facebook' ),
        array( 'url' => get_post_meta( $post_id, '_team_linkedin',  true ), 'icon' => 'ti-linkedin' ),
        array( 'url' => get_post_meta( $post_id, '_team_instagram', true ), 'icon' => 'ti-instagram' ),
        array( 'url' => get_post_meta( $post_id, '_team_twitter',   true ), 'icon' => 'ti-twitter-alt' ),
        array( 'url' => get_post_meta( $post_id, '_team_email',     true ), 'icon' => 'ti-email', 'mailto' => true ),
        array( 'url' => get_post_meta( $post_id, '_team_whatsapp',  true ), 'icon' => 'whatsapp',  'whatsapp' => true ),
    );

    // Link buttons — Vote Now + Contact Me only
    $vote_url = get_post_meta( $post_id, '_team_vote_url', true );    $links = array(
        'vote' => array( 'url' => $vote_url ? $vote_url : 'https://forms.zohopublic.com/ifmedia/form/DigitalExhibitionVotingForm/formperma/MkpDFbIJ_O0D0rMTcpvNFUmvHYr3hoJ8V5ZfXTNmujU', 'label' => 'Vote Now', 'icon' => 'svg-vote' ),
        'call' => array( 'url' => get_post_meta( $post_id, '_team_whatsapp', true ), 'label' => 'Contact Me', 'icon' => 'svg-phone', 'tel' => true ),
    );
?>

<!-- Linktree Content -->
<div class="participant-linktree" id="participantLinktree">

    <!-- Toggle switch -->
    <label class="theme-toggle" aria-label="Toggle colour mode">
        <span class="toggle-label" id="toggleLabel">Dark</span>
        <span class="switch">
            <input type="checkbox" id="themeCheckbox">
            <span class="slider"></span>
        </span>
    </label>

    <div class="participant-inner">

        <!-- Profile -->
        <div class="participant-profile">
            <?php if ( has_post_thumbnail() ) : ?>
                <img src="<?php echo esc_url( get_the_post_thumbnail_url( $post_id, 'medium' ) ); ?>"
                     alt="<?php the_title_attribute(); ?>" class="profile-img">
            <?php else : ?>
                <div class="profile-img-placeholder"></div>
            <?php endif; ?>

            <h2><?php the_title(); ?></h2>

            <?php if ( $role ) : ?>
                <p class="profile-role"><?php echo esc_html( $role ); ?></p>
            <?php endif; ?>

            <!-- Social icon row — under role -->
            <?php $has_social = array_filter( array_column( $social_row, 'url' ) );
            if ( $has_social ) : ?>
            <div class="participant-social-row">
                <?php foreach ( $social_row as $s ) :
                    if ( empty( $s['url'] ) ) continue;
                    if ( ! empty( $s['mailto'] ) ) {
                        $surl = 'mailto:' . antispambot( $s['url'] );
                    } elseif ( ! empty( $s['whatsapp'] ) ) {
                        $surl = 'https://wa.me/' . preg_replace( '/[^0-9]/', '', $s['url'] );
                    } else {
                        $surl = esc_url( $s['url'] );
                    }
                ?>
                <a href="<?php echo $surl; ?>" target="_blank" rel="noopener noreferrer">
                    <?php if ( $s['icon'] === 'whatsapp' ) : ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    <?php else : ?>
                        <i class="<?php echo esc_attr( $s['icon'] ); ?>"></i>
                    <?php endif; ?>
                </a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <?php if ( $excerpt ) : ?>
                <div class="profile-bio-wrap">
                    <p class="profile-bio"><?php echo esc_html( $excerpt ); ?></p>
                    <?php
                    $full_content = get_the_content();
                    if ( $full_content ) :
                        // Strip shortcodes and tags for clean plain text
                        $full_text = wp_strip_all_tags( $full_content );
                    ?>
                    <div class="profile-bio-full" id="profileBioFull"><?php echo nl2br( esc_html( $full_text ) ); ?></div>
                    <button class="profile-bio-toggle" id="profileBioToggle" aria-expanded="false">Read more ↓</button>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Portfolio image -->
        <?php if ( $portfolio_img ) : ?>
        <div class="participant-portfolio-header">
            <?php if ( $exhibition_topic ) : ?>
                <span class="portfolio-exhibition-tag"><?php echo esc_html( $exhibition_topic ); ?></span>
            <?php elseif ( $exhibition ) : ?>
                <span class="portfolio-exhibition-tag"><?php echo esc_html( $exhibition->name ); ?></span>
            <?php endif; ?>
        </div>
        <div class="participant-portfolio">
            <a href="<?php echo esc_url( $portfolio_img ); ?>" class="portfolio-zoom-trigger" aria-label="View full image">
                <img src="<?php echo esc_url( $portfolio_img ); ?>"
                     alt="<?php the_title_attribute(); ?> — portfolio">
                <span class="portfolio-zoom-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
                </span>
            </a>
        </div>
        <?php if ( $design_title ) : ?>
        <p class="portfolio-design-title"><?php echo esc_html( $design_title ); ?></p>
        <?php endif; ?>
        <?php endif; ?>

        <!-- Link buttons -->
        <div class="participant-links">
            <?php foreach ( $links as $key => $link ) :
                if ( empty( $link['url'] ) ) continue;
                if ( ! empty( $link['mailto'] ) ) {
                    $href = 'mailto:' . antispambot( $link['url'] );
                } elseif ( ! empty( $link['whatsapp'] ) ) {
                    $href = 'https://wa.me/' . preg_replace( '/[^0-9]/', '', $link['url'] );
                } elseif ( ! empty( $link['tel'] ) ) {
                    $href = 'tel:' . preg_replace( '/[^0-9+]/', '', $link['url'] );
                } else {
                    $href = esc_url( $link['url'] );
                }
            ?>
            <a href="<?php echo $href; ?>" class="participant-link-btn<?php echo $key === 'vote' ? ' vote-btn' : ''; ?>" target="_blank" rel="noopener noreferrer">
                <span class="btn-left">
                    <span class="link-icon-wrap">
                    <?php if ( $link['icon'] === 'svg-phone' ) : ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24c1.12.37 2.33.57 3.58.57a1 1 0 011 1V20a1 1 0 01-1 1C10.61 21 3 13.39 3 4a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.46.57 3.58a1 1 0 01-.25 1.01l-2.2 2.2z"/></svg>
                    <?php elseif ( $link['icon'] === 'svg-vote' ) : ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V4a2 2 0 00-2-2zm-6 15l-4-4 1.41-1.41L12 14.17l6.59-6.59L20 9l-8 8z"/></svg>
                    <?php else : ?>
                        <i class="<?php echo esc_attr( $link['icon'] ); ?>"></i>
                    <?php endif; ?>
                </span>
                    <?php echo esc_html( $link['label'] ); ?>
                </span>
                <span class="btn-dots"><span></span><span></span><span></span></span>
            </a>
            <?php endforeach; ?>
        </div>

        <!-- View more designs -->
        <div class="participant-back" style="border-top: none; margin-top: 10px; padding-top: 0;">
            <a href="/exhibition-gallery/" class="participant-link-btn" style="justify-content:center; font-weight:600;">
                <span class="btn-left">
                    <span class="link-icon-wrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M21 3H3a2 2 0 00-2 2v14a2 2 0 002 2h18a2 2 0 002-2V5a2 2 0 00-2-2zM5 17l3.5-4.5 2.5 3.01L14.5 11l4.5 6H5z"/></svg>
                    </span>
                    Exhibition Gallery
                </span>
                <span class="btn-dots"><span></span><span></span><span></span></span>
            </a>
        </div>

        <!-- Back to exhibition -->
        <?php if ( $exhibition ) :
            $back_url = get_term_link( $exhibition );
            if ( ! is_wp_error( $back_url ) ) : ?>
        <div class="participant-back">
            <a href="<?php echo esc_url( $back_url ); ?>">← Back to <?php echo esc_html( $exhibition->name ); ?></a>
        </div>
        <?php endif; endif; ?>

    </div><!-- .participant-inner -->
</div><!-- .participant-linktree -->

<!-- Lightbox -->
<div class="portfolio-lightbox" id="portfolioLightbox">
    <button class="portfolio-lightbox-close" id="lightboxClose" aria-label="Close">&#x2715;</button>
    <img src="" id="lightboxImg" alt="Portfolio full view">
</div>

<script>
(function () {
    /* ── Bio toggle ── */
    var bioFull   = document.getElementById('profileBioFull');
    var bioToggle = document.getElementById('profileBioToggle');

    if ( bioToggle && bioFull ) {
        bioToggle.addEventListener('click', function () {
            var expanded = bioFull.classList.toggle('expanded');
            bioToggle.textContent  = expanded ? 'Read less ↑' : 'Read more ↓';
            bioToggle.setAttribute('aria-expanded', expanded);
        });
    }

    /* ── Theme toggle ── */
    var wrap       = document.getElementById('participantLinktree');
    var checkbox   = document.getElementById('themeCheckbox');
    var label      = document.getElementById('toggleLabel');
    var storageKey = 'participant_theme';

    function setDark() {
        wrap.classList.add('dark-mode');
        checkbox.checked  = true;
        label.textContent = 'Light';
        localStorage.setItem(storageKey, 'dark');
    }

    function setLight() {
        wrap.classList.remove('dark-mode');
        checkbox.checked  = false;
        label.textContent = 'Dark';
        localStorage.setItem(storageKey, 'light');
    }

    localStorage.getItem(storageKey) === 'dark' ? setDark() : setLight();
    checkbox.addEventListener('change', function () { this.checked ? setDark() : setLight(); });

    /* ── Lightbox ── */
    var lightbox   = document.getElementById('portfolioLightbox');
    var lightboxImg = document.getElementById('lightboxImg');
    var closeBtn   = document.getElementById('lightboxClose');

    document.querySelectorAll('.portfolio-zoom-trigger').forEach(function (trigger) {
        trigger.addEventListener('click', function (e) {
            e.preventDefault();
            lightboxImg.src = this.getAttribute('href');
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    });

    function closeLightbox() {
        lightbox.classList.remove('active');
        document.body.style.overflow = '';
        lightboxImg.src = '';
    }

    closeBtn.addEventListener('click', closeLightbox);
    lightbox.addEventListener('click', function (e) { if (e.target === lightbox) closeLightbox(); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeLightbox(); });
})();
</script>

<?php endwhile; ?>
<?php get_footer(); ?>

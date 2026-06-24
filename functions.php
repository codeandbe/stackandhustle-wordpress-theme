<?php
/**
 * Theme Setup
 */
function mytheme_setup() {

    /**
     * Make theme available for translation
     */
    load_theme_textdomain( 'suqat', get_template_directory() . '/languages' );

    /**
     * Add default posts and comments RSS feed links to head
     */
    add_theme_support( 'automatic-feed-links' );

    /**
     * Let WordPress manage the document title
     */
    // add_theme_support( 'title-tag' );

    /**
     * Enable support for Post Thumbnails (Featured Images)
     */
    add_theme_support( 'post-thumbnails' );

    /**
     * Enable support for custom logo
     */
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    /**
     * Enable support for custom header
     */
    add_theme_support( 'custom-header', array(
        'width'       => 1200,
        'height'      => 280,
        'flex-width'  => true,
        'flex-height' => true,
        'uploads'     => true,
    ) );

    /**
     * Enable support for custom background
     */
    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) );

    /**
     * Switch default core markup to output valid HTML5
     */
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
        'navigation-widgets',
    ) );

    /**
     * Support for Post Formats
     */
    add_theme_support( 'post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'status',
        'audio',
        'chat'
    ) );

    /**
     * WooCommerce Support
     */
    add_theme_support( 'woocommerce' );

    /**
     * Add support for wide and full align images in block editor
     */
    add_theme_support( 'align-wide' );

    /**
     * Enable editor styles + load a custom editor stylesheet
     */
    add_theme_support( 'editor-styles' );
    add_editor_style( 'editor-style.css' );

    /**
     * Enable default block styles
     */
    add_theme_support( 'wp-block-styles' );

    /**
     * Enable responsive embeds (videos, iframes scale correctly)
     */
    add_theme_support( 'responsive-embeds' );

    /**
     * Enable dark mode editor styles (optional)
     */
    add_theme_support( 'dark-editor-style' );

    /**
     * Allow selective refresh for widgets in Customizer
     */
    add_theme_support( 'customize-selective-refresh-widgets' );

    /**
     * Add custom color palette for block editor
     */
    add_theme_support( 'editor-color-palette', array(
        array(
            'name'  => __( 'Primary', 'mytheme' ),
            'slug'  => 'primary',
            'color' => '#0073aa',
        ),
        array(
            'name'  => __( 'Secondary', 'mytheme' ),
            'slug'  => 'secondary',
            'color' => '#005177',
        ),
        array(
            'name'  => __( 'Light Gray', 'mytheme' ),
            'slug'  => 'light-gray',
            'color' => '#f5f5f5',
        ),
        array(
            'name'  => __( 'Dark Gray', 'mytheme' ),
            'slug'  => 'dark-gray',
            'color' => '#111111',
        ),
    ) );

    /**
     * Add editor font sizes
     */
    add_theme_support( 'editor-font-sizes', array(
        array(
            'name' => __( 'Small', 'mytheme' ),
            'size' => 12,
            'slug' => 'small'
        ),
        array(
            'name' => __( 'Normal', 'mytheme' ),
            'size' => 16,
            'slug' => 'normal'
        ),
        array(
            'name' => __( 'Large', 'mytheme' ),
            'size' => 36,
            'slug' => 'large'
        ),
        array(
            'name' => __( 'Huge', 'mytheme' ),
            'size' => 48,
            'slug' => 'huge'
        )
    ) );

}
add_action( 'after_setup_theme', 'mytheme_setup' );





/**
 * Register navigation menus
 */
function mytheme_menus() {
    register_nav_menus( array(
        'primary'   => __( 'Primary Menu', 'mytheme' ),
        'footer'    => __( 'Footer Menu', 'mytheme' ),
    ) );
}
add_action( 'init', 'mytheme_menus' );




function my_theme_lightbox_assets() {
    // Lightbox2 CSS
    wp_enqueue_style(
        'lightbox2-css',
        'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css'
    );

    // Lightbox2 JS
    wp_enqueue_script(
        'lightbox2-js',
        'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js',
        array('jquery'), // depends on jQuery
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'my_theme_lightbox_assets');

function remove_jquery_migrate_notice( $scripts ) {
    if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
        $scripts->registered['jquery']->deps = array(); // remove migrate dependency
    }
}
add_action( 'wp_default_scripts', 'remove_jquery_migrate_notice' );

add_filter('big_image_size_threshold', '__return_false');


add_filter('wp_image_editors', function($editors) {
    return ['WP_Image_Editor_GD', 'WP_Image_Editor_Imagick'];
});

/**
 * Replace "Rejected" with "In Progress" across BookingPress UI and emails.
 */
add_filter('gettext', function($translated_text, $text, $domain) {
    if ($domain === 'bookingpress-appointment-booking') {
        // Replace simple status
        if ($text === 'Rejected') {
            return 'In Progress';
        }

        // Replace in combined labels (e.g., "Rejected Booking")
        if ($text === 'Rejected Booking') {
            return 'In-Progress Booking';
        }
    }

    return $translated_text;
}, 10, 3);

//Yakubu Code
/**
 * Adds customizer settings for the About Us page.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function stackandhustle_about_us_customizer( $wp_customize ) {
    // Add a section for "About Us" page settings.
    $wp_customize->add_section( 'about_us_section', array(
        'title'    => __( 'About Us Settings', 'stackandhustle' ),
        'priority' => 30,
    ) );

    // Main Title.
    $wp_customize->add_setting( 'about_us_main_title', array(
        'default'   => 'About Us',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'about_us_main_title_control', array(
        'label'    => __( 'Main Title', 'stackandhustle' ),
        'section'  => 'about_us_section',
        'settings' => 'about_us_main_title',
        'type'     => 'text',
    ) );

    // Main Subtitle.
    $wp_customize->add_setting( 'about_us_main_subtitle', array(
        'default'   => 'Modern Facilities of the Property.',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'about_us_main_subtitle_control', array(
        'label'    => __( 'Main Subtitle', 'stackandhustle' ),
        'section'  => 'about_us_section',
        'settings' => 'about_us_main_subtitle',
        'type'     => 'text',
    ) );

    // Description.
    $wp_customize->add_setting( 'about_us_description', array(
        'default'   => 'Stack & Hustle is a modern coworking space built for tech and business professionals. We combine reliable infrastructure with friendly hospitality, so teams can focus, ship, and grow.',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'about_us_description_control', array(
        'label'    => __( 'Description', 'stackandhustle' ),
        'section'  => 'about_us_section',
        'settings' => 'about_us_description',
        'type'     => 'textarea',
    ) );

      // About Us Image
     $wp_customize->add_setting( 'about_us_image', array(
    'default'   => get_template_directory_uri() . '/assets/images/about.jpg',
    'transport' => 'refresh',
    'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'about_us_image_control', array(
    'label'    => __( 'About Us Image', 'stackandhustle' ),
    'section'  => 'about_us_section',
    'settings' => 'about_us_image',
    ) ) );

    // Mission Title.
    $wp_customize->add_setting( 'about_us_mission_title', array(
        'default'   => 'Mission',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'about_us_mission_title_control', array(
        'label'    => __( 'Mission Title', 'stackandhustle' ),
        'section'  => 'about_us_section',
        'settings' => 'about_us_mission_title',
        'type'     => 'text',
    ) );

    // Mission Text.
    $wp_customize->add_setting( 'about_us_mission_text', array(
        'default'   => '“Quam viverra orci sagittis eu. Lorem ipsum dolor sit amet consectetur adipiscing elit. Adipiscing elit pellentesque habitant morbi tristique senectus et netus amet consectetur adipiscing suspendisse.”',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'about_us_mission_text_control', array(
        'label'    => __( 'Mission Text', 'stackandhustle' ),
        'section'  => 'about_us_section',
        'settings' => 'about_us_mission_text',
        'type'     => 'textarea',
    ) );

    // Vision Title.
    $wp_customize->add_setting( 'about_us_vision_title', array(
        'default'   => 'Vision',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'about_us_vision_title_control', array(
        'label'    => __( 'Vision Title', 'stackandhustle' ),
        'section'  => 'about_us_section',
        'settings' => 'about_us_vision_title',
        'type'     => 'text',
    ) );

    // Vision Text.
    $wp_customize->add_setting( 'about_us_vision_text', array(
        'default'   => '“Quam viverra orci sagittis eu. Lorem ipsum dolor sit amet consectetur adipiscing elit. Adipiscing elit pellentesque habitant morbi tristique senectus et netus amet consectetur adipiscing suspendisse.”',
        'transport' => 'refresh',
    ) );
    
    $wp_customize->add_control( 'about_us_vision_text_control', array(
        'label'    => __( 'Vision Text', 'stackandhustle' ),
        'section'  => 'about_us_section',
        'settings' => 'about_us_vision_text',
        'type'     => 'textarea',
    ) );
}
add_action( 'customize_register', 'stackandhustle_about_us_customizer' );


/**
 * Register Team Custom Post Type.
 */
function stackandhustle_register_team_cpt() {
    $labels = array(
        'name'                  => _x( 'Team Members', 'Post Type General Name', 'stackandhustle' ),
        'singular_name'         => _x( 'Team Member', 'Post Type Singular Name', 'stackandhustle' ),
        'menu_name'             => __( 'Team', 'stackandhustle' ),
        'add_new_item'          => __( 'Add New Team Member', 'stackandhustle' ),
        'edit_item'             => __( 'Edit Team Member', 'stackandhustle' ),
        'featured_image'        => __( 'Member Image', 'stackandhustle' ),
        'set_featured_image'    => __( 'Set member image', 'stackandhustle' ),
        'remove_featured_image' => __( 'Remove member image', 'stackandhustle' ),
        'use_featured_image'    => __( 'Use as member image', 'stackandhustle' ),
    );
    $args = array(
        'label'                 => __( 'Team Member', 'stackandhustle' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ), // Name, Bio, Image, Order
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-groups',
        'has_archive'           => true,
    );
    register_post_type( 'team', $args );
}
add_action( 'init', 'stackandhustle_register_team_cpt', 0 );

/**
 * Adds a meta box for Team Member details.
 */
function stackandhustle_add_team_meta_boxes() {
    add_meta_box(
        'stackandhustle_team_details',
        __( 'Team Member Details', 'stackandhustle' ),
        'stackandhustle_team_meta_box_html',
        'team'
    );
}
add_action( 'add_meta_boxes_team', 'stackandhustle_add_team_meta_boxes' );

/**
 * Renders the HTML for the Team Member details meta box.
 */
function stackandhustle_team_meta_box_html( $post ) {
    wp_nonce_field( 'stackandhustle_save_team_data', 'stackandhustle_team_nonce' );

    // Portfolio image
    $portfolio_image = get_post_meta( $post->ID, '_team_portfolio_image', true );
    echo '<p><label for="team_portfolio_image"><strong>' . __( 'Portfolio Image', 'stackandhustle' ) . '</strong></label><br>';
    echo '<input type="url" id="team_portfolio_image" name="team_portfolio_image" value="' . esc_attr( $portfolio_image ) . '" class="widefat" style="margin-bottom:5px;">';
    echo '<button type="button" class="button" onclick="teamMediaUpload(\'team_portfolio_image\')">' . __( 'Upload Image', 'stackandhustle' ) . '</button></p>';

    $team_fields = [
        'team_role'         => [ 'label' => __( 'Role / Position', 'stackandhustle' ),    'type' => 'text' ],
        'team_design_title' => [ 'label' => __( 'Design Title', 'stackandhustle' ),       'type' => 'text' ],
        'team_exhibition_topic' => [ 'label' => __( 'Exhibition Topic / Theme', 'stackandhustle' ), 'type' => 'text' ],
        'team_vote_url'     => [ 'label' => __( 'Vote Now URL', 'stackandhustle' ),       'type' => 'url' ],
        'team_instagram' => [ 'label' => __( 'Instagram URL', 'stackandhustle' ),    'type' => 'url' ],
        'team_twitter'   => [ 'label' => __( 'Twitter / X URL', 'stackandhustle' ),  'type' => 'url' ],
        'team_linkedin'  => [ 'label' => __( 'LinkedIn URL', 'stackandhustle' ),     'type' => 'url' ],
        'team_facebook'  => [ 'label' => __( 'Facebook URL', 'stackandhustle' ),     'type' => 'url' ],
        'team_behance'   => [ 'label' => __( 'Behance URL', 'stackandhustle' ),      'type' => 'url' ],
        'team_dribbble'  => [ 'label' => __( 'Dribbble URL', 'stackandhustle' ),     'type' => 'url' ],
        'team_pinterest' => [ 'label' => __( 'Pinterest URL', 'stackandhustle' ),    'type' => 'url' ],
        'team_website'   => [ 'label' => __( 'Personal Website', 'stackandhustle' ), 'type' => 'url' ],
        'team_email'     => [ 'label' => __( 'Email Address', 'stackandhustle' ),    'type' => 'email' ],
        'team_whatsapp'  => [ 'label' => __( 'WhatsApp Number', 'stackandhustle' ),  'type' => 'text' ],
    ];

    echo '<script>
    function teamMediaUpload(fieldId) {
        var frame = wp.media({ title: "Select Image", multiple: false });
        frame.on("select", function() {
            document.getElementById(fieldId).value = frame.state().get("selection").first().toJSON().url;
        });
        frame.open();
    }
    </script>';

    foreach ( $team_fields as $id => $field ) {
        $value = get_post_meta( $post->ID, '_' . $id, true );
        printf(
            '<p><label for="%1$s">%2$s</label><br><input type="%3$s" id="%1$s" name="%1$s" value="%4$s" class="widefat"></p>',
            esc_attr( $id ),
            esc_html( $field['label'] ),
            esc_attr( $field['type'] ),
            esc_attr( $value )
        );
    }
}

/**
 * Saves the custom meta data for the Team Member post type.
 */
function stackandhustle_save_team_meta_data( $post_id ) {
    // Security checks
    if ( ! isset( $_POST['stackandhustle_team_nonce'] ) || ! wp_verify_nonce( $_POST['stackandhustle_team_nonce'], 'stackandhustle_save_team_data' ) ) { return; }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }
    if ( ! current_user_can( 'edit_post', $post_id ) ) { return; }

    $fields_to_save = [
        'team_role'             => 'sanitize_text_field',
        'team_design_title'     => 'sanitize_text_field',
        'team_exhibition_topic' => 'sanitize_text_field',
        'team_vote_url'         => 'esc_url_raw',
        'team_portfolio_image' => 'esc_url_raw',
        'team_instagram'       => 'esc_url_raw',
        'team_twitter'         => 'esc_url_raw',
        'team_linkedin'        => 'esc_url_raw',
        'team_facebook'        => 'esc_url_raw',
        'team_behance'         => 'esc_url_raw',
        'team_dribbble'        => 'esc_url_raw',
        'team_pinterest'       => 'esc_url_raw',
        'team_website'         => 'esc_url_raw',
        'team_email'           => 'sanitize_email',
        'team_whatsapp'        => 'sanitize_text_field',
    ];

    foreach ( $fields_to_save as $key => $sanitize_callback ) {
        if ( isset( $_POST[ $key ] ) ) {
            $value = call_user_func( $sanitize_callback, $_POST[ $key ] );
            update_post_meta( $post_id, '_' . $key, $value );
        }
    }
}
add_action( 'save_post_team', 'stackandhustle_save_team_meta_data' );

/**
 * Register 'Department' taxonomy for Team CPT.
 */
function stackandhustle_register_team_taxonomy() {
    $labels = array(
        'name'              => _x( 'Departments', 'taxonomy general name', 'stackandhustle' ),
        'singular_name'     => _x( 'Department', 'taxonomy singular name', 'stackandhustle' ),
        'search_items'      => __( 'Search Departments', 'stackandhustle' ),
        'all_items'         => __( 'All Departments', 'stackandhustle' ),
        'parent_item'       => __( 'Parent Department', 'stackandhustle' ),
        'parent_item_colon' => __( 'Parent Department:', 'stackandhustle' ),
        'edit_item'         => __( 'Edit Department', 'stackandhustle' ),
        'update_item'       => __( 'Update Department', 'stackandhustle' ),
        'add_new_item'      => __( 'Add New Department', 'stackandhustle' ),
        'new_item_name'     => __( 'New Department Name', 'stackandhustle' ),
        'menu_name'         => __( 'Departments', 'stackandhustle' ),
    );

    $args = array(
        'hierarchical'      => true, // Like categories
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'department' ),
    );

    register_taxonomy( 'department', array( 'team' ), $args );
}
add_action( 'init', 'stackandhustle_register_team_taxonomy' );

/**
 * Register 'Exhibition Event' taxonomy for Team CPT.
 * Groups team members by exhibition (e.g. "Design Exhibition 2026").
 */
function stackandhustle_register_exhibition_taxonomy() {
    register_taxonomy( 'exhibition_event', array( 'team' ), array(
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'exhibition-event' ),
        'labels'            => array(
            'name'         => __( 'Exhibitions', 'stackandhustle' ),
            'singular_name'=> __( 'Exhibition', 'stackandhustle' ),
            'menu_name'    => __( 'Exhibitions', 'stackandhustle' ),
            'add_new_item' => __( 'Add New Exhibition', 'stackandhustle' ),
            'edit_item'    => __( 'Edit Exhibition', 'stackandhustle' ),
            'all_items'    => __( 'All Exhibitions', 'stackandhustle' ),
        ),
    ) );
}
add_action( 'init', 'stackandhustle_register_exhibition_taxonomy' );

/**
 * Load single-participants.php for team members assigned to an exhibition.
 * Regular team members continue to use single-team.php.
 */
function stackandhustle_exhibition_single_template( $template ) {
    if ( is_singular( 'team' ) ) {
        $exhibitions = get_the_terms( get_the_ID(), 'exhibition_event' );
        if ( $exhibitions && ! is_wp_error( $exhibitions ) ) {
            $custom = locate_template( 'single-participants.php' );
            if ( $custom ) {
                return $custom;
            }
        }
    }
    return $template;
}
add_filter( 'template_include', 'stackandhustle_exhibition_single_template' );

/**
 * Route standard Posts in 'ai-exhibition' category to single-ai-participant.php.
 */
function stackandhustle_ai_exhibition_single_template( $template ) {
    if ( is_singular( 'post' ) && in_category( 'ai-exhibition' ) ) {
        $custom = locate_template( 'single-ai-participant.php' );
        if ( $custom ) return $custom;
    }
    // Also support team CPT tagged with ai-exhibition (fallback)
    if ( is_singular( 'team' ) ) {
        $terms = get_the_terms( get_the_ID(), 'exhibition_event' );
        if ( $terms && ! is_wp_error( $terms ) ) {
            foreach ( $terms as $term ) {
                if ( $term->slug === 'ai-exhibition' ) {
                    $custom = locate_template( 'single-ai-participant.php' );
                    if ( $custom ) return $custom;
                }
            }
        }
    }
    return $template;
}
add_filter( 'template_include', 'stackandhustle_ai_exhibition_single_template', 9 );

/**
 * Register clean rewrite rule: /person-name → team post with that slug.
 * URL pattern: yourdomain.com/firstname-lastname
 */
function stackandhustle_ai_participant_rewrite() {
    add_rewrite_rule(
        '^([a-z0-9\-]+)/?$',
        'index.php?post_type=team&name=$matches[1]',
        'bottom'
    );
}
add_action( 'init', 'stackandhustle_ai_participant_rewrite' );

/**
 * ── Exhibition Members Details meta box on Posts ──────────────────────────
 * Adds the same fields as Team Member Details but attached to standard Posts,
 * so AI Exhibition participants can be managed as regular posts.
 */
function stackandhustle_add_exhibition_post_meta_box() {
    add_meta_box(
        'stackandhustle_exhibition_member_details',
        __( 'Exhibition Members Details', 'stackandhustle' ),
        'stackandhustle_exhibition_post_meta_box_html',
        'post',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes_post', 'stackandhustle_add_exhibition_post_meta_box' );

function stackandhustle_exhibition_post_meta_box_html( $post ) {
    wp_nonce_field( 'stackandhustle_save_exhibition_post_data', 'stackandhustle_exhibition_post_nonce' );

    // Portfolio image
    $portfolio_image = get_post_meta( $post->ID, '_team_portfolio_image', true );
    echo '<p><label for="ex_portfolio_image"><strong>' . __( 'Portfolio Image', 'stackandhustle' ) . '</strong></label><br>';
    echo '<input type="url" id="ex_portfolio_image" name="ex_portfolio_image" value="' . esc_attr( $portfolio_image ) . '" class="widefat" style="margin-bottom:5px;">';
    echo '<button type="button" class="button" onclick="exMediaUpload(\'ex_portfolio_image\')">' . __( 'Upload Image', 'stackandhustle' ) . '</button></p>';

    $fields = array(
        'ex_role'             => array( 'label' => __( 'Role / Position', 'stackandhustle' ),          'type' => 'text' ),
        'ex_design_title'     => array( 'label' => __( 'Design Title', 'stackandhustle' ),             'type' => 'text' ),
        'ex_exhibition_topic' => array( 'label' => __( 'Exhibition Topic / Theme', 'stackandhustle' ), 'type' => 'text' ),
        'ex_portfolio_video'  => array( 'label' => __( 'Portfolio Video URL (YouTube)', 'stackandhustle' ), 'type' => 'url' ),
        'ex_instagram'        => array( 'label' => __( 'Instagram URL', 'stackandhustle' ),            'type' => 'url' ),
        'ex_twitter'          => array( 'label' => __( 'Twitter / X URL', 'stackandhustle' ),          'type' => 'url' ),
        'ex_linkedin'         => array( 'label' => __( 'LinkedIn URL', 'stackandhustle' ),             'type' => 'url' ),
        'ex_facebook'         => array( 'label' => __( 'Facebook URL', 'stackandhustle' ),             'type' => 'url' ),
        'ex_behance'          => array( 'label' => __( 'Behance URL', 'stackandhustle' ),              'type' => 'url' ),
        'ex_dribbble'         => array( 'label' => __( 'Dribbble URL', 'stackandhustle' ),             'type' => 'url' ),
        'ex_website'          => array( 'label' => __( 'Personal Website', 'stackandhustle' ),         'type' => 'url' ),
        'ex_email'            => array( 'label' => __( 'Email Address', 'stackandhustle' ),            'type' => 'email' ),
        'ex_whatsapp'         => array( 'label' => __( 'WhatsApp Number', 'stackandhustle' ),          'type' => 'text' ),
    );

    echo '<script>
    function exMediaUpload(fieldId) {
        var frame = wp.media({ title: "Select Image", multiple: false });
        frame.on("select", function() {
            document.getElementById(fieldId).value = frame.state().get("selection").first().toJSON().url;
        });
        frame.open();
    }
    </script>';

    foreach ( $fields as $id => $field ) {
        $value = get_post_meta( $post->ID, '_' . $id, true );
        printf(
            '<p><label for="%1$s">%2$s</label><br><input type="%3$s" id="%1$s" name="%1$s" value="%4$s" class="widefat"></p>',
            esc_attr( $id ),
            esc_html( $field['label'] ),
            esc_attr( $field['type'] ),
            esc_attr( $value )
        );
    }
}

function stackandhustle_save_exhibition_post_meta( $post_id ) {
    if ( ! isset( $_POST['stackandhustle_exhibition_post_nonce'] ) ||
         ! wp_verify_nonce( $_POST['stackandhustle_exhibition_post_nonce'], 'stackandhustle_save_exhibition_post_data' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    $fields = array(
        'ex_portfolio_image'  => 'esc_url_raw',
        'ex_role'             => 'sanitize_text_field',
        'ex_design_title'     => 'sanitize_text_field',
        'ex_exhibition_topic' => 'sanitize_text_field',
        'ex_portfolio_video'  => 'esc_url_raw',
        'ex_instagram'        => 'esc_url_raw',
        'ex_twitter'          => 'esc_url_raw',
        'ex_linkedin'         => 'esc_url_raw',
        'ex_facebook'         => 'esc_url_raw',
        'ex_behance'          => 'esc_url_raw',
        'ex_dribbble'         => 'esc_url_raw',
        'ex_website'          => 'esc_url_raw',
        'ex_email'            => 'sanitize_email',
        'ex_whatsapp'         => 'sanitize_text_field',
    );

    foreach ( $fields as $key => $sanitize ) {
        if ( isset( $_POST[ $key ] ) ) {
            update_post_meta( $post_id, '_' . $key, call_user_func( $sanitize, $_POST[ $key ] ) );
        }
    }
}
add_action( 'save_post_post', 'stackandhustle_save_exhibition_post_meta' );

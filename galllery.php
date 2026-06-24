<?php
/*
Template Name: Gallery
*/
get_header(); ?>

<!-- Start Page Title -->
<section class="wpo-page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>Gallery</h2>
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="<?php echo home_url(); ?>">Home</a></li>
                        <li>Gallery</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Page Title -->

<div class="container">
    <!-- Section Title -->
    <div class="row">
        <div class="col-lg-7 col-12">
            <div class="wpo-section-title text-left mb-5">
                <h2>Discover our <span>featured</span> SPACES.</h2>
            </div>
        </div>
    </div>

    <!-- Dynamic Gallery -->
    <div class="row space">
        <?php
        // Query to get posts from the "Gallery" category
        $args = array(
            'post_type' => 'post',
            'category_name' => 'gallery', // Category slug
            'posts_per_page' => -1, // Display all posts
        );

        $query = new WP_Query($args);

        // Check if there are any posts
        if($query->have_posts()):
            while($query->have_posts()): $query->the_post();

                // Check if the post has a featured image
                if(has_post_thumbnail()):
                    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Get the URL of the full-sized image
                    ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="gallery-item">
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>" class="popup-trigger">
                        </div>
                    </div>
                    <?php
                else:
                    echo '<p>No Featured Image for ' . get_the_title() . '</p>';
                endif;

            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
</div>

<!-- Popup Lightbox -->
<div id="customModal" class="popup-modal">
    <span class="popup-close">&times;</span>
    <span class="popup-prev">&#10094;</span>
    <span class="popup-next">&#10095;</span>
    <img id="popupImg" src="" alt="Popup Image" class="popup-modal-content">
</div>

<!-- Styles -->
<style>

/* Add margin-top of 3rem to the .row class */
.space {
    margin-bottom: 3rem;
}

/* Gallery item images */
.gallery-item {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    margin-bottom: 20px; 
    text-align: left;
}

/* Ensure all images inside .gallery-item are the same size */
.gallery-item img {
    width: 100%;
    height: 400px;
    object-fit: cover; 
    border-radius: 8px; 
    transition: transform 0.3s ease;
}

/* Hover effect for images */
.gallery-item img:hover {
    transform: scale(1.05); /* Slight zoom effect */
}

.wpo-section-title.text-left.mb-5{
    margin-top: 45px;
}

/* Popup overlay and image styles */
.popup-modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(15,15,15,0.95);
    text-align: center;
    overflow: auto;
    padding-top: 60px;
}

.popup-modal-content {
    max-width: 90%;
    max-height: 80vh;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.6);
    animation: fadeIn 0.3s ease-in-out;
}

@keyframes fadeIn {
    from {opacity: 0; transform: scale(0.95);}
    to {opacity: 1; transform: scale(1);}
}

/* Close button */
.popup-close {
    position: absolute;
    top: 20px;
    right: 40px;
    color: #fff;
    font-size: 40px;
    font-weight: bold;
    cursor: pointer;
}
.popup-close:hover { color: #FF4A17; }

/* Prev / Next buttons */
.popup-prev, .popup-next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    font-size: 35px;
    color: #fff;
    background: rgba(0,0,0,0.5);
    width: 60px;
    height: 60px;
    line-height: 60px;
    text-align: center;
    border-radius: 50%;
    user-select: none;
    transition: all 0.3s;
}
.popup-prev:hover, .popup-next:hover { background: #FF4A17; }
.popup-prev { left: 20px; }
.popup-next { right: 20px; }
</style>

<!-- JavaScript -->
<script>
// Open Modal Image on click
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("customModal");
    const modalImg = document.getElementById("popupImg");
    const closeBtn = document.querySelector(".popup-close");
    const prevBtn = document.querySelector(".popup-prev");
    const nextBtn = document.querySelector(".popup-next");
    const images = document.querySelectorAll(".popup-trigger");
    let currentIndex = 0;

    function openModal(index){
        currentIndex = index;
        modal.style.display = "block";
        modalImg.classList.remove("fadeIn");
        void modalImg.offsetWidth; // trigger reflow
        modalImg.src = images[currentIndex].src;
        modalImg.classList.add("fadeIn");
    }

    images.forEach((img, index) => {
        img.addEventListener("click", () => openModal(index));
    });

    closeBtn.onclick = () => modal.style.display = "none";
    nextBtn.onclick = () => openModal((currentIndex + 1) % images.length);
    prevBtn.onclick = () => openModal((currentIndex - 1 + images.length) % images.length);

    window.onclick = (e) => { if(e.target === modal) modal.style.display = "none"; }

    window.addEventListener("keydown", (e) => {
        if(modal.style.display === "block"){
            if(e.key === "ArrowRight") nextBtn.click();
            if(e.key === "ArrowLeft") prevBtn.click();
            if(e.key === "Escape") closeBtn.click();
        }
    });
});
</script>

<?php get_footer(); ?>

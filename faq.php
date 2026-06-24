<?php
/*
Template Name: FAQ
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
                        <li><?php the_title(); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end page-title -->

<!-- start wpo-faq-section -->
<section class="wpo-faq-section section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2">
                <div class="wpo-section-title">
                    <h2>Frequently Asked Questions</h2>
                </div>
            </div>

            <div class="col-lg-8 offset-lg-2">
                <div class="wpo-faq-section">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="wpo-benefits-item">
                                <div class="accordion" id="accordionExample">

                                    <!-- Example FAQ Item -->
                                    <div class="accordion-item">
                                        <h3 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne">
                                                01. What does your single property company specialize in?
                                            </button>
                                        </h3>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                                <h3 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                        aria-expanded="false" aria-controls="collapseTwo">
                                                        02. Do you have a portfolio of properties available for sale or
                                                        rent?
                                                    </button>
                                                </h3>
                                                <div id="collapseTwo" class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed
                                                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                            enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                            nisi ut aliquip ex ea commodo consequat.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h3 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                        aria-expanded="false" aria-controls="collapseThree">
                                                        03. Can your company help with legal processes?
                                                    </button>
                                                </h3>
                                                <div id="collapseThree" class="accordion-collapse collapse"
                                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed
                                                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                            enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                            nisi ut aliquip ex ea commodo consequat.</p>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="accordion-item">
                                                <h3 class="accordion-header" id="headingFour">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                        aria-expanded="false" aria-controls="collapseFour">
                                                        04. How can I get in touch with your company for property inquiries?
                                                    </button>
                                                </h3>
                                                <div id="collapseFour" class="accordion-collapse collapse"
                                                    aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed
                                                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                            enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                            nisi ut aliquip ex ea commodo consequat.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h3 class="accordion-header" id="headingFive">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                        aria-expanded="false" aria-controls="collapseFive">
                                                        05. What does your company specialize in?
                                                    </button>
                                                </h3>
                                                <div id="collapseFive" class="accordion-collapse collapse"
                                                    aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed
                                                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                            enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                            nisi ut aliquip ex ea commodo consequat.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h3 class="accordion-header" id="headingSix">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                                        aria-expanded="false" aria-controls="collapseSix">
                                                        06. What marketing strategies do you use?
                                                    </button>
                                                </h3>
                                                <div id="collapseSix" class="accordion-collapse collapse"
                                                    aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed
                                                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                            enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                            nisi ut aliquip ex ea commodo consequat.</p>
                                                    </div>
                                                </div>
                                            </div>
                                   

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</section>
<!-- end faq-section -->

<!-- Get In Touch Section -->
<div class="question-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wpo-section-title">
                    <h2>Do You Have Any Question?</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="question-touch">
                    <h2>Get In Touch</h2>
                    <?php echo do_shortcode('[contact-form-7 id="123" title="FAQ Contact"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>

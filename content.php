<?php
/**
 * Template Name: Content
 */
get_header();
?>

<!-- start wpo-page-title -->
<section class="wpo-page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2><?php the_title();?></h2>
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="<?php echo site_url(); ?>">Home</a></li>
                        <li><?php the_title();?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end page-title -->

<!-- start wpo-blog-single-section -->
<section class="wpo-blog-single-section wpo-blog-single-left-sidebar-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-lg-10 col-12 offset-lg-1">
                <div class="wpo-blog-content">
                    <div class="post format-standard-image">

<div style="font-family: Arial, sans-serif; line-height: 1.6; color: #222; background-color: #f9f9f9; padding: 20px; border-radius: 8px;">

  <h2 style="color: #ff4a17; text-align: center;">
    Thank You for Choosing Stack &amp; Hustle CoWorking Space
  </h2>

  <p style="text-align: center; font-style: italic;">
    Powered by IF Media Group
  </p>

  <p>
    If you’ve <strong>already made your payment</strong>, your booking is
    <strong>confirmed</strong> - we look forward to hosting you.
  </p>

  <p>
    If you <strong>have not yet made payment</strong>, please complete a bank
    transfer <strong>at least 24 hours before your booking</strong> to secure your space.<br>
    <strong>Note:</strong> Bookings <strong>not paid on time</strong> will be made available to the next person.
  </p>

  <!-- 🔔 CONSTRUCTION / NOISE NOTICE START -->
  <div style="
        margin: 20px 0;
        padding: 16px;
        background-color: #fff4ef;
        border-left: 5px solid #ff4a17;
        border-radius: 6px;
      ">
    <p style="margin: 0 0 6px; font-weight: bold;">
      ⚠️ Important Notice: Nearby Construction
    </p>
    <p style="margin: 0; line-height: 1.5;">
      There is ongoing construction work in the building next to Stack &amp; Hustle.
      As a result, you may experience occasional noise during your session.
      We recommend coming with earphones, earbuds, or headphones if you’re sensitive to sound.
    </p>
    <p style="margin-top: 10px;">
      If you’d like help choosing a quieter time slot, please reach out to us on WhatsApp:
      <strong>0810 837 3034</strong>.
    </p>
  </div>
  <!-- 🔔 CONSTRUCTION / NOISE NOTICE END -->

  <h3 style="color: #333;">Payment Details</h3>

  <p>
    🏦 <strong>Bank:</strong> PAYSTACK-TITAN<br>
    💳 <strong>Account Name:</strong> IFMEDIALTD / STACK AND HUSTLE<br>
    🔢 <strong>Account Number:</strong> 9839239954
  </p>

  <p>
    You can <strong>chat with us or confirm your payment via WhatsApp</strong>
    during business hours at
    <a href="https://wa.me/2348108373034" style="color: #ff4a17; text-decoration: none;">
      0810 837 3034
    </a>.
  </p>

  <hr style="border: none; border-top: 1px solid #ddd; margin: 20px 0;">

  <h3 style="color: #333;">Booking Details</h3>

  <p>
    <strong>Booking ID:</strong><br>
    <?php echo do_shortcode('[booking_id]'); ?><br>
    We have sent your booking information to your email address.
  </p>

  <p>
    <strong>Service:</strong><br>
    <?php echo do_shortcode('[bookingpress_appointment_service]'); ?>
  </p>

  <p>
    <strong>Date &amp; Time:</strong><br>
    <?php echo do_shortcode('[bookingpress_appointment_datetime]'); ?>
  </p>

  <p>
    <strong>Customer Name:</strong><br>
    <?php echo do_shortcode('[bookingpress_appointment_customername]'); ?>
  </p>

  <p>
    <strong>Add to Calendar:</strong><br>
    <?php echo do_shortcode('[bookingpress_appointment_calendar_integration]'); ?>
  </p>

  <p style="margin-top: 30px; text-align: center; font-weight: bold; color: #555;">
    We can’t wait to welcome you to our space — where ideas stack and hustles grow.
  </p>

</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end wpo-blog-single-section -->

<?php get_footer(); ?>

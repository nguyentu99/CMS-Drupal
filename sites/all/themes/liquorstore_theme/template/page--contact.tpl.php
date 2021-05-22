<?php
include("header.inc");
$background = variable_get('background');
if (!empty($background)) {
  $background = node_load($background);
}
//thông tin liên hệ
$address = variable_get('address');
$phone = variable_get('phone');
$mail = variable_get('mail');
$website = variable_get('website');

//form liên hệ
$form = drupal_get_form('liquorstore_contact_form');
$form = drupal_render($form);



?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php
if (!empty($background->field_background_image['und']['0']['uri'])) {
  print_r(file_create_url($background->field_background_image['und']['0']['uri']));
}; ?>');"
         data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate mb-5 text-center">
        <p class="breadcrumbs mb-0"><span class="mr-2">Home <i
              class="fa fa-chevron-right"></i></span> <span>Contact Us <i
              class="fa fa-chevron-right"></i></span></p>
        <h2 class="mb-0 bread">Contact Us</h2>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="wrapper px-md-4">
          <div class="row mb-5">
            <div class="col-md-3">
              <div class="dbox w-100 text-center">
                <div class="icon d-flex align-items-center justify-content-center">
                  <span class="fa fa-map-marker"></span>
                </div>
                <div class="text">
                  <p><span>Address:</span>
                    <?php if (!empty($address)) {
                      print($address);
                    } ?>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="dbox w-100 text-center">
                <div class="icon d-flex align-items-center justify-content-center">
                  <span class="fa fa-phone"></span>
                </div>
                <div class="text">
                  <p><span>Phone:</span> <a href="tel://1234567920">
                      <?php if (!empty($phone)) {
                        print ($phone);
                      } ?>
                    </a></p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="dbox w-100 text-center">
                <div class="icon d-flex align-items-center justify-content-center">
                  <span class="fa fa-paper-plane"></span>
                </div>
                <div class="text">
                  <p><span>Email:</span> <a href="mailto:nguyentudhpt@gmail.com">
                      <?php if (!empty($mail)) {
                        print ($mail);
                      } ?>
                    </a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="dbox w-100 text-center">
                <div class="icon d-flex align-items-center justify-content-center">
                  <span class="fa fa-globe"></span>
                </div>
                <div class="text">
                  <p><span>Website</span> <a href="#">
                      <?php if (!empty($website)) {
                        print ($website);
                      } ?>
                    </a></p>
                </div>
              </div>
            </div>
          </div>
          <?php if ($messages): ?>
            <div id="console" class="clearfix"><?php print $messages; ?></div>
          <?php endif; ?>
          <div class="row no-gutters">
            <div class="col-md-7">
              <div class="contact-wrap w-100 p-md-5 p-4">
                <h3 class="mb-4">Contact Us</h3>
                <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                  <div class="row">

                  </div>
                </form>
                <?php print $form?>
              </div>
            </div>
            <div class="col-md-5 order-md-first d-flex align-items-stretch">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.4736630784196!2d105.73291811424572!3d21.053735992302634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31345457e292d5bf%3A0x20ac91c94d74439a!2sHanoi%20University%20of%20Industry!5e0!3m2!1sen!2s!4v1617281331031!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include("footer.inc"); ?>

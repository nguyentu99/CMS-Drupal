<?php include ('header.inc');
$background = variable_get('background');
if (!empty($background)) {
  $background = node_load($background);
}

$about = variable_get('about');
if (!empty($about)) {
  $about = node_load($about);
}

//Khách hàng
$query = db_select('node', 'n');
$query->fields('n');
$query->condition('type', 'happy_clients');
$clients = $query->execute()->fetchAll();
foreach ($clients as $data) {
  $nids_clients[] = $data->nid;
}
$clients = node_load_multiple($nids_clients);

?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php
if (!empty($background->field_background_image['und']['0']['uri'])) {
  print_r(file_create_url($background->field_background_image['und']['0']['uri']));
} ?>');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate mb-5 text-center">
        <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>About us <i class="fa fa-chevron-right"></i></span></p>
        <h2 class="mb-0 bread">About Us</h2>
      </div>
    </div>
  </div>
</section>

<section class="ftco-intro">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-md-4 d-flex">
        <div class="intro d-lg-flex w-100 ftco-animate">
          <div class="icon">
            <span class="flaticon-support"></span>
          </div>
          <div class="text">
            <h2>Online Support 24/7</h2>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 d-flex">
        <div class="intro color-1 d-lg-flex w-100 ftco-animate">
          <div class="icon">
            <span class="flaticon-cashback"></span>
          </div>
          <div class="text">
            <h2>Money Back Guarantee</h2>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 d-flex">
        <div class="intro color-2 d-lg-flex w-100 ftco-animate">
          <div class="icon">
            <span class="flaticon-free-delivery"></span>
          </div>
          <div class="text">
            <h2>Free Shipping &amp; Return</h2>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-no-pb">
  <div class="container">
    <div class="row">
      <div class="col-md-6 img img-3 d-flex justify-content-center align-items-center"
           style="background-image: url(<?php if (!empty($about->field_image_about['und']['0']['uri'])) {
             print (file_create_url($about->field_image_about['und']['0']['uri']));
           } ?>);">
      </div>
      <div class="col-md-6 wrap-about pl-md-5 ftco-animate py-5">
        <div class="heading-section">
          <span class="subheading"><?php if (!empty($about->field_found_year['und']['0']['value'])) {
              print ($about->field_found_year['und']['0']['value']);
            } ?></span>
          <h2 class="mb-4"><?php if (!empty($about->title)) {
              print ($about->title);
            } ?></h2>

          <p><?php if (!empty($about->body['und']['0']['value'])) {
              print ($about->body['und']['0']['value']);
            } ?></p>
          <p class="year">
            <strong class="number" data-number="115">0</strong>
            <span>Years of Experience In Business</span>
          </p>
        </div>

      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-md-4 ">
        <div class="sort w-100 text-center ftco-animate">
          <div class="img" style="background-image: url(images/kind-1.jpg);"></div>
          <h3>Brandy</h3>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="ftco-section testimony-section img" style="background-image: url(<?php if(!empty($background->field_background_2['und']['0']['uri'])){
  print (file_create_url($background->field_background_2['und']['0']['uri']));
}?>);">
  <div class="overlay"></div>
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
        <span class="subheading">Testimonial</span>
        <h2 class="mb-3">Happy Clients</h2>
      </div>
    </div>
    <div class="row ftco-animate">
      <div class="col-md-12">
        <div class="carousel-testimony owl-carousel ftco-owl">
          <?php foreach ($clients as $item):?>
            <div class="item">
              <div class="testimony-wrap py-4">
                <div class="icon d-flex align-items-center justify-content-center"><span
                    class="fa fa-quote-left"></div>
                <div class="text">
                  <p class="mb-4"><?php if(!empty($item->body['und']['0']['value'])){
                      print ($item->body['und']['0']['value']);
                    }?></p>
                  <div class="d-flex align-items-center">
                    <div class="user-img" style="background-image: url(<?php if(!empty($item->field_clients_image['und']['0']['uri'])){
                      print (file_create_url($item->field_clients_image['und']['0']['uri']));
                    }?>)"></div>
                    <div class="pl-3">
                      <p class="name"><?php if(!empty($item->title)){
                          print ($item->title);
                        }?></p>
                      <span class="position"><?php if(!empty($item->field_position['und']['0']['value'])){
                          print ($item->field_position['und']['0']['value']);
                        }?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach;?>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="ftco-counter ftco-section ftco-no-pt ftco-no-pb img bg-light" id="section-counter">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18 py-4 mb-4">
          <div class="text align-items-center">
            <strong class="number" data-number="3000">0</strong>
            <span>Our Satisfied Customers</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18 py-4 mb-4">
          <div class="text align-items-center">
            <strong class="number" data-number="115">0</strong>
            <span>Years of Experience</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18 py-4 mb-4">
          <div class="text align-items-center">
            <strong class="number" data-number="100">0</strong>
            <span>Kinds of Liquor</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18 py-4 mb-4">
          <div class="text align-items-center">
            <strong class="number" data-number="40">0</strong>
            <span>Our Branches</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include ('footer.inc');?>

<?php
include("header.inc");

$background = variable_get('background');
if (!empty($background)) {
  $background = node_load($background);
}

$service = variable_get('service');
if (!empty($service)) {
  $service = node_load($service);
}

$about = variable_get('about');
if (!empty($about)) {
  $about = node_load($about);
}

//Sản phẩm
$products = db_select('node', 'n')
  ->fields('n')
  ->condition('type', 'product')
  ->extend('PagerDefault')
  ->execute()
  ->fetchAll();
foreach ($products as $data) {
  $nids_product[] = $data->nid;
}
$products = node_load_multiple($nids_product);

//Khách hàng
$query = db_select('node', 'n');
$query->fields('n');
$query->condition('type', 'happy_clients');
$clients = $query->execute()->fetchAll();
foreach ($clients as $data) {
  $nids_clients[] = $data->nid;
}
$clients = node_load_multiple($nids_clients);

//Bài viết
$blog = db_select('node', 'n')
  ->fields('n')
  ->condition('type', 'blog')
  ->extend('PagerDefault')
  ->limit(2)
  ->execute()
  ->fetchAll();
foreach ($blog as $data) {
  $nids_blog[] = $data->nid;
}
$blog = node_load_multiple($nids_blog);

?>

<div class="hero-wrap" style="background-image: url('<?php
if (!empty($background->field_background_image['und']['0']['uri'])) {
  print_r(file_create_url($background->field_background_image['und']['0']['uri']));
}; ?>');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-8 ftco-animate d-flex align-items-end">
        <div class="text w-100 text-center">
          <h1 class="mb-4">Good <span>Drink</span> for Good <span>Moments</span>.</h1>
          <p><a href="#" class="btn btn-primary py-2 px-4">Shop Now</a> <a href="#"
                                                                           class="btn btn-white btn-outline-white py-2 px-4">Read
              more</a></p>
        </div>
      </div>
    </div>
  </div>
</div>

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
            <p>A small river named Duden flows by their place and supplies it with the necessary
              regelialia.</p>
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
            <p>A small river named Duden flows by their place and supplies it with the necessary
              regelialia.</p>
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
            <p>A small river named Duden flows by their place and supplies it with the necessary
              regelialia.</p>
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

<section class="ftco-section ftco-no-pb">
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-md-4 ">
        <div class="sort w-100 text-center ftco-animate">
          <div class="img"
               style="background-image: url(http://localhost:8888/projects/liquorstore/sites/all/themes/liquorstore_theme/images/kind-1.jpg);"></div>
          <h3>Brandy</h3>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 ">
        <div class="sort w-100 text-center ftco-animate">
          <div class="img"
               style="background-image: url(http://localhost:8888/projects/liquorstore/sites/default/files/image_2.jpg);"></div>
          <h3>Brandy</h3>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 ">
        <div class="sort w-100 text-center ftco-animate">
          <div class="img"
               style="background-image: url(http://localhost:8888/projects/liquorstore/sites/default/files/image_2.jpg);"></div>
          <h3>Brandy</h3>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 ">
        <div class="sort w-100 text-center ftco-animate">
          <div class="img"
               style="background-image: url(http://localhost:8888/projects/liquorstore/sites/default/files/image_2.jpg);"></div>
          <h3>Brandy</h3>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 ">
        <div class="sort w-100 text-center ftco-animate">
          <div class="img"
               style="background-image: url(http://localhost:8888/projects/liquorstore/sites/default/files/image_2.jpg);"></div>
          <h3>Brandy</h3>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 ">
        <div class="sort w-100 text-center ftco-animate">
          <div class="img"
               style="background-image: url(http://localhost:8888/projects/liquorstore/sites/default/files/image_2.jpg);"></div>
          <h3>Brandy</h3>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center pb-5">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <span class="subheading">Our Delightful offerings</span>
        <h2>Tastefully Yours</h2>
      </div>
    </div>
    <div class="row">
      <?php foreach ($products as $product): ?>
        <div class="col-md-3 d-flex">
          <div class="product ftco-animate">
            <div class="img d-flex align-items-center justify-content-center"
                 style="background-image: url(<?php if (!empty($product->field_product_image['und']['0']['uri'])) {
                   print(file_create_url($product->field_product_image['und']['0']['uri']));
                 } ?>);">
              <div class="desc">
                <p class="meta-prod d-flex">
                  <a href="#" class="d-flex align-items-center justify-content-center"><span
                      class="flaticon-shopping-bag"></span></a>
                  <a href="#" class="d-flex align-items-center justify-content-center"><span
                      class="flaticon-heart"></span></a>
                  <a href="#" class="d-flex align-items-center justify-content-center"><span
                      class="flaticon-visibility"></span></a>
                </p>
              </div>
            </div>
            <div class="text text-center">
              <span class="sale">Sale</span>
              <span class="category">Brandy</span>
              <h2><?php if (!empty($product->title)) {
                  print ($product->title);
                } ?></h2>
              <p class="mb-0"><span
                  class="price price-sale"><?php if (!empty($product->field_product_prime['und']['0']['value'])) {
                    print ('$' . $product->field_product_prime['und']['0']['value']);
                  } ?></span> <span
                  class="price"><?php if (!empty($product->field_product_sale['und']['0']['value'])) {
                    print ('$' . $product->field_product_sale['und']['0']['value']);
                  } ?></span></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-4">
        <a href="<?php print (drupal_get_path_alias('product')); ?>" class="btn btn-primary d-block">View All Products
          <span
            class="fa fa-long-arrow-right"></span></a>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section testimony-section img"
         style="background-image: url(<?php if (!empty($background->field_background_2['und']['0']['uri'])) {
           print (file_create_url($background->field_background_2['und']['0']['uri']));
         } ?>);">
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
          <?php foreach ($clients as $item): ?>
            <div class="item">
              <div class="testimony-wrap py-4">
                <div class="icon d-flex align-items-center justify-content-center"><span
                    class="fa fa-quote-left"></div>
                <div class="text">
                  <p class="mb-4"><?php if (!empty($item->body['und']['0']['value'])) {
                      print ($item->body['und']['0']['value']);
                    } ?></p>
                  <div class="d-flex align-items-center">
                    <div class="user-img"
                         style="background-image: url(<?php if (!empty($item->field_clients_image['und']['0']['uri'])) {
                           print (file_create_url($item->field_clients_image['und']['0']['uri']));
                         } ?>)"></div>
                    <div class="pl-3">
                      <p class="name"><?php if (!empty($item->title)) {
                          print ($item->title);
                        } ?></p>
                      <span class="position"><?php if (!empty($item->field_position['und']['0']['value'])) {
                          print ($item->field_position['und']['0']['value']);
                        } ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <span class="subheading">Blog</span>
        <h2>Recent Blog</h2>
      </div>
    </div>
    <div class="row d-flex">
      <?php foreach ($blog as $item): ?>
        <div class="col-lg-6 d-flex align-items-stretch ftco-animate">
          <div class="blog-entry d-flex">
            <a href="blog-single.html" class="block-20 img"
               style="background-image: url('<?php if (!empty($item->field_blog_image['und']['0']['uri'])) {
                 print (file_create_url($item->field_blog_image['und']['0']['uri']));
               } ?>');">
            </a>
            <div class="text p-4 bg-light">
              <div class="meta">
                <p><span class="fa fa-calendar"></span> <?php print (date('d M y', $item->created)) ?></p>
              </div>
              <h3 class="heading mb-3"><a
                  href="<?php print (drupal_get_path_alias('node/' . $item->nid)); ?>"><?php if (!empty($item->title)) {
                    print ($item->title);
                  } ?></a></h3>
              <p><?php if (!empty($item->body['und']['0']['safe_summary'])) {
                  print ($item->body['und']['0']['safe_summary']);
                } ?></p>
              <a href="<?php print (drupal_get_path_alias('node/' . $item->nid)); ?>" class="btn-custom">Continue <span
                  class="fa fa-long-arrow-right"></span></a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-4">
        <a href="<?php print (drupal_get_path_alias('blog')); ?>" class="btn btn-primary d-block">View All Article
          <span
            class="fa fa-long-arrow-right"></span></a>
      </div>
    </div>
  </div>
</section>

<?php include("footer.inc") ?>

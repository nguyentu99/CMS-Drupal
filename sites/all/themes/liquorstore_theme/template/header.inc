<?php
//thông tin website
$phone = variable_get('phone');
$mail = variable_get('mail');
$facebook = variable_get('facebook');
$youtobe = variable_get('youtobe');
$website = variable_get('website');
//Lấy thông tin users
$users = db_select('users', 'n')->fields('n')->execute()->fetchAll();;
?>
<div class="wrapper">
  <div class="wrap">
    <div class="container">
      <div class="row">
        <div class="col-md-6 d-flex align-items-center">
          <p class="mb-0 phone pl-md-2">
            <a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span>
              <?php if (!empty($phone)) {
                print_r($phone);
              } ?>
            </a>
            <a href="#"><span class="fa fa-paper-plane mr-1"></span>
              <?php if (!empty($mail)) {
                print_r($mail);
              } ?>
            </a>
          </p>
        </div>
        <div class="col-md-6 d-flex justify-content-md-end">
          <div class="social-media mr-4">
            <p class="mb-0 d-flex">
              <a href="#" class="d-flex align-items-center justify-content-center"><span
                  class="fab fa-facebook"><i class="sr-only">
                    <?php if (!empty($facebook)) {
                      print_r($facebook);
                    } ?>
                  </i></span>
              </a>
              <a href="#" class="d-flex align-items-center justify-content-center"><span
                  class="fab fa-youtube-square"><i class="sr-only">
                    <?php if (!empty($youtobe)) {
                      print_r($youtobe);
                    } ?>
                  </i></span>
              </a>
              <a href="#" class="d-flex align-items-center justify-content-center"><span
                  class="fas fa-blog"><i class="sr-only">
                    <?php if (!empty($website)) {
                      print_r($website);
                    } ?></i>
                </span>
              </a>
            </p>
          </div>
          <div class="reg">
            <p class="mb-0"><a href="#" class="mr-2">Sign Up</a>
              <a href="<?php print(drupal_get_path_alias('user/login'));?>">Log In</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="#">Liquor <span>store</span></a>
      <div class="order-lg-last btn-group">
        <a href="#" class="btn-cart dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">
          <span class="flaticon-shopping-bag"></span>
        </a>
      </div>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
              aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <nav>
            <?php
            $_main_menu_ = menu_tree_all_data('main-menu');
            $_main_menu_ = menu_tree_output($_main_menu_);
            $_main_menu_ = render($_main_menu_);
            print($_main_menu_);
            ?>
          </nav>
        </ul>
      </div>
    </div>
  </nav>
</div>
<!-- END nav -->

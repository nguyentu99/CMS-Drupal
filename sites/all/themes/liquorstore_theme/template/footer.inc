<?php
$slogan = variable_get('slogan');
$facebook = variable_get('facebook');
$youtobe = variable_get('youtobe');
$website = variable_get('website');
$mail = variable_get('mail');
$phone = variable_get('phone');
$address = variable_get('address');
$copyright = variable_get('copyright');
?>
<footer class="ftco-footer">
  <div class="container">
    <div class="row mb-5">
      <div class="col-sm-12 col-md">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2 logo"><a href="#">Liquor <span>Store</span></a></h2>
          <p><?php if(!empty($slogan)){
            print_r($slogan);
            } ?></p>
          <ul class="ftco-footer-social list-unstyled mt-2">
            <li class="ftco-animate"><a href="<?php if(!empty($website)){
                print_r($website);
              } ?>"><span class="fas fa-blog"></span></a></li>
            <li class="ftco-animate"><a href="<?php if(!empty($facebook)){
                print_r($facebook);
              } ?>"><span class="fab fa-facebook"></span></a></li>
            <li class="ftco-animate"><a href="<?php if(!empty($youtobe)){
                print_r($youtobe);
              } ?>"><span class="fab fa-youtube-square"></span></a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-12 col-md">
        <div class="ftco-footer-widget mb-4 ml-md-4">
          <h2 class="ftco-heading-2">My Accounts</h2>
          <ul class="list-unstyled">
            <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>My Account</a></li>
            <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Register</a></li>
            <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Log In</a></li>
            <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>My Order</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-12 col-md">
        <div class="ftco-footer-widget mb-4 ml-md-4">
          <h2 class="ftco-heading-2">Information</h2>
          <ul class="list-unstyled">
            <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>About us</a></li>
            <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Catalog</a></li>
            <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Contact us</a></li>
            <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Term &amp; Conditions</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-12 col-md">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Quick Link</h2>
          <ul class="list-unstyled">
            <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>New User</a></li>
            <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Help Center</a></li>
            <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Report Spam</a></li>
            <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Faq's</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-12 col-md">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Thông tin liên hệ</h2>
          <div class="block-23 mb-3">
            <ul>
              <li><span class="icon fa fa-map-marker"></span><span class="text">
                  <?php if(!empty($address)){
                    print_r($address);
                  } ?></span></li>
              <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">
                    <?php if(!empty($phone)){
                      print_r($phone);}?>
                  </span></a></li>
              <li><a href="#"><span class="icon fa fa-paper-plane pr-4"></span><span
                    class="text"><?php if(!empty($mail)){
                      print_r($mail);
                    }?></span></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid px-0 py-5 bg-black">
    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <p class="mb-0" style="color: rgba(255,255,255,.5);">
            <?php if(!empty($copyright)){
              print_r($copyright);
            }?>
          </p>
        </div>
      </div>
    </div>
  </div>
</footer>




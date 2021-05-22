<div class="login-waper" style="background: linear-gradient(to right, #FDD819, #E80505); width: 100%; height: 580px;">
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h2 class="card-title text-center">Đăng Nhập</h2>
            <div class="form-label-group">
              abc
              <?php print drupal_render($form['name']); ?>
            </div>

            <div class="form-label-group" style="margin-top: 30px">
              <?php print drupal_render($form['pass']); ?>
            </div>
            <div style="margin-top:20px;align-items: center; display: flex;justify-content: center;">
              <?php
              print drupal_render($form['form_build_id']);
              print drupal_render($form['form_id']);
              print drupal_render($form['actions']);
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>








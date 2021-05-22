<div class="col-md-6">
  <div class="form-group" style="margin-bottom: 16px !important;">
    <label class="label" for="name">Full Name</label>
    <?php print render($form['name']); ?>
  </div>
</div>
<div class="col-md-6">
  <div class="form-group " style="margin-bottom: 16px !important;">
    <label class="label" for="email">Email Address</label>
    <?php print render($form['mail']); ?>
  </div>
</div>
<div class="col-md-12">
  <div class="form-group" style="margin-bottom: 16px !important;">
    <label class="label" for="subject">Subject</label>
    <?php print render($form['subject']); ?>
  </div>
</div>
<div class="col-md-12">
  <div class="form-group" style="margin-bottom: 16px !important;">
    <label class="label" for="#">Message</label>
    <?php print render($form['message']); ?>
  </div>
</div>
<div class="col-md-12">
  <div class="form-group" style="margin-bottom: 16px !important;">
    <?php print render($form['submit']); ?>
    <div class="submitting"></div>
  </div>
</div>

<?php print_r(drupal_render_children($form));?>

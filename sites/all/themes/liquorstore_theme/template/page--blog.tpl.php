<?php include('header.inc');
$background = variable_get('background');
if (!empty($background)) {
  $background = node_load($background);
}


//article
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

<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php
if (!empty($background->field_background_image['und']['0']['uri'])) {
  print_r(file_create_url($background->field_background_image['und']['0']['uri']));
}; ?>');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate mb-5 text-center">
        <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span>
          <span>Blog <i class="fa fa-chevron-right"></i></span></p>
        <h2 class="mb-0 bread">Blog</h2>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row d-flex">
      <?php foreach ($blog as $items): ?>
        <div class="col-lg-6 d-flex align-items-stretch ftco-animate">
          <div class="blog-entry d-md-flex">
            <a href="blog-single.html" class="block-20 img" style="background-image: url('<?php
            if (!empty(file_create_url($items->field_blog_image['und']['0']['uri']))) {
              print (file_create_url($items->field_blog_image['und']['0']['uri']));
            } ?>');">
            </a>
            <div class="text p-4 bg-light">
              <div class="meta">
                <p><span class="fa fa-calendar"
                         style="margin-bottom: 16px"></span> <?php print(date('d M Y', $items->created)); ?></p>
              </div>
              <h3 class="heading mb-3"><a
                  href="<?php print (drupal_get_path_alias('node/' . $items->nid)); ?>"><?php
                  if (!empty($items->title)) {
                    print($items->title);
                  } ?></a></h3>
              <p><?php if (!empty($items->body['und']['0']['safe_summary'])) {
                  print ($items->body['und']['0']['safe_summary']);
                } ?></p>
              <a
                href="<?php print (drupal_get_path_alias('node/' . $items->nid)); ?>"
                class="btn-custom">Continue <span class="fa fa-long-arrow-right"></span></a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="row mt-5">
      <div class="col text-center">
        <?php print(theme('pager', array('tags' => array()))); ?>
      </div>
    </div>
  </div>
</section>
<?php include('footer.inc'); ?>

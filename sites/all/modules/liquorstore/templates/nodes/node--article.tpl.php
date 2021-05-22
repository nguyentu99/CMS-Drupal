<?php
$background = variable_get('background');
if (!empty($background)) {
  $background = node_load($background);
}

//bài viết
$blog_categorys = taxonomy_get_tree(3, 0, NULL, FALSE);
$query = db_select('node', 'n');
$query->fields('n');
$query->condition('n.type', 'blog', '=');
$query->leftJoin('field_data_field_blog_type', 't', 't.entity_id = n.nid');
$query->fields('t');
$query->range(0,2);
$blog = $query->execute()->fetchAll();
foreach ($blog as $data) {
  $nids_blog[] = $data->nid;
}
$blog = node_load_multiple($nids_blog);
?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php if(!empty($background->field_background_image['und']['0']['uri'])){
  print (file_create_url($background->field_background_image['und']['0']['uri']));
}?>');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate mb-5 text-center">
        <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span class="mr-2"><a href="blog.html">Blog <i class="fa fa-chevron-right"></i></a></span> <span>Blog Single <i class="fa fa-chevron-right"></i></span></p>
        <h2 class="mb-0 bread">Blog Single</h2>
      </div>
    </div>
  </div>
</section>
<section class="ftco-section ftco-degree-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 ftco-animate">
        <p>
          <img src="<?php if(!empty($variables['article']->field_blog_image['und']['0']['uri'])){
            print (file_create_url($variables['article']->field_blog_image['und']['0']['uri']));
          }?>" alt="" class="img-fluid">
        </p>
        <p><?php if(!empty($variables['article']->body['und']['0']['value'])){
          print ($variables['article']->body['und']['0']['value']);
          }?></p>

        <div class="about-author d-flex p-4 bg-light">
          <div class="bio mr-5">
            <img src="<?php if(!empty($variables['article']->field_image_author['und']['0']['uri'])){
              print(file_create_url($variables['article']->field_image_author['und']['0']['uri']));
            }?>" alt="Image placeholder" class="img-fluid mb-4">
          </div>
          <div class="desc">
            <h3><?php if(!empty($variables['article']->field_author['und']['0']['value'])){
              print ($variables['article']->field_author['und']['0']['value']);
              }?></h3>
            <p><?php if(!empty($variables['article']->field_introduce_author['und']['0']['value'])){
              print ($variables['article']->field_introduce_author['und']['0']['value']);
              }?></p>
          </div>
        </div>
      </div> <!-- .col-md-8 -->
      <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
        <div class="sidebar-box">
          <form action="#" class="search-form">
            <div class="form-group">
              <span class="fa fa-search"></span>
              <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
            </div>
          </form>
        </div>

        <div class="sidebar-box ftco-animate">
          <div class="categories">
            <h3>Services</h3>
            <?php foreach ($blog_categorys as $blog_category): ?>
              <li><a href="/projects/liquorstore/product?tag=<?php print($blog_category->tid); ?>">
                  <?php print($blog_category->name) ?>
                  <span class="fa fa-chevron-right"></span></a></li>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="sidebar-box ftco-animate">
          <h3>Recent Blog</h3>
          <?php foreach ($blog as $items): ?>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4"
                 style="background-image: url(<?php if (!empty($items->field_blog_image['und']['0']['uri'])) {
                   print_r(file_create_url($items->field_blog_image['und']['0']['uri']));
                 } ?>);"></a>
              <div class="text">
                <h3 class="heading"><a
                    href="<?php print (drupal_get_path_alias('http://localhost:8888/projects/liquorstore/node/' . $items->nid)); ?>"><?php if (!empty($items->title)) {
                      print_r($items->title);
                    } ?></a></h3>
                <div class="meta">
                  <div><span class="fa fa-calendar"></span> <?php print_r(date('d/m/Y', $items->created)) ?></div>
                  <div><span class="fa fa-comment"></span> 19</div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="sidebar-box ftco-animate">
          <h3>Tag Cloud</h3>
          <div class="tagcloud">
            <?php foreach ($blog_categorys as $blog_category): ?>
              <a class="tag-cloud-link" href="/projects/liquorstore/product?tag=<?php print($blog_category->tid); ?>">
                  <?php print($blog_category->name) ?>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


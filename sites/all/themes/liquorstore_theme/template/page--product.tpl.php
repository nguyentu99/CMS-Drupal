<?php include('header.inc'); ?>
<?php
session_start();

$background = variable_get('background');
if (!empty($background)) {
  $background = node_load($background);
}


$product_categorys = taxonomy_get_tree(1, 0, NULL, FALSE);
//Sản phẩm
//tags
//field_tags_tid
$query = db_select('node', 'n');
$query->fields('n');
$query->condition('n.type', 'product', '=');
$query->leftJoin('field_data_field_tags', 't', 't.entity_id = n.nid');
$query->fields('t');
$query->extend('PagerDefault');
$query->range(0,2);
if (!empty($_GET['tag'])) {
  $query->condition('t.field_tags_tid', $_GET['tag'], '=');
}
$query = $query->extend('PagerDefault')->limit();
$product = $query->execute()->fetchAll();

foreach ($product as $data) {
  $nids_product[] = $data->nid;
}
$product = node_load_multiple($nids_product);


//Tin tức
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
} ?>');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate mb-5 text-center">
        <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span>
          <span>Products <i class="fa fa-chevron-right"></i></span></p>
        <h2 class="mb-0 bread">Products </h2>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="row mb-4">
          <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h4 class="product-select">Select Types of Products</h4>
            <form id="filterProduct" action="/projects/liquorstore/product">
              <select id="selecttag" class="selectpicker" name="tag">
                <?php foreach ($product_categorys as $product_category): ?>
                  <option
                    value="<?php print($product_category->tid); ?>"
                    <?php if ($_GET['tag'] && $_GET['tag'] == $product_category->tid) {
                    print('selected');
                  } ?> >
                    <?php print($product_category->name); ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </form>
          </div>
        </div>
        <div class="row">
          <?php foreach ($product as $items): ?>
            <div class="col-md-4 d-flex">
              <div class="product ftco-animate">
                <div class="img d-flex align-items-center justify-content-center" style="background-image: url('<?php
                if (!empty($items->field_product_image['und']['0']['uri'])) {
                  print_r(file_create_url($items->field_product_image['und']['0']['uri']));
                }
                ?>');">
                  <div class="desc">
                    <p class="meta-prod d-flex">
                      <a href="#" onclick="addCart(<?php print($items->nid);?>)" class="d-flex align-items-center justify-content-center"><span
                          class="flaticon-shopping-bag"></span></a>
                      <a href="#" class="d-flex align-items-center justify-content-center"><span
                          class="flaticon-heart"></span></a>
                      <a href="<?php print (drupal_get_path_alias('node/' . $items->nid)); ?>" class="d-flex align-items-center justify-content-center"><span
                          class="flaticon-visibility"></span></a>
                    </p>
                  </div>
                </div>
                <div class="text text-center">
                <span class="sale"><?php if (!empty($items->field_status['und']['0']['tid'])) {
                    print_r(taxonomy_term_load($items->field_status['und']['0']['tid'])->name);
                  } ?></span>
                  <span class="category"><?php
                    if (!empty($items->field_tags['und']['0']['tid'])) {
                      print_r(taxonomy_term_load($items->field_tags['und']['0']['tid'])->name);
                    }
                    ?> </span>
                  <h2><a style="color: #0b0b0b"
                         href="<?php print (drupal_get_path_alias('node/' . $items->nid)); ?>">
                      <?php if (!empty($items->title)) {
                        print_r($items->title);
                      } ?></a></h2>
                  <p class="mb-0"><span
                      class="price price-sale"><?php if (!empty($items->field_product_prime['und']['0']['value'])) {
                        print_r("$");
                        print_r($items->field_product_prime['und']['0']['value']);
                      } ?></span> <span
                      class="price">$<?php if (!empty($items->field_product_sale['und']['0']['value'])) {
                        print_r($items->field_product_sale['und']['0']['value']);
                      } ?></span></p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <?php print_r(liquorstore_theme());?>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="sidebar-box ftco-animate">
          <div class="categories">
            <h3>Product Types</h3>

            <ul class="p-0">
              <?php foreach ($product_categorys as $product_category): ?>
                <li><a href="/projects/liquorstore/product?tag=<?php print($product_category->tid); ?>">
                    <?php print($product_category->name) ?>
                    <span class="fa fa-chevron-right"></span></a></li>
              <?php endforeach; ?>
            </ul>
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
                    href="<?php print (drupal_get_path_alias('node/' . $items->nid)); ?>"><?php if (!empty($items->title)) {
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
      </div>
    </div>
  </div>
</section>
<script>
    function addCart(nid){
        $.post("Card.php",{'nid':nid}, function (data, status) {

        })
    };
</script>
<?php include('footer.inc') ?>

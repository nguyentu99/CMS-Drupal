<?php include 'header.inc';?>
<div id="main-container">
  <!-- Content Header (Page header) -->
  <section class="content-header page-breadcrumb">
    <div class="container  content-header-container page-breadcrumb-container">
      <div id="breadcrumb">
        <?php if (!empty($breadcrumb)): ?>
          <?php print $breadcrumb; ?>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <!-- Main content -->
  <section class="content ">
    <div id="content" class="clearfix">
      <?php if ($messages): ?>
        <div id="console" class="clearfix"><?php print $messages; ?></div>
      <?php endif; ?>
      <?php if ($tabs): ?>
        <div class="tabs">
          <?php print render($tabs); ?>
        </div>
      <?php endif; ?>
      <?php print (render($page['content'])); ?>
    </div>
  </section>
  <!-- /.content -->
</div>





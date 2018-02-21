<div class="header-w3-agileits" id="home">
  <div class="inner-header-agile">
    <nav class="navbar navbar-default">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <h1><a href="<?php print $front_page; ?>"><span class="letter">D</span>r. <span>H</span>emant</a></h1>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <?php
      $main_menu_tree = menu_tree_all_data('main-menu');
      $main_menu_expanded = menu_tree_output($main_menu_tree);
      print drupal_render($main_menu_expanded);
      ?>
      </div>
      <div class="clearfix"> </div>
    </nav>
  </div>
</div>

<div class="padding-inner-page">
  <div class="container">
    <?php if (!empty($breadcrumb)):
    print $breadcrumb;
    endif;?>

    <?php print $messages; ?>
    <?php if (!empty($tabs)): ?>
      <?php print render($tabs); ?>
    <?php endif; ?>
    <?php if (!empty($page['help'])): ?>
      <?php print render($page['help']); ?>
    <?php endif; ?>
    <?php if (!empty($action_links)): ?>
      <ul class="action-links"><?php print render($action_links); ?></ul>
    <?php endif; ?>

    <div class="padding-inner-page-main">
      <div class="padding-inner-page-top">
        <?php if (!empty($title)): ?>
          <h2><?php print $title; ?></h2>
          <span class="heading-line"> </span>
        <?php endif; ?>
      </div>
      <div class="padding-inner-page-bottom">
        <?php print render($page['content']); ?>
      </div>
    </div>
  </div>
</div>

<?php if (!empty($page['top_info'])): ?>
  <div class="top_info">
    <?php print render($page['top_info']); ?>
  </div>
<?php endif; ?>

<?php if (!empty($page['staff'])): ?>
  <div class="staff">
    <?php print render($page['staff']); ?>
  </div>
<?php endif; ?>

<?php if (!empty($page['footer'])): ?>
  <footer class="footer">
    <?php print render($page['footer']); ?>
    <div class="lastupdated col-md-12">
      <?php print get_node_last_update(); ?>
    </div>
  </footer>
<?php endif; ?>


<a href="#" id="toTop" style="display: block;"><span id="toTopHover"></span>To Top</a>

<?php if(strpos(current_path(),'resultspdf') === false){ ?>
  <script type="text/javascript" src="./sites/all/themes/drhemant/js/jquery.swipebox.min.js"></script>
  <script>
    jQuery(".swipebox").swipebox();
  </script>

<?php } ?>

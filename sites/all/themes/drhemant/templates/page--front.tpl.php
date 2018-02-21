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
        <?php print get_site_last_update(); ?>
    </div>
</footer>
<?php endif; ?>

<a href="#" id="toTop" style="display: block;"><span id="toTopHover"></span>To Top</a>
<script type="text/javascript" src="./sites/all/themes/drhemant/js/jquery.zoomslider.min.js"></script>
<script type="text/javascript" src="./sites/all/themes/drhemant/js/jquery.swipebox.min.js"></script>
<script>
	jQuery(".swipebox").swipebox();
</script>

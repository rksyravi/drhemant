<div id="demo-1" data-zs-src='[<?php
$count = count($rows)-1;
foreach ($rows as $i=>$row){
    if($i < $count){
        $comma = ', ';
    }else{
        $comma = '';
    }
    print $row[uri].$comma;
};?>]' data-zs-overlay="dots">
		<div class="demo-inner-content">
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
                            $menu = menu_tree('main-menu');
                            print render($menu);
                            ?>
						</div>
						<div class="clearfix"> </div>	
					</nav>
				</div> 
			</div>

			<?php
            $block = block_load('block', '3');
            $block = _block_get_renderable_array(_block_render_blocks(array($block)));
            $output = drupal_render($block);
            print $output;
            ?>	
		</div> 
	</div>
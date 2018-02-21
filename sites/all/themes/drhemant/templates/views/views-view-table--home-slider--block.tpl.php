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
		<?php
		$block = block_load('block', '3');
		$block = _block_get_renderable_array(_block_render_blocks(array($block)));
		$output = drupal_render($block);
		print $output;
		?>	
	</div> 
</div>
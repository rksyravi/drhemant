<section class="portfolio-w3ls" id="gallery">
    <?php foreach ($rows as $i=>$row){ ?>
    <div class="col-md-3 col-xs-3 gallery-grid gallery1">
		<a href="<?php print $row['uri']; ?>" class="swipebox"><img src="<?php print $row['uri']; ?>" class="img-responsive" alt="/">
            <div class="textbox">
                <h4>scholarly</h4>
                <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
            </div>
		</a>
	</div>
    <?php } ?>
    <div class="clearfix"> </div>
</section>
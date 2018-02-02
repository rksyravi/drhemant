<div class="testimonials w3ls-section" id="team">
		<div class="container">
			<h3 class="w3ls-title"><?php print check_plain($view->get_title()); ?></h3>
			<div class="w3_testimonials_grids w3_testimonials_grids">
				<div id="owl-demo" class="owl-carousel"> 
                <?php foreach($rows as $row){ ?>
					<div class="item w3_agileits_testimonials_grid">
						<div class="about-poleft t2">
							<div class="about_img">
								<img src="<?php print $row['uri']; ?>" alt=" " class="img-responsive" />
								<h5><?php print $row['title']; ?></h5>
								<div class="about_opa">
									<p>Senior Lecturers</p>
									<ul class="fb_icons2 text-center">
										<li><a class="fa fa-facebook" href="#"></a></li>
										<li><a class="fa fa-twitter" href="#"></a></li>
										<li><a class="fa fa-google" href="#"></a></li>
										<li><a class="fa fa-linkedin" href="#"></a></li>
										<li><a class="fa fa-pinterest-p" href="#"></a></li>
									</ul>
								</div>
							</div>
						</div>
						
					</div>
                <?php } ?>
				</div>
			</div>
		</div>
	</div>
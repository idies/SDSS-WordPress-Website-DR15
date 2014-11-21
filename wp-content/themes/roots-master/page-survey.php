<?php get_template_part('templates/page', 'header'); ?>
<!-- Begin Carousel -->
<div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- Wrapper for slides -->
	<div class="carousel-inner">
		<div class="item active">
			<img src="/wp-content/uploads/2014/04/boss.png" alt="" />
		<div class="flex-caption">
		The Baryon Oscillation Spectroscopic Survey (BOSS) focuses on mapping the Universe on the largest scales, creating the largest volume three-dimensional map of galaxies ever created.
		</div>
		</div>
		<!-- End Item -->
		<div class="item"><img src="/wp-content/uploads/2014/04/apogee.png" alt="apogee" class="img-responsive" />
		<div class="flex-caption">
		The Apache Point Observatory Galactic Evolution Experiment (APOGEE), focusing on the structure and evolution of our own Milky Way galaxy.
		</div>
		</div>
		<!-- End Item -->
		<div class="item"><img src="/wp-content/uploads/2014/04/segue.png" alt="segue" class="img-responsive" />
		<div class="flex-caption">
		The Sloan Extension for Galactic Understanding and Exploration 2 (SEGUE-2) focus on the structure and evolution of our own Milky Way galaxy.
		</div>
		</div>
		<!-- End Item -->
		<div class="item"><img src="/wp-content/uploads/2014/04/marvels.png" alt="marvels" class="img-responsive" />
		<div class="flex-caption">
		The Multi-Object APO Radial Velocity Exoplanet Large-area Survey (MARVELS) searches very nearby stars for evidence of “exoplanets” surrounding them.
		</div>
		</div>
		<!-- End Item -->
		<div class="item"><img src="http://placehold.it/1200x400&text=MaNGA%20IMG" alt="MaNGA" class="img-responsive" />
		<div class="flex-caption"> 
		Public neuroscience databases to facilitate statistical inference in EM and MR neural imaging data, for analysis of functional and structural connectivity brain-graphs.
		</div>
		</div>
		<!-- End Item -->
	</div>
	<!-- End Carousel Inner -->
		<ul class="nav nav-pills nav-justified">
		  <li class="active" data-target="#myCarousel" data-slide-to="0"><a href="#">BOSS</a></li>
		  <li data-target="#myCarousel" data-slide-to="1"><a href="#">APOGEE</a></li>
		  <li data-target="#myCarousel" data-slide-to="2"><a href="#">SEGUE</a></li>
		  <li data-target="#myCarousel" data-slide-to="3"><a href="#">MARVELS</a></li>
		  <li data-target="#myCarousel" data-slide-to="4"><a href="#">MaNGA</a></li>
		</ul>
</div>
<!-- End Carousel -->

<script type="text/javascript">
$(document).ready( function() {
    $('#myCarousel').carousel({
    	interval:   4000
	});
	var clickEvent = false;
	$('#myCarousel').on('click', '.nav-pills a', function() {
			clickEvent = true;
			$('.nav-pills li').removeClass('active');
			$(this).parent().addClass('active');		
	}).on('slid.bs.carousel', function(e) {
		if(!clickEvent) {
			var count = $('.nav-pills').children().length -1;
			var current = $('.nav-pills li.active');
			current.removeClass('active').next().addClass('active');
			var id = parseInt(current.data('slide-to'));
			if(count == id) {
				$('.nav-pills li').first().addClass('active');	
			}
		}
		clickEvent = false;
	});
});
</script>
<?php get_template_part('templates/content', 'page'); ?>
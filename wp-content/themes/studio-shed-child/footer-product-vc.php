
<style>
/*footer */
.footerss-choose {
	border-bottom: #999999 1px solid;
	text-align: center;

}
.footer-subscribe.footerss-choose h3, .footerss-more h3 {
    color: #e25d00;
    text-align: center;
    margin-bottom: 25px;
	    font-size: 1.3em;
	font-family: "Futura-PT-Heavy";
}
.footerss-choose button {
	    border: solid #ffffff 2px;
    letter-spacing: 1px;
    /* text-shadow: 0px 0px 1px #000000; */
    color: #fff;
    background-color: #ffa544;
    font-size: 16px;
    padding: 15px 43px;
    min-width: 220px;
    text-transform: uppercase;
	box-shadow: 0 0 12px 0 #999;
	margin: 10px 0 0 0;


}	
	.footerss-choose .call-us {
    margin: 20px;
    text-transform: uppercase;
    font-size: 1.4em;
		color: #000;
	}

.footerss-more {
    padding: 70px 0;
}
	
.footerss-more h3 a {
    text-transform: none;
	font-family: "Futura-PT-book";
    text-decoration: underline;
    margin: 50px 0 0 0;

}
.footerss-more img {
		width: 100%;
	}	
	
.footerss-more h4 {
    text-align: center;
	font-family: "Futura-PT-Heavy";
    margin-top: 25px;
}
	

</style>
<footer id="footer" class="myfooter">
	<div class="footer-subscribe footerss-choose">
			<div class="container">

		<div class="row">
			<div class="col-sm-12">
				<h3>Choose the Perfect Shed</h3>
					<p>Whether you need a home office storage space, guest studio, or backyard retreat, we've got the perfect Studio Shed for your needs. CHoose from our quick turnaround pre-configured selections, or design your own prefab backyard room in our 3D Design Studio.</p>
				
							<button class="vce-button--style-basic">Build &amp; Price</button>
				<div class="call-us">CALL US: 1-888-900-3933</div>

			</div>
			
				</div>
		</div>
	</div>
	<div class="footerss-more">
		<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<h3>More Shed Stories</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-md-4">
				
				

				
				<?php if(strpos($_SERVER['REQUEST_URI'], 'man-cave') !== false):?>

				<img src="/wp-content/uploads/2020/01/the-artist-houseofboysdesign-791x525.png" alt="studio shed Art and Music Studio"/><br/>					
				<h4>Creative Sheds</h4>	
				<p>A Studio Shed is your creative sanctuary, just steps from your back door.</p>
				<?php else: ?> 
							 
<img src="/wp-content/uploads/2018/05/ODonnell_Studio-791x525.jpg" alt="studio shed Man Cave"/><br/>
				<h4>Man Cave</h4>
				<p>Design the ultimate Man Cave with Studio Shed. The perfect place to get away after a long day that is still just right outside your back door.</p>
							 
				<?php endif; ?>
							</div>
			<div class="col-sm-12 col-md-4">
								<?php if(strpos($_SERVER['REQUEST_URI'], 'home-office-spaces') !== false):?>

				<img src="/wp-content/uploads/2020/01/the-artist-houseofboysdesign-791x525.png" alt="studio shed Art and Music Studio"/><br/>					
				<h4>Creative Sheds</h4>	
				<p>A Studio Shed is your creative sanctuary, just steps from your back door.</p>
				<?php else: ?> 
				<img src="/wp-content/uploads/2015/02/Office-3-791x525.jpg" alt="studio shed Home Office"/><br/>
				<h4>Home Office Spaces</h4>
				<p>Our modern world requires that we work in new ways. A Studio Shed backyard office is a place you can commute to in seconds, without the distractions of an office in your home.</p>
				<?php endif; ?>
			</div>
			<div class="col-sm-12 col-md-4">
				
				<?php if(strpos($_SERVER['REQUEST_URI'], 'music-studios') !== false):?>

				<img src="/wp-content/uploads/2020/01/the-artist-houseofboysdesign-791x525.png" alt="studio shed Art and Music Studio"/><br/>					
				<h4>Creative Sheds</h4>	
				<p>A Studio Shed is your creative sanctuary, just steps from your back door.</p>
				<?php else: ?> 
				<img src="/wp-content/uploads/2015/02/Music-Art-3-791x525.jpg" alt="studio shed"/><br/>
				<h4>Music Studios</h4>
				<p>We all need a place to play. A Studio Shed is your home music studio, just steps from your back door.</p>
				<?php endif; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-md-12">

			<h3><a href="/shed-stories/">See all Shed Stories</a></h3>
				

			</div>
			

		</div>
	
	</div>
	</div>
</footer>


       


<?php get_footer('new-vc'); ?>

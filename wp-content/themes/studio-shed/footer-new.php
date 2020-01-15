<div class="footer">
			<footer>
				<div class="footer-content">
					<div class="info">
						<!--<h3>Studioshed<sup>TM</sup></h3>-->
						<img src='<?php echo get_template_directory_uri() ?>/assets/images/logo-white2.png'/>
						<?php dynamic_sidebar('contact_footer_new'); ?>
					</div>
					<div class="footer-link">
						<h3>Useful Links</h3>
						<ul>
							<?php 
								$footer = wp_get_nav_menu_items(15);
								foreach ($footer as $child):
							?>
								<li><a href="<?php echo $child->url;?>"><?php echo $child->post_title;?></a></li>	
							<?php
								endforeach; 
							?>
						</ul>
					</div>
				</div>
				<div class="footer-reserved">
					<p class="reserved">© <?php echo date('Y');?> STUDIO SHED. All rights Reserved</p>
					<div class="social-icon">
						<ul>
							<?php dynamic_sidebar('social_new'); ?>
						</ul>
					</div>					
				</div>
			</footer>			
		</div>

<?php wp_footer(); ?>

</body>
</html>
<footer class="footer">
	<div class="top-footer">
		<div class="tf-container">
			<div class="row">
				<div class="col-lg-2 col-md-4">
					<div class="footer-logo">
						<img src="<?php echo GT_IMAGES ?>/logo.svg" alt="images" />
					</div>
				</div>
				<div class="col-lg-10 col-md-8">
					<div class="wd-social d-flex aln-center">
						<span>Follow Us:</span>
						<ul class="list-social d-flex aln-center">
							<li>
								<a href="<?php echo get_option('facebook_url') ?>"><i class="icon-facebook"></i></a>
							</li>
							
							<li>
								<a href="<?php echo get_option('youtube_url') ?>"><i class="icon-youtube"></i></a>
							</li>
							<li>
								<a href="<?php echo get_option('instagram_url') ?>"><i class="icon-instagram1"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="inner-footer">
		<div class="tf-container">
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="footer-cl-1">
						<div class="icon-infor d-flex aln-center">
							<div class="icon">
								<span class="icon-call-calling"><span class="path1"></span><span
										class="path2"></span><span class="path3"></span><span
										class="path4"></span></span>
							</div>
							<div class="content">
								<p>Need help? 24/7</p>
								<h6><a href="tel:0123456678"><?php echo get_option('contact_number') ?></a></h6>
							</div>
						</div>
						<p>
							
						</p>
						<div class="ft-icon">
							<i class="icon-map-pin"></i> 
							<span><?php echo get_option('address') ?></span>
						</div>
						
						
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-6">
					<div class="footer-cl-2">
						<h6 class="ft-title">Quick Links</h6>
						<?php wp_nav_menu(array('theme_location' => 'functions.php')) ?>
						<!-- <ul class="navigation-menu-footer">
							<li><a href="find-jobs-list.html">Job Packages</a></li>
							<li><a href="find-jobs-list.html">Post New Job</a></li>
							<li><a href="find-jobs-list.html">Jobs Listing</a></li>
							<li><a href="find-jobs-list.html">Jobs Style Grid</a></li>
							<li><a href="employers-list.html">Employer Listing</a></li>
							<li>
								<a href="employers-grid-fullwidth.html">Employers Grid</a>
							</li>
						</ul> -->
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-6">
					<div class="footer-cl-3">
						<h6 class="ft-title">For Talent</h6>
						
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-6">
					<div class="footer-cl-4">
						<h6 class="ft-title">For Recruiters</h6>
						
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-6">
					<div class="footer-cl-5">
						<h6 class="ft-title">Download App</h6>
						<ul class="ft-download">
							<li>
								<a href="<?php echo get_option('google_store_link') ?>"><img src="<?php echo GT_IMAGES ?>/review/btn3.png" alt="images" /></a>
							</li>
							<li>
								<a href="<?php echo get_option('apple_store_link') ?>"><img src="<?php echo GT_IMAGES ?>/review/btn4.png" alt="images" /></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="bottom">
		<div class="tf-container">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="bt-left">
						<div class="copyright">
							© <?php echo date('Y');?> GoTalent. All Rights Reserved.
						</div>
						
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<ul class="menu-bottom d-flex aln-center">
						<li><a href="term-of-use.html">Terms Of Services</a></li>
						<li><a href="pricing.html">Privacy Policy</a></li>
						<li><a href="contact-us.html">Cookie Policy</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>
</div>

<?php wp_footer(); ?>

</body>

</html>

<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Footer Template
 *
 *
 * @file           footer.php
 * @package        Datatrak
 * @author         Andrew Nida
 * @copyright      2014 Fig Company
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/datatrak/index.php
 * @since          available since Release 1.0
 */
?>
		<div id="footer-widget" class="group">
			<?php if( is_active_sidebar( 'footer-widget' ) ) : ?>

				<?php dynamic_sidebar( 'footer-widget' ); ?>

			<?php endif; //end of colophon-widget ?>
		</div><!-- end of #footer-widget -->
	</div>
	<div id="footer">
		<nav id="sitemap">
			<ul class="main">
				<li>
					<a class="main-cat" href="#">COMPANY</a>
					<ul class="sub">
						<li><a href="#">ABOUT DATATRAK</a></li>
						<li><a href="#">MANAGEMENT TEAM</a></li>
						<li><a href="#">BOARD OF DIRECTORS</a></li>
						<li><a href="#">RESOURCES</a></li>
						<li><a href="#">CAREERS</a></li>
						<li><a href="#">INVESTORS</a></li>
						<li><a href="#">BLOG</a></li>
						<li><a href="#">CONTACT</a></li>
					</ul>
				</li>
				<li>
					<a class="main-cat" href="#">SOLUTIONS</a>
				</li>
				<li>
					<a class="main-cat" href="#">PRODUCTS</a>
					<ul class="sub">
						<li><a href="#">uCTMS&#0153;</a></li>
						<li><a href="#">uDesign&#0153;</a></li>
						<li><a href="#">uEDC&#0153;</a></li>
						<li><a href="#">uIRT&#0153;</a></li>
						<li><a href="#">uPRO&#0153;</a></li>
						<li><a href="#">uSAFETY&#0153;</a></li>
						<li><a href="#">uTRAIN&#0153;</a></li>
					</ul>
				</li>
				<li>
					<a class="main-cat" href="#">SERVICES</a>
					<ul class="sub">
						<li><a href="#">DATATRAK Clinical &amp; Consulting Services</a></li>
						<li><a href="#">Training</a></li>
						<li><a href="#">Support</a></li>
						<li><a href="#">Learning Center</a></li>
						<li><a href="#">Hosting</a></li>
						<li><a href="#">Standards</a></li>
					</ul>
				</li>
				<li>
					<a class="main-cat" href="#">PARTNERS</a>
					<ul class="sub">
						<li><a href="#">CRO Connect Partners</a></li>
						<li><a href="#">Technology Connect Program</a></li>
						<li><a href="#">Strategic Partners</a></li>
					</ul>
				</li>
			</ul>
		</nav>
		<?php if ( function_exists('cn_social_icon') ) echo cn_social_icon(); ?>
	</div>
<?php wp_footer(); ?>
</body>
</html>
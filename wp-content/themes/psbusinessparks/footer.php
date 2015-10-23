
<footer class="greyed">
	<section class="bottom-menu-connect">
		<div class="wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12">
						<div class="bottom-bordered">
							<div class="row">
								<div class="col-xs-12 col-sm-6">
									<div class="columns bottom-menu">
										<?php
										$defaults = array(
											'container'       => 'div',
											'menu_class'      => 'menu',
											'echo'            => true,
											'fallback_cb'     => 'wp_page_menu',
											'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
											'depth'           => 0,
											'menu'			  => 'Menu Footer'
										);

										wp_nav_menu( $defaults );
										?>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6">
									<div class="columns connect">
										<p>Connect with us: <a href="javascript:;" class="socials twitter" alt="twitter"></a> <a href="javascript:;" class="socials facebook" alt="facebook"></a> <a href="javascript:;" class="socials youtube" alt="youtube"></a></p>
										<p>Sign up for our newsletter &amp; special offers in your area:</p>
									</div>
									<?=do_shortcode( '[gravityform id="4" title="false" description="false" ajax="true"]' )?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-notes">
					<div class="clearfix">
						<span class="copyright">&copy; 2015 PS Business Parks, Inc. All rights reserved.</span>
						<?php
						$defaults = array(
							'container'       => 'div',
							'menu_class'      => 'menu',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
							'menu'			  => 'Menu Footer 2'
						);

						wp_nav_menu( $defaults );
						?>
					</div>
					<p>
						<?=get_field('address', 'option')?>&nbsp;&nbsp;&nbsp;&nbsp;T&nbsp;&nbsp;<?=get_field('phone', 'option')?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;F&nbsp;&nbsp;<?=get_field('fax', 'option')?> <br>
						PS Business Parks , Inc. (NYSE:PSB) is a publicly traded Real Estate Investment Trust (REIT) specializing in leasing commercial multi-tenant <br>flex, office and industrial space throughout the United States with locations in California, Florida, Maryland, Texas, Virginia and Washington.
					</p>
				</div>
			</div>
		</div>
	</section>

</footer>

<?php wp_footer(); ?>

</body>
</html>
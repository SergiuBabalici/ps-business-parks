<?php

get_header();

$header_image = get_field('header_image', 'option');

?>
<section class="page-image" style="background-image: url('<?=$header_image['url']?>');">
	<div class="wrapper">
		<div class="container-fluid">
			<div class="finder">
				<div class="row">
					<div class="col-xs-12 text-center">
						<h1>Find your new business or office space</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<form class="form-inline" method="get" action="/search-locations/">
							<div class="form-inputs">
								<div class="form-group">
									<select  class="selectpicker" name="type">
										<option value="" disabled selected style='display:none;'>Property type</option>
										<?php
										$property_type = get_all_terms('property_type');
										foreach ( $property_type as $key =>$value ){
											?>
											<option value="<?= $value->slug ?>"><?= $value->name ?></option>
											<?php
										}
										?>
									</select>
								</div>
								<div class="form-group">
									<label class="sr-only" for="cityOrZipCode">City, state, or zip code</label>
									<input type="text" id="cityOrZipCode" name="locations" class="form-control" placeholder="City, state, or zip code">
								</div>
							</div>
							<button type="submit" class="btn red-btn"><b>Find properties</b></button>
						</form>
					</div>
				</div>
				<div class="row">
					<?php
					foreach ( get_all_terms( "state", 0 ) as $key => $value ) {
						?>
						<div class="hidden-xs col-sm-3 columns">
							<?php
							foreach ( get_all_terms( "state", $value->term_id ) as $key_term => $value_term ) {
								?>
								<p><?= $value_term->name ?></p>
								<?php
							}
							?>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php //Our business is helping your business grow ?>
<section class="statistics">
	<div class="wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 text-center">
					<h2 class="section-title"><?=get_field('title_block', 'option')?></h2>
					<h2  class="subtitle"><?=html_entity_decode(get_field('block_description', 'option'))?></h2>
				</div>
			</div>

			<div class="row">
				<?php
				$our_bussiness = get_field('our_bussiness_is_helping', 'option');

				foreach ( $our_bussiness as $values ) {
				?>
					<div class="col-xs-6 col-sm-3 columns">
						<div class="icon-holder">
							<img src="<?=$values['icon']['url']?>" alt="map">
						</div>
						<p class="big-number blue"><b><?=$values['first_title']?> <span><?=$values['second_title']?></span></b></p>
						<h3><?=$values['desctiption']?></h3>
					</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>
</section>

<?php ////TESTIMONIALS ?>
<?php include ( get_template_directory()."/inc/blocks/testimonials.php" ); ?>

<?php //CUSTOMER STORIES ?>
<section class="stories">
	<div class="wrapper">
		<div class="container-fluid">
			<div>
				<div class="col-md-8 col-md-offset-2 text-center">
					<p class="section-title">Getting your business on solid ground</p>
				</div>
				<div class="col-md-2 red-link header-link">
					<a href="javascript:;"><b>View all stories</b> <span class="arrow"></span></a>
				</div>
			</div>
			<div class="row">
				<?php
				$customer_stories = get_custom_post_type ( "customer-storie", 3 );
				if ( $customer_stories ) {
					foreach ( $customer_stories->posts as $post ) {
						?>
						<div class="col-xs-12 col-sm-4 columns">
							<div class="image-holder">
								<?php
								if (has_post_thumbnail( $post->ID ) ) {
									$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array( 320, 196 ) );
									echo "<img src='" . $image[0] . "'>";
								}
								?>
							</div>
							<p class="title"><b><?=$post->post_title?></b></p>
							<p><?=$post->post_content?></p>
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>
	</div>
</section>


<?php //Investor information ?>
<section class="investor greyed">
	<div class="wrapper">
		<div class="container-fluid">
			<div>
				<div class="col-xs-12 text-center">
					<h2 class="section-title">Investor information</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-4 columns">
					<h3 class="subtitle">
						<b>Dignissium vel consectur orci</b><br>
					</h3>
					<a href="javascript:;" class="red-link"><b>Learn more </b><span class="arrow"></span></a>
					<p>Suspendisse ut arcu sed purus suscipit ultrices quis ut quam. Aenean eleifend arcu ex. Nam justo neque, dignissim vel consect etur et, sollicitudin vel orci. Ut in blandit odio. Nam nibh mi, vulputate a lacus non vestage amet egestas. </p>
				</div>
				<div class="col-xs-6 col-sm-4 columns">
					<div class="recent-news">
						<p class="title">
							<b>Recent news releases</b><br>
						</p>
						<a href="javascript:;" class="red-link"><b>View All </b><span class="arrow"></span></a>

						<?php
						$news = get_custom_post_type ( "news", 1 );
						foreach ( $news->posts as $values ) {
							?>
							<p>
								<?=strtoupper(date("F j, Y", strtotime($values->post_date)))?> <br>
								<a href="javascript:;" class="cyaned"><?=$values->post_title?></a>
							</p>
							<?php
						}
						?>
					</div>
					<div class="downloadable">
						<p class="title"><b>Downloadable documents</b></p>
						<div class="table">
							<?php
							echo get_field('title_(_downloadable_documents_)', 'option');
							$list_file = get_field('list_downloadable_documents', 'option');

							foreach ( $list_file as $values ) {
								?>
								<div class="table-row">
									<div class="table-cell">
										<a href="<?=$values['file']?>" target="_blank" class="table-cell"><img src="<?=get_template_directory_uri()?>/images/download.png" alt=""></a>
									</div>
									<div class="table-cell">
										<a href="<?=$values['file']?>" target="_blank" class="cyaned"><b><?=$values['title']?></b></a><br>
										<?=$values['description']?>
									</div>
								</div>
								<?php
							}
							?>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-sm-4 columns">
					<div class="info">
						<div class="title"><b>PS BUsiness parks inc</b></div>
						<div class="table">
							<div class="table-row">
								<div class="table-cell">NYSE:</div>
								<div class="table-cell"><b>PSB</b></div>
							</div>
							<div class="table-row">
								<div class="table-cell">DATE:</div>
								<div class="table-cell"><?=$yahoo_finance['LastTradeTime']?> EDT</div>
							</div>
							<div class="table-row">
								<div class="table-cell">PRICE:</div>
								<div class="table-cell price price-up"><b><?=$yahoo_finance['LastTradePriceOnly']?></b></div>
							</div>
							<div class="table-row">
								<div class="table-cell">%&nbsp;change:</div>
								<div class="table-cell"><b><?=$yahoo_finance['LastTradeDateValue']?></b></div>
							</div>
						</div>
					</div>
					<div class="get-updates-quickly">
						<div>
							<p>Get updates quickly</p>
							<p class="small">Sign up for email notification of news releases.</p>
							<button type="button" class="btn red-btn small-btn">Sign Up for investor news</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="join-faqs">
	<div class="wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="columns join-team bordered-column">
						<p class="title">
							<b>Join our team</b>
						</p>
						<p>Aenean eleifend arcu ex. Nam justo neque, dign issim vel consect etur et, sollicitu din vel orci amet sit. Ut in blandit odio nam nibh mi.</p>
						<a href="javascript:;" class="red-link"><b>Join our team </b><span class="arrow"></span></a>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 ">
					<div class="columns faqs bordered-column">
						<p class="title">
							<b>FAQs</b>
						</p>
						<p>Aenean eleifend arcu ex. Nam justo neque, dignissim vel consect etur et, sollicitudin vel orci amet sit aenean eleifend arcu ex.</p>
						<a href="javascript:;" class="red-link"><b>Frequently asked questions</b><span class="arrow"></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
include ( get_template_directory()."/inc/blocks/schedule-section.php" );
?>

<?php get_footer(); ?>

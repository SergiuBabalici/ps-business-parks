<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body <?php body_class(); ?>>

<header>
	<div class="top-bar"></div>


	<div class="wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<a href="<?=home_url()?>"><img src="<?=get_template_directory_uri()?>/images/logo.jpg" width="310" height="44" alt="PSBusinessParks"></a>
					<div class="pull-right schedule-content-block">
						<span>CALL US <strong><?=get_field('phone', 'option')?></strong></span>
						<button type="button" class="btn red-btn" class="btn red-btn" data-placement="bottom" data-popover-content=".schedule-step1" data-toggle="popover" tabindex="0">Schedule a Walk-through</button>
						<?php include ( "inc/blocks/scheduler.php" ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<nav class="nav">
		<div class="menu-bg"></div>
		<div id="nav-icon">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
		<div class="nav-holder  clearfix">
			<div class="submenu-reference">
				<?php
				$defaults = array(
					'container'       => 'div',
					'menu_class'      => 'menu',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 0,
					'menu'			  => 'Menu Header'
				);

				wp_nav_menu( $defaults );

				$yahoo_finace_header = get_yahoo_finance_header ();
				?>

				<p class="cet-time">
					NYSE: <?=$yahoo_finace_header['LastTradeDate']?> at <?=$yahoo_finace_header['LastTradeTime']?> ET
					<span class="exchange"><span class="icon-triangle-<?=$yahoo_finace_header['PercentChange']?>"></span><b><?=$yahoo_finace_header['LastTradePriceOnly']?></b></span>
				</p>

			</div>
		</div>
	</nav>
</header>
<?php

//debug($wp_query->query_vars['state_slug']);

//breadcrumb();

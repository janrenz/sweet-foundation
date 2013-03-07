<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->

<head>
<meta charset="utf-8">

<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?>
</title>

<!-- Google Chrome Frame for IE -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<!-- mobile meta (hooray!) -->
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- icons & favicons (for more: http://themble.com/support/adding-icons-favicons/) -->

<!-- For third-generation iPad with high-resolution Retina display: -->
<link rel="apple-touch-icon-precomposed" sizes="144x144"
	href="<?php bloginfo('stylesheet_directory'); ?>/images/favicons/apple-touch-icon-144x144-precomposed.png">
<!-- For iPhone with high-resolution Retina display: -->
<link rel="apple-touch-icon-precomposed" sizes="114x114"
	href="<?php bloginfo('stylesheet_directory'); ?>/images/favicons/apple-touch-icon-114x114-precomposed.png">
<!-- For first- and second-generation iPad: -->
<link rel="apple-touch-icon-precomposed" sizes="72x72"
	href="<?php bloginfo('stylesheet_directory'); ?>/images/favicons/apple-touch-icon-72x72-precomposed.png">
<!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
<link rel="apple-touch-icon-precomposed"
	href="<?php bloginfo('stylesheet_directory'); ?>/images/favicons/apple-touch-icon-precomposed.png">
<!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->

<link rel="shortcut icon"
	href="<?php bloginfo('stylesheet_directory'); ?>/images/favicons/favicon.ico"
	type="image/x-icon" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>-->
<!-- wordpress head functions -->
<?php wp_head(); ?>
<!-- end of wordpress head -->



</head>

<body <?php body_class(); ?>>


	<div id="container">

		<header class="header">
			<?php 
			
			if (get_option( 'display_top_bar', 1 ) == 1)
			{
				?>
				

				<?php 
				//get topbar classes
				//fixed contain-to-grid
				$sweet_foundation_topbar_classes = array();
				$sweet_foundation_topbar_classes[] = 'contain-to-grid';
		
				if (get_option( 'topbar_is_fixed', 1 ) == 1)
				{
					$sweet_foundation_topbar_classes[] = 'fixed';
				}
				if (get_option( 'topbar_is_sticky', 1 ) == 1)
				{
					$sweet_foundation_topbar_classes[] = 'sticky';
				}
				?>
				<?php 
				if (get_option( 'topbar_is_on_top', false ) )
				{
					?>
			<div class="top-bar-wrapper <?php echo implode($sweet_foundation_topbar_classes, ' ');?>">
			
					<nav class="container top-bar">

						<ul class="title-area">
							<li class="name">
								<!-- to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> -->

								<h1>
									<a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?>
									</a>
								</h1>


							</li>
							<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span>
							</a></li>

						</ul>
						<section class="top-bar-section">

							<?php // sf_topbarleft_nav(); ?>

							<ul class="right">
								<?php sf_topbarright_nav(); ?>
								<?php 	if  (get_option ( 'hide_topbar_search' )  != 1){ ?>
								<li class="divider"></li>
								<li class="search">
									<form role="search" method="get" id="searchform"
										action="<?php echo home_url( '/' ); ?>">
										<input type="text" placeholder="<?php echo __('Search')?>"
											value="" id="s" name="s">


									</form>
								</li>
								<?php } ?>
							</ul>
						</section>

					</nav>
				</div>
				<?php } ?>
			<?php } ?>

			<?php  

			if (
					(is_front_page() && get_option( 'display_header_area_on_frontpage', 1 ) == 1)
					||
					(!is_front_page() &&  get_option( 'display_header_area_on_subpages', 1 ) == 1)){
				?>
			<!--header-->
			<div class="full-width header-wrapper">

				<div class="row">
					<div class="large-12 columns">
						<h1 id="site-title" class="header-name">
							<span><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
								title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
								rel="home"><?php bloginfo( 'name' ); ?> </a> </span>
						</h1>
						<h4 id="site-description" class="header-description">
							<?php bloginfo( 'description' ); ?>
						</h4>


					</div>
				</div>
			</div>
			<!-- header end -->
			<?php } ?>


			<!-- if you'd like to use the site description you can un-comment it below -->
			<!-- end #inner-header -->

		</header>
		<!-- end header -->
		<?php 
		if (get_option( 'topbar_is_on_top', false ) == false)
		{
			?>
			<div class="row"><div class="large-12 columns">
		<div
			class="<?php echo implode($sweet_foundation_topbar_classes, ' ');?> ">
			<nav class="container top-bar">

				<ul class="title-area">
					<li class="name">
						<!-- to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> -->



					</li>
					<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span> </a>
					</li>

				</ul>
				<section class="top-bar-section">

					<?php // sf_topbarleft_nav(); ?>

					<ul class="left">
						<?php sf_topbarright_nav(); ?>
						<?php 	if  (get_option ( 'hide_topbar_search' )  != 1){ ?>
						<li class="divider"></li>
						<li class="search">
							<form role="search" method="get" id="searchform"
								action="<?php echo home_url( '/' ); ?>">
								<input type="text" placeholder="<?php echo __('Search')?>"
									value="" id="s" name="s">


							</form>
						</li>
						<?php } ?>
					</ul>
				</section>

			</nav>
		</div></div></div>


		<?php } ?>
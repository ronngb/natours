<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body  <?php body_class(); ?> >				
		<div class="navbar d-lg-flex justify-content-between align-items-center">		
			<?php
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$logo = wp_get_attachment_image_src( $custom_logo_id, 'full' );
			?>
							
			<?php if ( has_custom_logo() ) : ?>									
				<a href="<?php esc_url( home_url( '/' ) ); ?>" rel="home" >
					<img class="navbar__logo" src="<?php echo esc_url( $logo[0] ); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>"  >
				</a>
			<?php endif; ?>

			<input type="checkbox" class="navbar__checkbox " id="navi-toggle">
			<label for="navi-toggle" class="navbar__button  d-lg-none">
				<span class="navbar__icon d-lg-none">&nbsp;</span>
			</label>
			<div class="navbar__background d-lg-none">&nbsp;</div>
		
		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'main-menu-lg',
				'menu_class'      => 'navbar__list',
				'container'       => 'nav',
				'container_class' => 'navbar__nav',
			)
		);
		?>
		</div>
	<header class="header" style="background: url(<?php echo get_stylesheet_directory_uri(); ?>/src/assets/images/bgv7.png),url(<?php header_image(); ?>);  background-position: top;background-size: cover;">			
		<div class="header__text-box">					
			<?php dynamic_sidebar( 'header-widgets' ); ?>						
			<a href="" class="btn btn--white btn--animated"><?php bloginfo( 'description' ); ?></a>
		</div>
		<!-- <div class="header__background"></div> -->
	</header>

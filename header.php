<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Desk_Dog_Development
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
<div id="page" class="site">

	<header class="header">

		<div class="container">

			<div class="header-logo__wrapper">

				<h2 class="header__logo"><a href="<?php echo site_url('/'); ?>">Winnie Say What</a></h2>

				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<span class="line"></span>
					<span class="line"></span>
					<span class="line"></span>
				</button>

			</div> <!-- /.header-logo__wrapper -->

		</div> <!-- /.container -->

		<nav id="site-navigation" class="navbar-nav column" >

			<div class="container">

				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>

			</div> <!-- /.container -->

		</nav><!-- #site-navigation -->

	</header>

	<div id="content" class="site-content">

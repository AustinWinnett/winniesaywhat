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

	<?php // get_template_part( 'layouts/navbar' ); ?>

	<header class="header">

		<div class="container">

			<h2><a href="<?php echo site_url('/'); ?>" class="header__logo">Winnie Say What</a></h2>

		</div>

		<nav id="site-navigation" class="navbar-nav column" >

			<div class="container">

				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'desk-dog-development' ); ?></button>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>

			</div>

		</nav><!-- #site-navigation -->

	</header>

	<div id="content" class="site-content">

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- jQuery for Contact Form 7 plugin -->
	<?php # wp_enqueue_script("jquery"); 
	?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header class="header">
		<div class="site-container">
			<div class="header__wrapper">
				<a href="#" class="header__logo"><?php insertImage('/header-logo.png'); ?></a>
				<nav class="header__menu menu">
					<ul class="menu__list">
						<li class="menu__item">
							<a href="#" class="menu__link">About Us</a>
						</li>
						<li class="menu__item">
							<a href="#" class="menu__link">Services</a>
						</li>
						<li class="menu__item">
							<a href="#" class="menu__link">Reviews</a>
						</li>
						<li class="menu__item">
							<a href="#" class="menu__link">Contact Us</a>
						</li>
					</ul>
				</nav>
				<div class="menu__icon"><span></span></div>
			</div>
		</div>
	</header>
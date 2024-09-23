<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<link rel="shortcut icon" href="favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body>
	<div class="wrapper">
		<header class="header">
			<div class="header__container">
				<div class="header__logo">
                    <a class="header__logo-link" href="<?php echo home_url(); ?>">
                        <img src="<?php $custom_logo_url = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ) ); echo $custom_logo_url [0]; ?>" alt="Main Logo">
                    </a>
				</div>
                <?php 
                $menu = wp_nav_menu( array(
                    'menu'            => 'Main',
                    'container'       => 'ul',
                    'container_class' => '',
                    'menu_class'      => 'menu__list',
                    'echo'            => false,
                    'fallback_cb'     => 'wp_page_menu',
                    'depth'           => 0
                ) );
                if ($menu) : ?>
                <div class="header__menu menu">
					<button type="button" class="menu__icon icon-menu" aria-label="menu button"><span></span></button>
					<nav class="menu__body">
                        <?php echo $menu; ?>
                        <div class="menu__actions actions actions--mobile">
							<button class="actions__button actions__button--primary" type="button">Book a call</button>
							<button class="actions__button actions__button--secondary" type="button">
								<span>Contact us</span>
								<svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M11.177 4.8217C11.3676 4.63108 11.3676 4.32204 11.177 4.13143L8.07076 1.02521C7.88015 0.834594 7.5711 0.834594 7.38049 1.02521C7.18988 1.21582 7.18988 1.52487 7.38049 1.71548L10.1416 4.47656L7.38049 7.23765C7.18988 7.42826 7.18988 7.7373 7.38049 7.92792C7.5711 8.11853 7.88015 8.11853 8.07076 7.92792L11.177 4.8217ZM0.09375 4.96466L10.8318 4.96466L10.8318 3.98847L0.09375 3.98847L0.09375 4.96466Z" fill="#181818" />
								</svg>
							</button>
						</div>
					</nav>
				</div>
                <?php endif; ?>
				<div class="header__actions actions actions--desktop">
					<button class="actions__button actions__button--primary" type="button">Book a call</button>
					<button class="actions__button actions__button--secondary" type="button">
						<span>Contact us</span>
						<svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M11.177 4.8217C11.3676 4.63108 11.3676 4.32204 11.177 4.13143L8.07076 1.02521C7.88015 0.834594 7.5711 0.834594 7.38049 1.02521C7.18988 1.21582 7.18988 1.52487 7.38049 1.71548L10.1416 4.47656L7.38049 7.23765C7.18988 7.42826 7.18988 7.7373 7.38049 7.92792C7.5711 8.11853 7.88015 8.11853 8.07076 7.92792L11.177 4.8217ZM0.09375 4.96466L10.8318 4.96466L10.8318 3.98847L0.09375 3.98847L0.09375 4.96466Z" fill="#181818" />
						</svg>
					</button>
				</div>
			</div>
		</header>
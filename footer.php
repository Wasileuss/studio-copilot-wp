<footer class="footer" id="footer">
			<div class="footer__container">
				<div class="footer__body">
					<h2 class="footer__title">
						<span class="footer__title-canela">Let's have a </span>
						<span class="footer__title-haas">conversation!</span>
					</h2>
					<div class="footer__content">
						<!-- <form class="footer__form" action="#">
							<div class="footer__inputs">
								<input class="footer__input" type="email" name="email" placeholder="Enter email adress*">
								<label class="footer__label">
									<input class="footer__checkbox" type="checkbox" name="checkbox" required>
									<span class="footer__checkmark"></span>
									<span class="footer__label-text">Would you like to recieve our Newsletter with offers and upcoming services?</span>
								</label>
							</div>
							<button class="footer__button" type="submit">Contact me</button>
						</form> -->
                        <?php echo do_shortcode('[contact-form-7 id="44fd510" title="Copilot Form"]'); ?>
						<div class="footer__info">
							<div class="footer__social">
								<a href="<?php echo esc_url(get_field('twitter', 2)); ?>" class="footer__social-link" target="_blank">
									<img src="<?php echo bloginfo('template_url')?>/assets/img/twitter.svg" alt="Twitter">
								</a>
								<a href="<?php echo esc_url(get_field('instagram', 2)); ?>" class="footer__social-link" target="_blank">
									<img src="<?php echo bloginfo('template_url')?>/assets/img/instagram.svg" alt="Instagram">
								</a>
								<a href="mailto:<?php echo esc_attr(get_field('email', 2)); ?>" class="footer__social-link">
									<img src="<?php echo bloginfo('template_url')?>/assets/img/mail.svg" alt="Mail">
								</a>
							</div>
							<div class="footer__menu menu-footer">
								<ul class="menu-footer__list">
									<li class="menu-footer__item"><a href="#" data-goto=".hero" class="menu-footer__link">Home</a></li>
									<li class="menu-footer__item"><a href="#" class="menu-footer__link">Work</a></li>
									<li class="menu-footer__item"><a href="#" class="menu-footer__link">Benefits</a></li>
									<li class="menu-footer__item"><a href="#" class="menu-footer__link">How we do it</a></li>
									<li class="menu-footer__item"><a href="#" class="menu-footer__link">Services</a></li>
									<li class="menu-footer__item"><a href="#" class="menu-footer__link">Plans</a></li>
									<li class="menu-footer__item"><a href="#" class="menu-footer__link">FAQ</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="footer__bottom">
						<div class="footer__privacy">
							<a href="<?php echo esc_url(get_field('terms_of_service', 2)); ?>" class="footer__privacy-link">Terms of Service</a>
							<a href="<?php echo esc_url(get_field('privacy_policy', 2)); ?>" class="footer__privacy-link">Privacy Policy</a>
						</div>
						<div class="footer__logo" data-goto=".hero">
							<picture>
								<source srcset="<?php echo bloginfo('template_url')?>/assets/img/logo-footer.svg" media="(min-width: 568px)" alt="Logo">
								<img src="<?php echo bloginfo('template_url')?>/assets/img/logo studiocopilot.svg" alt="Logo">
							</picture>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
	<?php wp_footer(); ?>
</body>

</html>
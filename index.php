<?php get_header(); ?>
		<main class="page">
			<section class="page__hero hero">
				<div class="hero__container">
					<div class="hero__content">
						<h1 class="hero__title">
							<span class="hero__title-canela"><?php the_field('hero_title_1'); ?></span>
							<span class="hero__title-haas"><?php the_field('hero_title_2'); ?></span>
							<span class="hero__title-canela"><?php the_field('hero_title_3'); ?></span>
						</h1>
						<div class="hero__text"><?php the_field('hero_text'); ?></div>
						<button data-goto="#plans" class="hero__button" type="button">See plans</button>
					</div>
				</div>
			</section>
			<div class="page__ticker ticker">
				<div class="ticker__container">
					<div class="ticker__text">Our plans</div>
					<div class="ticker__text">Our plans</div>
					<div class="ticker__text">Our plans</div>
					<div class="ticker__text">Our plans</div>
					<div class="ticker__text">Our plans</div>
					<div class="ticker__text">Our plans</div>
					<div class="ticker__text">Our plans</div>
					<div class="ticker__text">Our plans</div>
					<div class="ticker__text">Our plans</div>
					<div class="ticker__text">Our plans</div>
				</div>
			</div>
			<section class="page__plans plans" id="plans">
				<div class="plans__container">
					<div class="plans__content">
						<div class="plans__header">
							<div class="plans__section-number">05</div>
							<div class="plans__label">
								<h3 class="plans__label-text">Plans</h3>
							</div>
						</div>
						<h2 class="plans__title">
							<span class="plans__title-canela">Let's make the most of your next project,</span>
							<span class="plans__title-haas">together.</span>
						</h2>
						<div class="plans__toggle">
							<label class="plans__toggle-item plans__toggle-item--active">
								<input type="radio" class="plans__toggle-radio" name="payment-option" id="monthly" checked>
								<span>Monthly</span>
							</label>
							<label class="plans__toggle-item">
								<input type="radio" class="plans__toggle-radio" name="payment-option" id="quarterly">
								<span>Quarterly</span>
								<span class="plans__toggle-item-discount">-10%</span>
							</label>
							<label class="plans__toggle-item">
								<input type="radio" class="plans__toggle-radio" name="payment-option" id="annual">
								<span>Annual</span>
								<span class="plans__toggle-item-discount">-20%</span>
							</label>
							<div class="plans__toggle-active-bg"></div>
						</div>
						<div class="plans__body">
							<div class="plans__slider swiper">
								<div class="plans__wrapper swiper-wrapper">
                                    <?php
                                    query_posts( [
                                        'post_type' => 'plans',
                                    ]);
                                    while (have_posts()) : the_post(); ?>
                                        <div class="plans__slide swiper-slide">
										<div class="plans__card card">
											<div class="card__label" style="display: <?php the_field('display_value'); ?>">
												<div class="card__label-image">
													<img src="<?php echo bloginfo('template_url')?>/assets/img/snowflake-white.svg" alt="Image">
												</div>
												<h4 class="card__label-title">Best Offer</h4>
												<div class="card__label-image">
													<img src="<?php echo bloginfo('template_url')?>/assets/img/snowflake-white.svg" alt="Image">
												</div>
											</div>
											<div class="card__top">
												<h3 class="card__title"><?php the_title(); ?></h3>
												<div class="card__price-old">$<?php the_field('plans_price_1'); ?></div>
												<div class="card__price">
													<span class="card__price-currency">$</span>
													<span id="services-monthly" class="card__price-value"><?php the_field('plans_price_1'); ?></span>
													<span id="services-quarterly" class="card__price-value"><?php the_field('plans_price_2'); ?></span>
													<span id="services-annual" class="card__price-value"><?php the_field('plans_price_3'); ?></span>
													<span class="card__price-period">/month</span>
												</div>
											</div>
											<div class="card__purpose"><?php the_content(); ?></div>
											<div class="card__bottom">
												<button class="card__button button button--accent" type="button">
													<span>Get started</span>
													<svg width="11" height="8" viewBox="0 0 11 8" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M10.741 4.35355C10.9362 4.15829 10.9362 3.84171 10.741 3.64645L7.55898 0.464467C7.36372 0.269205 7.04714 0.269205 6.85188 0.464467C6.65661 0.659729 6.65661 0.976311 6.85188 1.17157L9.6803 4L6.85188 6.82843C6.65661 7.02369 6.65661 7.34027 6.85187 7.53553C7.04714 7.7308 7.36372 7.7308 7.55898 7.53553L10.741 4.35355ZM-4.37114e-08 4.5L10.3874 4.5L10.3874 3.5L4.37114e-08 3.5L-4.37114e-08 4.5Z" fill="white" />
													</svg>
												</button>
												<!-- <ul class="card__advantages">
													<li class="card__item">180 hours per month</li>
													<li class="card__item">Research & Benchmarking</li>
													<li class="card__item">User Journey</li>
													<li class="card__item">Concept Development</li>
													<li class="card__item">Product Architecture</li>
													<li class="card__item">Unlimited Team Members</li>
													<li class="card__item">Software Licences</li>
													<li class="card__item">DFM</li>
													<li class="card__item">Prototyping</li>
													<li class="card__item">Simultaneous Designers</li>
													<li class="card__item">Photorealistic Rendering</li>
                                                    <?php if( have_rows('plans_advantages') ): 

                                                    while( have_rows('plans_advantages') ): the_row();
                                                    
                                                    $text = get_sub_field('item_content');
                                                    $style = get_sub_field('item_style');
                                                    
                                                    ?>
                                                        <li class="card__item card__item--<?php echo $style; ?>">
                                                            <?php echo $text; ?>
                                                        </li>
                                                    <?php endwhile; ?>

                                                    <?php endif; ?>
												</ul> -->
                                                <?php
                                                    // Отримуємо ID поточного запису
                                                    $post_id = get_the_ID();

                                                    // Отримуємо значення метаполя з даними списку
                                                    $plans_list = get_post_meta($post_id, '_plans_list', true);

                                                    // Перевіряємо, чи є дані у масиві
                                                    if (!empty($plans_list) && is_array($plans_list)) {
                                                        echo '<ul class="card__advantages">';

                                                        // Проходимо по кожному елементу масиву і виводимо дані
                                                        foreach ($plans_list as $plan) {
                                                            $content = isset($plan['content']) ? esc_html($plan['content']) : '';
                                                            $class = isset($plan['class']) ? esc_attr($plan['class']) : '';

                                                            echo '<li class="card__item card__item--' . $class . '">' . $content . '</li>';
                                                        }

                                                        echo '</ul>';
                                                    } 
                                                    else {
                                                        echo 'No plans available.';
                                                    }
                                                    ?>
											</div>
										</div>
									</div>
                                    <?php endwhile; ?>
								</div>
							</div>
							<div class="plans__enterprise enterprise">
								<h3 class="enterprise__title">Enterprise</h3>
								<div class="enterprise__text">
									<p>Do you need specialized talent or a larger workforce?</p>
									<p>Ask for our tailored solutions for large companies.</p>
								</div>
								<button class="enterprise__button button button--accent" type="button">
									<span>Let's talk</span>
									<svg width="11" height="8" viewBox="0 0 11 8" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M10.741 4.35355C10.9362 4.15829 10.9362 3.84171 10.741 3.64645L7.55898 0.464467C7.36372 0.269205 7.04714 0.269205 6.85188 0.464467C6.65661 0.659729 6.65661 0.976311 6.85188 1.17157L9.6803 4L6.85188 6.82843C6.65661 7.02369 6.65661 7.34027 6.85187 7.53553C7.04714 7.7308 7.36372 7.7308 7.55898 7.53553L10.741 4.35355ZM-4.37114e-08 4.5L10.3874 4.5L10.3874 3.5L4.37114e-08 3.5L-4.37114e-08 4.5Z" fill="white" />
									</svg>
								</button>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
<?php get_footer(); ?>
<?php
/*
Theme Name: Psychology
Theme URI: http://mkvadrat.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта psychology
Version: 1.0
*/

get_header();
?>

	<!-- start contant -->
	<div class="container">
			<div class="row">

					<!-- start left-sidebar -->
					<div class="col-md-4">
							<div class="left-sidebar">
<?php
									$args = array(
										'numberposts' => 5,
										'category'    => 0,
										'orderby'     => 'date',
										'order'       => 'DESC',
										'include'     => array(),
										'exclude'     => array(),
										'meta_key'    => '',
										'meta_value'  =>'',
										'post_type'   => 'blogs',
										'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
									);

									$blogs = get_posts( $args );
									if($blogs){
?>
									<ul>
<?php
									foreach($blogs as $blogs_list){
										if($blogs_list->ID == get_the_ID()){
?>
											<li><a class="active-blog" href="<?php echo get_permalink($blogs_list->ID); ?>"><?php echo wp_trim_words( $blogs_list->post_title, 4,''); ?></a></li>
<?php
										}else{
?>
											<li><a href="<?php echo get_permalink($blogs_list->ID); ?>"><?php echo wp_trim_words( $blogs_list->post_title, 4,''); ?></a></li>
<?php
										}
									}
?>
									</ul>
<?php
									}
?>
									<div class="devider"></div>

									<div class="main-contacts">
											<p class="contact-tittle">Контакты</p>

											<p>Email: <?php getMeta('email_contact_page'); ?></p>

											<p>Телефон в России: <?php getMeta('tel_russia_contact_page'); ?></p>

											<p>Телефон в США: <?php getMeta('tel_usa_contact_page'); ?></p>

											<p>Skype: <?php getMeta('skype_contact_page'); ?></p>

											<a class="button" href="<?php echo get_permalink( 101 ); ?>"><b>Skype консультации</b><span></span></a>

											<a class="button come-back" href="<?php echo esc_url( home_url( '/' ) ); ?>"><b>На главную</b><span></span></a>
									</div>
							</div>
					</div>
					<!-- end left-sidebar -->

					<!-- start left-sidebar -->
<?php
					$content = get_post( get_the_ID() );

					if($content){
						//var_dump($content);
?>
					<div class="col-md-8">
							<div class="description-blog">
								<h1><?php echo $content->post_title; ?></h1>

								<p class="date-blog"><?php echo get_the_date( 'd.m.y', $content->ID ); ?></p>
<?php
									echo wpautop($content->post_content, $br = false);
?>
									<div class="devider"></div>

<?php
									$next = get_adjacent_post(true,'',false, 'blogs-list');
									$prev = get_adjacent_post(true,'',true, 'blogs-list');

									$image_next = wp_get_attachment_image_src( get_post_thumbnail_id($next->ID), 'full');
									$image_prev = wp_get_attachment_image_src( get_post_thumbnail_id($prev->ID), 'full');

?>
									<ul class="blog-prev-next">
										<?php if($next){ ?>
											<li><a href="<?php echo get_permalink($next->ID); ?>">
												<?php if(!empty($image_next)){ ?>
													<img src="<?php echo $image_next[0]; ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id($image_next->ID), '_wp_attachment_image_alt', true ); ?>">
												<?php }else{ ?>
													<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/article-photo.jpg" alt="">
												<?php } ?>

													<h4><?php echo wp_trim_words( $next->post_title, 4,''); ?></h4>
											</a></li>
										<?php }else{ ?>
											<li><a href="<?php echo get_category_link(5); ?>">
													<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/article-photo.jpg" alt="">

													<h4>Читать все статьи</h4>
											</a></li>
										<?php } ?>

										<?php if($prev){ ?>
											<li><a href="<?php echo get_permalink($prev->ID); ?>">
												<?php if(!empty($image_prev)){ ?>
													<img src="<?php echo $image_prev[0]; ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id($image_prev->ID), '_wp_attachment_image_alt', true ); ?>">
												<?php }else{ ?>
													<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/article-photo.jpg" alt="">
												<?php } ?>

													<h4><?php echo wp_trim_words( $prev->post_title, 4,''); ?></h4>
											</a></li>
										<?php }else{ ?>
											<li><a href="<?php echo get_category_link(5); ?>">

													<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/article-photo.jpg" alt="">

													<h4>Читать все статьи</h4>
											</a></li>
										<?php } ?>
									</ul>

									<?php if($next){ ?>
										<a class="next-blog-link" href="<?php echo get_permalink($next->ID); ?>"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Читать следующую статью</a>
									<?php }else{ ?>
										<a class="next-blog-link" href="<?php echo get_category_link(5); ?>"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Читать все статьи</a>
									<?php } ?>

									<?php if($prev){ ?>
										<a class="prev-blog-link" href="<?php echo get_permalink($prev->ID); ?>">Читать предыдущую статью <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
									<?php }else{ ?>
										<a class="prev-blog-link "href="<?php echo get_category_link(5); ?>"> Читать все статьи  <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
									<?php } ?>

									<div class="devider last-devider"></div>
<?php
					}else{
?>
									<div class="col-md-8">
											<div class="description-blog">
												<p>Контент не найден!</p>
											</div>
									</div>
<?php
					}
?>
									<div class="form-block">
											<p class="contact-tittle">Записаться на скайп-консультацию</p>

											<div>
                          <input type="text" name="name" id="name" placeholder="Ваше имя">
                          <input type="text" name="skype" id="skype" placeholder="Ваш skype">
                          <input type="text" name="email" id="email" placeholder="Ваш e-mail">
                          <textarea name="comment" id="comment" placeholder="Текст сообщения"></textarea>
                          <input class="button" type="submit" onclick="callbackFormSkype();" value="Отправить">
                      </div>
									</div>

									<div class="main-contacts main-contacts-form">
                      <p class="contact-tittle">Контакты</p>

                      <p>Email: <?php getMeta('email_contact_page'); ?></p>

                      <p>Телефон в России: <?php getMeta('tel_russia_contact_page'); ?></p>

                      <p>Телефон в США: <?php getMeta('tel_usa_contact_page'); ?></p>

                      <p>Skype: <?php getMeta('skype_contact_page'); ?></p>

                      <a class="button" href="<?php echo get_permalink( 101 ); ?>"><b>Skype консультации</b><span></span></a>
                  </div>
							</div>
					</div>
					<!-- end left-sidebar -->
			</div>
	</div>
	<!-- end contant -->

<?php get_footer(); ?>

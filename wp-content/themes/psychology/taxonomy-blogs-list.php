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

<?php
					$term = get_queried_object();
					$cat_id = $term->term_id;
					$cat_data = get_option("category_$cat_id");
?>

  <!-- start contant -->
  <div class="container articles">
      <div class="row">

          <!-- start left-articles -->
          <div class="col-md-8">
              <div class="articles-list">
                  <h1><?php echo $cat_data['title_for_categories_blogs_page']; ?></h1>

<?php
							$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$args = array(
								'category' 	     => getCurrentCatID(),
								'posts_per_page' => $GLOBALS['wp_query']->query_vars['posts_per_page'],
                'post_type'   => 'blogs',
								'paged'          => $current_page
							);

							$blogs = get_posts( $args );

							if(!empty($blogs)){
							foreach( $blogs as $blogs_list ){

								$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($blogs_list->ID), 'full');

								$short_descr = get_post_meta( $blogs_list->ID, 'short_descr_post_page', $single = true );
?>
                  <div class="article-block">
										<?php if(!empty($image_url)){ ?>
											<img src="<?php echo $image_url[0]; ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id($blogs_list->ID), '_wp_attachment_image_alt', true ); ?>">
										<?php }else{ ?>
											<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/photo-12.jpg" alt="">
										<?php } ?>

                    <h2><?php echo wp_trim_words( $blogs_list->post_title, 4,''); ?></h2>
											<?php if($short_descr){ ?>
                      	<p><?php echo wp_trim_words( $short_descr, 9, '<a href="'. get_permalink($blogs_list->ID) .'"> ...Подробнее</a>' ); ?></p>
											<?php }else{ ?>
												<p><?php echo wp_trim_words( $blogs_list->post_content, 9, '<a href="'. get_permalink($blogs_list->ID) .'"> ...Подробнее</a>' ); ?></p>
											<?php } ?>
                  </div>
<?php
							}

								wp_reset_postdata();

							}else{
?>
							<h4>Извините, в данной рубрике блоги отсутствуют.</h4>
							<div>
								<p>Блоги не найдены...</p>
							</div>
<?php
							}

							$defaults = array(
								'type' => 'array',
								'prev_next'    => False,
								'prev_text'    => __('В начало'),
								'next_text'    => __('В конец'),
							);

							$pagination = paginate_links($defaults);
?>

							<?php if($pagination){ ?>
								<ul class="pagination-articles">
							<?php foreach ($pagination as $pag){ ?>
									<li><?php echo $pag; ?></li>
							<?php } ?>
								</ul>
							<?php } ?>

                  <div class="devider devider-first"></div>

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

                      <a class="button come-back" href="<?php echo esc_url( home_url( '/' ) ); ?>"><b>На главную</b><span></span></a>
                  </div>

                  <div class="devider devider-second"></div>

                  <a class="button look-help" href="/types-psychological-assistance/"><b>Посмотреть виды психологической помощи</b><span></span></a>

              </div>
          </div>
          <!-- end list-articles -->

          <!-- start right-sidebar-portrait -->
          <div class="col-md-4">
              <div class="right-sidebar-portrait">
                <?php echo wpautop(stripcslashes( $cat_data['text_for_categories_blogs_page'] ), $br = false); ?>
              </div>
          </div>
          <!-- end right-sidebar-portrait -->
      </div>
  </div>
  <!-- end contant -->



<?php get_footer(); ?>

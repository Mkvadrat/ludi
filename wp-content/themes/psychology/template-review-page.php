<?php
/*
Template name: Reviews page
Theme Name: Psychology
Theme URI: http://mkvadrat.com/
Description: Тема для сайта psychology
Author: M2
Author URI: http://mkvadrat.com/
Version: 1.0
*/

get_header();
?>

<?php
										define( 'DEFAULT_COMMENTS_PER_PAGE', $GLOBALS['wp_query']->query_vars['comments_per_page']);

										$page = (get_query_var('page')) ? get_query_var('page') : 1;

										$limit = DEFAULT_COMMENTS_PER_PAGE;

										$offset = ($page * $limit) - $limit;

										$param = array(
											'status'	=> 'approve',
											'offset'	=> $offset,
											'number'	=> $limit
										);

										$total_comments = get_comments(array(
											'orderby' => 'comment_date',
											'order'   => 'ASC',
											'status'  => 'approve',
											'parent'  => 0
										));

										$pages = ceil(count($total_comments)/DEFAULT_COMMENTS_PER_PAGE);

										$comments = get_comments( $param );

										$args = array(
											'base'         => @add_query_arg('page','%#%'),
											'format'       => '?page=%#%',
											'total'        => $pages,
											'current'      => $page,
											'show_all'     => false,
											'mid_size'     => 4,
											'prev_next'    => false,
											//'prev_text'    => __('&laquo; В начало'),
											//'next_text'    => __('В конец &raquo;'),
											'type'         => 'array'
										);
?>
	<!-- start contant -->
	<div class="container reviews">
			<div class="row">
					<!-- start left-articles -->
					<div class="col-md-8">
							<div class="reviews-list">
									<h1><?php the_title(); ?></h1>
<?php
										if(!empty($comments)){
?>
										<ul class="ratio-stories">
<?php
										foreach($comments as $comment){

											global $cnum;

											// определяем первый номер, если включено разделение на страницы
											$per_page = $limit;

											if( $per_page && !isset($cnum) ){
												$com_page = $page;

												if($com_page>1)
													$cnum = ($com_page-1)*(int)$per_page;
											}

											// считаем
											$cnum = isset($cnum) ? $cnum+1 : 1;
?>
												<li>
														<h2>
																<div class="block-svg">
<?php
																		include(STYLESHEETPATH . '/data/array_svg.php');

																		$icon_value_in_base = get_comment_meta($comment->comment_ID, 'category_reviews', true );

																		foreach ($icon_array as $key => $value) {
																			if($key == $icon_value_in_base)
																				echo $value;
																		}
?>
																</div><?php echo get_comment_author($comment->comment_ID); ?>
															</h2>

															<div class="short-text">
																	<p><?php echo $comment->comment_content; ?></p>
															</div>
												</li>
<?php
									}
?>
									</ul>
<?php
									$pagination_pages = paginate_links( $args );

									if(!empty($pagination_pages)){
?>
										<ul class="pagination-reviews">
<?php
										foreach ($pagination_pages as $pagination) {
?>
											<li><?php echo $pagination; ?></li>
<?
										}
?>
										</ul>
<?
									}
								}
?>
									<div class="devider devider-first"></div>

									<div class="form-block">
											<p class="contact-tittle">Записаться на скайп-консультацию</p>

											<div id="respond">
												<form class="commentform" id="commentform">
													<textarea name="comment" id="comment" placeholder="Сообщение"></textarea>

													<input type="text" maxlength="25" name="author" id="author" placeholder="Ваше Имя">

													<input type="text" maxlength="25" name="email" id="email" placeholder="Email">

													<select name="category_reviews">
														<option value="0">Категория отзыва</option>
														<option value="1">Семейная терапия</option>
														<option value="2">Детская психология</option>
														<option value="3">Возрастные кризисы</option>
														<option value="4">Зависимость и созависимость</option>
														<option value="5">Вопросы сексопатологии</option>
														<option value="6">Страхи и фобии</option>
														<option value="7">Психологическое сопровождение в судебных делах</option>
														<option value="8">Он и Она</option>
														<option value="9">Психокоррекция для детей и взрослых</option>
														<option value="10">Психологическая помошь лицам с суицидальными наклонностями</option>
														<option value="11">Профилактика и коррекция девиантного (отклоняющегося поведения)</option>
														<option value="12">Патопсихология работа с семьями больных шизофренией в т.ч.</option>
														<option value="13">Комплексы неполноценности</option>
														<option value="14">Утрата близких</option>
														<option value="15">Сложные жизненные</option>
														<option value="16">Диагностика личностной и профессиональной сферы</option>
													</select>

													<?php echo comment_id_fields(); ?>
												</form>
											</div>

											<a class="button" onclick="submit()" id="submit"><b>Отправить</b><span></span></a>
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

									<a class="button-auto enroll-online" href="<?php echo get_permalink( 101 ); ?>"><b>Записаться на онлайн консультацию</b><span></span></a>

									<a class="button-auto" href="<?php echo get_permalink( 186 ); ?>"><b>Посмотреть виды психологической помощи</b><span></span></a>

							</div>
					</div>
					<!-- end list-articles -->

					<?php if (have_posts()): while (have_posts()): the_post(); ?>
              <?php the_content(); ?>
      	  <?php endwhile; endif; ?>
			</div>
	</div>
	<!-- end contant -->

<script type="text/javascript">
		$('.short-text').readmore({
			maxHeight: 110,
			moreLink: '<div class="expand"><a href="#">Развернуть</a></div>',
			lessLink: '<div class="expand"><a href="#">Свернуть</a></div>'
		});

		//Отправка данных формы на сервер
		function submit(){
		    $(".commentform").submit();
		}
</script>

<?php get_footer(); ?>

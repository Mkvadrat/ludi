<?php
/*
Template name: About page
Theme Name: Psychology
Theme URI: http://mkvadrat.com/
Description: Тема для сайта psychology
Author: M2
Author URI: http://mkvadrat.com/
Version: 1.0
*/

get_header();
?>

  <!-- start contant -->
  <div class="container about">
      <div class="row">
          <!-- start left-articles -->
          <div class="col-md-8">
              <h1><?php the_title(); ?></h1>

              <?php if (have_posts()): while (have_posts()): the_post(); ?>
                <?php the_content(); ?>
              <?php endwhile; endif; ?>

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
          </div>

          <!-- end list-articles -->

          <!-- start right-sidebar-portrait -->

          <div class="col-md-4">
              <div class="right-sidebar-portrait">
                <?php if(!empty(get_field('right_block_about_page'))){?>
            			<?php the_field('right_block_about_page'); ?>
            		<?php } ?>
              </div>

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

          <!-- end right-sidebar-portrait -->
      </div>
  </div>
  <!-- end contant -->

<?php get_footer(); ?>

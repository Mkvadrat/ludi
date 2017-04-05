<?php
/*
Template name: Help page
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
  <div class="container">
      <div class="row">
          <!-- start left-sidebar -->
          <div class="col-md-4">
              <div class="left-sidebar">
                  <ul>
                      <li><a class="ancLinks" href="#list-questions">Возможные вопросы для обращений</a>
                      </li>
                  </ul>

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
          <div class="col-md-8">
              <div class="description-blog">
                  <?php if (have_posts()): while (have_posts()): the_post(); ?>
                      <?php the_content(); ?>
              	  <?php endwhile; endif; ?>

                  <p class="cursive-p">Ваш психолог - Людмила П.</p>

                  <div class="devider last-devider"></div>

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
          </div>
          <!-- end left-sidebar -->
      </div>
  </div>
  <!-- end contant -->

<?php get_footer(); ?>

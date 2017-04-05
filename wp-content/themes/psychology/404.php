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

  <!-- start content -->
  <div class="container error">
      <div class="row">
          <div class="col-md-12">
              <h3>404</h3>

              <p>Страница не найдена</p>

              <a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><b>Вернуться на главную</b><span></span></a>
          </div>
      </div>
  </div>
  <!-- end content -->

<?php get_footer(); ?>

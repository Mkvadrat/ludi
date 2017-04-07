<?php
/*
Template name: Contact page
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
 <div class="container contacts">
     <div class="row">
         <div class="col-md-12">
             <h1><?php the_title(); ?></h1>
         </div>

         <?php if (have_posts()): while (have_posts()): the_post(); ?>
             <?php the_content(); ?>
     	  <?php endwhile; endif; ?>

         <!-- start contacts-main -->
         <div class="contacts-main">
             <div class="col-md-4">
                 <p>Телефон в России:</p>
                 <p><span><?php getMeta('tel_russia_contact_page'); ?></span></p>

                 <p>Телефон в США:</p>
                 <p><span><?php getMeta('tel_usa_contact_page'); ?></span></p>
             </div>
             <div class="col-md-4">
                 <p>Skype:</p>
                 <p><span><?php getMeta('skype_contact_page'); ?></span></p>

                 <p>Email:</p>
                 <p><span><?php getMeta('email_contact_page'); ?></span></p>
             </div>

             <div class="col-md-8">
                 <div class="devider devider-above-map"></div>

                 <p class="map-tittle">На карте:</p>

                 <!--<div class="map">
                     <iframe src="https://api-maps.yandex.ua/frame/v1/-/CZTeBJmw" width="100%" height="319" frameborder="0"></iframe>
                 </div>-->

                 <!-- start map -->
                   <div class="map" id="maps" style="width:100%; height:319px"></div>
                   <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&load=package.full" type="text/javascript"> </script>
                   <script type="text/javascript">
                           var myMap;
                           ymaps.ready(init);
                           function init()
                           {
                               ymaps.geocode('<?php the_field('adress_for_map_contact_page'); ?>', {
                                   results: 1
                               }).then
                               (
                                   function (res)
                                   {
                                       var firstGeoObject = res.geoObjects.get(0),
                                           myMap = new ymaps.Map
                                           ("maps",
                                               {
                                                   center: firstGeoObject.geometry.getCoordinates(),
                                                   zoom: 15,
                               controls: ["zoomControl", "fullscreenControl"]
                                               }
                                           );
                                       var myPlacemark = new ymaps.Placemark
                                       (
                                           firstGeoObject.geometry.getCoordinates(),
                                           {
                                               iconContent: ''
                                           },
                                           {
                                               preset: 'twirl#blueStretchyIcon'
                                           }
                                       );
                                       myMap.geoObjects.add(myPlacemark);
                                       myMap.controls.add('typeSelector');
                                       myMap.behaviors.disable('scrollZoom');
                                   },
                                   function (err)
                                   {
                                       alert(err.message);
                                   }
                               );
                           }
                   </script>

                 <div class="devider devider-under-map"></div>

                 <div class="form-block">
                     <p class="contact-tittle">Форма обратной связи</p>

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
         <!-- end contacts-main -->
     </div>
 </div>
 <!-- end contant -->

<?php get_footer(); ?>

<?php
/*
Theme Name: Psychology
Theme URI: http://mkvadrat.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта psychology
Version: 1.0
*/
?>

    <!-- start footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
<?php
					if (has_nav_menu('footer_menu')){
						wp_nav_menu( array(
							'theme_location'  => 'footer_menu',
							'menu'            => '',
							'container'       => false,
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => '',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul class="footer-menu">%3$s</ul>',
							'depth'           => 1,
							'walker'          => '',
						) );
					}
?>
                </div>
                <div class="col-md-6 social">

                    <p>Социальные сети
                        <a href="https://vk.com/skype_psychologist">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/vk.jpg" alt="">
                        </a>

                        <a href="https://www.facebook.com/psychologaskypeqwerqwer161616/">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/fb.jpg" alt="">
                        </a>
                    </p>

                </div>
                <div class="col-md-6 make">

                    <p>
                        <a href="http://mkvadrat.com/">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/m2.jpg" alt="">
                        </a>
                        Сайт разработан в
                    </p>

                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->

    <script type="text/javascript">
    //форма обратной связи
    function callbackFormSkype() {
      var data = {
        'action': 'callbackFormSkype',
        'name' : $('#name').val(),
        'skype' : $('#skype').val(),
        'email' : $('#email').val(),
        'comment' : $('#comment').val()
      };
      $.ajax({
        url:'http://' + location.host + '/wp-admin/admin-ajax.php',
        data:data, // данные
        type:'POST', // тип запроса
        success:function(data){
          swal(data.message);
        }
      });
    };
    </script>

    <script>
        $(document).ready(function(){
            $("#owl-example1").owlCarousel({
                autoPlay: 4000,
                items : 1,
                itemsDesktop : [1000,1],
                itemsDesktopSmall : [900,1],
                itemsTablet : [600,1],
                pagination : false,
                navigation: true,
                stopOnHover : true,
                slideSpeed : 1000,
                rewindNav : false
            });
        });
    </script>

	<script type="text/javascript">
		$(document).ready(function() {
			$(".fancybox").fancybox();
		});
	</script>

	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/common.js"></script>

<?php wp_footer(); ?>
</body>
</html>

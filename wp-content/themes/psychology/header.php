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



<!DOCTYPE html>

<!--[if IE 7]>

<html class="ie ie7" <?php language_attributes(); ?>>

<![endif]-->

<!--[if IE 8]>

<html class="ie ie8" <?php language_attributes(); ?>>

<![endif]-->

<!--[if !(IE 7) & !(IE 8)]><!-->

<html <?php language_attributes(); ?>>

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="format-detection" content="telephone=no">

    <title><?php echo psychology_wp_title('','', true, 'right'); ?></title>



    <!-- Bootstrap -->

    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/reset.css">

    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/fonts.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">



    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/main.css">

    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/contacts.css">

    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/reviews.css">

    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/about.css">

    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/blog.css">

    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/consultation.css">

    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/404.css">

    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/articles.css">

    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/types-psychological-assistance.css">

    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/media.css">

    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/animate.css" rel="stylesheet" type="text/css" />



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery-1.9.1.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->



    <!-- OWL-CAROUSEL -->

    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/owl.carousel.min.js"></script>

    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/owl.carousel.css">

    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/owl.theme.css">



    <!-- FANCYBOX -->

    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />

    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/source/jquery.fancybox.pack.js?v=2.1.5"></script>

    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.mousewheel-3.0.6.pack.js"></script>



    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />

    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>



    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />

    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>



    <!-- SWEETALERT -->

    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/sweetalert/dist/sweetalert.css">

    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/sweetalert/dist/sweetalert.min.js"></script>



    <!-- COMMENTS -->

    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/comments.js"></script>



    <!-- READ MORE -->

    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/readmore.js"></script>

    <script type="text/javascript" src="//web-ptica.ru/VRV-files/knopkavverh/7.js"></script>



    <?php wp_head(); ?>

</head>



<body class="animated fadeIn">



    <!-- start header -->

    <?php if(get_the_ID() != 101){ ?>

    <div class="container-fluid padding-none scype-line">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <p>Онлайн консультация по <i><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/skype.png" alt=""></i> с психологом <a class="button" href="<?php echo get_permalink( 101 ); ?>"><b>Записаться</b><span></span></a></p>

                </div>

            </div>

        </div>

        <p class="free"><img src="/wp-content/themes/psychology/images/free-icon.png" alt="">Первая пятнадцатиминутная консультация-знакомство - БЕСПЛАТНО!</p>

    </div>

    <?php } ?>



    <div class="container-fluid padding-none menu-line">

        <div class="row margin-none">

            <div class="col-md-12 padding-none">

                <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">

                    <img

                              src="<?php header_image(); ?>"

                              width="<?php echo get_custom_header()->width; ?>"

                              height="<?php echo get_custom_header()->height; ?>"

                              alt="logotype"

                    />

                    <p>Лотос<br><span>Пробуждение<br>души</span></p>

                </a>



                <nav class="navbar navbar-default">

                    <div class="navbar-header">

                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

                            <span class="sr-only">Toggle navigation</span>

                            <span class="icon-bar"></span>

                            <span class="icon-bar"></span>

                            <span class="icon-bar"></span>

                        </button>

                    </div>



                    <div class="collapse navbar-collapse content-container" id="bs-example-navbar-collapse-1">

<?php

					if (has_nav_menu('primary_menu')){

						wp_nav_menu( array(

							'theme_location'  => 'primary_menu',

							'menu'            => '',

							'container'       => false,

							'container_class' => '',

							'container_id'    => '',

							'menu_class'      => '',

							'menu_id'         => '',

							'echo'            => true,

							'fallback_cb'     => 'wp_page_menu',

							'before'          => '',

							'after'           => '<span></span>',

							'link_before'     => '',

							'link_after'      => '',

							'items_wrap'      => '<ul class="nav navbar-nav navbar-right">%3$s</ul>',

							'depth'           => 1,

							'walker'          => '',

						) );

					}

?>

                    </div>

                </nav>

            </div>

        </div>

    </div>

    <!-- end header -->


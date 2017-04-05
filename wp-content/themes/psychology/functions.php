<?php
/*
Theme Name: Psychology
Theme URI: http://mkvadrat.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта psychology
Version: 1.0
*/

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
****************************************************************************НАСТРОЙКИ ТЕМЫ*****************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Регистрируем название сайта
function psychology_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	$title .= get_bloginfo( 'name', 'display' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'psychology' ), max( $paged, $page ) );
	}

	if ( is_404() ) {
        $title = '404';
    }

	return $title;
}
add_filter( 'wp_title', 'psychology_wp_title', 10, 2 );

//Изображение в шапке сайта
$args = array(
  'width'         => 91,
  'height'        => auto,
  'default-image' => get_template_directory_uri() . '/images/logo.png',
  'uploads'       => true,
);
add_theme_support( 'custom-header', $args );

//Добавление в тему миниатюры записи и страницы
if ( function_exists( 'add_theme_support' ) ) {
     add_theme_support( 'post-thumbnails' );
}

//Регистрируем меню
if(function_exists('register_nav_menus')){
	register_nav_menus(
		array(
		  'primary_menu' => 'Главное меню',
          'footer_menu'  => 'Меню в подвале сайта',
		)
	);
}

//Активный пункт меню
function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

//Обрезка предложений до нужной длины
function string_limit_words($string, $word_limit){
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit) {
  array_pop($words);
  return implode(' ', $words)."..."; } else {
  return implode(' ', $words); }
}

// add a favicon to your
function my_favicon() {
	$favicon = '';

	$favicon .= '<link rel="apple-touch-icon" sizes="180x180" href="'.get_template_directory_uri().'/favicons/apple-touch-icon.png">';
	$favicon .= '<link rel="icon" type="image/png" href="'.get_template_directory_uri().'/favicons/favicon-32x32.png" sizes="32x32">';
	$favicon .= '<link rel="icon" type="image/png" href="'.get_template_directory_uri().'/favicons/favicon-16x16.png" sizes="16x16">';
	$favicon .= '<link rel="icon" type="image/png" href="'.get_template_directory_uri().'/favicons/favicon-16x16.png" sizes="16x16">';
	$favicon .= '<link rel="manifest" href="'.get_template_directory_uri().'/favicons/manifest.json">';
	$favicon .= '<link rel="mask-icon" href="'.get_template_directory_uri().'/favicons/safari-pinned-tab.svg" color="#5bbad5">';
	$favicon .= '<meta name="apple-mobile-web-app-title" content="ludi.group">';
	$favicon .= '<meta name="application-name" content="ludi.group">';
	$favicon .= '<meta name="theme-color" content="#ffffff">';

	echo $favicon;
}
add_action('wp_head', 'my_favicon');

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*********************************************************************РАБОТА С METAПОЛЯМИ*******************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Проверка на пустоту
function ifMeta($meta_key){
	global $wpdb;

	$value = $wpdb->get_var( $wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_id DESC LIMIT 1" , $meta_key) );

	if(!empty($value)){
		return $value;
	}else{
		return '0';
	}
}

//Вывод данных из произвольных полей для всех страниц сайта
function getMeta($meta_key){
	global $wpdb;
	$value = $wpdb->get_var( $wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_id DESC LIMIT 1" , $meta_key) );
	echo $value;
}

//Вывод картинок из произвольных полей для всех страниц сайта
function getMetaImg($meta_key){
	global $wpdb;
		$value = $wpdb->get_var( $wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_id DESC LIMIT 1" , $meta_key));
	if(!empty($value)){
		$image = $wpdb->get_var( $wpdb->prepare("SELECT guid FROM $wpdb->postmeta JOIN $wpdb->posts ON %s = ID AND meta_key = %d ORDER BY meta_id DESC LIMIT 1", $value, $meta_key));
	}
	echo $image;
}

//Вывод id категории
function getCurrentCatID(){
	global $wp_query;
	if(is_category()){
		$cat_ID = get_query_var('cat');
	}
	return $cat_ID;
}

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
********************************************************************ФОРМЫ ОБРАТНОЙ СВЯЗИ*******************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Форма обратной связи для главной страницы
function callbackFormSkype(){

	$form_adress = get_option('admin_email');

	$site_url = $_SERVER['SERVER_NAME'];

	$alert = array(
		'status' => 0,
		'message' => ''
	);

	if (isset($_POST['name'])) {$name = $_POST['name']; if ($name == '') {unset($name);}}
	if (isset($_POST['skype'])) {$skype = $_POST['skype']; if ($skype == '') {unset($skype);}}
	if (isset($_POST['email'])) {$email = $_POST['email']; if ($email == '' || !is_email($email)) {unset($email);}}
	if (isset($_POST['comment'])) {$comment = $_POST['comment']; if ($comment == '') {unset($comment);}}

	if (isset($name) && isset($skype) && isset($email) && isset($comment)){

		$address = $form_adress;

		$headers  = "Content-type: text/html; charset=UTF-8 \r\n";
		$headers .= "From: $site_url\r\n";
		$headers .= "Bcc: birthday-archive@example.com\r\n";
		$mes = "Имя: $name \nСкайп: $skype \nEmail: $email \nСообщение: $comment";

		$send = mail($address, $skype, $mes, $headers);

		if ($send == 'true'){
			$alert = array(
				'status' => 1,
				'message' => 'Ваше сообщение отправлено'
			);
		}else{
			$alert = array(
				'status' => 1,
				'message' => 'Ошибка, сообщение не отправлено!'
			);
		}
	}

	if (isset($_POST['name']) && isset($_POST['skype']) && isset($_POST['email']) && isset($_POST['comment'])){
		$name = $_POST['name'];
		$skype = $_POST['skype'];
		$email = $_POST['email'];
		$comment = $_POST['comment'];

		if(!is_email($email)) {
			$alert = array(
				'status' => 1,
				'message' => 'Email введен не верно, проверте внимательно поле!'
			);
		}

		if ($name == '' || $skype == '' || $email == '' || $comment == '') {
			unset($name);
			unset($skype);
			unset($email);
			unset($comment);
			$alert = array(
				'status' => 1,
				'message' => 'Ошибка, сообщение не отправлено! Заполните все поля!'
			);
		}
	}

	echo wp_send_json($alert);

	wp_die();
}
add_action('wp_ajax_callbackFormSkype', 'callbackFormSkype');
add_action('wp_ajax_nopriv_callbackFormSkype', 'callbackFormSkype');

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************КОММЕНТАРИИ*************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Ajax функция добавления комментариев
function true_add_ajax_comment(){
	global $wpdb;
	$comment_post_ID = isset($_POST['comment_post_ID']) ? (int) $_POST['comment_post_ID'] : 0;

	$post = get_post($comment_post_ID);

	if ( empty($post->comment_status) ) {
		do_action('comment_id_not_found', $comment_post_ID);
		exit;
	}

	$status = get_post_status($post);

	$status_obj = get_post_status_object($status);

	/*
	 * различные проверки комментария
	 */
	if ( !comments_open($comment_post_ID) ) {
		do_action('comment_closed', $comment_post_ID);
		wp_die( __('Sorry, comments are closed for this item.') );
	} elseif ( 'trash' == $status ) {
		do_action('comment_on_trash', $comment_post_ID);
		exit;
	} elseif ( !$status_obj->public && !$status_obj->private ) {
		do_action('comment_on_draft', $comment_post_ID);
		exit;
	} elseif ( post_password_required($comment_post_ID) ) {
		do_action('comment_on_password_protected', $comment_post_ID);
		exit;
	} else {
		do_action('pre_comment_on_post', $comment_post_ID);
	}

	$comment_author       = ( isset($_POST['author']) )  ? trim(strip_tags($_POST['author'])) : null;
	$comment_author_email = ( isset($_POST['email']) )   ? trim($_POST['email']) : null;
	$comment_category_reviews   = ( isset($_POST['category_reviews']) )     ? trim($_POST['category_reviews']) : null;
	$comment_content      = ( isset($_POST['comment']) ) ? trim($_POST['comment']) : null;

	/*
	 * проверяем, залогинен ли пользователь
	 */
	$error_comment = array();

	$user = wp_get_current_user();
	if ( $user->exists() ) {
		if ( empty( $user->display_name ) )
		$user->display_name=$user->user_login;
		$comment_author       = $wpdb->escape($user->display_name);
		$comment_author_email = $wpdb->escape($user->user_email);
		$user_ID = get_current_user_id();
		if ( current_user_can('unfiltered_html') ) {
			if ( wp_create_nonce('unfiltered-html-comment_' . $comment_post_ID) != $_POST['_wp_unfiltered_html_comment'] ) {
				kses_remove_filters(); // start with a clean slate
				kses_init_filters(); // set up the filters
			}
		}
	} else {
		if ( get_option('comment_registration') || 'private' == $status )
			$error_comment['error'] = wp_die( 'Ошибка: Вы должны зарегистрироваться или войти, чтобы оставлять комментарии.' );
	}

	$comment_type = '';

	/*
	 * проверяем, заполнил ли пользователь все необходимые поля
 	 */
	if ( get_option('require_name_email') && !$user->exists() ) {
		if ( 6 > strlen($comment_author_email) || '' == $comment_author ){
			$error_comment['error'] = wp_die( 'Ошибка: заполните необходимые поля (Имя, Email).' );
		}elseif ( !is_email($comment_author_email)){
			$error_comment['error'] = wp_die( 'Ошибка: введенный вами email некорректный.' );
		}
	}

	if ( '0' == trim($comment_category_reviews) ||  '<p><br></p>' == $comment_category_reviews ){
		$error_comment['error'] = wp_die( 'Ошибка: Вы забыли выбрать категорию отзыва.' );
	}


	if ( '' == trim($comment_content) ||  '<p><br></p>' == $comment_content ){
		$error_comment['error'] = wp_die( 'Ошибка: Вы забыли про комментарий.' );
	}

	wp_json_encode($error_comment);

	/*
	 * добавляем новый коммент и сразу же обращаемся к нему
	 */
	$comment_parent = isset($_POST['comment_parent']) ? absint($_POST['comment_parent']) : 0;
	$commentdata = compact('comment_post_ID', 'comment_author', 'comment_author_email', 'comment_author_url', 'comment_content', 'comment_type', 'comment_parent', 'user_ID');
	$comment_id = wp_new_comment( $commentdata );
	$comment = get_comment($comment_id);

	die();
}
add_action('wp_ajax_ajaxcomments', 'true_add_ajax_comment'); // wp_ajax_{значение параметра action}
add_action('wp_ajax_nopriv_ajaxcomments', 'true_add_ajax_comment'); // wp_ajax_nopriv_{значение параметра action}

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
************************************************************ПЕРЕИМЕНОВАВАНИЕ ЗАПИСЕЙ В СТАТЬИ*************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
function change_post_menu_label() {
    global $menu, $submenu;
    $menu[5][0] = 'Статьи';
    $submenu['edit.php'][5][0] = 'Статьи';
    $submenu['edit.php'][10][0] = 'Добавить статью';
    $submenu['edit.php'][16][0] = 'Метки статей';
    echo '';
}
add_action( 'admin_menu', 'change_post_menu_label' );

function change_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Статьи';
    $labels->singular_name = 'Статьи';
    $labels->add_new = 'Добавить статью';
    $labels->add_new_item = 'Добавить статью';
    $labels->edit_item = 'Редактировать статью';
    $labels->new_item = 'Добавить статью';
    $labels->view_item = 'Посмотреть статью';
    $labels->search_items = 'Найти статью';
    $labels->not_found = 'Не найдено';
    $labels->not_found_in_trash = 'Корзина пуста';
}
add_action( 'init', 'change_post_object_label' );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
**************************************************ДОПОЛНИТЕЛЬНЫЕ ПОЛЯ ДЛЯ ТАКСОНОМИИ "СТАТЬИ"**************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Инициализация полей для таксономии "Статьи"
function articles_custom_fields(){
    add_action('category_edit_form_fields', 'articles_custom_fields_form');
    add_action('edited_category', 'articles_custom_fields_save');
}
add_action('admin_init', 'articles_custom_fields', 1);

//HTML код для вывода в админке таксономии
function articles_custom_fields_form($tag){
    $t_id = $tag->term_id;
    $cat_meta = get_option("category_$t_id");
?>
    <tr class="form-field">
    <th scope="row" valign="top"><label for="extra1"><?php _e('Заголовок рубрики'); ?></label></th>
    <td>
        <input type="text" name="Categories_meta[title_for_categories_articles_page]" id="Categories_meta[title_for_categories_articles_page]" size="25" value="<?php echo $cat_meta['title_for_categories_articles_page'] ? $cat_meta['title_for_categories_articles_page'] : ''; ?>">
    <br />
        <span class="description"><?php _e('Заголовок для страницы статей'); ?></span>
    </td>
    </tr>
   	<tr class="form-field">
    <th scope="row" valign="top"><label for="extra2"><?php _e('Текст рубрики'); ?></label></th>
    <td>
		<?php wp_editor( stripcslashes( $cat_meta['text_for_categories_articles_page'] ), 'wpeditor', array('wpautop' => 1, 'textarea_name' => 'Categories_meta[text_for_categories_articles_page]', 'textarea_rows' => 10, 'editor_css' => '<style>.wp-core-ui{width:95%;} </style>',) ); ?>
    <br />
        <span class="description"><?php _e('Текст для страницы статей'); ?></span>
    </td>
    </tr>
<?php
}

//Функция сохранения данных для дополнительных полей таксономии
function articles_custom_fields_save($term_id){
    if (isset($_POST['Categories_meta'])) {
        $t_id = $term_id;
        $cat_meta = get_option("category_$t_id");
        $cat_keys = array_keys($_POST['Categories_meta']);
        foreach ($cat_keys as $key) {
            if (isset($_POST['Categories_meta'][$key])) {
                $cat_meta[$key] = $_POST['Categories_meta'][$key];
            }
        }
        //save the option array
        update_option("category_$t_id", $cat_meta);
    }
}

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
********************************************************************РАЗДЕЛ "БЛОГ" В АДМИНКЕ****************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Вывод в админке раздела обьекты
function register_post_type_blogs() {
 	$labels = array(
	 'name' => 'Блоги',
	 'singular_name' => 'Блог',
	 'add_new' => 'Добавить блог',
	 'add_new_item' => 'Добавить новый блог',
	 'edit_item' => 'Редактировать блог',
	 'new_item' => 'Новый блог',
	 'all_items' => 'Все блоги',
	 'view_item' => 'Просмотр страницы блога на сайте',
	 'search_items' => 'Искать блог',
	 'not_found' => 'Блог не найден.',
	 'not_found_in_trash' => 'В корзине нет блога.',
	 'menu_name' => 'Блоги'
	 );
	 $args = array(
		 'labels' => $labels,
		 'public' => true,
		 'exclude_from_search' => false,
		 'show_ui' => true,
		 'has_archive' => true,
		 'menu_icon' => 'dashicons-megaphone',
		 'menu_position' => 5,
		 'supports' =>  array('title','editor', 'thumbnail'),
	 );
 	register_post_type('blogs', $args);
}
add_action( 'init', 'register_post_type_blogs' );

function true_post_type_blogs( $blogs ) {
	 global $post, $post_ID;

	 $blogs['blogs'] = array(
			 0 => '',
			 1 => sprintf( 'Блоги обновлены. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			 2 => 'Блог обновлён.',
			 3 => 'Блог удалён.',
			 4 => 'Блог обновлен.',
			 5 => isset($_GET['revision']) ? sprintf( 'Блог восстановлен из редакции: %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			 6 => sprintf( 'Блог опубликован на сайте. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			 7 => 'Блог сохранен.',
			 8 => sprintf( 'Отправлен на проверку. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
			 9 => sprintf( 'Запланирован на публикацию: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Просмотр</a>', date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
			 10 => sprintf( 'Черновик обновлён. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	 );
	 return $blogs;
}
add_filter( 'post_updated_messages', 'true_post_type_blogs' );

//Категории для пользовательских записей "Обьекты"
function create_taxonomies_blogs()
{
    // Cats Categories
    register_taxonomy('blogs-list',array('blogs'),array(
        'hierarchical' => true,
        'label' => 'Рубрики',
        'singular_name' => 'Рубрика',
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'blogs-list' )
    ));
}
add_action( 'init', 'create_taxonomies_blogs', 0 );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
**************************************************ДОПОЛНИТЕЛЬНЫЕ ПОЛЯ ДЛЯ ТАКСОНОМИИ "БЛОГ"****************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Инициализация полей для таксономии "Блог"
function blogs_custom_fields(){
    add_action('blogs-list_edit_form_fields', 'blogs_custom_fields_form');
    add_action('edited_blogs-list', 'blogs_custom_fields_save');
}
add_action('admin_init', 'blogs_custom_fields', 1);

//HTML код для вывода в админке таксономии
function blogs_custom_fields_form($tag){
    $t_id = $tag->term_id;
    $cat_meta = get_option("category_$t_id");
?>
    <tr class="form-field">
    <th scope="row" valign="top"><label for="extra1"><?php _e('Заголовок рубрики'); ?></label></th>
    <td>
        <input type="text" name="Blogs_meta[title_for_categories_blogs_page]" id="Blogs_meta[title_for_categories_blogs_page]" size="25" value="<?php echo $cat_meta['title_for_categories_blogs_page'] ? $cat_meta['title_for_categories_blogs_page'] : ''; ?>">
    <br />
        <span class="description"><?php _e('Заголовок для страницы блог'); ?></span>
    </td>
    </tr>
   	<tr class="form-field">
    <th scope="row" valign="top"><label for="extra2"><?php _e('Текст рубрики'); ?></label></th>
    <td>
		<?php wp_editor( stripcslashes( $cat_meta['text_for_categories_blogs_page'] ), 'wpeditor', array('wpautop' => 1, 'textarea_name' => 'Blogs_meta[text_for_categories_blogs_page]', 'textarea_rows' => 10, 'editor_css' => '<style>.wp-core-ui{width:95%;} </style>',) ); ?>
    <br />
        <span class="description"><?php _e('Текст для страницы блог'); ?></span>
    </td>
    </tr>
<?php
}

//Функция сохранения данных для дополнительных полей таксономии
function blogs_custom_fields_save($term_id){
    if (isset($_POST['Blogs_meta'])) {
        $t_id = $term_id;
        $cat_meta = get_option("category_$t_id");
        $cat_keys = array_keys($_POST['Blogs_meta']);
        foreach ($cat_keys as $key) {
            if (isset($_POST['Blogs_meta'][$key])) {
                $cat_meta[$key] = $_POST['Blogs_meta'][$key];
            }
        }
        //save the option array
        update_option("category_$t_id", $cat_meta);
    }
}

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*****************************************************************REMOVE CATEGORY_TYPE SLUG*********************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Удаление blogs-list из url таксономии
function true_remove_slug_from_category_blogs_list( $url, $term, $taxonomy ){

	$taxonomia_name = 'blogs-list';
	$taxonomia_slug = 'blogs-list';

	if ( strpos($url, $taxonomia_slug) === FALSE || $taxonomy != $taxonomia_name ) return $url;

	$url = str_replace('/' . $taxonomia_slug, '', $url);

	return $url;
}
add_filter( 'term_link', 'true_remove_slug_from_category_blogs_list', 10, 3 );

//Перенаправление url в случае удаления blogs-list
function parse_request_url_category_blogs_list( $query ){

	$taxonomia_name = 'blogs-list';

	if( $query['attachment'] ) :
		$condition = true;
		$main_url = $query['attachment'];
	else:
		$condition = false;
		$main_url = $query['name'];
	endif;

	$termin = get_term_by('slug', $main_url, $taxonomia_name);

	if ( isset( $main_url ) && $termin && !is_wp_error( $termin )):

		if( $condition ) {
			unset( $query['attachment'] );
			$parent = $termin->parent;
			while( $parent ) {
				$parent_term = get_term( $parent, $taxonomia_name);
				$main_url = $parent_term->slug . '/' . $main_url;
				$parent = $parent_term->parent;
			}
		} else {
			unset($query['name']);
		}

		switch( $taxonomia_name ):
			case 'category':{
				$query['category_name'] = $main_url;
				break;
			}
			case 'post_tag':{
				$query['tag'] = $main_url;
				break;
			}
			default:{
				$query[$taxonomia_name] = $main_url;
				break;
			}
		endswitch;

	endif;

	return $query;

}
add_filter('request', 'parse_request_url_category_blogs_list', 1, 1 );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*****************************************************************REMOVE POST_TYPE SLUG*********************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Удаление ug_objects из url таксономии
function remove_slug_from_post( $post_link, $post, $leavename ) {
	if ( 'blogs' != $post->post_type /*&& 'ug-objects' != $post->post_type && 'ug-done-jobs' != $post->post_type*/ || 'publish' != $post->post_status ) {
		return $post_link;
	}
		$post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
	return $post_link;
}
add_filter( 'post_type_link', 'remove_slug_from_post', 10, 3 );

function parse_request_url_post( $query ) {
	if ( ! $query->is_main_query() )
		return;

	if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
		return;
	}

	if ( ! empty( $query->query['name'] ) ) {
		$query->set( 'post_type', array( 'post', 'blogs', 'page' ) );
	}
}
add_action( 'pre_get_posts', 'parse_request_url_post' );

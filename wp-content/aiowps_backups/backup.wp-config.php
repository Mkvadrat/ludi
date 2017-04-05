<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'ludi_psych');

/** Имя пользователя MySQL */
define('DB_USER', 'ludi_psych');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'xKy1?O,{g^lc');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'O{--dc0//j[F5%AP00EQt:6D([wM293{U=0kK+=z|XkaU0G}=dFD@MGb0&>/@y3S');
define('SECURE_AUTH_KEY',  ',Xn+@%MjIq7oq_~RIR]MrRA4y~&qp)y,[+W$e1qeR8)+4b29L/]C@aEE8SHS6T&Q');
define('LOGGED_IN_KEY',    'F0Wqug@k6N`tLWd.0-35*Qa{p<&(e:*@|B[vr2;{?XCQJvKHE=3YK[>|a63Xba86');
define('NONCE_KEY',        '!do1PhG${+`_;Fg.d=/z$Ea*ogfS5m6ZJBuBwPF!g,yiW6GjIXV&rA=ECVx2dYYH');
define('AUTH_SALT',        'SxClnvx~ M56iN0EO%3S~g`sNW5N#JHZ{txu2ju^1}sLqg-56I[]|. JylJiH@2L');
define('SECURE_AUTH_SALT', 'r&MER9$?%ZG 3HY3,x.`n2eKEbPBg57|(GW.Y_EP!=}e`(>~?owB[{,/t g&4JXJ');
define('LOGGED_IN_SALT',   '=4U`<p/0 ]2#QZI|fcH)>GC7#0{)WBO?4S7|%l/((q2>S&G&SI2[L/Ne7K8WD^IG');
define('NONCE_SALT',       'Fl*$b`Lo>,V1oc[Gido{aN88NUp,W#MucV 1Jn18is*9^^9JBBG9cpHZ5fh@a(<u');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'ru_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');

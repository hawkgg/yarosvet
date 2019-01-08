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
define('DB_NAME', 'yarosvet');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

// Отключает абзацы у форм
define( 'WPCF7_AUTOP', false );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '/D%!-RLerR<WV.[k*>+B1!dCu$y7OG;OFcB^e#=Rl3)E7GaO<Fp>.{P{2V_eY`}Z');
define('SECURE_AUTH_KEY',  'P]M[u+I{ )aO??]!WC7O>AiP].a=C.S<L|MpOvORH,P-@KZZch.L[dexym,};9Ya');
define('LOGGED_IN_KEY',    'd-_?rm?TPZ},UY9.@zqBNU2W&<O91(BeY@[u$@a[3Y5XQ{x1+%Z,cJtw0B:D(y,/');
define('NONCE_KEY',        'p?tJ@N{9I1{~Nb0Kq`28Rey6T!f+P zX1DNr%vW1.R=nXh|ZrS8OY=/Wh^XxS|ot');
define('AUTH_SALT',        'uyA96;[<(I##;K5q H)&+Rt$?8?l}b9P9.H4VswsM.S7f4;U%i#?]Nk{)TO%XX{]');
define('SECURE_AUTH_SALT', 'W0q-i{22JqA=PH;tGln{}%P;$9P5ZM[Ch7vk14R8XzDHx!PP!@J1EO}6U!t._HS%');
define('LOGGED_IN_SALT',   'r:a2#D.Eg[bzn1qlg5+Iqsu|&a@jZV7tJ&-s[isSwXy{_gC%Y4]4m`w6vs~Yw,qy');
define('NONCE_SALT',       '+ fy@<tD.6,fJG~)lB-)(&]rF6;f=69Qj&OZGf[W3z7H:$X6S ` @gjMcVKv}i.z');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

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
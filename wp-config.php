<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
// define( 'DB_NAME', "medicalvn_medicalapp");
// define( 'DB_USER', "medicalvn_medicalapp");
// define( 'DB_PASSWORD', "medicalvn_medicalapp");

define( 'DB_NAME', "medicalvn_db");
define( 'DB_USER', "medicalvn_db");
define( 'DB_PASSWORD', "medic@lvn");

define( 'DB_HOST', '45.117.168.156' );

define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'lJ_NaBm2=/GMnc^W!>> 97mba|}P[YQr1(u} %2[Gh.Ab!+Y>NmUukulct]Y7sbx' );
define( 'SECURE_AUTH_KEY',  ';xgWxatMH_k)w2H.c|ox,qn2x9,fjx:$h{4TO /om4zM)R#fO 2ORYN[4enT*]+Q' );
define( 'LOGGED_IN_KEY',    'C5~dV)ry|ba`U-ki^ygoT6iGsy)t6DjBL*%qW^_*=|!AfR9NlA#(:HQP.dgYC[[K' );
define( 'NONCE_KEY',        'X:`vQ WmFs]#W4q6YTCuz8=] WkbM/+^RKblu0w]jXeeF$+L`{P{`v/+%.NL/A,Q' );
define( 'AUTH_SALT',        'CK7&+pkP..Vso:|u?^Iom5:?Y@-Gp`>uRU+h@Dq^~]S0LWL[@];/8|dur]L6|XL^' );
define( 'SECURE_AUTH_SALT', 'c9i.:ZvPT71n0IsKy WN&3/|DLA)aXM*l{__QdzpIm%.j3PH1,(X(X?qc|y)-zQl' );
define( 'LOGGED_IN_SALT',   'mAcECR^MK2f.@P;R{RvOe:1a-q.Ln(0nG6^&J]Oz(saWnk(<%lr$sq]nL3yOf+FL' );
define( 'NONCE_SALT',       'Uye+<BKZ17si](v_-][F8-1TWbANc]n9V4e^4Pqf(f+Ic+j{R&OsCZ{yu^9e9jJ:' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');

<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'jps' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Px}l}`4N7| Xs{~qXAy0eL,j6lyfsA),5o t5FnE7SpVo-&Rlr?&=uou6E#S-_mz' );
define( 'SECURE_AUTH_KEY',  'I4XsmL!Jf33msO@FHI<-]5?BS+U1yu-wwYKP;+M`Pm;wiM?%lt.c>07nowiLF&(c' );
define( 'LOGGED_IN_KEY',    'W#l+!eV_bwL%O>r;yK6f2I+OUq>c59msUh Q{)KCZAG4(jdtfU|8<Hk_H?f.3^K]' );
define( 'NONCE_KEY',        'Xa!?84q?9mr yIaAWDhsD;ee{@MMr~ZR[+Ig^c#EI$U)/ny+t F{ixts!$n({RZE' );
define( 'AUTH_SALT',        '[{C9d0;E7*OL5B*oi{(UQw%ZxuAA_0-W2J>PY/RJI/F6],uj[ckr6M[K|F82cyeC' );
define( 'SECURE_AUTH_SALT', 'otTc/:`;d+/pHb3@RlpLjy^#|xL~v%U_69$E$tQ1Vi? O]MzI57`oW)3UFU*k7il' );
define( 'LOGGED_IN_SALT',   '6xoE;iPI)I#}L Wot2oo}CL`x?0.12q]8KOJZ%YF_f5r|*r(- %1@`v<3|za%Bj9' );
define( 'NONCE_SALT',       'H1n^VcyV90zC16LLZ~/4:5QeLX/HRT<ht4KuL3{/e<,<9Xx7^0=[PgVQ4cg,-XJ#' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

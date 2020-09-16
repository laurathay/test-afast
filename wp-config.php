<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'test-afast' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ':T&o`Hdkp_:t_cZi0p4q0Ikb549W?C&4ZAZA!qhH7@yNac?Ybu{S`?3qz4db1akh' );
define( 'SECURE_AUTH_KEY',  'i3N-#g+u<9@8wG!Nu#u;0OJ,w*mEZj8No$rXg<Lv=44jRg`}DDO:6S.-&{R25=ji' );
define( 'LOGGED_IN_KEY',    ')%N| k-YvjfR@vrxg~_kO1g*]EH/tu~1zZ|y<G[H`[LNe}*|#C?0pf@h4MF~)`/;' );
define( 'NONCE_KEY',        '^!u?<}@DxJ6qtk*^AJfrJ#|-5#<66duD.7Z9XQD>W-yNyKCtV+#WA9Y]gJA=9qJ.' );
define( 'AUTH_SALT',        'JN*j,o&3<EM(ipP<#~ek0WC_1Xa`R^H1y-k-Jq%03TITYdWG<EU-A/uO;x#~:~+e' );
define( 'SECURE_AUTH_SALT', 'NZzB,(fK>3v%OfW/B8RE51vA([<=1Q>Xx$54-l2^Wl/]V5IiY*M/m$}.b82CC}uA' );
define( 'LOGGED_IN_SALT',   '&4EYRh?:V={a{g9Ku<~8HLu&p1?j!i.pCBio1.b6+[6xF]90o]@oI7R,r.7BZ<d,' );
define( 'NONCE_SALT',       '`</2L*LFtGFhRz(NF$7hg3=@7UI(J[-$H7UBXEp:}Y55iR0!b`#-Qt@(fL>=UnXH' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_admin_afast_test';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );

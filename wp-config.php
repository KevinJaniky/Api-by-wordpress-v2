<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'api');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'root');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '8;YV-JP8EBCk9qm3lM1lh f@4|n-w!#H.(6^*h#`LC,1F6QEIO-])L4jfv{}qJn.');
define('SECURE_AUTH_KEY',  'EH~d-,[F|QLIvxlN|)5!+W8W7k+Oc9v-L ~UboMFKe`<ZKU2#T51qMD,/]5;Ico~');
define('LOGGED_IN_KEY',    '?n vM|QI`D/54`Y84-is=gz4ck&ELGqpu6,|t@W&3]ipUj|jdM:wDN[=}5#TWU):');
define('NONCE_KEY',        '+~@~DbH6=kGFPtI$r A|#GTezl2{88ZE+n)X51vP&7`3Y+0MgRHl.Dt$A!Lb%LRh');
define('AUTH_SALT',        '-a-6TOP~X*uhY(kuHp1?VjOScCa)biCIAIL)]wJDY=Y5v#wAr3b*EC-j!aekQmR|');
define('SECURE_AUTH_SALT', 'MmfBA ^+W~*,y@Qvq[_R#+Ry}F0];05#d>_>tCAs7!)M;?e R79}LBbp(*_t6UvP');
define('LOGGED_IN_SALT',   '.w`:ZiK_dCJSS&uqVf`+B|Q:DsxqybK8oc06Sbog0v=[MDD%TIvr]|;Pic,,{n[x');
define('NONCE_SALT',       '}VMIdRvBcQp?O$q9t|O&Vc/oqxS8V2L*U9hcmJnuL?3YKe{yc@epk4qQxJn?Wjoh');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

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
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
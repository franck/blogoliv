<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/Editing_wp-config.php Modifier
 * wp-config.php} (en anglais). C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'blogoliv');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'hb.lmpbEmxd}6i NAKPp|+lL0jW2(>cm8svM+vY4HYEjxC{?P2+:~UwH|]IE=xvW'); 
define('SECURE_AUTH_KEY',  'vZhe` x}Af_BpaV>``{hs0P8k$uFsT-L.j_IMgu5M>a^6_<[+w$8F4)$|5x{c+if'); 
define('LOGGED_IN_KEY',    '<8^3u-C8.l}-{$!Ae#6@NqtO(s6z0q0qR<#Gxg.>0k~7qeuGg|H3?-}<s}W2cALE'); 
define('NONCE_KEY',        'lvE6vha|(qffdlr@JWwM!p}]W75X*[Cj7z*2O$,5S]2BCOd&YviK66)ZDB6!+Izh'); 
define('AUTH_SALT',        '~%l6,_+QF6:-f:CSHLsOJTmC>-z=0SLe+lk(+kB^2f!VDC(|)J.aa5-n7NZ%&.{Q'); 
define('SECURE_AUTH_SALT', '#JJi11cibpKrFU^bz2&+SHd }q`+i,[%)<{hg?D#8u.2/mBV|3%CM+NI1e[XT*i^'); 
define('LOGGED_IN_SALT',   'h@z;1TF{WlROTZ[RC~9VSsFCu5f[]9_/]jg]7KtSr7_3e7P|8]3lbBBj%:>](Z^o'); 
define('NONCE_SALT',       '2kl>l}_ice<~$Tgg jY3[N-554<6+hR`>J?D@;1hvpYdw`&+cX&-S6%2h^Nx*LDl'); 
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';

/**
 * Langue de localisation de WordPress, par défaut en Anglais.
 *
 * Modifiez cette valeur pour localiser WordPress. Un fichier MO correspondant
 * au langage choisi doit être installé dans le dossier wp-content/languages.
 * Par exemple, pour mettre en place une traduction française, mettez le fichier
 * fr_FR.mo dans wp-content/languages, et réglez l'option ci-dessous à "fr_FR".
 */
define ('WPLANG', 'fr_FR');

/** 
 * Pour les développeurs : le mode deboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
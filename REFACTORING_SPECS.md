# Specifications du Refactoring : Piwigo sur Cloud Run avec Theme Enfant (Child Theme)

Ce document detaille la nouvelle architecture Docker pour le deploiement de Piwigo sur Google Cloud Run (Scale-to-Zero), suite a la migration vers l'image officielle piwigo/piwigo:latest. L'architecture repose desormais sur un theme enfant leger base sur Modus plutot que sur le theme lourd bootstrap_darkroom.

## Objectifs de la Migration
1.  **Modernisation :** Utiliser l'image officielle basee sur Alpine Linux, Nginx et PHP 8.4-FPM pour des performances accrues et une taille d'image reduite.
2.  **Compatibilite Cloud Run (Scale-to-zero) :** Packager l'application et ses dependances (plugins, theme enfant) directement dans l'image Docker pour un deploiement stateless ultra-leger.
3.  **Authentification :** L'authentification etant desormais geree par OIDC cote base de donnees, le plugin LDAP et les scripts associes ont ete retires.
4.  **Allegement du Frontend :** Remplacer le lourd bootstrap_darkroom par un theme enfant (jo-mat-theme) heritant de modus pour des temps de chargement optimaux et une maintenance minimale.

## Changements Majeurs

### 1. Image de Base et Dependances
*   **Avant :** L'image etait construite manuellement depuis php:8.0-apache.
*   **Maintenant :** Heritage direct de piwigo/piwigo:latest. Toutes les extensions PHP (GD, Exif, etc.) et outils systeme (ImageMagick) sont deja inclus nativement. Le plugin LDAP (Ldap_Login) a ete supprime du build.

### 2. Theme Enfant Sur-Mesure (jo-mat-theme)
L'ancien theme bootstrap_darkroom a ete supprime. A la place, un theme enfant a ete cree dans /themes/jo-mat-theme/ :
*   **Heritage :** Il est defini dans themeconf.inc.php avec pour parent modus (le theme officiel moderne par defaut de Piwigo).
*   **CSS & Assets :** custom.css, cover.css, cover.jpeg, et download.png ont ete rapatries dans l'architecture propre au theme (css/ et img/). Le chemin vers l'image de fond dans cover.css a ete corrige (../img/cover.jpeg).
*   **Injection de code :** Creation du fichier local_head.tpl natif a Piwigo. Il se charge d'injecter custom.css globalement et de declencher cover.css de facon conditionnelle uniquement si l'utilisateur n'est pas connecte ({if !isset($U_LOGOUT)}).

### 3. Gestion de l'Initialisation et de la Base de Donnees
*   **Nouveau systeme :** Utilisation du mecanisme natif de l'image officielle (s6-overlay). Le fichier entrypoint.sh est copie dans /piwigo-data/scripts/user.sh. Ce script est execute automatiquement en tant que root *avant* le lancement du serveur web.
*   **Role du script :** Il recupere les variables d'environnement (MYSQL_DATABASE, etc.) injectees par Cloud Run et genere dynamiquement le fichier /var/www/html/piwigo/local/config/database.inc.php.

## Fichiers Modifies/Crees
*   Dockerfile : Entierement reecrit pour utiliser l'image officielle et copier le theme enfant au lieu de bootstrap.
*   entrypoint.sh : Nouveau script d'initialisation.
*   themes/jo-mat-theme/ : Nouveau repertoire contenant le theme enfant (CSS, images, config et templates).

## Nettoyage du Depot (Clean-up)
Tous les anciens fichiers et "hacks" de templates lies a bootstrap_darkroom ont ete supprimes pour assainir le depot :
*   Suppression des scripts d'init manuels (t.php, fpm-entrypoint.sh, run.sh, php-piwigo.ini, database.inc.php).
*   Suppression des vieux templates de surcharge devenus inutiles ou geres nativement (picture_nav.tpl, _photoswipe_js.tpl).
*   Suppression de l'ancien repertoire de configuration jo-mat/.

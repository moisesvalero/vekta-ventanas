<?php
/**
 * Vekta Ventanas - Theme Functions
 *
 * @package Vekta_Ventanas
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Seguridad: Salir si se accede directamente.
}

define( 'VEKTA_VERSION', '1.0.0' );
define( 'VEKTA_DIR', get_stylesheet_directory() );
define( 'VEKTA_URI', get_stylesheet_directory_uri() );

// Carga de módulos de inicialización y personalización
require_once VEKTA_DIR . '/inc/setup.php';
require_once VEKTA_DIR . '/inc/hooks.php';

<?php
/**
 * Setup and Asset Enqueueing for Vekta Ventanas
 *
 * @package Vekta_Ventanas
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Encolar estilos y scripts del tema
 */
function vekta_enqueue_scripts() {
	// Si estamos en la portada, se utiliza la arquitectura visual de Stitch (Aura Architectural Systems)
	if ( is_front_page() ) {
		return;
	}

	// 1. Estilos del tema padre GeneratePress (solo para páginas estándar de blog)
	$parent_version = defined( 'GENERATE_VERSION' ) ? GENERATE_VERSION : VEKTA_VERSION;
	wp_enqueue_style(
		'generatepress-parent-style',
		get_template_directory_uri() . '/style.css',
		array(),
		$parent_version
	);

	// 2. Google Fonts (Plus Jakarta Sans y Outfit) optimizadas
	wp_enqueue_style(
		'vekta-fonts',
		'https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap',
		array(),
		null
	);

	// 3. Tokens de Diseño CSS (Variables, Tipografía Fluida, Elevaciones)
	wp_enqueue_style(
		'vekta-tokens',
		VEKTA_URI . '/assets/css/tokens.css',
		array(),
		VEKTA_VERSION
	);

	// 4. Estilos y Componentes de Vekta Ventanas
	wp_enqueue_style(
		'vekta-styles',
		VEKTA_URI . '/assets/css/vekta.css',
		array( 'vekta-tokens' ),
		VEKTA_VERSION
	);

	// 5. JavaScript interactivo (Simulador térmico/acústico y configurador)
	wp_enqueue_script(
		'vekta-simulator',
		VEKTA_URI . '/assets/js/simulator.js',
		array(),
		VEKTA_VERSION,
		true // In footer
	);

	// Pasar parámetros al script si fuese necesario
	wp_localize_script(
		'vekta-simulator',
		'vektaData',
		array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'siteUrl' => home_url( '/' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'vekta_enqueue_scripts', 20 );

/**
 * Añadir preconnect para acelerar la carga de fuentes
 */
function vekta_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.googleapis.com',
			'crossorigin' => 'anonymous',
		);
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'vekta_resource_hints', 10, 2 );

/**
 * Cargar scripts con atributo defer para máximo rendimiento Core Web Vitals
 */
function vekta_defer_scripts( $tag, $handle, $src ) {
	if ( 'vekta-simulator' === $handle ) {
		return '<script src="' . esc_url( $src ) . '" defer id="' . esc_attr( $handle ) . '-js"></script>' . "\n";
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'vekta_defer_scripts', 10, 3 );

/**
 * Inyectar meta tags SEO, Open Graph y Schema.org LocalBusiness
 */
function vekta_seo_meta_and_schema() {
	if ( is_front_page() ) {
		?>
		<meta name="description" content="Vekta Ventanas: Fabricación e instalación de ventanas de PVC Passivhaus, correderas elevables y aislamiento acústico extremo de hasta -52 dB. Solicita medición gratuita.">
		<meta property="og:type" content="website">
		<meta property="og:url" content="<?php echo esc_url( home_url( '/' ) ); ?>">
		<meta property="og:title" content="Vekta Ventanas | Carpintería Arquitectónica de PVC y Aislamiento Acústico">
		<meta property="og:description" content="Ventanas de PVC de alta ingeniería: confort térmico, silencio absoluto y ahorro de hasta el 65% en climatización.">
		<meta property="og:image" content="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/hero-architecture.jpg' ); ?>">
		<script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type": "HomeAndConstructionBusiness",
			"name": "Vekta Ventanas",
			"description": "Sistemas de carpintería de PVC de alta eficiencia térmica, aislamiento acústico certificado y estándar Passivhaus.",
			"url": "<?php echo esc_url( home_url( '/' ) ); ?>",
			"telephone": "+34900831240",
			"priceRange": "€€",
			"address": {
				"@type": "PostalAddress",
				"streetAddress": "C/ Arquitectura 14, Parque Tecnológico",
				"addressLocality": "Madrid",
				"postalCode": "28001",
				"addressCountry": "ES"
			},
			"aggregateRating": {
				"@type": "AggregateRating",
				"ratingValue": "4.9",
				"reviewCount": "184"
			}
		}
		</script>
		<?php
	}
}
add_action( 'wp_head', 'vekta_seo_meta_and_schema', 5 );

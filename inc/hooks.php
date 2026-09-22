<?php
/**
 * GeneratePress Hooks and Custom Filters for Vekta Ventanas
 *
 * @package Vekta_Ventanas
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Añadir clases semánticas al <body>
 */
function vekta_body_classes( $classes ) {
	$classes[] = 'vekta-theme';
	$classes[] = 'vekta-modern-ui';
	if ( is_front_page() ) {
		$classes[] = 'vekta-front-page';
	}
	return $classes;
}
add_filter( 'body_class', 'vekta_body_classes' );

/**
 * Desactivar header y footer genéricos de GeneratePress en la portada (usamos los componentes arquitectónicos de Vekta)
 */
function vekta_clean_front_page_layout() {
	if ( is_front_page() ) {
		remove_action( 'generate_header', 'generate_construct_header' );
		remove_action( 'generate_footer', 'generate_construct_footer' );
	}
}
add_action( 'wp', 'vekta_clean_front_page_layout' );

/**
 * Personalizar el copyright en el pie de página de GeneratePress
 */
function vekta_custom_copyright() {
	?>
	<span class="copyright">
		&copy; <?php echo date( 'Y' ); ?> <strong>Vekta Ventanas</strong> — Sistemas de Carpintería de PVC de Alta Eficiencia y Aislamiento Acústico. Todos los derechos reservados.
	</span>
	<?php
}
add_filter( 'generate_copyright', 'vekta_custom_copyright' );

/**
 * Ajustar el ancho máximo del contenedor principal en GeneratePress
 */
function vekta_set_container_width( $defaults ) {
	$defaults['container_width'] = '1280';
	return $defaults;
}
add_filter( 'generate_option_defaults', 'vekta_set_container_width' );

/**
 * Shortcode para insertar el Simulador Interactivo en cualquier página o bloque Gutenberg
 * Uso: [vekta_simulador]
 */
function vekta_simulador_shortcode() {
	ob_start();
	?>
	<div class="vk-simulator-wrap" id="simulador-aislamiento">
		<div class="vk-simulator-card">
			<div class="vk-sim-header">
				<div class="vk-badge-mini">HERRAMIENTA INTERACTIVA</div>
				<h3 class="vk-sim-title">Simulador de Eficiencia Térmica & Acústica</h3>
				<p class="vk-sim-desc">Compara en tiempo real la diferencia técnica entre perfiles antiguos y la tecnología multicámara Vekta con gas Argón.</p>
			</div>

			<!-- Selector de Vidrio / Tecnología -->
			<div class="vk-glass-selector" role="tablist" aria-label="Tecnología de Ventana">
				<button type="button" class="vk-tab-btn" data-tech="simple" role="tab" aria-selected="false">
					<span class="vk-tab-icon" aria-hidden="true">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="12" y1="3" x2="12" y2="21"/><line x1="3" y1="12" x2="21" y2="12"/></svg>
					</span>
					<span class="vk-tab-name">Vidrio Simple</span>
					<span class="vk-tab-sub">Perfil aluminio antiguo</span>
				</button>
				<button type="button" class="vk-tab-btn active" data-tech="doble" role="tab" aria-selected="true">
					<span class="vk-tab-icon" aria-hidden="true">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
					</span>
					<span class="vk-tab-name">Vekta Confort 76</span>
					<span class="vk-tab-sub">Doble vidrio térmico + Argón</span>
				</button>
				<button type="button" class="vk-tab-btn" data-tech="triple" role="tab" aria-selected="false">
					<span class="vk-tab-icon" aria-hidden="true">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
					</span>
					<span class="vk-tab-name">Vekta Passivhaus</span>
					<span class="vk-tab-sub">Triple vidrio 7 cámaras A+++</span>
				</button>
			</div>

			<!-- Panel de Métricas Dinámicas -->
			<div class="vk-metrics-grid">
				<div class="vk-metric-card" id="card-ruido">
					<div class="vk-metric-icon-wrap noise-icon">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 5L6 9H2v6h4l5 4V5z"/><path d="M15.54 8.46a5 5 0 0 1 0 7.07"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14"/></svg>
					</div>
					<div class="vk-metric-content">
						<span class="vk-metric-label">Aislamiento Acústico</span>
						<span class="vk-metric-value" id="val-ruido">-45 dB</span>
						<span class="vk-metric-bar"><span class="vk-bar-fill" id="bar-ruido" style="width: 88%;"></span></span>
						<span class="vk-metric-note" id="note-ruido">Silencio equivalente a biblioteca</span>
					</div>
				</div>

				<div class="vk-metric-card" id="card-termico">
					<div class="vk-metric-icon-wrap temp-icon">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 14.76V3.5a2.5 2.5 0 0 0-5 0v11.26a4.5 4.5 0 1 0 5 0z"/></svg>
					</div>
					<div class="vk-metric-content">
						<span class="vk-metric-label">Transmitancia Térmica (Uw)</span>
						<span class="vk-metric-value" id="val-termico">0.82 W/m²K</span>
						<span class="vk-metric-bar"><span class="vk-bar-fill eco" id="bar-termico" style="width: 94%;"></span></span>
						<span class="vk-metric-note" id="note-termico">Máxima calificación A+++</span>
					</div>
				</div>

				<div class="vk-metric-card" id="card-ahorro">
					<div class="vk-metric-icon-wrap euro-icon">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/><path d="M12 18V6"/></svg>
					</div>
					<div class="vk-metric-content">
						<span class="vk-metric-label">Ahorro Anual Climatización</span>
						<span class="vk-metric-value highlight" id="val-ahorro">Hasta 65%</span>
						<span class="vk-metric-bar"><span class="vk-bar-fill gold" id="bar-ahorro" style="width: 75%;"></span></span>
						<span class="vk-metric-note" id="note-ahorro">~480€/año en factura energética</span>
					</div>
				</div>
			</div>

			<!-- Simulación Gráfica Visual -->
			<div class="vk-visual-sim">
				<div class="vk-sim-side outdoor">
					<span class="vk-sim-side-label">EXTERIOR</span>
					<div class="vk-sim-env">
						<span class="vk-temp-pill out-temp">3°C Invierno / 38°C Verano</span>
						<span class="vk-noise-badge out-noise">Tráfico Intenso: 80 dB</span>
					</div>
				</div>
				<div class="vk-sim-window-core">
					<div class="vk-core-glass" id="core-glass-layers">
						<span class="vk-glass-pane"></span>
						<span class="vk-gas-chamber"><small>Argón 90%</small></span>
						<span class="vk-glass-pane"></span>
					</div>
					<span class="vk-profile-label" id="profile-text">Perfil 76mm 6 Cámaras</span>
				</div>
				<div class="vk-sim-side indoor">
					<span class="vk-sim-side-label">INTERIOR CONFORT</span>
					<div class="vk-sim-env">
						<span class="vk-temp-pill in-temp" id="in-temp-val">21.5°C Constante</span>
						<span class="vk-noise-badge in-noise" id="in-noise-val">Confort acústico: 35 dB</span>
					</div>
				</div>
			</div>

			<div class="vk-sim-footer">
				<span>¿Quieres calcular el coste exacto para las medidas de tu vivienda?</span>
				<a href="#configurador" class="vk-btn-primary">Configurar mi presupuesto &rarr;</a>
			</div>
		</div>
	</div>
	<?php
	return ob_get_clean();
}
add_shortcode( 'vekta_simulador', 'vekta_simulador_shortcode' );

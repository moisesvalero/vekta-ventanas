<?php
/**
 * Front Page Template for Vekta Ventanas
 * Web corporativa llave en mano de alta ingeniería arquitectónica en PVC
 *
 * @package Vekta_Ventanas
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'vekta-front-canvas' ); ?>>
<?php wp_body_open(); ?>

<!-- 1. TOP ANNOUNCEMENT BAR -->
<aside class="vk-top-announcement" aria-label="Aviso comercial y ayudas">
	<div class="vk-container vk-announcement-container">
		<div class="vk-announcement-text">
			<span class="vk-pulse-dot" aria-hidden="true"></span>
			<strong>Plan Eficiencia Energética 2026:</strong> Hasta <strong>3.000 € de subvención</strong> directa por vivienda. ¡Tramitamos tu ayuda europea gratis!
		</div>
		<div class="vk-announcement-contact">
			<a href="tel:900831240" class="vk-announcement-link">
				<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
				Teléfono Gratuito: <strong>900 831 240</strong>
			</a>
			<span class="vk-separator">|</span>
			<span class="vk-status-open"><span class="vk-pulse-dot mini" aria-hidden="true"></span> Showroom Abierto hoy hasta 19:30</span>
		</div>
	</div>
</aside>

<!-- 2. BARRA DE NAVEGACIÓN ARQUITECTÓNICA VEKTA (Landmark banner independiente) -->
<header class="vk-nav-wrapper" role="banner">
	<div class="vk-container vk-nav-container">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="vk-brand-logo" aria-label="Vekta Ventanas - Inicio">
			<div class="vk-logo-mark">V</div>
			<div class="vk-brand-text-wrap">
				<span class="vk-brand-name">VEKTA <span>VENTANAS</span></span>
				<span class="vk-brand-tagline">Architectural PVC Systems</span>
			</div>
		</a>

		<nav class="vk-nav-links" aria-label="Navegación principal">
			<a href="#soluciones" class="vk-nav-link">Sistemas & Series</a>
			<a href="#simulador" class="vk-nav-link">Simulador Acústico</a>
			<a href="#ingenieria" class="vk-nav-link">Ingeniería</a>
			<a href="#proyectos" class="vk-nav-link">Obras Realizadas</a>
			<a href="#opiniones" class="vk-nav-link">Opiniones</a>
			<a href="#faq" class="vk-nav-link">Preguntas</a>
			<a href="#contacto" class="vk-nav-link">Showroom</a>
		</nav>

		<div class="vk-nav-actions">
			<a href="#configurador" class="vk-btn-primary">
				<span>Calcular Presupuesto</span>
				<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
			</a>
			<!-- Botón Hamburguesa Móvil -->
			<button type="button" class="vk-mobile-toggle" id="vk-mobile-menu-btn" aria-label="Abrir menú de navegación" aria-expanded="false" aria-controls="vk-mobile-drawer">
				<span class="vk-toggle-bar"></span>
				<span class="vk-toggle-bar"></span>
				<span class="vk-toggle-bar"></span>
			</button>
		</div>
	</div>
</header>

<!-- MENÚ MÓVIL DESPLEGABLE (OFF-CANVAS) -->
<div class="vk-mobile-drawer" id="vk-mobile-drawer" aria-hidden="true">
	<div class="vk-drawer-header">
		<span class="vk-brand-name">VEKTA <span>VENTANAS</span></span>
		<button type="button" class="vk-drawer-close" id="vk-drawer-close-btn" aria-label="Cerrar menú">&times;</button>
	</div>
	<nav class="vk-drawer-nav">
		<a href="#soluciones" class="vk-drawer-link">Sistemas & Series</a>
		<a href="#simulador" class="vk-drawer-link">Simulador de Aislamiento</a>
		<a href="#ingenieria" class="vk-drawer-link">Ingeniería & Perfiles</a>
		<a href="#proyectos" class="vk-drawer-link">Obras Realizadas</a>
		<a href="#configurador" class="vk-drawer-link">Calcular Presupuesto</a>
		<a href="#opiniones" class="vk-drawer-link">Opiniones de Clientes</a>
		<a href="#faq" class="vk-drawer-link">Preguntas Frecuentes</a>
		<a href="#contacto" class="vk-drawer-link">Showroom Central</a>
	</nav>
	<div class="vk-drawer-footer">
		<a href="tel:900831240" class="vk-btn-primary" style="width: 100%;">Llamar: 900 831 240</a>
	</div>
</div>

<main id="primary" class="site-main vk-main-wrapper">

	<!-- 3. HERO SECTION CINEMATOGRÁFICA -->
	<section class="vk-hero-section">
		<div class="vk-hero-bg-media" aria-hidden="true">
			<img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1600&q=85" alt="Vivienda contemporánea con grandes ventanales de PVC Vekta" class="vk-hero-bg-img" loading="eager" />
			<div class="vk-hero-overlay"></div>
		</div>

		<div class="vk-container vk-hero-inner">
			<div class="vk-hero-content">
				<div class="vk-hero-badge-wrap">
					<span class="vk-badge-pill eco">
						<span class="vk-pulse-icon">●</span> Passivhaus Certified & A+++ Eficiencia
					</span>
					<span class="vk-badge-pill dark">
						<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex-shrink:0;"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg> Sistemas Alemanes Kömmerling® 76/88
					</span>
				</div>

				<h1 class="vk-hero-title">
					Ventanas de PVC que transforman tu hogar en un santuario de <span class="text-lime">silencio, luz y confort térmico</span>.
				</h1>

				<p class="vk-hero-lead">
					Ingeniería de vanguardia con perfiles multicámara de 6 y 7 cámaras estancas, triple acristalamiento bajo emisivo con gas argón y herrajes perimetrales antipalanca. Olvídate del ruido de la calle y ahorra hasta un 65% en calefacción y aire acondicionado.
				</p>

				<div class="vk-hero-cta-group">
					<a href="#configurador" class="vk-btn-primary vk-btn-lg">
						<span>Calcular Presupuesto Online</span>
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
					</a>
					<a href="#simulador" class="vk-btn-ghost vk-btn-lg">
						<span>Probar Simulador de Ruido</span>
					</a>
				</div>

				<!-- Stats en vivo -->
				<div class="vk-hero-stats">
					<div class="vk-stat-item">
						<span class="vk-stat-number accent">-52 dB</span>
						<span class="vk-stat-label">Insonorización acústica máxima</span>
					</div>
					<div class="vk-stat-item">
						<span class="vk-stat-number">0.65 Uw</span>
						<span class="vk-stat-label">Transmitancia Passivhaus</span>
					</div>
					<div class="vk-stat-item">
						<span class="vk-stat-number">15 Años</span>
						<span class="vk-stat-label">Garantía total de fábrica</span>
					</div>
					<div class="vk-stat-item">
						<span class="vk-stat-number accent">1 Día</span>
						<span class="vk-stat-label">Instalación limpia sin obras</span>
					</div>
				</div>
			</div>

			<!-- Tarjeta flotante interactiva de detalle arquitectónico -->
			<div class="vk-hero-showcase-box">
				<div class="vk-glass-card">
					<div class="vk-glass-card-header">
						<span class="vk-tag-live">VENTANA EN DETALLE</span>
						<span class="vk-glass-model">Serie Vekta 88 Passivhaus</span>
					</div>
					<div class="vk-card-window-photo">
						<img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=800&q=80" alt="Detalle de ventanales correderos de gran formato Vekta" loading="lazy" />
						<div class="vk-photo-tag-floating top-left">
							<span>Triple Vidrio Acústico SilenceCore™</span>
						</div>
						<div class="vk-photo-tag-floating bottom-right">
							<span>Perfil 88mm 7 Cámaras</span>
						</div>
					</div>
					<div class="vk-glass-specs">
						<div class="vk-spec-item">
							<span class="spec-label">Atenuación Acústica:</span>
							<span class="spec-val">-52 dB (Estudio Grabación)</span>
						</div>
						<div class="vk-spec-item">
							<span class="spec-label">Ahorro Energético Anual:</span>
							<span class="spec-val highlight">+680 €/año</span>
						</div>
						<div class="vk-spec-item">
							<span class="spec-label">Resistencia al Viento:</span>
							<span class="spec-val">Clase C5 (Huracán 160 km/h)</span>
						</div>
					</div>
					<a href="#configurador" class="vk-btn-primary" style="width: 100%; margin-top: 1.25rem;">Personalizar Medidas &rarr;</a>
				</div>
			</div>
		</div>
	</section>

	<!-- 4. TRUST & ALLIANCES LOGO BAR -->
	<section class="vk-trust-bar" aria-label="Alianzas y certificaciones">
		<div class="vk-container">
			<p class="vk-trust-title">Ingeniería certificada con los mejores fabricantes mundiales de carpintería técnica:</p>
			<div class="vk-partners-grid">
				<div class="vk-partner-badge">
					<strong>KÖMMERLING</strong>
					<span>Perfiles PVC Alemania</span>
				</div>
				<div class="vk-partner-badge">
					<strong>GUARDIAN SUN</strong>
					<span>Vidrio Control Solar</span>
				</div>
				<div class="vk-partner-badge">
					<strong>ROTO FRANK</strong>
					<span>Herrajes Seguridad RC2</span>
				</div>
				<div class="vk-partner-badge">
					<strong>PASSIVHAUS INSTITUT</strong>
					<span>Certificación Edificio Cero</span>
				</div>
				<div class="vk-partner-badge">
					<strong>SOMFY</strong>
					<span>Motorización Inteligente</span>
				</div>
				<div class="vk-partner-badge">
					<strong>AENOR ISO 9001</strong>
					<span>Calidad de Fabricación</span>
				</div>
			</div>
		</div>
	</section>

	<!-- 5. SIMULADOR INTERACTIVO DE AISLAMIENTO & EFICIENCIA TÉRMICA -->
	<section class="vk-simulator-section" id="simulador">
		<div class="vk-container">
			<?php echo do_shortcode( '[vekta_simulador]' ); ?>
		</div>
	</section>

	<!-- 6. SHOWROOM DE SISTEMAS CON FILTROS DINÁMICOS POR PESTAÑAS -->
	<section class="vk-solutions-section" id="soluciones">
		<div class="vk-container">
			<div class="vk-section-header vk-reveal">
				<span class="vk-section-subtitle">Catálogo de Sistemas de Alta Gama</span>
				<h2 class="vk-section-title">Soluciones a Medida para Cada Espacio</h2>
				<p class="vk-section-desc">Diseñadas para maximizar la entrada de luz solar, reducir el consumo en climatización y elevar la estética arquitectónica de tu vivienda.</p>
			</div>

			<!-- Pestañas de filtrado interactivo -->
			<div class="vk-filter-tabs" role="tablist" aria-label="Filtrar sistemas de carpintería">
				<button type="button" class="vk-filter-btn active" data-filter="all" role="tab" aria-selected="true">Todos los Sistemas (6)</button>
				<button type="button" class="vk-filter-btn" data-filter="abatible" role="tab" aria-selected="false">Ventanas Abatibles</button>
				<button type="button" class="vk-filter-btn" data-filter="corredera" role="tab" aria-selected="false">Correderas Panorámicas</button>
				<button type="button" class="vk-filter-btn" data-filter="puertas" role="tab" aria-selected="false">Puertas de Entrada</button>
				<button type="button" class="vk-filter-btn" data-filter="especiales" role="tab" aria-selected="false">Cajones & Persianas</button>
			</div>

			<div class="vk-solutions-grid" id="vk-products-container">
				<!-- Tarjeta 1: Abatible 76 -->
				<article class="vk-solution-card vk-reveal" data-category="abatible">
					<div class="vk-card-media">
						<img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=800&q=80" alt="Ventana abatible oscilobatiente Vekta Confort 76 instalada" loading="lazy" />
						<span class="vk-card-badge-top">Top Ventas Residencial</span>
						<span class="vk-card-price-tag">Desde 295 €/ud</span>
					</div>
					<div class="vk-card-body">
						<h3 class="vk-card-title">Vekta Confort 76 Abatible</h3>
						<p class="vk-card-text">Apertura practicable y oscilobatiente de alta estanqueidad con microventilación integrada. Máximo aislamiento térmico para cualquier vivienda urbana.</p>
						<ul class="vk-specs-list">
							<li class="vk-spec-row"><span>Perfilería:</span> <span>76mm | 6 cámaras estancas</span></li>
							<li class="vk-spec-row"><span>Insonorización:</span> <span>Hasta -46 dB</span></li>
							<li class="vk-spec-row"><span>Transmitancia Uw:</span> <span>0.82 W/m²K</span></li>
							<li class="vk-spec-row"><span>Herraje:</span> <span>Roto NT perimetral oscilobatiente</span></li>
						</ul>
						<div class="vk-card-footer">
							<a href="#configurador" class="vk-btn-primary" style="width: 100%;">Configurar esta ventana</a>
						</div>
					</div>
				</article>

				<!-- Tarjeta 2: Corredera Elevable Panorama Slide -->
				<article class="vk-solution-card vk-reveal" data-category="corredera">
					<div class="vk-card-media">
						<img src="https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?auto=format&fit=crop&w=800&q=80" alt="Corredera elevable panorámica Vekta Slide abierta hacia terraza" loading="lazy" />
						<span class="vk-card-badge-top">Gran Formato Panorámico</span>
						<span class="vk-card-price-tag">Desde 890 €/ud</span>
					</div>
					<div class="vk-card-body">
						<h3 class="vk-card-title">Vekta Panorama Slide Elevable</h3>
						<p class="vk-card-text">Corredera de suelo a techo con marco embutido y umbral plano a cota cero sin tropiezos. Desliza hojas de hasta 400 kg con un solo dedo.</p>
						<ul class="vk-specs-list">
							<li class="vk-spec-row"><span>Perfilería:</span> <span>Marco 160mm reforzado con acero</span></li>
							<li class="vk-spec-row"><span>Hojas de vidrio:</span> <span>Hasta 3,20 m de altura</span></li>
							<li class="vk-spec-row"><span>Transmitancia Uw:</span> <span>0.95 W/m²K</span></li>
							<li class="vk-spec-row"><span>Umbral accesible:</span> <span>A cota cero 0mm (PMR)</span></li>
						</ul>
						<div class="vk-card-footer">
							<a href="#configurador" class="vk-btn-primary" style="width: 100%;">Configurar esta ventana</a>
						</div>
					</div>
				</article>

				<!-- Tarjeta 3: Passivhaus 88 Ultra -->
				<article class="vk-solution-card vk-reveal" data-category="abatible">
					<div class="vk-card-media">
						<img src="https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=800&q=80" alt="Vivienda Passivhaus con ventanas Vekta 88 con triple vidrio" loading="lazy" />
						<span class="vk-card-badge-top">Certificación Passivhaus A+++</span>
						<span class="vk-card-price-tag">Desde 460 €/ud</span>
					</div>
					<div class="vk-card-body">
						<h3 class="vk-card-title">Vekta 88 Passivhaus Pro</h3>
						<p class="vk-card-text">El estándar definitivo para edificios de consumo energético casi nulo (ECCN). Triple junta de caucho EPDM y cámaras térmicas rellenas de aislamiento.</p>
						<ul class="vk-specs-list">
							<li class="vk-spec-row"><span>Perfilería:</span> <span>88mm | 7 cámaras con núcleo térmico</span></li>
							<li class="vk-spec-row"><span>Insonorización:</span> <span>Hasta -52 dB</span></li>
							<li class="vk-spec-row"><span>Transmitancia Uw:</span> <span>0.65 W/m²K (Ultra eficiente)</span></li>
							<li class="vk-spec-row"><span>Acristalamiento:</span> <span>Triple vidrio con gas Argón/Kriptón</span></li>
						</ul>
						<div class="vk-card-footer">
							<a href="#configurador" class="vk-btn-primary" style="width: 100%;">Configurar esta ventana</a>
						</div>
					</div>
				</article>

				<!-- Tarjeta 4: Puerta de Entrada de Seguridad -->
				<article class="vk-solution-card vk-reveal" data-category="puertas">
					<div class="vk-card-media">
						<img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=800&q=80" alt="Puerta de entrada de alta seguridad en PVC grafito mate" loading="lazy" />
						<span class="vk-card-badge-top">Seguridad Acorazada RC3</span>
						<span class="vk-card-price-tag">Desde 1.150 €/ud</span>
					</div>
					<div class="vk-card-body">
						<h3 class="vk-card-title">Puerta de Entrada Vekta Master Safe</h3>
						<p class="vk-card-text">Elegancia arquitectónica y protección insuperable. Cerradura multipunto automática, refuerzos esquineros soldados y panel térmico macizo.</p>
						<ul class="vk-specs-list">
							<li class="vk-spec-row"><span>Cerradura:</span> <span>Multipunto con ganchos de acero</span></li>
							<li class="vk-spec-row"><span>Cilindro:</span> <span>Antibumping, antiganzúa y antitaladro</span></li>
							<li class="vk-spec-row"><span>Aislamiento acústico:</span> <span>-44 dB</span></li>
							<li class="vk-spec-row"><span>Acabado:</span> <span>Foliado texturado grafito / roble</span></li>
						</ul>
						<div class="vk-card-footer">
							<a href="#configurador" class="vk-btn-primary" style="width: 100%;">Configurar esta puerta</a>
						</div>
					</div>
				</article>

				<!-- Tarjeta 5: Cajón de Persiana Monoblock Hermético -->
				<article class="vk-solution-card vk-reveal" data-category="especiales">
					<div class="vk-card-media">
						<img src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=800&q=80" alt="Ventanales con persianas motorizadas herméticas y cajón oculto" loading="lazy" />
						<span class="vk-card-badge-top">Térmico & Motorizado</span>
						<span class="vk-card-price-tag">Desde 180 €/ud</span>
					</div>
					<div class="vk-card-body">
						<h3 class="vk-card-title">Cajón Monoblock Vekta ThermoBox</h3>
						<p class="vk-card-text">El 40% de las pérdidas energéticas y ruidos en ventanas entran por el cajón de persiana tradicional. ThermoBox elimina los puentes térmicos por completo.</p>
						<ul class="vk-specs-list">
							<li class="vk-spec-row"><span>Aislamiento:</span> <span>Poliuretano expandido de alta densidad</span></li>
							<li class="vk-spec-row"><span>Motorización:</span> <span>Somfy® io silencioso con app móvil</span></li>
							<li class="vk-spec-row"><span>Lamas:</span> <span>Aluminio extrusionado con bloqueo antipalanca</span></li>
							<li class="vk-spec-row"><span>Estanqueidad:</span> <span>Clase 4 al aire</span></li>
						</ul>
						<div class="vk-card-footer">
							<a href="#configurador" class="vk-btn-primary" style="width: 100%;">Añadir a mi proyecto</a>
						</div>
					</div>
				</article>

				<!-- Tarjeta 6: Corredera Osciloparalela -->
				<article class="vk-solution-card vk-reveal" data-category="corredera">
					<div class="vk-card-media">
						<img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=800&q=80" alt="Vivienda con corredera osciloparalela Vekta para optimizar espacio" loading="lazy" />
						<span class="vk-card-badge-top">Ahorro de Espacio</span>
						<span class="vk-card-price-tag">Desde 580 €/ud</span>
					</div>
					<div class="vk-card-body">
						<h3 class="vk-card-title">Vekta Slide Osciloparalela</h3>
						<p class="vk-card-text">Combina el cierre hermético por presión de una ventana abatible con la comodidad de desplazamiento de una corredera para cocinas y salones reducidos.</p>
						<ul class="vk-specs-list">
							<li class="vk-spec-row"><span>Hermeticidad:</span> <span>Doble junta de compresión activa</span></li>
							<li class="vk-spec-row"><span>Insonorización:</span> <span>-45 dB</span></li>
							<li class="vk-spec-row"><span>Transmitancia Uw:</span> <span>0.88 W/m²K</span></li>
							<li class="vk-spec-row"><span>Ventilación:</span> <span>Posición oscilo para aireación segura</span></li>
						</ul>
						<div class="vk-card-footer">
							<a href="#configurador" class="vk-btn-primary" style="width: 100%;">Configurar esta ventana</a>
						</div>
					</div>
				</article>
			</div>
		</div>
	</section>

	<!-- 7. BENTO GRID DE INGENIERÍA & CALIDAD DE MATERIALES -->
	<section class="vk-bento-section" id="ingenieria">
		<div class="vk-container">
			<div class="vk-section-header vk-reveal">
				<span class="vk-section-subtitle">Ingeniería & Fabricación Propia</span>
				<h2 class="vk-section-title">Anatomía de una Ventana Vekta</h2>
				<p class="vk-section-desc">No todas las ventanas de PVC son iguales. Descubre por qué nuestros perfiles alemanes duran más de 50 años sin alterarse.</p>
			</div>

			<div class="vk-bento-grid">
				<div class="vk-bento-box vk-bento-col-2 vk-reveal">
					<div class="vk-bento-media-bg">
						<img src="https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=800&q=80" alt="Ingeniería y precisión industrial de perfiles multicámara" loading="lazy" />
					</div>
					<div class="vk-bento-content">
						<span class="vk-badge-pill dark"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex-shrink:0;"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg> 7 Cámaras Aislantes</span>
						<h3 class="vk-bento-title">Perfiles Multicámara con Almas de Acero Galvanizado</h3>
						<p class="vk-bento-desc">Estructura celular interna con rotura térmica total. El refuerzo perimetral de acero galvanizado de 2 mm de espesor garantiza que la ventana no se deforme jamás, soportando vientos huracanados y cambios térmicos de -20°C a +45°C.</p>
					</div>
				</div>

				<div class="vk-bento-box vk-reveal">
					<div class="vk-bento-icon" aria-hidden="true">
						<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
					</div>
					<h3 class="vk-bento-title">Herrajes Perimetrales Roto NT Clase RC2</h3>
					<p class="vk-bento-desc">Cerraderos de seguridad antipalanca con bulones de cabeza de seta en todo el perímetro de la hoja para hacer frente a intentos de robo.</p>
					<span class="vk-cert-tag">Protección Antirrobo Certificada</span>
				</div>

				<div class="vk-bento-box vk-reveal">
					<div class="vk-bento-icon" aria-hidden="true">
						<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/><line x1="23" y1="9" x2="17" y2="15"/><line x1="17" y1="9" x2="23" y2="15"/></svg>
					</div>
					<h3 class="vk-bento-title">Vidrio Acústico Laminado SilenceCore™</h3>
					<p class="vk-bento-desc">Láminas de polivinilo butiral acústico (PVB) que absorben las ondas sonoras del tráfico urbano, tranvías y bullicio exterior.</p>
					<span class="vk-cert-tag">Reducción hasta -52 dB</span>
				</div>

				<div class="vk-bento-box vk-bento-col-2 vk-reveal">
					<div class="vk-bento-media-bg">
						<img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=800&q=80" alt="Instalación profesional certificada según norma técnica" loading="lazy" />
					</div>
					<div class="vk-bento-content">
						<span class="vk-badge-pill eco">Montaje UNE 85219</span>
						<h3 class="vk-bento-title">Instalación Limpia sin Obras en 1 Día</h3>
						<p class="vk-bento-desc">Una ventana excelente mal instalada pierde el 50% de sus prestaciones. Nuestros instaladores propios utilizan bandas autoexpansivas y membranas de estanqueidad para garantizar que no entre ni una gota de aire o humedad.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- 8. PROYECTOS REALES / CASOS DE ÉXITO ANTES & DESPUÉS -->
	<section class="vk-projects-section" id="proyectos">
		<div class="vk-container">
			<div class="vk-section-header vk-reveal">
				<span class="vk-section-subtitle">Obras Realizadas</span>
				<h2 class="vk-section-title">Resultados Tangibles en Hogares Reales</h2>
				<p class="vk-section-desc">Echa un vistazo a algunas de nuestras reformas más recientes y comprueba el impacto en confort, diseño y aislamiento.</p>
			</div>

			<div class="vk-projects-grid">
				<!-- Proyecto 1 -->
				<article class="vk-project-card vk-reveal">
					<div class="vk-project-media">
						<img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80" alt="Reforma integral de chalet unifamiliar en Pozuelo" loading="lazy" />
						<span class="vk-project-tag">Chalet Unifamiliar</span>
					</div>
					<div class="vk-project-body">
						<div class="vk-project-meta">
							<span><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg> Pozuelo de Alarcón, Madrid</span>
							<span><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> Instalación: 2 días</span>
						</div>
						<h3 class="vk-project-title">Reforma Térmica Passivhaus con Correderas de 4 Metros</h3>
						<p class="vk-project-desc">Sustitución de carpintería metálica antigua por 9 ventanales Vekta 88 y 2 correderas panorámicas. Calificación energética A lograda y ahorro del 70% en factura de gas.</p>
						<div class="vk-project-badges">
							<span class="vk-metric-badge">-48 dB Ruido</span>
							<span class="vk-metric-badge">Uw 0.72 W/m²K</span>
							<span class="vk-metric-badge green">+2.450 € Ayuda NextGen</span>
						</div>
					</div>
				</article>

				<!-- Proyecto 2 -->
				<article class="vk-project-card vk-reveal">
					<div class="vk-project-media">
						<img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=800&q=80" alt="Insonorización de ático en zona urbana céntrica" loading="lazy" />
						<span class="vk-project-tag">Ático Céntrico</span>
					</div>
					<div class="vk-project-body">
						<div class="vk-project-meta">
							<span><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg> Paseo de la Castellana, Madrid</span>
							<span><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> Instalación: 1 día</span>
						</div>
						<h3 class="vk-project-title">Insonorización Extrema contra Tráfico en Planta 7ª</h3>
						<p class="vk-project-desc">Los propietarios no podían conciliar el sueño por el tráfico incesante. Instalamos Vekta Confort 76 con triple vidrio acústico laminado SilenceCore™. Silencio total recuperado.</p>
						<div class="vk-project-badges">
							<span class="vk-metric-badge">-51 dB Ruido</span>
							<span class="vk-metric-badge">Cero condensación</span>
							<span class="vk-metric-badge">Color Gris Antracita</span>
						</div>
					</div>
				</article>

				<!-- Proyecto 3 -->
				<article class="vk-project-card vk-reveal">
					<div class="vk-project-media">
						<img src="https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=800&q=80" alt="Rehabilitación energética en vivienda de los años 80" loading="lazy" />
						<span class="vk-project-tag">Piso Residencial</span>
					</div>
					<div class="vk-project-body">
						<div class="vk-project-meta">
							<span><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg> Valencia Capital</span>
							<span><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> Instalación: 6 horas</span>
						</div>
						<h3 class="vk-project-title">Cambio de 6 Ventanas de Aluminio por PVC Blanco Polar</h3>
						<p class="vk-project-desc">Retirada de ventanas correderas frías que generaban corrientes y moho. Montaje de 6 unidades oscilobatientes con cajón monoblock térmico sin romper azulejos.</p>
						<div class="vk-project-badges">
							<span class="vk-metric-badge">-42 dB Ruido</span>
							<span class="vk-metric-badge">55% Ahorro Aire Acondicionado</span>
							<span class="vk-metric-badge green">10 Años Garantía</span>
						</div>
					</div>
				</article>
			</div>
		</div>
	</section>

	<!-- 9. CONFIGURADOR INTERACTIVO DE PRESUPUESTO EN 3 PASOS (CON CAPTACIÓN DE LEAD) -->
	<section class="vk-config-section" id="configurador">
		<div class="vk-container">
			<div class="vk-section-header vk-reveal">
				<span class="vk-section-subtitle">Simulador de Coste Online</span>
				<h2 class="vk-section-title">Configura tu Presupuesto Personalizado</h2>
				<p class="vk-section-desc">Selecciona las opciones que mejor se ajustan a tu inmueble para obtener una valoración orientativa al instante con cálculo de subvenciones.</p>
			</div>

			<div class="vk-config-card vk-reveal">
				<div class="vk-form-step-content">
					<!-- Paso 1 -->
					<h3 class="vk-step-heading">1. Tipo de Vivienda o Proyecto</h3>
					<div class="vk-options-grid" role="group" aria-label="Selección de tipo de inmueble">
						<div class="vk-option-card selected" data-group="dwelling" data-val="piso" role="button" tabindex="0" aria-pressed="true">
							<div class="vk-opt-icon" aria-hidden="true">
								<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"/><path d="M9 22v-4h6v4"/><line x1="8" y1="6" x2="8.01" y2="6"/><line x1="16" y1="6" x2="16.01" y2="6"/><line x1="12" y1="6" x2="12.01" y2="6"/><line x1="8" y1="10" x2="8.01" y2="10"/><line x1="12" y1="10" x2="12.01" y2="10"/><line x1="16" y1="10" x2="16.01" y2="10"/><line x1="8" y1="14" x2="8.01" y2="14"/><line x1="12" y1="14" x2="12.01" y2="14"/><line x1="16" y1="14" x2="16.01" y2="14"/></svg>
							</div>
							<strong>Piso / Apartamento</strong>
							<span class="vk-opt-sub">Reforma habitual en ciudad</span>
						</div>
						<div class="vk-option-card" data-group="dwelling" data-val="atico" role="button" tabindex="0" aria-pressed="false">
							<div class="vk-opt-icon" aria-hidden="true">
								<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18"/><path d="M5 21V7l8-4v18"/><path d="M19 21V11l-6-3"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="9" y1="13" x2="9.01" y2="13"/><line x1="9" y1="17" x2="9.01" y2="17"/></svg>
							</div>
							<strong>Ático con Terraza</strong>
							<span class="vk-opt-sub">Alta exposición a viento y sol</span>
						</div>
						<div class="vk-option-card" data-group="dwelling" data-val="chalet" role="button" tabindex="0" aria-pressed="false">
							<div class="vk-opt-icon" aria-hidden="true">
								<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 10l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
							</div>
							<strong>Chalet / Casa Unifamiliar</strong>
							<span class="vk-opt-sub">Grandes superficies acristaladas</span>
						</div>
					</div>

					<!-- Paso 2 -->
					<h3 class="vk-step-heading">2. Número de Ventanas a Cambiar</h3>
					<div class="vk-options-grid" role="group" aria-label="Selección de número de ventanas">
						<div class="vk-option-card" data-group="windows" data-val="3" role="button" tabindex="0" aria-pressed="false">
							<span class="vk-opt-big-num">3</span>
							<strong>Ventanas</strong>
							<span class="vk-opt-sub">Zona concreta o piso pequeño</span>
						</div>
						<div class="vk-option-card selected" data-group="windows" data-val="5" role="button" tabindex="0" aria-pressed="true">
							<span class="vk-opt-big-num">5</span>
							<strong>Ventanas</strong>
							<span class="vk-opt-sub">Piso medio (2-3 dormitorios)</span>
						</div>
						<div class="vk-option-card" data-group="windows" data-val="8" role="button" tabindex="0" aria-pressed="false">
							<span class="vk-opt-big-num">8</span>
							<strong>Ventanas</strong>
							<span class="vk-opt-sub">Vivienda amplia o ático</span>
						</div>
						<div class="vk-option-card" data-group="windows" data-val="12" role="button" tabindex="0" aria-pressed="false">
							<span class="vk-opt-big-num">12+</span>
							<strong>Ventanas</strong>
							<span class="vk-opt-sub">Chalet o unifamiliar completo</span>
						</div>
					</div>

					<!-- Paso 3 -->
					<h3 class="vk-step-heading">3. Acabado y Tono del Perfil</h3>
					<div class="vk-options-grid" role="group" aria-label="Selección de acabado y color">
						<div class="vk-option-card" data-group="finish" data-val="blanco" role="button" tabindex="0" aria-pressed="false">
							<div class="vk-color-circle color-blanco"></div>
							<strong>Blanco Polar</strong>
							<span class="vk-opt-sub">Clásico y ultra luminoso</span>
						</div>
						<div class="vk-option-card selected" data-group="finish" data-val="antracita" role="button" tabindex="0" aria-pressed="true">
							<div class="vk-color-circle color-antracita"></div>
							<strong>Gris Antracita 7016</strong>
							<span class="vk-opt-sub">Tendencia arquitectónica mate</span>
						</div>
						<div class="vk-option-card" data-group="finish" data-val="roble" role="button" tabindex="0" aria-pressed="false">
							<div class="vk-color-circle color-roble"></div>
							<strong>Roble Turner Wood</strong>
							<span class="vk-opt-sub">Calidez madera natural</span>
						</div>
						<div class="vk-option-card" data-group="finish" data-val="negro" role="button" tabindex="0" aria-pressed="false">
							<div class="vk-color-circle color-negro"></div>
							<strong>Negro Jet Black</strong>
							<span class="vk-opt-sub">Diseño minimalista industrial</span>
						</div>
					</div>

					<!-- Resumen del Presupuesto Estimado -->
					<div class="vk-config-total-estimate">
						<div class="vk-estimate-data">
							<span class="vk-estimate-title">Estimación orientativa (Fabricación + Instalación Pro + IVA):</span>
							<div class="vk-estimate-range" id="vk-live-estimate">2.950 € — 3.350 €</div>
							<div class="vk-subsidy-badge" id="vk-live-subsidy">
								<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex-shrink:0; vertical-align: -2px; margin-right: 4px;"><rect x="2" y="6" width="20" height="12" rx="2"/><circle cx="12" cy="12" r="2"/><path d="M6 12h.01M18 12h.01"/></svg> Deducción estimada Plan Renove: <strong>Hasta -1.250 €</strong> en ayuda directa
							</div>
						</div>
						<div class="vk-estimate-actions">
							<button type="button" class="vk-btn-primary vk-btn-lg" id="vk-btn-open-lead-modal">
								<span>Solicitar Medición Gratuita &rarr;</span>
							</button>
						</div>
					</div>

					<!-- Formulario de Contacto / Lead Integrado -->
					<div class="vk-lead-form-box" id="vk-lead-capture-box">
						<h4 class="vk-lead-form-title">Completa tus datos para agendar la visita técnica sin compromiso:</h4>
						<form class="vk-lead-form" id="vk-quote-form" onsubmit="return false;">
							<div class="vk-form-grid">
								<div class="vk-form-field">
									<label for="lead-name">Nombre y Apellidos *</label>
									<input type="text" id="lead-name" name="name" placeholder="Ej. Roberto Gómez" required />
								</div>
								<div class="vk-form-field">
									<label for="lead-phone">Teléfono de Contacto *</label>
									<input type="tel" id="lead-phone" name="phone" placeholder="Ej. 612 345 678" required />
								</div>
								<div class="vk-form-field">
									<label for="lead-email">Correo Electrónico *</label>
									<input type="email" id="lead-email" name="email" placeholder="roberto@email.com" required />
								</div>
								<div class="vk-form-field">
									<label for="lead-city">Localidad / Código Postal *</label>
									<input type="text" id="lead-city" name="city" placeholder="Ej. Madrid 28001" required />
								</div>
							</div>
							<div class="vk-form-field full-width">
								<label for="lead-notes">Detalles adicionales del proyecto (opcional):</label>
								<textarea id="lead-notes" name="notes" rows="2" placeholder="Ej. Ventanas correderas para dar a la terraza y 3 abatibles para dormitorios con persiana"></textarea>
							</div>
							<div class="vk-form-submit-row">
								<button type="submit" class="vk-btn-primary vk-btn-lg" id="vk-btn-submit-lead">
									Confirmar y Enviar Solicitud
								</button>
								<small class="vk-form-privacy"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex-shrink:0; vertical-align: -1px; margin-right: 4px;"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg> Tus datos están protegidos. Sin spam ni llamadas comerciales no solicitadas.</small>
							</div>
						</form>
					</div>

					<!-- Feedback accesible de confirmación tras envío -->
					<div id="vk-quote-feedback" style="display: none;" role="status" aria-live="polite">
						<div class="vk-success-message-card">
							<span class="vk-success-icon"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg></span>
							<div>
								<strong>¡Solicitud de presupuesto registrada con éxito!</strong>
								<p>Hemos asignado a tu proyecto a uno de nuestros ingenieros de producto. Nos pondremos en contacto contigo en menos de 2 horas laborables para concretar tu medición gratuita.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- 10. TESTIMONIOS Y OPINIONES VERIFICADAS (GOOGLE REVIEWS 4.9★) -->
	<section class="vk-reviews-section" id="opiniones">
		<div class="vk-container">
			<div class="vk-reviews-header vk-reveal">
				<div>
					<span class="vk-section-subtitle">Opiniones Reales de Clientes</span>
					<h2 class="vk-section-title">Confianza Ganada en Más de 2.400 Instalaciones</h2>
				</div>
				<div class="vk-google-badge-box">
					<div class="vk-google-logo">Google</div>
					<div class="vk-stars">★★★★★</div>
					<div class="vk-rating-number"><strong>4.9 / 5</strong> (184 reseñas verificadas)</div>
				</div>
			</div>

			<div class="vk-reviews-grid">
				<!-- Testimonio 1 -->
				<div class="vk-review-card vk-reveal">
					<div class="vk-review-stars">★★★★★</div>
					<p class="vk-review-quote">"Vivimos en una calle con tráfico pesado y autobuses. El cambio de ventanas con Vekta ha sido la mejor inversión que hemos hecho en la casa en 20 años. Cerramos la ventana y reina un silencio absoluto. Además, en invierno no encendemos casi la calefacción."</p>
					<div class="vk-review-author">
						<img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=150&h=150&q=80" alt="Elena Ramos" class="vk-author-avatar" loading="lazy" />
						<div>
							<strong class="vk-author-name">Elena Ramos</strong>
							<span class="vk-author-info">Propietaria de Ático en Chamberí</span>
						</div>
					</div>
				</div>

				<!-- Testimonio 2 -->
				<div class="vk-review-card vk-reveal">
					<div class="vk-review-stars">★★★★★</div>
					<p class="vk-review-quote">"Excelente trato desde la visita al showroom hasta la instalación. Los montadores fueron puntualísimos, extremadamente limpios y protegieron todo el suelo con cartones. Nos cambiaron 8 ventanas en un solo día sin romper ni un solo azulejo."</p>
					<div class="vk-review-author">
						<img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=150&h=150&q=80" alt="Carlos Mendoza" class="vk-author-avatar" loading="lazy" />
						<div>
							<strong class="vk-author-name">Carlos Mendoza</strong>
							<span class="vk-author-info">Chalet en Pozuelo de Alarcón</span>
						</div>
					</div>
				</div>

				<!-- Testimonio 3 -->
				<div class="vk-review-card vk-reveal">
					<div class="vk-review-stars">★★★★★</div>
					<p class="vk-review-quote">"Como arquitecta, soy muy exigente con la perfilería y los valores de transmitancia térmica. Vekta cumplió con creces los requerimientos Passivhaus del proyecto. La corredera elevable de 4 metros es una obra de arte mecánica."</p>
					<div class="vk-review-author">
						<img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=150&h=150&q=80" alt="Sofía Valdés" class="vk-author-avatar" loading="lazy" />
						<div>
							<strong class="vk-author-name">Sofía Valdés</strong>
							<span class="vk-author-info">Arquitecta Bioclimática</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- 11. CÓMO TRABAJAMOS (PROCESO EN 4 PASOS SIN ESTRÉS) -->
	<section class="vk-process-section">
		<div class="vk-container">
			<div class="vk-section-header vk-reveal">
				<span class="vk-section-subtitle">Instalación Garantizada</span>
				<h2 class="vk-section-title">Tu Nueva Carpintería en 4 Sencillos Pasos</h2>
				<p class="vk-section-desc">Nos encargamos de todo el proceso de principio a fin, para que tú solo disfrutes del resultado.</p>
			</div>

			<div class="vk-process-grid">
				<div class="vk-step-box vk-reveal">
					<span class="vk-step-badge-num">01</span>
					<h3 class="vk-step-title">Presupuesto y Asesoramiento</h3>
					<p class="vk-step-desc">Analizamos tu plano o necesidades y te proporcionamos una propuesta clara con desglose técnico en menos de 24 horas.</p>
				</div>
				<div class="vk-step-box vk-reveal">
					<span class="vk-step-badge-num">02</span>
					<h3 class="vk-step-title">Medición Láser Gratuita</h3>
					<p class="vk-step-desc">Uno de nuestros técnicos especialistas acude a tu domicilio para verificar cotas con distanciómetro láser y revisar cajones y remates.</p>
				</div>
				<div class="vk-step-box vk-reveal">
					<span class="vk-step-badge-num">03</span>
					<h3 class="vk-step-title">Fabricación a Medida</h3>
					<p class="vk-step-desc">Fabricamos tus ventanas en planta automatizada con perfiles de primera extrusión y soldaduras invisibles de alta estética.</p>
				</div>
				<div class="vk-step-box vk-reveal">
					<span class="vk-step-badge-num">04</span>
					<h3 class="vk-step-title">Montaje Limpio en 1 Día</h3>
					<p class="vk-step-desc">Instaladores propios homologados. Retiramos y reciclamos tus ventanas viejas y dejamos tu hogar impecable y aspirado.</p>
				</div>
			</div>
		</div>
	</section>

	<!-- 12. PREGUNTAS FRECUENTES (FAQ ACORDEÓN INTERACTIVO) -->
	<section class="vk-faq-section" id="faq">
		<div class="vk-container">
			<div class="vk-section-header vk-reveal">
				<span class="vk-section-subtitle">Resolvemos tus Dudas</span>
				<h2 class="vk-section-title">Preguntas Frecuentes sobre Ventanas de PVC</h2>
				<p class="vk-section-desc">Todo lo que necesitas saber antes de sustituir la carpintería de tu vivienda.</p>
			</div>

			<div class="vk-faq-accordion vk-reveal">
				<!-- FAQ 1 -->
				<div class="vk-faq-item">
					<button type="button" class="vk-faq-trigger" aria-expanded="false">
						<span>¿Es necesario hacer obra para cambiar las ventanas?</span>
						<span class="vk-faq-icon">+</span>
					</button>
					<div class="vk-faq-panel">
						<p>No. En el 95% de las sustituciones residenciales realizamos una instalación sin obra invasiva. Retiramos la hoja y el marco antiguo sobre el premarco de obra original, sellamos con polímero aislante termoacústico y colocamos remates de terminación a juego. El cambio de una vivienda estándar se completa en un solo día sin dañar pintura ni alicatados.</p>
					</div>
				</div>

				<!-- FAQ 2 -->
				<div class="vk-faq-item">
					<button type="button" class="vk-faq-trigger" aria-expanded="false">
						<span>¿Qué diferencia hay realmente entre una ventana de PVC y una de aluminio?</span>
						<span class="vk-faq-icon">+</span>
					</button>
					<div class="vk-faq-panel">
						<p>El PVC es un material aislante natural (no conduce el calor ni el frío), mientras que el aluminio es un metal altamente conductor que requiere rotura de puente térmico (RPT) plástica añadida para evitar condensaciones. En igualdad de precio, el PVC ofrece entre un 35% y un 50% mayor aislamiento térmico y una capacidad de atenuación acústica muy superior.</p>
					</div>
				</div>

				<!-- FAQ 3 -->
				<div class="vk-faq-item">
					<button type="button" class="vk-faq-trigger" aria-expanded="false">
						<span>¿Cómo funcionan las subvenciones del Plan Renove y Fondos NextGeneration?</span>
						<span class="vk-faq-icon">+</span>
					</button>
					<div class="vk-faq-panel">
						<p>Nuestras series Vekta 76 y 88 cumplen holgadamente los requisitos del Código Técnico de la Edificación (CTE) y los programas de ayudas europeas a la rehabilitación energética. La ayuda puede suponer entre el 30% y el 40% del coste total de la factura (hasta 3.000 € por vivienda). Desde nuestro departamento técnico tramitamos y preparamos todos los certificados energéticos de forma 100% gratuita para ti.</p>
					</div>
				</div>

				<!-- FAQ 4 -->
				<div class="vk-faq-item">
					<button type="button" class="vk-faq-trigger" aria-expanded="false">
						<span>¿El color gris antracita o negro se desgasta o decolora con el sol?</span>
						<span class="vk-faq-icon">+</span>
					</button>
					<div class="vk-faq-panel">
						<p>No. Utilizamos exclusivamente láminas de foliado exterior con tecnología de reflexión de infrarrojos <em>Cool Colors</em> de origen alemán. Esta tecnología refleja la radiación solar y evita que el perfil se caliente o sufra dilataciones, garantizando el color y la textura intactos con una garantía oficial por escrito de 15 años.</p>
					</div>
				</div>

				<!-- FAQ 5 -->
				<div class="vk-faq-item">
					<button type="button" class="vk-faq-trigger" aria-expanded="false">
						<span>¿Qué garantía tienen las ventanas Vekta?</span>
						<span class="vk-faq-icon">+</span>
					</button>
					<div class="vk-faq-panel">
						<p>Ofrecemos 15 años de garantía total en perfiles contra envejecimiento, pérdida de color y deformación; 10 años en estanqueidad de cámaras de vidrio Guardian Sun y 5 años en herrajes perimetrales Roto Frank, además de 2 años de garantía total sobre la instalación.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- 13. BANNER CTA FINAL DE CAPTACIÓN URGENTE -->
	<section class="vk-final-cta-section">
		<div class="vk-container">
			<div class="vk-cta-banner-card vk-reveal">
				<div class="vk-cta-banner-content">
					<span class="vk-badge-pill eco">Convocatoria Abierta</span>
					<h2 class="vk-cta-title">¿Listo para Aislar tu Hogar del Frío, el Calor y el Ruido?</h2>
					<p class="vk-cta-text">Pide tu estudio energético y medición gratuita sin ningún compromiso. Recibe asesoramiento de un ingeniero de producto de Vekta en tu propia casa.</p>
					<div class="vk-cta-btn-row">
						<a href="#configurador" class="vk-btn-primary vk-btn-lg">Pedir Medición Gratuita &rarr;</a>
						<a href="tel:900831240" class="vk-btn-ghost vk-btn-lg">Llamar Ahora al 900 831 240</a>
					</div>
				</div>
				<div class="vk-cta-banner-badge-aside">
					<div class="vk-guarantee-seal">
						<span class="seal-icon" aria-hidden="true">
							<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
						</span>
						<strong>15 Años</strong>
						<span>Garantía de Fábrica</span>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>

<!-- 14. FOOTER CORPORATIVO MASIVO (Landmark contentinfo fuera de main) -->
<footer class="vk-footer" id="contacto" role="contentinfo">
	<div class="vk-container">
		<div class="vk-footer-grid">
			<!-- Columna 1: Marca y Misión -->
			<div class="vk-footer-brand">
				<div class="vk-brand-logo">
					<div class="vk-logo-mark">V</div>
					<div class="vk-brand-text-wrap">
						<span class="vk-brand-name">VEKTA <span>VENTANAS</span></span>
						<span class="vk-brand-tagline">Architectural PVC Systems</span>
					</div>
				</div>
				<p>Empresa líder en carpintería arquitectónica en PVC de alta eficiencia energética, control solar y aislamiento acústico. Distribuidor e instalador oficial homologado Kömmerling®.</p>
				<div class="vk-cert-badges">
					<span class="vk-cert-tag">Passivhaus Institut</span>
					<span class="vk-cert-tag">Marcado CE</span>
					<span class="vk-cert-tag">AENOR ISO 9001</span>
					<span class="vk-cert-tag">CTE DB-HE</span>
				</div>
			</div>

			<!-- Columna 2: Sistemas -->
			<div>
				<h4 class="vk-footer-title">Sistemas de Carpintería</h4>
				<ul class="vk-footer-links">
					<li><a href="#soluciones">Ventanas Abatibles Confort 76</a></li>
					<li><a href="#soluciones">Correderas Elevables Panorama Slide</a></li>
					<li><a href="#soluciones">Sistemas Passivhaus 88 Ultra</a></li>
					<li><a href="#soluciones">Puertas de Entrada Acorazadas Safe</a></li>
					<li><a href="#soluciones">Cajones de Persiana ThermoBox</a></li>
					<li><a href="#soluciones">Correderas Osciloparalelas</a></li>
				</ul>
			</div>

			<!-- Columna 3: Información y Ayudas -->
			<div>
				<h4 class="vk-footer-title">Servicios & Ayudas</h4>
				<ul class="vk-footer-links">
					<li><a href="#simulador">Simulador Acústico & Térmico</a></li>
					<li><a href="#configurador">Calculadora de Presupuestos</a></li>
					<li><a href="#faq">Subvenciones Plan Renove 2026</a></li>
					<li><a href="#ingenieria">Instalación sin Obras en 24h</a></li>
					<li><a href="#proyectos">Galería de Obras Terminadas</a></li>
					<li><a href="#opiniones">Opiniones Verificadas de Clientes</a></li>
				</ul>
			</div>

			<!-- Columna 4: Showroom Central & Contacto -->
			<div>
				<h4 class="vk-footer-title">Showroom & Asistencia</h4>
				<ul class="vk-footer-links">
					<li><span style="display:inline-flex; align-items:flex-start; gap:0.5rem;"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex-shrink:0; margin-top: 3px;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg> Parque Tecnológico, C/ Arquitectura 14, Madrid</span></li>
					<li><span style="display:inline-flex; align-items:center; gap:0.5rem;"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex-shrink:0;"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> Lunes a Viernes: 9:00 a 19:30</span></li>
					<li><span style="display:inline-flex; align-items:center; gap:0.5rem;"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex-shrink:0;"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> Sábados: 10:00 a 14:00 (Cita previa)</span></li>
					<li><span style="display:inline-flex; align-items:center; gap:0.5rem;"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex-shrink:0;"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg> <a href="tel:900831240">900 831 240</a> (Llamada Gratuita)</span></li>
					<li><span style="display:inline-flex; align-items:center; gap:0.5rem;"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex-shrink:0;"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg> <a href="mailto:proyectos@vektaventanas.com">proyectos@vektaventanas.com</a></span></li>
				</ul>
				<div style="margin-top: 1.25rem;">
					<a href="#configurador" class="vk-btn-secondary" style="font-size: 0.85rem; padding: 0.6rem 1.2rem; width: 100%;">Agendar Cita en Showroom</a>
				</div>
			</div>
		</div>

		<div class="vk-footer-bottom">
			<div class="vk-footer-legal">
				<span>&copy; <?php echo date( 'Y' ); ?> Vekta Ventanas S.L. — NIF B-89241562. Todos los derechos reservados.</span>
			</div>
			<div class="vk-footer-legal-links">
				<a href="#">Aviso Legal</a>
				<span class="vk-sep">•</span>
				<a href="#">Política de Privacidad</a>
				<span class="vk-sep">•</span>
				<a href="#">Política de Cookies</a>
				<span class="vk-sep">•</span>
				<a href="#">Condiciones de Garantía 15 Años</a>
			</div>
		</div>
	</div>
</footer>

<!-- 15. WIDGET FLOTANTE DE WHATSAPP / CONTACTO RÁPIDO -->
<aside class="vk-floating-whatsapp" aria-label="Contacto directo por WhatsApp">
	<a href="https://wa.me/34900831240?text=Hola%20Vekta%20Ventanas,%20estoy%20interesado%20en%20un%20presupuesto%20para%20cambiar%20las%20ventanas%20de%20mi%20vivienda." target="_blank" rel="noopener noreferrer" class="vk-whatsapp-btn" aria-label="Abrir conversación de WhatsApp con un asesor de Vekta">
		<div class="vk-whatsapp-tooltip">
			<span class="tooltip-title">¿Dudas sobre tus ventanas?</span>
			<span class="tooltip-sub">Chatea en directo con un técnico</span>
		</div>
		<div class="vk-whatsapp-icon-circle">
			<svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
				<path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.05 22L7.3 20.62C8.75 21.41 10.38 21.83 12.04 21.83C17.5 21.83 21.95 17.38 21.95 11.92C21.95 9.27 20.92 6.78 19.05 4.91C17.18 3.03 14.69 2 12.04 2M12.05 3.67C14.25 3.67 16.31 4.53 17.87 6.09C19.42 7.65 20.28 9.72 20.28 11.92C20.28 16.46 16.58 20.15 12.04 20.15C10.56 20.15 9.11 19.76 7.85 19L7.55 18.83L4.43 19.65L5.26 16.61L5.06 16.29C4.24 14.99 3.81 13.47 3.81 11.91C3.81 7.37 7.5 3.67 12.05 3.67M9.04 7.59C8.88 7.59 8.62 7.65 8.41 7.88C8.2 8.11 7.6 8.67 7.6 9.82C7.6 10.97 8.44 12.07 8.56 12.23C8.68 12.39 10.18 14.71 12.5 15.71C13.06 15.95 13.5 16.1 13.84 16.21C14.4 16.39 14.91 16.36 15.32 16.3C15.77 16.23 16.71 15.73 16.91 15.17C17.11 14.61 17.11 14.13 17.05 14.03C16.99 13.93 16.83 13.87 16.59 13.75C16.35 13.63 15.17 13.05 14.95 12.97C14.73 12.89 14.57 12.85 14.41 13.09C14.25 13.33 13.79 13.87 13.65 14.03C13.51 14.19 13.37 14.21 13.13 14.09C12.89 13.97 11.88 13.64 10.68 12.57C9.75 11.74 9.12 10.72 8.96 10.48C8.8 10.24 8.94 10.11 9.06 9.99C9.17 9.88 9.31 9.7 9.43 9.56C9.55 9.42 9.59 9.32 9.67 9.16C9.75 9 9.71 8.86 9.65 8.74C9.59 8.62 9.13 7.49 8.94 7.03C8.75 6.58 8.56 6.64 8.41 6.63C8.28 6.62 8.12 6.62 7.96 6.62"/>
			</svg>
			<span class="vk-whatsapp-pulse"></span>
		</div>
	</a>
</aside>

<?php wp_footer(); ?>
</body>
</html>

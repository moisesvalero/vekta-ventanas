<?php
/**
 * Template Name: Vekta Systems — Awwwards Architectural Showcase
 * Front Page Template for Vekta Systems
 * Bespoke Awwwards / FWA / CSS Design Awards level craftsmanship.
 * Zero AI clichés: Monolithic, editorial, technical, silent.
 *
 * @package Vekta_Ventanas
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!DOCTYPE html>
<html lang="<?php bloginfo( 'language' ); ?>" class="scroll-smooth">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
	<title><?php bloginfo( 'name' ); ?> — La Ventana Invisible | Perfil Mínimo & Passivhaus</title>
	
	<!-- Metadatos SEO Técnicos -->
	<meta name="description" content="Vekta Systems: Ventanas de PVC de perfil mínimo y estándar Passivhaus. Transmitancia térmica Uw = 0.67 W/m²K y amortiguación acústica certificada de -52 dB.">
	<meta property="og:title" content="Vekta Systems — La Ventana Invisible | Perfil Mínimo & Passivhaus">
	<meta property="og:description" content="Ventanas de PVC técnico de alto rendimiento para arquitectura contemporánea. Aislamiento térmico extremo y silencio absoluto.">
	<meta property="og:type" content="website">
	<meta property="og:image" content="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/hero-architecture.jpg' ); ?>">

	<!-- Preconexión de Fuentes -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Syne:wght@700;800&display=swap" rel="stylesheet">

	<!-- Tailwind CSS CDN para compilación de tokens -->
	<script src="https://cdn.tailwindcss.com"></script>
	<script>
		tailwind.config = {
			theme: {
				extend: {
					colors: {
						limestone: '#F4F3EE',      /* Caliza Arquitectónica - Fondo Base */
						graphite: '#121416',       /* Fundición de Grafito - Texto & Monolito */
						lead: '#61676E',           /* Plomo Cincado - Subtítulos & Cotas */
						pine: '#1B4332',           /* Pino Abisal - Acento Passivhaus */
						laser: '#C6FF00',          /* Fósforo Láser - Precisión Métrica */
						gridline: 'rgba(18, 20, 22, 0.08)',
						darkline: 'rgba(244, 243, 238, 0.12)'
					},
					fontFamily: {
						syne: ['Syne', 'sans-serif'],
						sans: ['"Plus Jakarta Sans"', 'sans-serif'],
						mono: ['"JetBrains Mono"', 'monospace']
					},
					letterSpacing: {
						tighter: '-0.04em',
						tight: '-0.02em',
						widest: '0.18em'
					}
				}
			}
		};
	</script>

	<!-- GSAP & Lenis CDN -->
	<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/lenis@1.1.18/dist/lenis.min.js"></script>

	<style>
		/* Estilos Base y Tipografía Fluida */
		:root {
			--bg-limestone: #F4F3EE;
			--c-graphite: #121416;
			--c-lead: #61676E;
			--c-pine: #1B4332;
			--c-laser: #C6FF00;
			--ease-out-expo: cubic-bezier(0.16, 1, 0.3, 1);
		}

		body {
			background-color: var(--bg-limestone);
			color: var(--c-graphite);
			font-family: 'Plus Jakarta Sans', sans-serif;
			overflow-x: hidden;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
		}

		/* Selección de texto arquitectónica */
		::selection {
			background-color: var(--c-graphite);
			color: var(--c-laser);
		}

		/* Rejilla de Fondo Modular de 12 Columnas */
		.architectural-grid {
			background-size: calc(100% / 12) 100%;
			background-image: linear-gradient(to right, rgba(18, 20, 22, 0.04) 1px, transparent 1px);
		}

		.architectural-grid-dark {
			background-size: calc(100% / 12) 100%;
			background-image: linear-gradient(to right, rgba(244, 243, 238, 0.05) 1px, transparent 1px);
		}

		/* Text-stroke para contraste tipográfico extremo */
		.text-outline {
			-webkit-text-stroke: 1.5px var(--c-graphite);
			color: transparent;
		}

		.text-outline-dark {
			-webkit-text-stroke: 1.5px var(--bg-limestone);
			color: transparent;
		}

		/* Transición de fotografía editorial: reposo monocromático -> color natural y sutil encuadre en hover */
		.arch-photo-hover {
			filter: grayscale(100%) contrast(108%) brightness(95%);
			transform: scale(1);
			transition: filter 0.6s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
			will-change: filter, transform;
		}

		.group:hover .arch-photo-hover,
		.arch-photo-hover:hover {
			filter: grayscale(0%) contrast(100%) brightness(100%);
			transform: scale(1.04);
		}

		/* Cursor Láser Personalizado */
		@media (hover: hover) and (pointer: fine) {
			.custom-cursor {
				display: block;
			}
			body {
				cursor: default;
			}
		}

		@media (hover: none) or (pointer: coarse) {
			.custom-cursor {
				display: none !important;
			}
		}

		/* Desactivación de animaciones para prefers-reduced-motion */
		@media (prefers-reduced-motion: reduce) {
			* {
				animation-duration: 0.01ms !important;
				animation-iteration-count: 1 !important;
				transition-duration: 0.01ms !important;
				scroll-behavior: auto !important;
			}
			.custom-cursor {
				display: none !important;
			}
			.split-line {
				transform: none !important;
				opacity: 1 !important;
			}
		}

		/* Fórmulas y números tabulares */
		.tabular-nums {
			font-variant-numeric: tabular-nums;
		}
	</style>
	<?php wp_head(); ?>
</head>
<body class="bg-limestone text-graphite relative selection:bg-graphite selection:text-laser antialiased">

	<!-- Cursor Láser Micrométrico (Solo Desktop) -->
	<div id="vk-cursor" class="custom-cursor fixed top-0 left-0 w-8 h-8 pointer-events-none z-50 -translate-x-1/2 -translate-y-1/2 mix-blend-difference hidden md:block">
		<div class="relative w-full h-full flex items-center justify-center">
			<div class="w-2 h-2 rounded-full bg-white transition-transform duration-200" id="vk-cursor-dot"></div>
			<div class="absolute w-8 h-8 border border-white/60 rounded-full scale-100 transition-transform duration-300" id="vk-cursor-ring"></div>
			<!-- Coordenadas Métrica Técnica -->
			<span id="vk-cursor-coords" class="absolute left-6 top-6 font-mono text-[9px] text-white tracking-widest whitespace-nowrap opacity-75">X:000 Y:000</span>
		</div>
	</div>

	<!-- Zona de Gatillo Hover Superior (Deslizar Ficha de Laboratorio) -->
	<div id="vk-top-hover-trigger" class="fixed top-0 left-0 right-0 h-3.5 z-[101] pointer-events-auto" title="Deslizar panel de laboratorio"></div>

	<!-- Preloader / Panel Deslizable de Laboratorio Arquitectónico -->
	<div id="vk-preloader" class="fixed inset-0 bg-graphite text-limestone z-[100] flex flex-col justify-between p-8 md:p-14 select-none shadow-2xl transition-shadow">
		<div class="flex items-center justify-between font-mono text-xs text-lead border-b border-white/10 pb-4">
			<div class="flex items-center space-x-2">
				<span class="w-2 h-2 rounded-full bg-laser animate-pulse"></span>
				<span class="tracking-widest">VEKTA SYSTEMS // ARCHITECTURAL LAB</span>
			</div>
			<div class="flex items-center space-x-6">
				<span>MADRID · 40.4168° N, 3.7038° W</span>
				<button id="vk-close-preloader" class="hidden text-xs font-mono uppercase tracking-widest text-white/80 hover:text-laser border border-white/20 hover:border-laser px-3 py-1 transition-colors flex items-center space-x-1.5 cursor-pointer pointer-events-auto" aria-label="Cerrar panel de laboratorio">
					<span>Cerrar</span>
					<span class="text-laser font-bold">[×]</span>
				</button>
			</div>
		</div>

		<div class="max-w-4xl">
			<span class="font-mono text-xs uppercase tracking-widest text-laser block mb-4">CALIBRANDO AISLAMIENTO TÉRMICO Y ACÚSTICO</span>
			<h2 class="font-syne text-4xl sm:text-6xl md:text-7xl font-bold tracking-tighter uppercase leading-[0.92]">
				EL SILENCIO<br>ES MATERIA.
			</h2>
		</div>

		<div class="flex items-end justify-between border-t border-white/10 pt-6 font-mono text-xs">
			<div>
				<span class="block text-lead">ESTÁNDAR PASIVO PASSIVHAUS INSTITUT</span>
				<span class="text-limestone">DIN EN ISO 10077-1 / UNE-EN 14351-1</span>
			</div>
			<div class="text-right">
				<span class="text-lead block">CALIBRACIÓN</span>
				<span id="vk-preloader-count" class="font-syne text-3xl md:text-5xl font-bold text-laser tabular-nums">0%</span>
			</div>
		</div>
	</div>

	<!-- CONTENEDOR PRINCIPAL CON LENIS SMOOTH SCROLL -->
	<div id="smooth-wrapper" class="relative z-10 w-full overflow-hidden">

		<!-- Rejilla Arquitectónica de Fondo (Líneas Tenues) -->
		<div class="fixed inset-0 pointer-events-none architectural-grid z-0"></div>

		<!-- BARRA SUPERIOR TÉCNICA (Header Arquitectónico) -->
		<header class="relative z-40 w-full border-b border-graphite/10 bg-limestone/90 backdrop-blur-md transition-colors">
			<!-- Tira de Estado Superior -->
			<div class="border-b border-graphite/5 py-2 px-6 md:px-12 flex justify-between items-center font-mono text-[11px] text-lead">
				<div class="flex items-center space-x-4">
					<span class="flex items-center space-x-1.5">
						<span class="w-1.5 h-1.5 rounded-full bg-pine"></span>
						<span class="text-graphite font-semibold">TALLER CENTRAL MADRID</span>
					</span>
					<span class="hidden sm:inline text-graphite/30">|</span>
					<span class="hidden sm:inline">PRODUCCIÓN ROBOTIZADA ACTIVA</span>
				</div>
				<div class="flex items-center space-x-6">
					<button id="vk-trigger-lab-btn" class="hidden md:inline-flex items-center space-x-1.5 text-lead hover:text-graphite font-mono text-[11px] transition-colors cursor-pointer group" title="Deslizar ficha de laboratorio">
						<span class="w-1.5 h-1.5 rounded-full bg-laser group-hover:scale-125 transition-transform"></span>
						<span class="underline decoration-dotted">Ficha de Laboratorio ▾</span>
					</button>
					<span class="hidden md:inline text-graphite/30">|</span>
					<span class="hidden md:inline">TRANSMITANCIA MÍNIMA: <strong class="text-graphite">Uw 0.67</strong> W/m²K</span>
					<span class="text-graphite font-semibold">TEL: +34 900 831 240</span>
				</div>
			</div>

			<!-- Barra de Navegación Principal -->
			<div class="py-4 md:py-6 px-6 md:px-12 flex items-center justify-between">
				<!-- Logotipo Monolítico -->
				<a href="#hero" class="group flex items-baseline space-x-2 focus-visible:outline-2 focus-visible:outline-pine" aria-label="Vekta Systems Inicio">
					<span class="font-syne font-extrabold text-2xl md:text-3xl tracking-tighter text-graphite">VEKTA</span>
					<span class="font-mono text-xs font-semibold tracking-widest text-lead group-hover:text-pine transition-colors">SYSTEMS</span>
				</a>

				<!-- Enlaces de Sección Asimétricos y Numerados -->
				<nav class="hidden lg:flex items-center space-x-10 font-mono text-xs tracking-widest uppercase">
					<a href="#filosofia" class="text-lead hover:text-graphite transition-colors flex items-center space-x-1 py-1 border-b border-transparent hover:border-graphite">
						<span class="text-lead/50">01</span><span>Filosofía</span>
					</a>
					<a href="#acustica" class="text-lead hover:text-graphite transition-colors flex items-center space-x-1 py-1 border-b border-transparent hover:border-graphite">
						<span class="text-lead/50">02</span><span>Freno Acústico</span>
					</a>
					<a href="#sistemas" class="text-lead hover:text-graphite transition-colors flex items-center space-x-1 py-1 border-b border-transparent hover:border-graphite">
						<span class="text-lead/50">03</span><span>Sistemas</span>
					</a>
					<a href="#anatomia" class="text-lead hover:text-graphite transition-colors flex items-center space-x-1 py-1 border-b border-transparent hover:border-graphite">
						<span class="text-lead/50">04</span><span>Anatomía</span>
					</a>
					<a href="#simulador" class="text-lead hover:text-graphite transition-colors flex items-center space-x-1 py-1 border-b border-transparent hover:border-graphite">
						<span class="text-lead/50">05</span><span>Simulador</span>
					</a>
				</nav>

				<!-- Botón de Acción Magnético -->
				<div class="flex items-center space-x-4">
					<a href="#contacto" class="vk-magnetic-btn inline-flex items-center space-x-3 bg-graphite text-limestone hover:bg-pine px-5 py-3 rounded-none text-xs font-mono uppercase tracking-widest font-semibold transition-all duration-300">
						<span>Medición Láser</span>
						<svg class="w-3.5 h-3.5 transform -rotate-45 group-hover:rotate-0 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
							<path stroke-linecap="square" stroke-linejoin="miter" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
						</svg>
					</a>
				</div>
			</div>
		</header>

		<!-- ========================================== -->
		<!-- SECCIÓN 01: HERO ASIMÉTRICO MONOLÍTICO     -->
		<!-- ========================================== -->
		<section id="hero" class="relative min-h-[92vh] flex flex-col justify-between pt-12 md:pt-16 pb-16 px-6 md:px-12 border-b border-graphite/10">
			<!-- Encabezado Editorial Asimétrico -->
			<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start relative z-10">
				
				<!-- Titular Colosal (Syne Display, interlineado apretado) -->
				<div class="lg:col-span-8">
					<div class="flex items-center space-x-3 mb-6 font-mono text-xs tracking-widest text-lead uppercase">
						<span class="w-2.5 h-0.5 bg-graphite"></span>
						<span>Ingeniería de Ventanas de PVC & Aislamiento Passivhaus</span>
					</div>

					<h1 class="font-syne font-extrabold text-[clamp(2.1rem,5.8vw,5.8rem)] leading-[0.92] sm:leading-[0.88] tracking-tighter uppercase text-graphite mb-8">
						<span class="block overflow-hidden"><span class="hero-split inline-block">LA VENTANA</span></span>
						<span class="block overflow-hidden"><span class="hero-split inline-block text-outline">INVISIBLE</span></span>
					</h1>

					<p class="max-w-xl text-lg md:text-xl text-lead leading-relaxed font-light">
						Perfilería de vista mínima y marcos embutidos que prácticamente desaparecen en la arquitectura. Toda la luz natural exterior con el aislamiento térmico Passivhaus y el silencio acústico más exigente de Europa.
					</p>
				</div>

				<!-- Columna Técnica Lateral (Ficha de Parámetros) -->
				<div class="lg:col-span-4 bg-white/70 backdrop-blur-sm border border-graphite/10 p-6 md:p-8 flex flex-col justify-between">
					<div class="border-b border-graphite/10 pb-4 mb-6 flex justify-between items-center">
						<span class="font-mono text-xs uppercase tracking-widest text-graphite font-bold">FICHA DE RENDIMIENTO</span>
						<span class="font-mono text-[10px] bg-pine text-white px-2 py-0.5 uppercase tracking-wider">Passivhaus Cl. A</span>
					</div>

					<div class="space-y-5 font-mono text-xs">
						<div class="flex justify-between items-baseline border-b border-graphite/5 pb-2">
							<span class="text-lead">Transmitancia Térmica</span>
							<span class="font-bold text-base text-graphite">Uw = 0.67 <span class="text-[10px] font-normal text-lead">W/m²K</span></span>
						</div>
						<div class="flex justify-between items-baseline border-b border-graphite/5 pb-2">
							<span class="text-lead">Atenuación Acústica</span>
							<span class="font-bold text-base text-pine">Rw = -52 <span class="text-[10px] font-normal text-lead">dB</span></span>
						</div>
						<div class="flex justify-between items-baseline border-b border-graphite/5 pb-2">
							<span class="text-lead">Permeabilidad al Aire</span>
							<span class="font-bold text-graphite">Clase 4 <span class="text-[10px] font-normal text-lead">(EN 12207)</span></span>
						</div>
						<div class="flex justify-between items-baseline">
							<span class="text-lead">Estanqueidad al Agua</span>
							<span class="font-bold text-graphite">Clase E1500 <span class="text-[10px] font-normal text-lead">(EN 12208)</span></span>
						</div>
					</div>

					<div class="mt-8 pt-4 border-t border-graphite/10 flex items-center justify-between text-[11px] font-mono text-lead">
						<span>CERTIFICACIÓN PHI DARMSTADT</span>
						<span class="w-2 h-2 rounded-full bg-pine"></span>
					</div>
				</div>
			</div>

			<!-- Composición Fotográfica Asimétrica con Visor de Cotas -->
			<div class="mt-12 relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-8 items-end">
				<div class="lg:col-span-9 relative overflow-hidden group">
					<div class="aspect-[16/8] sm:aspect-[21/9] w-full overflow-hidden bg-graphite">
						<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/hero-architecture.jpg' ); ?>" 
							 alt="Vivienda unifamiliar Passivhaus con grandes ventanales de PVC Vekta Systems" 
							 class="w-full h-full object-cover object-center arch-photo-hover"
							 loading="eager" />
					</div>
					
					<!-- Marcadores de Cota Arquitectónica sobre la Imagen -->
					<div class="absolute bottom-4 left-4 bg-graphite/80 backdrop-blur-md text-limestone font-mono text-[10px] px-3 py-1.5 uppercase tracking-widest flex items-center space-x-2">
						<span class="w-1.5 h-1.5 bg-laser rounded-full"></span>
						<span>PROYECTO LA MORALEJA // VIDRIO TRIPLE BAJO EMISIVO SOLAR</span>
					</div>
				</div>

				<div class="lg:col-span-3 flex flex-col justify-end space-y-4 font-mono text-xs text-lead">
					<p class="leading-relaxed border-l-2 border-graphite pl-4">
						Superficies vidriadas de hasta 4 metros continuos sin puente térmico. Perfilería de 82mm con 7 cámaras desacopladas.
					</p>
					<span class="text-[10px] uppercase tracking-widest text-graphite font-bold">MADRID · FABRICACIÓN PROPIA ROBOTIZADA</span>
				</div>
			</div>
		</section>

		<!-- ========================================== -->
		<!-- CINTA DE PRECISIÓN INDUSTRIAL (Marquee)    -->
		<!-- ========================================== -->
		<div class="w-full bg-graphite text-limestone py-4 overflow-hidden border-y border-graphite select-none">
			<div class="flex whitespace-nowrap font-mono text-xs uppercase tracking-widest animate-marquee items-center space-x-12">
				<span>KÖMMERLING K-VISION 76</span>
				<span class="text-laser">/</span>
				<span>VEKA SPECTRAL 82 PASSIVHAUS</span>
				<span class="text-laser">/</span>
				<span>GUARDIAN SUN EXTRA-CLEAR 4+4/16/6</span>
				<span class="text-laser">/</span>
				<span>HERRAJES HOPPE SECUSTIK RC2</span>
				<span class="text-laser">/</span>
				<span>ROTO NX TITAN SILBER</span>
				<span class="text-laser">/</span>
				<span>CERTIFICACIÓN PASSIVHAUS INSTITUT DARMSTADT</span>
				<span class="text-laser">/</span>
				<span>KÖMMERLING K-VISION 76</span>
				<span class="text-laser">/</span>
				<span>VEKA SPECTRAL 82 PASSIVHAUS</span>
			</div>
		</div>

		<!-- ========================================== -->
		<!-- SECCIÓN 02: EL FRENO ACÚSTICO (Pinned)     -->
		<!-- ========================================== -->
		<section id="acustica" class="relative bg-graphite text-limestone py-28 md:py-40 px-6 md:px-12 border-b border-white/10 architectural-grid-dark">
			<div class="max-w-7xl mx-auto">
				<!-- Rótulo de Sección -->
				<div class="flex items-center space-x-4 mb-8 font-mono text-xs uppercase tracking-widest text-lead">
					<span class="text-laser font-bold">02</span>
					<span class="w-8 h-[1px] bg-white/20"></span>
					<span>Dinámica de Atenuación Sonora</span>
				</div>

				<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
					<div class="lg:col-span-6">
						<h2 class="font-syne text-4xl sm:text-5xl md:text-6xl font-bold uppercase tracking-tighter leading-[0.95] mb-6">
							EL FRENO<br><span class="text-outline-dark">ACÚSTICO.</span>
						</h2>
						<p class="text-lead text-base md:text-lg leading-relaxed mb-8 font-light">
							El ruido urbano no entra por el muro, entra por la holgura y la resonancia del vidrio simple. Nuestras composiciones de vidrio triple laminar acústico con butiral PVB Silence rompen la curva de resonancia hasta una caída neta de <strong>-52 dB</strong>.
						</p>

						<!-- Selector de Comparativa Acústica -->
						<div class="space-y-4 font-mono text-xs" id="acoustic-selectors">
							<button class="acoustic-toggle w-full text-left p-4 border border-white/10 hover:border-white/30 transition-all flex justify-between items-center bg-white/5 active-toggle" data-db="85" data-reduction="0" data-label="Exterior Urbano sin Cerramiento">
								<div>
									<span class="text-lead block text-[10px]">ESCENARIO 01</span>
									<span class="text-white font-bold text-sm">Tráfico denso y sirenas en calle principal</span>
								</div>
								<span class="font-syne text-xl text-red-400 font-bold">85 dB</span>
							</button>

							<button class="acoustic-toggle w-full text-left p-4 border border-white/10 hover:border-white/30 transition-all flex justify-between items-center bg-white/5" data-db="52" data-reduction="33" data-label="Ventana Aluminio Antigua con Vidrio Simple">
								<div>
									<span class="text-lead block text-[10px]">ESCENARIO 02</span>
									<span class="text-white font-bold text-sm">Ventana estándar de obra (Aluminio sin RPT)</span>
								</div>
								<span class="font-syne text-xl text-amber-300 font-bold">52 dB</span>
							</button>

							<button class="acoustic-toggle w-full text-left p-4 border border-laser/40 hover:border-laser transition-all flex justify-between items-center bg-pine/30" data-db="18" data-reduction="52" data-label="Vekta Systems Triple Silence Core">
								<div>
									<span class="text-laser block text-[10px]">ENCLAVE VEKTA SYSTEMS</span>
									<span class="text-white font-bold text-sm">Triple Acristalamiento Laminar Acústico + 7 Cámaras</span>
								</div>
								<span class="font-syne text-xl text-laser font-bold">18 dB</span>
							</button>
						</div>
					</div>

					<!-- Visualizador de Osciloscopio Acústico Interactivo -->
					<div class="lg:col-span-6 bg-black/60 border border-white/15 p-8 flex flex-col justify-between min-h-[420px] relative">
						<div class="flex justify-between items-center border-b border-white/10 pb-4 font-mono text-[11px] text-lead">
							<span>ESPECTROGRAFÍA EN TIEMPO REAL</span>
							<span class="flex items-center space-x-2">
								<span class="w-2 h-2 rounded-full bg-laser animate-ping"></span>
								<span class="text-white" id="vk-spectrum-status">AMORTIGUACIÓN ACTIVA</span>
							</span>
						</div>

						<!-- Canvas / SVG Onda de Sonido -->
						<div class="py-12 relative flex items-center justify-center">
							<svg id="vk-wave-svg" class="w-full h-32 overflow-visible" viewBox="0 0 500 100" preserveAspectRatio="none">
								<path id="vk-sound-path" d="M 0 50 Q 50 10, 100 50 T 200 50 T 300 50 T 400 50 T 500 50" fill="none" stroke="#C6FF00" stroke-width="2.5" />
							</svg>
							<div class="absolute inset-0 flex items-center justify-center pointer-events-none">
								<div class="h-full w-[1px] bg-white/20"></div>
							</div>
						</div>

						<!-- Lectura de Decibelios y Estado -->
						<div class="border-t border-white/10 pt-4 flex items-end justify-between font-mono">
							<div>
								<span class="text-[10px] text-lead uppercase tracking-widest block">NIVEL PERCIBIDO EN INTERIOR</span>
								<span id="vk-db-display" class="font-syne text-4xl md:text-5xl font-bold text-laser tabular-nums">18 dB</span>
							</div>
							<div class="text-right">
								<span class="text-[10px] text-lead uppercase tracking-widest block">EQUIVALENCIA</span>
								<span id="vk-equiv-display" class="text-xs text-white uppercase font-bold tracking-wider">Susurro en biblioteca</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- ========================================== -->
		<!-- SECCIÓN 03: CATÁLOGO DE CARPINTERÍAS       -->
		<!-- ========================================== -->
		<section id="sistemas" class="py-28 md:py-36 px-6 md:px-12 border-b border-graphite/10">
			<div class="max-w-7xl mx-auto">
				<!-- Rótulo de Sección -->
				<div class="flex items-center space-x-4 mb-6 font-mono text-xs uppercase tracking-widest text-lead">
					<span class="text-pine font-bold">03</span>
					<span class="w-8 h-[1px] bg-graphite/20"></span>
					<span>Gama de Sistemas Arquitectónicos</span>
				</div>

				<div class="flex flex-col md:flex-row justify-between items-baseline mb-16 gap-6">
					<h2 class="font-syne text-4xl sm:text-5xl md:text-6xl font-bold tracking-tighter uppercase leading-[0.95]">
						CARPINTERÍAS<br><span class="text-outline">DE PRECISIÓN.</span>
					</h2>
					<p class="max-w-md text-lead text-sm font-mono leading-relaxed">
						Cada sistema se mecaniza mediante centros de control numérico de 5 ejes, garantizando tolerancias de ajuste inferiores a 0.2 mm.
					</p>
				</div>

				<!-- Catálogo Asimétrico Alternado (4 Sistemas Maestros) -->
				<div class="space-y-16">

					<!-- SISTEMA 01: VEKTA 82 PASSIVHAUS -->
					<article class="group grid grid-cols-1 lg:grid-cols-12 gap-8 items-center border border-graphite/10 bg-white/60 p-6 md:p-10 hover:border-graphite/30 transition-all duration-300">
						<div class="lg:col-span-6 overflow-hidden aspect-[4/3] bg-graphite">
							<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/sistema-vekta-82.jpg' ); ?>" 
								 alt="Sistema Vekta 82 Passivhaus de carpintería practicable oscilobatiente" 
								 class="w-full h-full object-cover arch-photo-hover" 
								 loading="lazy" />
						</div>
						<div class="lg:col-span-6 flex flex-col justify-between space-y-6">
							<div>
								<div class="flex justify-between items-center font-mono text-xs text-lead mb-3">
									<span class="font-bold text-pine uppercase">SISTEMA 01 // VENTANA PRACTICABLE</span>
									<span>7 CÁMARAS / 82 MM</span>
								</div>
								<h3 class="font-syne text-3xl md:text-4xl font-bold uppercase tracking-tight text-graphite mb-4">
									VEKTA 82 PASSIVHAUS
								</h3>
								<p class="text-lead text-sm leading-relaxed mb-6 font-light">
									Configurada para estándares de consumo energético casi nulo (ECCN). Equipada con triple junta perimetral coextrusionada y refuerzo central térmicamente desacoplado que elimina cualquier condensación intersticial.
								</p>
							</div>

							<div class="grid grid-cols-3 gap-4 border-y border-graphite/10 py-4 font-mono text-xs">
								<div>
									<span class="text-lead text-[10px] block">TRANSMITANCIA</span>
									<span class="font-bold text-graphite text-sm">Uw 0.67</span>
								</div>
								<div>
									<span class="text-lead text-[10px] block">ATENUACIÓN</span>
									<span class="font-bold text-pine text-sm">Rw -48 dB</span>
								</div>
								<div>
									<span class="text-lead text-[10px] block">ESTANQUEIDAD</span>
									<span class="font-bold text-graphite text-sm">Clase 9A</span>
								</div>
							</div>

							<div class="flex items-center justify-between pt-2">
								<a href="#contacto" class="text-xs font-mono uppercase tracking-widest text-graphite font-bold hover:text-pine flex items-center space-x-2">
									<span>Consultar Ficha Técnica</span>
									<span>→</span>
								</a>
								<span class="font-mono text-[10px] text-lead">REF: VK-82-PH</span>
							</div>
						</div>
					</article>

					<!-- SISTEMA 02: HORIZON SLIDE 4.0 -->
					<article class="group grid grid-cols-1 lg:grid-cols-12 gap-8 items-center border border-graphite/10 bg-white/60 p-6 md:p-10 hover:border-graphite/30 transition-all duration-300">
						<div class="lg:col-span-6 order-1 lg:order-2 overflow-hidden aspect-[4/3] bg-graphite">
							<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/sistema-horizon-slide.jpg' ); ?>" 
								 alt="Sistema Horizon Slide de corredera elevable de suelo a techo" 
								 class="w-full h-full object-cover arch-photo-hover" 
								 loading="lazy" />
						</div>
						<div class="lg:col-span-6 order-2 lg:order-1 flex flex-col justify-between space-y-6">
							<div>
								<div class="flex justify-between items-center font-mono text-xs text-lead mb-3">
									<span class="font-bold text-pine uppercase">SISTEMA 02 // CORREDERA ELEVABLE</span>
									<span>HASTA 400 KG / HOJA</span>
								</div>
								<h3 class="font-syne text-3xl md:text-4xl font-bold uppercase tracking-tight text-graphite mb-4">
									HORIZON SLIDE 4.0
								</h3>
								<p class="text-lead text-sm leading-relaxed mb-6 font-light">
									Aperturas panorámicas de suelo a techo con umbral embutido a cota cero sin barreras arquitectónicas. Rodamientos silenciosos de agujas en acero inoxidable con accionamiento asistido con un solo dedo.
								</p>
							</div>

							<div class="grid grid-cols-3 gap-4 border-y border-graphite/10 py-4 font-mono text-xs">
								<div>
									<span class="text-lead text-[10px] block">TRANSMITANCIA</span>
									<span class="font-bold text-graphite text-sm">Uw 0.82</span>
								</div>
								<div>
									<span class="text-lead text-[10px] block">LONGITUD MAX</span>
									<span class="font-bold text-graphite text-sm">6.50 m</span>
								</div>
								<div>
									<span class="text-lead text-[10px] block">SEGURIDAD</span>
									<span class="font-bold text-pine text-sm">Grado RC2</span>
								</div>
							</div>

							<div class="flex items-center justify-between pt-2">
								<a href="#contacto" class="text-xs font-mono uppercase tracking-widest text-graphite font-bold hover:text-pine flex items-center space-x-2">
									<span>Consultar Ficha Técnica</span>
									<span>→</span>
								</a>
								<span class="font-mono text-[10px] text-lead">REF: VK-SLIDE-40</span>
							</div>
						</div>
					</article>

					<!-- SISTEMA 03: SILENCE EXTREME 52 -->
					<article class="group grid grid-cols-1 lg:grid-cols-12 gap-8 items-center border border-graphite/10 bg-white/60 p-6 md:p-10 hover:border-graphite/30 transition-all duration-300">
						<div class="lg:col-span-6 overflow-hidden aspect-[4/3] bg-graphite">
							<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/sistema-silence-extreme.jpg' ); ?>" 
								 alt="Sistema acústico Silence Extreme con aislamiento severo certificado de hasta -52 dB" 
								 class="w-full h-full object-cover arch-photo-hover" 
								 loading="lazy" />
						</div>
						<div class="lg:col-span-6 flex flex-col justify-between space-y-6">
							<div>
								<div class="flex justify-between items-center font-mono text-xs text-lead mb-3">
									<span class="font-bold text-pine uppercase">SISTEMA 03 // ACÚSTICA SEVERA</span>
									<span>DOBLE BUTIRAL PVB</span>
								</div>
								<h3 class="font-syne text-3xl md:text-4xl font-bold uppercase tracking-tight text-graphite mb-4">
									SILENCE EXTREME 52
								</h3>
								<p class="text-lead text-sm leading-relaxed mb-6 font-light">
									Desarrollada para entornos con afección acústica extrema (primeras líneas de tráfico denso, zonas de aproximación aeroportuaria y áreas de ocio nocturno). Reduce la presión sonora percibida en más de un 95%.
								</p>
							</div>

							<div class="grid grid-cols-3 gap-4 border-y border-graphite/10 py-4 font-mono text-xs">
								<div>
									<span class="text-lead text-[10px] block">ATENUACIÓN</span>
									<span class="font-bold text-pine text-sm">Rw -52 dB</span>
								</div>
								<div>
									<span class="text-lead text-[10px] block">VIDRIO</span>
									<span class="font-bold text-graphite text-sm">Laminar 6+6</span>
								</div>
								<div>
									<span class="text-lead text-[10px] block">PERFILERÍA</span>
									<span class="font-bold text-graphite text-sm">88 mm</span>
								</div>
							</div>

							<div class="flex items-center justify-between pt-2">
								<a href="#contacto" class="text-xs font-mono uppercase tracking-widest text-graphite font-bold hover:text-pine flex items-center space-x-2">
									<span>Consultar Ficha Técnica</span>
									<span>→</span>
								</a>
								<span class="font-mono text-[10px] text-lead">REF: VK-SIL-52</span>
							</div>
						</div>
					</article>

				</div>
			</div>
		</section>

		<!-- ========================================== -->
		<!-- SECCIÓN 04: ANATOMÍA INTERACTIVA (7 Cámaras)-->
		<!-- ========================================== -->
		<section id="anatomia" class="py-28 md:py-36 px-6 md:px-12 bg-graphite text-limestone border-b border-white/10 architectural-grid-dark">
			<div class="max-w-7xl mx-auto">
				<!-- Rótulo de Sección -->
				<div class="flex items-center space-x-4 mb-6 font-mono text-xs uppercase tracking-widest text-lead">
					<span class="text-laser font-bold">04</span>
					<span class="w-8 h-[1px] bg-white/20"></span>
					<span>Ingeniería Seccional</span>
				</div>

				<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start mb-16">
					<div class="lg:col-span-7">
						<h2 class="font-syne text-4xl sm:text-5xl font-bold uppercase tracking-tighter leading-[0.95] mb-6">
							ANATOMÍA DE<br><span class="text-outline-dark">7 CÁMARAS.</span>
						</h2>
						<p class="text-lead text-base leading-relaxed font-light">
							El aire estanco encapsulado es el aislante térmico más perfecto que existe. Diseñamos cámaras interiores geométricamente calculadas para neutralizar la convección y bloquear el flujo conductivo de calor y frío.
						</p>
					</div>

					<div class="lg:col-span-5 font-mono text-xs text-lead border-l border-white/15 pl-6 space-y-2">
						<span class="text-laser block uppercase tracking-widest">PATRÓN DE EXTRUSIÓN DIRECTA</span>
						<p>Polímero de PVC virgen estabilizado con calcio y zinc (100% reciclable, libre de plomo y metales pesados). Certificado Cradle to Cradle®.</p>
					</div>
				</div>

				<!-- Diagrama Técnico Interactivo con Hotspots -->
				<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center bg-black/50 border border-white/10 p-8 md:p-12">
					
					<!-- Columna Gráfica / Corte Vectorial -->
					<div class="lg:col-span-7 relative flex items-center justify-center p-6 border border-white/5 bg-white/[0.02]">
						<div class="relative w-full max-w-md aspect-square flex items-center justify-center">
							<!-- Diagrama Vectorial de la Sección de Perfil -->
							<svg viewBox="0 0 400 400" class="w-full h-full text-white/80" fill="none" stroke="currentColor">
								<!-- Marco Perimetral -->
								<rect x="50" y="40" width="300" height="320" stroke-width="2" class="stroke-white/30" />
								<!-- Cámaras Interiores de Aire -->
								<rect x="80" y="70" width="70" height="50" stroke-width="1.5" class="stroke-white/50" />
								<rect x="170" y="70" width="70" height="50" stroke-width="1.5" class="stroke-white/50" />
								<rect x="260" y="70" width="60" height="50" stroke-width="1.5" class="stroke-white/50" />
								<rect x="80" y="140" width="100" height="80" stroke-width="2" class="stroke-laser" />
								<rect x="200" y="140" width="120" height="80" stroke-width="1.5" class="stroke-white/50" />
								<rect x="80" y="240" width="240" height="80" stroke-width="1.5" class="stroke-white/50" />

								<!-- Refuerzo de Acero Galvanizado -->
								<rect x="95" y="155" width="70" height="50" stroke-dasharray="4 2" stroke-width="1.5" class="stroke-white/80" />
							</svg>

							<!-- Hotspots Interactivos -->
							<button class="vk-hotspot absolute top-[28%] left-[22%] w-7 h-7 -translate-x-1/2 -translate-y-1/2 rounded-full bg-laser/20 border border-laser text-laser font-mono text-xs flex items-center justify-center hover:scale-125 transition-transform" data-point="1" aria-label="Ver detalle punto 1: Cámaras térmicas">01</button>
							
							<button class="vk-hotspot absolute top-[45%] left-[30%] w-7 h-7 -translate-x-1/2 -translate-y-1/2 rounded-full bg-laser/20 border border-laser text-laser font-mono text-xs flex items-center justify-center hover:scale-125 transition-transform" data-point="2" aria-label="Ver detalle punto 2: Refuerzo galvanizado">02</button>
							
							<button class="vk-hotspot absolute top-[68%] left-[50%] w-7 h-7 -translate-x-1/2 -translate-y-1/2 rounded-full bg-laser/20 border border-laser text-laser font-mono text-xs flex items-center justify-center hover:scale-125 transition-transform" data-point="3" aria-label="Ver detalle punto 3: Triple junta EPDM">03</button>
							
							<button class="vk-hotspot absolute top-[28%] left-[70%] w-7 h-7 -translate-x-1/2 -translate-y-1/2 rounded-full bg-laser/20 border border-laser text-laser font-mono text-xs flex items-center justify-center hover:scale-125 transition-transform" data-point="4" aria-label="Ver detalle punto 4: Triple acristalamiento">04</button>
						</div>
					</div>

					<!-- Columna de Explicación Dinámica -->
					<div class="lg:col-span-5 flex flex-col justify-between min-h-[340px] border-l border-white/10 pl-0 lg:pl-8">
						<div id="vk-hotspot-info">
							<span class="font-mono text-xs text-laser uppercase tracking-widest block mb-2" id="vk-spot-num">COMPONENTE 01</span>
							<h3 class="font-syne text-2xl md:text-3xl font-bold uppercase mb-4 text-white" id="vk-spot-title">7 CÁMARAS DE AIRE ESTANCO</h3>
							<p class="text-lead text-sm leading-relaxed mb-6 font-light" id="vk-spot-desc">
								Geometría celular optimizada según análisis de elementos finitos térmicos (FEM). Minimiza los gradientes de temperatura interna y asegura un coeficiente Uf del marco de 0.92 W/m²K.
							</p>
							<div class="font-mono text-xs border-t border-white/10 pt-4" id="vk-spot-spec">
								<span class="text-lead">NORMATIVA: </span><span class="text-white font-bold">UNE-EN 12608 / CLASE A</span>
							</div>
						</div>

						<div class="mt-8 font-mono text-[11px] text-lead flex items-center space-x-2">
							<span class="w-1.5 h-1.5 rounded-full bg-laser"></span>
							<span>Haz clic en los puntos numéricos (01 - 04) para inspeccionar</span>
						</div>
					</div>

				</div>
			</div>
		</section>

		<!-- ========================================== -->
		<!-- SECCIÓN 05: CASOS DE ESTUDIO ARQUITECTÓNICOS-->
		<!-- ========================================== -->
		<section id="filosofia" class="py-28 md:py-36 px-6 md:px-12 border-b border-graphite/10">
			<div class="max-w-7xl mx-auto">
				<!-- Rótulo de Sección -->
				<div class="flex items-center space-x-4 mb-6 font-mono text-xs uppercase tracking-widest text-lead">
					<span class="text-pine font-bold">05</span>
					<span class="w-8 h-[1px] bg-graphite/20"></span>
					<span>Obras Arquitectónicas de Referencia</span>
				</div>

				<div class="flex flex-col md:flex-row justify-between items-baseline mb-16 gap-6">
					<h2 class="font-syne text-4xl sm:text-5xl font-bold tracking-tighter uppercase leading-[0.95]">
						INTEGRACIÓN<br><span class="text-outline">SILENCIOSA.</span>
					</h2>
					<p class="max-w-md text-lead text-sm font-mono leading-relaxed">
						Proyectos en los que la envolvente vidriada maximiza la luz natural sin penalizar el balance térmico de la edificación.
					</p>
				</div>

				<!-- Grid Asimétrico de Proyectos -->
				<div class="grid grid-cols-1 md:grid-cols-12 gap-8">
					<!-- Proyecto 01 -->
					<div class="md:col-span-7 group">
						<div class="aspect-[16/10] overflow-hidden bg-graphite mb-4">
							<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/proyecto-ciudalcampo.jpg' ); ?>" 
								 alt="Casa Hormigón y Grandes Ventanales de PVC en Ciudalcampo" 
								 class="w-full h-full object-cover arch-photo-hover" 
								 loading="lazy" />
						</div>
						<div class="flex justify-between items-baseline font-mono text-xs">
							<div>
								<span class="font-syne text-xl font-bold text-graphite uppercase block mb-1">CASA HORIZONTE · CIUDALCAMPO</span>
								<span class="text-lead">140 m² de superficie acristalada · Uw medio 0.71 W/m²K</span>
							</div>
							<span class="text-pine font-bold">2025</span>
						</div>
					</div>

					<!-- Proyecto 02 -->
					<div class="md:col-span-5 group">
						<div class="aspect-[16/10] overflow-hidden bg-graphite mb-4">
							<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/proyecto-salamanca.jpg' ); ?>" 
								 alt="Rehabilitación con ventanas Passivhaus en el Barrio de Salamanca" 
								 class="w-full h-full object-cover arch-photo-hover" 
								 loading="lazy" />
						</div>
						<div class="flex justify-between items-baseline font-mono text-xs">
							<div>
								<span class="font-syne text-xl font-bold text-graphite uppercase block mb-1">REHABILITACIÓN SALAMANCA</span>
								<span class="text-lead">Aislamiento acústico de -50 dB frente a eje viario</span>
							</div>
							<span class="text-pine font-bold">2026</span>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- ========================================== -->
		<!-- SECCIÓN 06: SIMULADOR TÉRMICO PARAMÉTRICO  -->
		<!-- ========================================== -->
		<section id="simulador" class="py-28 md:py-36 px-6 md:px-12 bg-white/70 border-b border-graphite/10">
			<div class="max-w-5xl mx-auto">
				<!-- Rótulo de Sección -->
				<div class="flex items-center space-x-4 mb-6 font-mono text-xs uppercase tracking-widest text-lead">
					<span class="text-pine font-bold">06</span>
					<span class="w-8 h-[1px] bg-graphite/20"></span>
					<span>Interpolador Paramétrico de Eficiencia</span>
				</div>

				<div class="mb-12">
					<h2 class="font-syne text-4xl sm:text-5xl font-bold uppercase tracking-tighter leading-[0.95] mb-4">
						CALCULA EL IMPACTO<br><span class="text-outline">ENERGÉTICO & FISCAL.</span>
					</h2>
					<p class="text-lead text-sm font-mono max-w-xl">
						Introduce los parámetros de tu vivienda para calcular la amortiguación de pérdidas térmicas, el ahorro en climatización y la deducción en IRPF por eficiencia energética (hasta el 60%).
					</p>
				</div>

				<!-- Panel del Configurador Interactivo -->
				<div class="border border-graphite/20 bg-limestone p-6 md:p-10 shadow-sm">
					<form id="vk-sim-form" class="space-y-8" onsubmit="event.preventDefault();">
						<div class="grid grid-cols-1 md:grid-cols-3 gap-6 font-mono text-xs">
							
							<!-- Selector 1: Tipología -->
							<div>
								<label for="sim-dwelling" class="block uppercase tracking-wider text-graphite font-bold mb-2">1. Tipología Inmueble</label>
								<select id="sim-dwelling" class="w-full bg-white border border-graphite/30 p-3 text-graphite focus:outline-none focus:border-pine font-mono">
									<option value="piso">Piso en Bloque Residencial</option>
									<option value="atico">Ático / Última Planta</option>
									<option value="unifamiliar" selected>Chalet / Unifamiliar Aislada</option>
								</select>
							</div>

							<!-- Selector 2: Carpintería Actual -->
							<div>
								<label for="sim-current" class="block uppercase tracking-wider text-graphite font-bold mb-2">2. Ventana Existente</label>
								<select id="sim-current" class="w-full bg-white border border-graphite/30 p-3 text-graphite focus:outline-none focus:border-pine font-mono">
									<option value="aluminio_frio" selected>Aluminio antiguo sin RPT (Uw 5.2)</option>
									<option value="madera_antigua">Madera con vidrio simple (Uw 4.8)</option>
									<option value="climalit_estandar">PVC/Aluminio con doble vidrio (Uw 2.6)</option>
								</select>
							</div>

							<!-- Selector 3: Número de Huecos -->
							<div>
								<label for="sim-windows" class="block uppercase tracking-wider text-graphite font-bold mb-2">3. Número de Huecos</label>
								<select id="sim-windows" class="w-full bg-white border border-graphite/30 p-3 text-graphite focus:outline-none focus:border-pine font-mono">
									<option value="4">4 a 6 ventanas (Piso estándar)</option>
									<option value="8" selected>8 a 12 ventanas (Vivienda media)</option>
									<option value="16">16 o más (Chalet de gran superficie)</option>
								</select>
							</div>

						</div>

						<!-- Resultados Dinámicos Calculados -->
						<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 pt-6 border-t border-graphite/15 font-mono">
							
							<div class="bg-white p-5 border border-graphite/10">
								<span class="text-[10px] text-lead uppercase tracking-widest block mb-1">REDUCCIÓN TRANSMITANCIA</span>
								<span id="res-uw" class="font-syne text-2xl md:text-3xl font-bold text-graphite block">-78%</span>
								<span class="text-[10px] text-lead">Uw 5.2 → Uw 0.67 W/m²K</span>
							</div>

							<div class="bg-white p-5 border border-graphite/10">
								<span class="text-[10px] text-lead uppercase tracking-widest block mb-1">AHORRO EN CLIMATIZACIÓN</span>
								<span id="res-savings" class="font-syne text-2xl md:text-3xl font-bold text-pine block">1.180 €</span>
								<span class="text-[10px] text-lead">Estimación anual media</span>
							</div>

							<div class="bg-white p-5 border border-graphite/10">
								<span class="text-[10px] text-lead uppercase tracking-widest block mb-1">DEDUCCIÓN FISCAL IRPF</span>
								<span id="res-tax" class="font-syne text-2xl md:text-3xl font-bold text-graphite block">60%</span>
								<span class="text-[10px] text-lead">Real Decreto-ley 19/2021</span>
							</div>

							<div class="bg-white p-5 border border-graphite/10">
								<span class="text-[10px] text-lead uppercase tracking-widest block mb-1">ATENUACIÓN ESTIMADA</span>
								<span id="res-db" class="font-syne text-2xl md:text-3xl font-bold text-pine block">-48 dB</span>
								<span class="text-[10px] text-lead">Reducción sonora neta</span>
							</div>

						</div>

						<div class="flex flex-col sm:flex-row justify-between items-center pt-4 gap-4">
							<span class="font-mono text-xs text-lead">Valores computados conforme al Código Técnico de la Edificación (CTE DB-HE y DB-HR).</span>
							<a href="#contacto" class="w-full sm:w-auto inline-flex items-center justify-center space-x-2 bg-graphite text-limestone hover:bg-pine px-6 py-3 font-mono text-xs uppercase tracking-widest font-bold transition-colors">
								<span>Solicitar Auditoría In Situ</span>
								<span>→</span>
							</a>
						</div>
					</form>
				</div>
			</div>
		</section>

		<!-- ========================================== -->
		<!-- SECCIÓN 07: FORMULARIO DE MEDICIÓN LÁSER   -->
		<!-- ========================================== -->
		<section id="contacto" class="py-28 md:py-36 px-6 md:px-12 border-b border-graphite/10">
			<div class="max-w-4xl mx-auto">
				<!-- Rótulo de Sección -->
				<div class="flex items-center space-x-4 mb-6 font-mono text-xs uppercase tracking-widest text-lead">
					<span class="text-pine font-bold">07</span>
					<span class="w-8 h-[1px] bg-graphite/20"></span>
					<span>Contacto Técnico & Medición</span>
				</div>

				<div class="mb-12">
					<h2 class="font-syne text-4xl sm:text-5xl font-bold uppercase tracking-tighter leading-[0.95] mb-4">
						SOLICITUD DE<br><span class="text-outline">MEDICIÓN LÁSER.</span>
					</h2>
					<p class="text-lead text-sm font-mono leading-relaxed">
						Un técnico de nuestro departamento de ingeniería se desplazará a la obra con distanciómetro láser para auditar escuadras, tolerancias y puentes térmicos. Sin compromiso comercial.
					</p>
				</div>

				<form id="vk-contact-form" class="space-y-6" onsubmit="event.preventDefault(); alert('Solicitud registrada correctamente. Nuestro departamento técnico se pondrá en contacto en menos de 24 horas.');">
					<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
						<div>
							<label for="contact-name" class="block font-mono text-xs uppercase tracking-wider text-graphite font-bold mb-2">Nombre o Estudio de Arquitectura *</label>
							<input type="text" id="contact-name" required placeholder="Ej: Estudio Álvarez & Asociados" class="w-full bg-white border border-graphite/30 p-3.5 text-graphite focus:outline-none focus:border-pine font-mono text-sm" />
						</div>

						<div>
							<label for="contact-phone" class="block font-mono text-xs uppercase tracking-wider text-graphite font-bold mb-2">Teléfono de Contacto Directo *</label>
							<input type="tel" id="contact-phone" required placeholder="+34 600 000 000" class="w-full bg-white border border-graphite/30 p-3.5 text-graphite focus:outline-none focus:border-pine font-mono text-sm" />
						</div>
					</div>

					<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
						<div>
							<label for="contact-location" class="block font-mono text-xs uppercase tracking-wider text-graphite font-bold mb-2">Localidad / Código Postal *</label>
							<input type="text" id="contact-location" required placeholder="Ej: 28001 Madrid / Pozuelo" class="w-full bg-white border border-graphite/30 p-3.5 text-graphite focus:outline-none focus:border-pine font-mono text-sm" />
						</div>

						<div>
							<label for="contact-project-type" class="block font-mono text-xs uppercase tracking-wider text-graphite font-bold mb-2">Tipo de Proyecto</label>
							<select id="contact-project-type" class="w-full bg-white border border-graphite/30 p-3.5 text-graphite focus:outline-none focus:border-pine font-mono text-sm">
								<option value="reforma">Reforma Integral de Vivienda</option>
								<option value="obra_nueva">Obra Nueva Passivhaus</option>
								<option value="sustitucion">Sustitución de Ventanas Existentes</option>
								<option value="terciario">Edificación Terciaria / Oficinas</option>
							</select>
						</div>
					</div>

					<div>
						<label for="contact-notes" class="block font-mono text-xs uppercase tracking-wider text-graphite font-bold mb-2">Especificaciones Particulares (Dimensiones, Aislamiento Acústico, Requisitos)</label>
						<textarea id="contact-notes" rows="4" placeholder="Indica detalles como orientación de fachada, nivel de ruido exterior o número estimado de huecos..." class="w-full bg-white border border-graphite/30 p-3.5 text-graphite focus:outline-none focus:border-pine font-mono text-sm"></textarea>
					</div>

					<div class="flex items-start space-x-3 pt-2">
						<input type="checkbox" id="contact-privacy" required class="mt-1 accent-pine w-4 h-4" />
						<label for="contact-privacy" class="font-mono text-xs text-lead">
							Acepto la política de tratamiento de datos técnicos para la emisión del informe de medición según el RGPD (UE) 2016/679.
						</label>
					</div>

					<div class="pt-4">
						<button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center space-x-3 bg-graphite text-limestone hover:bg-pine px-8 py-4 font-mono text-xs uppercase tracking-widest font-bold transition-all duration-300">
							<span>Confirmar Solicitud de Medición Láser</span>
							<span>→</span>
						</button>
					</div>
				</form>
			</div>
		</section>

		<!-- ========================================== -->
		<!-- FOOTER MONOLÍTICO NEGRO GRAFITO            -->
		<!-- ========================================== -->
		<footer class="bg-graphite text-limestone pt-20 pb-12 px-6 md:px-12 border-t border-white/10 architectural-grid-dark">
			<div class="max-w-7xl mx-auto">
				<!-- Gran Logotipo Monumental -->
				<div class="border-b border-white/10 pb-16 mb-16">
					<span class="font-syne font-extrabold text-[clamp(2.5rem,11vw,10.5rem)] leading-none tracking-tighter uppercase block text-white/90">
						VEKTA SYSTEMS
					</span>
				</div>

				<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 font-mono text-xs text-lead mb-16">
					<div>
						<span class="text-white uppercase font-bold tracking-widest block mb-4">CENTRO TÉCNICO & FÁBRICA</span>
						<p class="leading-relaxed">
							C/ Arquitectura 14, Polígono Tecnológico<br>
							28001 Madrid, España<br>
							Tel: +34 900 831 240<br>
							Mail: ingenieria@vekta.es
						</p>
					</div>

					<div>
						<span class="text-white uppercase font-bold tracking-widest block mb-4">CERTIFICACIONES</span>
						<ul class="space-y-1.5">
							<li>Passivhaus Institut Darmstadt</li>
							<li>Marcado CE UNE-EN 14351-1</li>
							<li>Cradle to Cradle® Silver</li>
							<li>ISO 9001:2015 de Gestión</li>
						</ul>
					</div>

					<div>
						<span class="text-white uppercase font-bold tracking-widest block mb-4">SISTEMAS HOMOLOGADOS</span>
						<ul class="space-y-1.5">
							<li>Vekta 82 Passivhaus Pro</li>
							<li>Horizon Slide 4.0 Cota Cero</li>
							<li>Silence Extreme 52 dB</li>
							<li>Pivot Monolith Security RC3</li>
						</ul>
					</div>

					<div>
						<span class="text-white uppercase font-bold tracking-widest block mb-4">HORARIO DE ATENCIÓN</span>
						<p class="leading-relaxed">
							Lunes a Jueves: 08:00 - 18:30<br>
							Viernes: 08:00 - 15:00<br>
							Visitas a fábrica con cita previa.
						</p>
					</div>
				</div>

				<div class="border-t border-white/10 pt-8 flex flex-col sm:flex-row justify-between items-center font-mono text-[11px] text-lead gap-4">
					<div>
						© <?php echo esc_html( date( 'Y' ) ); ?> VEKTA SYSTEMS S.L. Todos los derechos reservados.
					</div>
					<div class="flex space-x-6">
						<a href="#" class="hover:text-white transition-colors">Aviso Legal</a>
						<a href="#" class="hover:text-white transition-colors">Política de Privacidad</a>
						<a href="#" class="hover:text-white transition-colors">Fichas Técnicas PDF</a>
					</div>
				</div>
			</div>
		</footer>

	</div><!-- /#smooth-wrapper -->

	<!-- ========================================== -->
	<!-- SCRIPTS DE MOVIMIENTO & GSAP + LENIS       -->
	<!-- ========================================== -->
	<script>
		document.addEventListener('DOMContentLoaded', () => {
			const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

			// 1. Inicialización de Lenis Smooth Scroll sincronizado con GSAP Ticker
			let lenis = null;
			if (!prefersReduced && typeof Lenis !== 'undefined') {
				lenis = new Lenis({
					duration: 1.1,
					easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
					orientation: 'vertical',
					smoothWheel: true,
					wheelMultiplier: 0.9
				});

				lenis.on('scroll', ScrollTrigger.update);
				gsap.ticker.add((time) => lenis.raf(time * 1000));
				gsap.ticker.lagSmoothing(0);

				// Soporte de anclas para Lenis
				document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
					anchor.addEventListener('click', function(e) {
						const targetId = this.getAttribute('href');
						if (targetId && targetId !== '#') {
							const targetEl = document.querySelector(targetId);
							if (targetEl) {
								e.preventDefault();
								lenis.scrollTo(targetEl, { offset: -20 });
							}
						}
					});
				});
			}

			// 2. Cursor Láser Micrométrico en Desktop
			const cursorEl = document.getElementById('vk-cursor');
			const cursorCoords = document.getElementById('vk-cursor-coords');
			const cursorRing = document.getElementById('vk-cursor-ring');
			const cursorDot = document.getElementById('vk-cursor-dot');

			if (cursorEl && !prefersReduced && window.innerWidth >= 768) {
				const xTo = gsap.quickTo(cursorEl, "x", { duration: 0.12, ease: "power3" });
				const yTo = gsap.quickTo(cursorEl, "y", { duration: 0.12, ease: "power3" });

				window.addEventListener('mousemove', (e) => {
					xTo(e.clientX);
					yTo(e.clientY);
					if (cursorCoords) {
						cursorCoords.textContent = `X:${String(e.clientX).padStart(4, '0')} Y:${String(e.clientY).padStart(4, '0')}`;
					}
				});

				// Hover sobre enlaces y botones
				document.querySelectorAll('a, button, input, select, textarea, .acoustic-toggle, .vk-hotspot').forEach((interactive) => {
					interactive.addEventListener('mouseenter', () => {
						if (cursorRing) cursorRing.style.transform = 'scale(1.8)';
						if (cursorDot) cursorDot.style.backgroundColor = '#C6FF00';
					});
					interactive.addEventListener('mouseleave', () => {
						if (cursorRing) cursorRing.style.transform = 'scale(1)';
						if (cursorDot) cursorDot.style.backgroundColor = '#FFFFFF';
					});
				});
			}

			// 3. Preloader Editorial Animado & Panel Desplegable Superior
			const preloader = document.getElementById('vk-preloader');
			const preloaderCount = document.getElementById('vk-preloader-count');
			const closePreloaderBtn = document.getElementById('vk-close-preloader');
			const topTrigger = document.getElementById('vk-top-hover-trigger');
			const labBtn = document.getElementById('vk-trigger-lab-btn');

			let isLabOpen = false;
			let hoverTopTimer = null;

			function openLabDrawer() {
				if (!preloader || isLabOpen) return;
				isLabOpen = true;
				gsap.killTweensOf(preloader);
				gsap.to(preloader, {
					yPercent: 0,
					duration: 0.7,
					ease: "power4.out",
					onStart: () => {
						preloader.style.pointerEvents = 'auto';
					}
				});
			}

			function closeLabDrawer() {
				if (!preloader || !isLabOpen) return;
				isLabOpen = false;
				gsap.killTweensOf(preloader);
				gsap.to(preloader, {
					yPercent: -100,
					duration: 0.6,
					ease: "power4.inOut",
					onComplete: () => {
						preloader.style.pointerEvents = 'none';
					}
				});
			}

			if (preloader) {
				if (prefersReduced) {
					preloader.style.display = 'none';
				} else {
					const counterObj = { val: 0 };
					gsap.to(counterObj, {
						val: 100,
						duration: 1.2,
						ease: "power2.out",
						onUpdate: () => {
							if (preloaderCount) preloaderCount.textContent = Math.round(counterObj.val) + '%';
						},
						onComplete: () => {
							gsap.to(preloader, {
								yPercent: -100,
								duration: 0.9,
								ease: "power4.inOut",
								onComplete: () => {
									preloader.style.pointerEvents = 'none';
									if (closePreloaderBtn) closePreloaderBtn.classList.remove('hidden');
									animateHeroEntrance();
								}
							});
						}
					});
				}

				// Gatillo 1: Zona superior de la pantalla (dejar cursor arriba)
				if (topTrigger) {
					topTrigger.addEventListener('mouseenter', () => {
						clearTimeout(hoverTopTimer);
						hoverTopTimer = setTimeout(openLabDrawer, 120);
					});
					topTrigger.addEventListener('mouseleave', () => {
						clearTimeout(hoverTopTimer);
					});
				}

				// Gatillo 2: Posicionar el cursor en la zona superior (Y <= 18px)
				window.addEventListener('mousemove', (e) => {
					if (e.clientY <= 18 && !isLabOpen) {
						clearTimeout(hoverTopTimer);
						hoverTopTimer = setTimeout(openLabDrawer, 160);
					} else if (e.clientY > 80 && !isLabOpen) {
						clearTimeout(hoverTopTimer);
					}
				});

				// Gatillo 3: Botón 'Ficha de Laboratorio ▾' en el header
				if (labBtn) {
					labBtn.addEventListener('click', (e) => {
						e.preventDefault();
						if (isLabOpen) {
							closeLabDrawer();
						} else {
							openLabDrawer();
						}
					});
					labBtn.addEventListener('mouseenter', () => {
						clearTimeout(hoverTopTimer);
						hoverTopTimer = setTimeout(openLabDrawer, 140);
					});
				}

				// Cierre 1: Botón [×] Cerrar
				if (closePreloaderBtn) {
					closePreloaderBtn.addEventListener('click', (e) => {
						e.preventDefault();
						closeLabDrawer();
					});
				}

				// Cierre 2: Salir del panel negro con el ratón hacia abajo
				preloader.addEventListener('mouseleave', (e) => {
					if (isLabOpen && e.clientY > 100) {
						closeLabDrawer();
					}
				});

				// Cierre 3: Tecla Escape
				window.addEventListener('keydown', (e) => {
					if (e.key === 'Escape' && isLabOpen) {
						closeLabDrawer();
					}
				});

				// Cierre 4: Scroll con la rueda hacia abajo
				window.addEventListener('wheel', (e) => {
					if (isLabOpen && e.deltaY > 20) {
						closeLabDrawer();
					}
				}, { passive: true });
			} else {
				animateHeroEntrance();
			}

			// 4. Reveal Tipográfico del Hero con Máscaras
			function animateHeroEntrance() {
				if (prefersReduced) return;
				const heroLines = document.querySelectorAll('.hero-split');
				if (heroLines.length > 0) {
					gsap.fromTo(heroLines, 
						{ yPercent: 100, opacity: 0 },
						{ yPercent: 0, opacity: 1, duration: 1.1, stagger: 0.15, ease: "power4.out" }
					);
				}
			}

			// 5. Interacción del Freno Acústico y Osciloscopio
			const acousticToggles = document.querySelectorAll('.acoustic-toggle');
			const soundPath = document.getElementById('vk-sound-path');
			const dbDisplay = document.getElementById('vk-db-display');
			const equivDisplay = document.getElementById('vk-equiv-display');

			const soundWaves = {
				'85': {
					path: 'M 0 50 Q 25 -20, 50 50 T 100 50 T 150 50 T 200 50 T 250 50 T 300 50 T 350 50 T 400 50 T 450 50 T 500 50',
					color: '#F87171',
					text: 'Tráfico urbano caótico'
				},
				'52': {
					path: 'M 0 50 Q 50 20, 100 50 T 200 50 T 300 50 T 400 50 T 500 50',
					color: '#FDE047',
					text: 'Atenuación débil ordinaria'
				},
				'18': {
					path: 'M 0 50 L 500 50',
					color: '#C6FF00',
					text: 'Susurro en biblioteca'
				}
			};

			acousticToggles.forEach((btn) => {
				btn.addEventListener('click', () => {
					acousticToggles.forEach(b => {
						b.classList.remove('bg-pine/30', 'border-laser/40');
						b.classList.add('bg-white/5', 'border-white/10');
					});
					btn.classList.add('bg-pine/30', 'border-laser/40');
					btn.classList.remove('bg-white/5', 'border-white/10');

					const db = btn.getAttribute('data-db');
					const wave = soundWaves[db] || soundWaves['18'];

					if (dbDisplay) dbDisplay.textContent = `${db} dB`;
					if (equivDisplay) equivDisplay.textContent = wave.text;

					if (soundPath) {
						gsap.to(soundPath, {
							attr: { d: wave.path, stroke: wave.color },
							duration: 0.6,
							ease: "power2.out"
						});
					}
				});
			});

			// 6. Hotspots del Despiece Celular
			const hotspots = document.querySelectorAll('.vk-hotspot');
			const spotNum = document.getElementById('vk-spot-num');
			const spotTitle = document.getElementById('vk-spot-title');
			const spotDesc = document.getElementById('vk-spot-desc');
			const spotSpec = document.getElementById('vk-spot-spec');

			const spotData = {
				'1': {
					num: 'COMPONENTE 01',
					title: '7 CÁMARAS DE AIRE ESTANCO',
					desc: 'Geometría celular calculada mediante análisis de elementos finitos térmicos (FEM). Minimiza los gradientes de temperatura interna y asegura un coeficiente Uf del marco de 0.92 W/m²K.',
					spec: 'NORMATIVA: UNE-EN 12608 / CLASE A'
				},
				'2': {
					num: 'COMPONENTE 02',
					title: 'ALMA DE REFUERZO DESACOPLADA',
					desc: 'Estructura de acero cincado de 2mm tratada contra corrosión y embutida sin tocar las paredes exteriores para eliminar por completo el puente térmico metálico.',
					spec: 'RESISTENCIA MECÁNICA: CLASE C5 (2000 Pa)'
				},
				'3': {
					num: 'COMPONENTE 03',
					title: 'TRIPLE JUNTA PERIMETRAL EPDM',
					desc: 'Junta central de estanqueidad continua soldada en esquinas. Resiste la presión de viento huracanado y evita la entrada de micropartículas contaminantes y polen.',
					spec: 'ESTANQUEIDAD AL AGUA: CLASE E1500 (EN 12208)'
				},
				'4': {
					num: 'COMPONENTE 04',
					title: 'TRIPLE VIDRIO CON GAS ARGÓN 90%',
					desc: 'Tres lunas de vidrio (incluyendo lámina de control solar y capa bajo emisiva) con cámaras de 16mm cargadas con gas noble Argón para una transmitancia Ug de 0.5 W/m²K.',
					spec: 'AISLAMIENTO TÉRMICO VIDRIO: Ug = 0.5 W/m²K'
				}
			};

			hotspots.forEach((spot) => {
				spot.addEventListener('click', () => {
					const pt = spot.getAttribute('data-point');
					const data = spotData[pt];
					if (data) {
						if (spotNum) spotNum.textContent = data.num;
						if (spotTitle) spotTitle.textContent = data.title;
						if (spotDesc) spotDesc.textContent = data.desc;
						if (spotSpec) spotSpec.innerHTML = `<span class="text-lead">NORMATIVA: </span><span class="text-white font-bold">${data.spec}</span>`;

						hotspots.forEach(s => s.classList.remove('bg-laser', 'text-graphite'));
						spot.classList.add('bg-laser', 'text-graphite');
					}
				});
			});

			// 7. Lógica del Simulador Paramétrico
			const dwellingSelect = document.getElementById('sim-dwelling');
			const currentSelect = document.getElementById('sim-current');
			const windowsSelect = document.getElementById('sim-windows');

			const resUw = document.getElementById('res-uw');
			const resSavings = document.getElementById('res-savings');
			const resTax = document.getElementById('res-tax');
			const resDb = document.getElementById('res-db');

			function updateSimulation() {
				const dwelling = dwellingSelect ? dwellingSelect.value : 'unifamiliar';
				const current = currentSelect ? currentSelect.value : 'aluminio_frio';
				const numWindows = windowsSelect ? parseInt(windowsSelect.value, 10) : 8;

				let baseUw = 5.2;
				let baseSavingsPerWindow = 120;
				let dbReduction = '-48 dB';

				if (current === 'madera_antigua') {
					baseUw = 4.8;
					baseSavingsPerWindow = 105;
					dbReduction = '-45 dB';
				} else if (current === 'climalit_estandar') {
					baseUw = 2.6;
					baseSavingsPerWindow = 65;
					dbReduction = '-35 dB';
				}

				if (dwelling === 'unifamiliar') baseSavingsPerWindow *= 1.35;
				if (dwelling === 'atico') baseSavingsPerWindow *= 1.2;

				const totalSavings = Math.round(baseSavingsPerWindow * numWindows);
				const percentUw = Math.round(((baseUw - 0.67) / baseUw) * 100);

				if (resUw) resUw.textContent = `-${percentUw}%`;
				if (resSavings) resSavings.textContent = `${totalSavings.toLocaleString('es-ES')} €`;
				if (resDb) resDb.textContent = dbReduction;
				if (resTax) resTax.textContent = dwelling === 'unifamiliar' ? '60%' : '40%';
			}

			if (dwellingSelect && currentSelect && windowsSelect) {
				dwellingSelect.addEventListener('change', updateSimulation);
				currentSelect.addEventListener('change', updateSimulation);
				windowsSelect.addEventListener('change', updateSimulation);
			}
		});
	</script>

	<?php wp_footer(); ?>
</body>
</html>
# 🪟 Vekta Ventanas — WordPress Child Theme sobre GeneratePress

> **Carpintería arquitectónica en PVC, aislamiento acústico certificado y eficiencia energética Passivhaus.**
> Tema hijo de alta ingeniería desarrollado sobre la base ultraligera de [GeneratePress](https://generatepress.com).

---

## 📐 Características Principales

- **Arquitectura Modular Limpia:** Estructura desacoplada (`inc/setup.php`, `inc/hooks.php`, `assets/css/`, `assets/js/`). Cero código espagueti.
- **Tokens de Diseño Arquitectónico (`tokens.css`):**
  - Paleta arquitectónica inspirada en Renovavent: Fondo cálido luminoso (`#F6F6F6`), Grafito profundo (`#25282A`), Acento Lima Eléctrico (`#CFEF4D`) y Cian Técnico (`#52C8D8`).
  - Tipografía fluida matemática con `clamp()` (Google Fonts: _Outfit_ y _Plus Jakarta Sans_).
  - Elevaciones orgánicas y sombras multicapa suaves.
- **Simulador Interactivo de Aislamiento & Eficiencia:**
  - Comparativa en tiempo real de 3 tecnologías: _Vidrio Simple_, _Vekta Confort 76 (Argón)_ y _Vekta 88 Passivhaus (Triple Argón/Kriptón)_.
  - Indicadores dinámicos de atenuación sonora (-52 dB), transmitancia térmica Uw (0.65 W/m²K) y porcentaje de ahorro en factura eléctrica.
- **Configurador de Presupuesto en 3 Pasos:**
  - Estimador dinámico de coste según tipología de vivienda, número de ventanas y acabado superficial (Blanco, Antracita 7016, Roble Turner o Negro Mate).
  - Deducción estimada de Ayudas Europeas NextGeneration para eficiencia energética.
- **Bento Grid de Ingeniería:** Detalle de perfiles multicámara, refuerzo de acero perimetral y herrajes antipalanca RC2.
- **Rendimiento Máximo (Core Web Vitals):** 0 dependencias pesadas, Vanilla JavaScript puro y scripts diferidos con `defer`.

---

## 🚀 Cómo Ejecutar en Local (Vibe Coding con WordPress Playground)

No necesitas instalar PHP, MariaDB ni Docker en tu máquina:

```bash
# Desde la carpeta del tema hijo:
npx @wp-playground/cli@latest start
```

El comando leerá `blueprint.json`, descargará el tema padre **GeneratePress**, activará el tema hijo **Vekta Ventanas** y abrirá automáticamente tu navegador en `http://localhost:9400`.

---

## 📦 Estructura de Archivos

```text
vekta-ventanas/
├── style.css                 # Cabecera oficial del Child Theme (Template: generatepress)
├── functions.php             # Cargador modular
├── front-page.php            # Plantilla de inicio corporativa
├── index.php                 # Fallback estándar
├── blueprint.json            # Configuración para WordPress Playground
├── inc/
│   ├── setup.php             # Enqueue optimizado de estilos, fuentes y JS con defer
│   └── hooks.php             # Filtros de GeneratePress y shortcode [vekta_simulador]
└── assets/
    ├── css/
    │   ├── tokens.css        # Variables CSS, escalado tipográfico clamp() y elevaciones
    │   └── vekta.css         # Componentes visuales, hero, bento grid y showroom
    └── js/
        └── simulator.js      # Lógica interactiva del simulador térmico y configurador
```

---

## 🏛️ Instalación en Producción (Cualquier Hosting)

1. Sube la carpeta del tema padre `generatepress` a `/wp-content/themes/generatepress`.
2. Sube esta carpeta `vekta-ventanas` a `/wp-content/themes/vekta-ventanas`.
3. Desde el panel de administración de WordPress (_Apariencia → Temas_), activa **Vekta Ventanas - Child Theme**.

# Sistema de Diseño Arquitectónico: Vekta Systems

## Dirección Creativa Awwwards / FWA / CSS Design Awards

### 1. Concepto Central

> **"La Ventana Invisible: concebida con perfilería mínima y marcos embutidos que prácticamente desaparecen en la arquitectura, maximizando la entrada de luz y aislando por completo el frío, el calor y el ruido exterior."**

Tono y adjetivos rectores: **editorial, tenso, técnico, monolítico, silencioso**.

---

### 2. Paleta Cromática Mineral

| Nombre Token | HEX                   | Rol Arquitectónico                        | Justificación                                                         |
| ------------ | --------------------- | ----------------------------------------- | --------------------------------------------------------------------- |
| `limestone`  | `#F4F3EE`             | Caliza Arquitectónica (Fondo base diurno) | Calidez táctil mineral, alternativa sobria al blanco hospitalario.    |
| `graphite`   | `#121416`             | Fundición de Grafito (Texto & Monolito)   | Alto contraste, solidez estructural, negro de herrería industrial.    |
| `lead`       | `#61676E`             | Plomo Cincado (Metadatos & Cotas)         | Jerarquía secundaria, notas de ingeniería, especificaciones técnicas. |
| `pine`       | `#1B4332`             | Pino Abisal (Sello Passivhaus)            | Ecología de alto rendimiento, estándar alemán Passivhaus Institut.    |
| `laser`      | `#C6FF00`             | Fósforo Láser (Precisión Métrica)         | Acento vibrante pero disciplinado para osciloscopio y puntos activos. |
| `gridline`   | `rgba(18,20,22,0.06)` | Rejilla Modular de 12 Columnas            | Estructura visual matemática que dota de tensión al layout.           |

---

### 3. Tipografía

1. **Display Monumental:** **Syne** (Weights: 700 Bold, 800 ExtraBold).
   - Uso: Titulares colosales en `clamp()`, tracking negativo (`-0.04em`), interlineado apretado (`0.88 - 0.95`).
   - Carácter: Escultórico, brutalista, rotundo.
2. **Cuerpo de Lectura Técnico:** **Plus Jakarta Sans** (Weights: 300, 400, 500, 600).
   - Uso: Párrafos editoriales, memorias de proyecto, etiquetas de formulario.
   - Carácter: Neutralidad suiza, legibilidad insuperable sin caer en clichés tipo Inter o Roboto.
3. **Cotas & Mediciones:** **JetBrains Mono** (Weights: 400, 500, 700).
   - Uso: Transmitancias ($U_w$), decibelios ($-52\text{ dB}$), coordenadas espaciales, referencias de producto.
   - Carácter: Precisión métrica de plano de obra y control numérico.

---

### 4. Sistema de Layout & Rejilla

- **12 Columnas Asimétricas:** Líneas verticales visibles de 1px a lo largo del viewport.
- **Roturas de Rejilla:** Bloques asimétricos (ej. 8 col titular vs 4 col ficha técnica), imágenes panorámicas de 9 col con bloque flotante de 3 col.
- **Ritmo Vertical:** Márgenes generosos de 120px a 180px entre secciones para máxima respiración editorial.

---

### 5. Momentos GSAP & Animación

1. **Preloader / Apertura de Umbral:** Contador técnico $0\%\to 100\%$ y elevación de persiana monolítica con `power4.inOut`.
2. **Hero Reveal:** División tipográfica enmascarada (`overflow: hidden`) y ascenso en cascada de titulares con `power4.out`.
3. **El Freno Acústico:** Osciloscopio reactivo que transforma una onda caótica de 85 dB en una línea horizontal serena de 18 dB.
4. **Despiece Celular de 7 Cámaras:** Hotspots interactivos con despliegue de ficha técnica y normativa UNE-EN.
5. **Simulador Paramétrico:** Interpolación reactiva en JavaScript para el cálculo de pérdidas térmicas, ahorro anual y deducción IRPF del 60%.
6. **Cursor Retícula Láser:** Cruceta micrométrica con lectura dinámica de coordenadas de pantalla `X: [px] Y: [px]` para desktop.

---

### 6. Checklist de Validación & Accesibilidad

- [x] Sin clichés de IA (cero gradientes morados/azules, cero glassmorphism en tríos, cero emojis).
- [x] Compatibilidad con `prefers-reduced-motion: reduce`.
- [x] Contraste cromático conforme a WCAG 2.1 AA.
- [x] Semántica HTML5 estricta (`header`, `main`, `section`, `article`, `footer`, labels de formulario).

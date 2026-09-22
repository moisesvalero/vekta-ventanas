# Design System: Vekta Ventanas

## Visual World & Identity

Inspirado en la vanguardia europea y la alta ingeniería arquitectónica de Renovavent (https://renovavent.com/). Un diseño luminoso, honesto, táctil y de alto contraste que transmite la entrada de luz natural, el silencio y la precisión mecánica.

## Palette & Semantics

- **Canvas Base:** `#F6F6F6` — Lienzo cálido y luminoso que aleja la interfaz de los temas oscuros genéricos de IA.
- **Card Surfaces:** `#FFFFFF` — Tarjetas blancas puras con bordes sutiles `1px solid rgba(0, 0, 0, 0.08)`.
- **Deep Graphite:** `#25282A` — Para lectura impecable de títulos, navegación y contenedores oscuros de alto impacto (Hero, Bento Grid, Footer).
- **Signature Electric Lime:** `#CFEF4D` — Color característico de llamada a la acción en formato píldora (`border-radius: 9999px`) con texto oscuro `#25282A` (ratio de contraste 11.2:1).
- **Secondary Cyan:** `#52C8D8` — Para detalles técnicos y sellos de eficiencia.
- **Eco Green:** `#10B981` — Para sellos Passivhaus y ahorro energético.

## Typography

- **Headings:** `'Outfit'`, geometric, modern, tracking `-0.03em`, line-height `1.15`.
- **Body:** `'Plus Jakarta Sans'`, humanist, crisp, line-height `1.55-1.6`, measure `65-75ch`.
- **Scaling:** Fluid mathematical sizing via `clamp()` across all viewports.
- **Numerals:** `font-variant-numeric: tabular-nums` para alineación óptica de precios, dB y valores Uw.

## Container Geometry & Craft Floor Rules

- **Structural Containers:** `border-radius: 28px` (`--vk-radius-xl`) en el Hero, Bento Grid y banner final.
- **Buttons & Pills:** `border-radius: 9999px` (estilo píldora) con padding generoso (`14px 28px`).
- **Icons:** Sistema de iconos vectoriales SVG limpios y consistentes. Prohibidos emojis y glifos Unicode como sustitutos de interfaz.
- **Text:** Prohibido el texto en degradado (`gradient-text`). El énfasis se logra con tamaño, peso o el color de acento sólido (`#CFEF4D`).
- **Performance:** Cero animaciones de propiedades de maquetación (`width`, `height`, `padding`). Todo movimiento se delega a `transform` y `opacity` con aceleración GPU a 60fps.
- **Browser Surfaces:** Selección de texto temática (`::selection` en verde lima), anillo de foco accesible (`:focus-visible` con outline de 2px) y scrollbar estilizada.
- **Image Hover:** Las imágenes no se aumentan al hacer hover (`transform: scale` prohibido); la retroalimentación visual se otorga a la tarjeta o contenedor.

/**
 * Vekta Ventanas - Interactive Controller
 * Pure Vanilla JavaScript (Zero Dependencies, Ultra Fast, Fully Accessible)
 */

(function () {
  "use strict";

  // =========================================================================
  // 1. SIMULADOR DE EFICIENCIA TÉRMICA & ACÚSTICA
  // =========================================================================
  const techData = {
    simple: {
      ruidoVal: "-18 dB",
      ruidoWidth: "25%",
      ruidoNote: "Se escucha tráfico y conversaciones de la calle",
      termicoVal: "4.80 W/m²K",
      termicoWidth: "15%",
      termicoNote:
        "Pérdida masiva de calor en invierno y entrada de radiación en verano",
      ahorroVal: "0% Ahorro",
      ahorroWidth: "5%",
      ahorroNote: "Factura eléctrica y de gas máxima (sin aislamiento)",
      inTemp: "16.5°C (Inestable)",
      inNoise: "Ruido molesto: 62 dB",
      glassHtml: '<span class="vk-glass-pane" style="width:4px;"></span>',
      profileText: "Aluminio simple sin rotura de puente térmico",
    },
    doble: {
      ruidoVal: "-45 dB",
      ruidoWidth: "88%",
      ruidoNote: "Silencio acústico equivalente a una biblioteca",
      termicoVal: "0.82 W/m²K",
      termicoWidth: "92%",
      termicoNote: "Máxima calificación de eficiencia A+++ con control solar",
      ahorroVal: "Hasta 65%",
      ahorroWidth: "75%",
      ahorroNote: "~480€ / año de ahorro medio en climatización",
      inTemp: "21.5°C Constante",
      inNoise: "Silencio óptimo: 35 dB",
      glassHtml:
        '<span class="vk-glass-pane"></span><span class="vk-gas-chamber"><small>Argón 90%</small></span><span class="vk-glass-pane"></span>',
      profileText: "Perfil Vekta 76mm con 6 cámaras y junta central",
    },
    triple: {
      ruidoVal: "-52 dB",
      ruidoWidth: "98%",
      ruidoNote: "Insonorización de nivel estudio de grabación",
      termicoVal: "0.65 W/m²K",
      termicoWidth: "98%",
      termicoNote:
        "Estándar Passivhaus Certificado para consumo energético casi nulo",
      ahorroVal: "Hasta 82%",
      ahorroWidth: "95%",
      ahorroNote: "~690€ / año de ahorro + Certificación Passivhaus",
      inTemp: "22.0°C Inmutable",
      inNoise: "Silencio absoluto: 28 dB",
      glassHtml:
        '<span class="vk-glass-pane"></span><span class="vk-gas-chamber"><small>Argón</small></span><span class="vk-glass-pane"></span><span class="vk-gas-chamber"><small>Kriptón</small></span><span class="vk-glass-pane"></span>',
      profileText:
        "Perfil Vekta 88mm con 7 cámaras térmicas y triple junta EPDM",
    },
  };

  function initSimulator() {
    const tabs = document.querySelectorAll(".vk-tab-btn");
    if (!tabs.length) return;

    const valRuido = document.getElementById("val-ruido");
    const barRuido = document.getElementById("bar-ruido");
    const noteRuido = document.getElementById("note-ruido");

    const valTermico = document.getElementById("val-termico");
    const barTermico = document.getElementById("bar-termico");
    const noteTermico = document.getElementById("note-termico");

    const valAhorro = document.getElementById("val-ahorro");
    const barAhorro = document.getElementById("bar-ahorro");
    const noteAhorro = document.getElementById("note-ahorro");

    const inTempVal = document.getElementById("in-temp-val");
    const inNoiseVal = document.getElementById("in-noise-val");
    const glassLayers = document.getElementById("core-glass-layers");
    const profileText = document.getElementById("profile-text");

    tabs.forEach((tab) => {
      tab.addEventListener("click", function () {
        tabs.forEach((t) => {
          t.classList.remove("active");
          t.setAttribute("aria-selected", "false");
        });
        this.classList.add("active");
        this.setAttribute("aria-selected", "true");

        const tech = this.dataset.tech;
        const data = techData[tech];
        if (!data) return;

        if (valRuido) valRuido.textContent = data.ruidoVal;
        if (barRuido) barRuido.style.width = data.ruidoWidth;
        if (noteRuido) noteRuido.textContent = data.ruidoNote;

        if (valTermico) valTermico.textContent = data.termicoVal;
        if (barTermico) barTermico.style.width = data.termicoWidth;
        if (noteTermico) noteTermico.textContent = data.termicoNote;

        if (valAhorro) valAhorro.textContent = data.ahorroVal;
        if (barAhorro) barAhorro.style.width = data.ahorroWidth;
        if (noteAhorro) noteAhorro.textContent = data.ahorroNote;

        if (inTempVal) inTempVal.textContent = data.inTemp;
        if (inNoiseVal) inNoiseVal.textContent = data.inNoise;
        if (glassLayers) glassLayers.innerHTML = data.glassHtml;
        if (profileText) profileText.textContent = data.profileText;
      });
    });
  }

  // =========================================================================
  // 2. CONFIGURADOR DE PRESUPUESTO & ESTIMADOR EN VIVO
  // =========================================================================
  const configState = {
    dwelling: "piso",
    windows: 5,
    finish: "antracita",
  };

  const basePricing = {
    dwelling: { piso: 1.0, atico: 1.15, chalet: 1.25 },
    windows: { 3: 1650, 5: 2750, 8: 4400, 12: 6600 },
    finish: { blanco: 1.0, antracita: 1.12, roble: 1.18, negro: 1.15 },
  };

  function updateEstimate() {
    const estimateEl = document.getElementById("vk-live-estimate");
    const subsidyEl = document.getElementById("vk-live-subsidy");
    if (!estimateEl) return;

    const base = basePricing.windows[configState.windows] || 2750;
    const dwellingFactor = basePricing.dwelling[configState.dwelling] || 1.0;
    const finishFactor = basePricing.finish[configState.finish] || 1.12;

    const total = Math.round((base * dwellingFactor * finishFactor) / 50) * 50;
    const minRange = Math.round(total * 0.95);
    const maxRange = Math.round(total * 1.08);

    estimateEl.textContent = `${minRange.toLocaleString("es-ES")} € — ${maxRange.toLocaleString("es-ES")} €`;

    if (subsidyEl) {
      const maxSubsidy = Math.round(total * 0.4);
      subsidyEl.innerHTML = `<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex-shrink:0; vertical-align: -2px; margin-right: 4px;"><rect x="2" y="6" width="20" height="12" rx="2"/><circle cx="12" cy="12" r="2"/><path d="M6 12h.01M18 12h.01"/></svg> Deducción estimada Plan Renove: <strong>Hasta -${maxSubsidy.toLocaleString("es-ES")} €</strong> en ayuda directa`;
    }
  }

  function selectOption(card) {
    const group = card.dataset.group;
    const value = card.dataset.val;

    document
      .querySelectorAll(`.vk-option-card[data-group="${group}"]`)
      .forEach((c) => {
        c.classList.remove("selected");
        c.setAttribute("aria-pressed", "false");
      });

    card.classList.add("selected");
    card.setAttribute("aria-pressed", "true");

    if (group === "dwelling") configState.dwelling = value;
    if (group === "windows") configState.windows = parseInt(value, 10);
    if (group === "finish") configState.finish = value;

    updateEstimate();
  }

  function initConfigurator() {
    const optionCards = document.querySelectorAll(".vk-option-card");
    if (!optionCards.length) return;

    optionCards.forEach((card) => {
      card.addEventListener("click", function () {
        selectOption(this);
      });

      card.addEventListener("keydown", function (e) {
        if (e.key === "Enter" || e.key === " " || e.code === "Space") {
          e.preventDefault();
          selectOption(this);
        }
      });
    });

    // Desplazamiento suave al formulario de lead al pulsar el botón de cotización
    const openLeadBtn = document.getElementById("vk-btn-open-lead-modal");
    const leadFormBox = document.getElementById("vk-lead-capture-box");
    if (openLeadBtn && leadFormBox) {
      openLeadBtn.addEventListener("click", function () {
        leadFormBox.scrollIntoView({ behavior: "smooth", block: "center" });
        const firstInput = leadFormBox.querySelector("input");
        if (firstInput) firstInput.focus();
      });
    }

    // Gestión del formulario de presupuesto
    const quoteForm = document.getElementById("vk-quote-form");
    const feedbackBox = document.getElementById("vk-quote-feedback");

    if (quoteForm && feedbackBox) {
      quoteForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const nameInput = document.getElementById("lead-name");
        const clientName =
          nameInput && nameInput.value
            ? nameInput.value.trim()
            : "Estimado/a cliente";

        quoteForm.style.display = "none";
        feedbackBox.style.display = "block";

        const successCard = feedbackBox.querySelector(
          ".vk-success-message-card",
        );
        if (successCard) {
          successCard.innerHTML = `
						<span class="vk-success-icon" style="flex-shrink: 0;"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#065F46" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10" fill="#CFEF4D"/><path d="m9 12 2 2 4-4"/></svg></span>
						<div>
							<h4 style="margin: 0 0 0.5rem 0; font-size: 1.15rem; color: #065F46;">¡Gracias, ${clientName}! Tu solicitud ha sido registrada.</h4>
							<p style="margin: 0; line-height: 1.5; color: #047857;">Hemos enviado una copia a tu email y asignado a nuestro ingeniero especialista para la zona de tu vivienda. Te llamaremos en menos de 2 horas para coordinar la medición gratuita.</p>
						</div>
					`;
        }
        feedbackBox.scrollIntoView({ behavior: "smooth", block: "nearest" });
      });
    }

    updateEstimate();
  }

  // =========================================================================
  // 3. PESTAÑAS DE FILTRADO DEL SHOWROOM DE PRODUCTOS
  // =========================================================================
  function initProductTabs() {
    const filterButtons = document.querySelectorAll(".vk-filter-btn");
    const productCards = document.querySelectorAll(".vk-solution-card");
    if (!filterButtons.length || !productCards.length) return;

    filterButtons.forEach((btn) => {
      btn.addEventListener("click", function () {
        filterButtons.forEach((b) => {
          b.classList.remove("active");
          b.setAttribute("aria-selected", "false");
        });
        this.classList.add("active");
        this.setAttribute("aria-selected", "true");

        const filterValue = this.dataset.filter;

        productCards.forEach((card) => {
          const cardCategory = card.dataset.category;
          if (filterValue === "all" || cardCategory === filterValue) {
            card.classList.remove("hidden");
            card.style.opacity = "0";
            card.style.transform = "translateY(12px)";
            setTimeout(() => {
              card.style.transition =
                "opacity 300ms ease, transform 300ms ease";
              card.style.opacity = "1";
              card.style.transform = "translateY(0)";
            }, 50);
          } else {
            card.classList.add("hidden");
          }
        });
      });
    });
  }

  // =========================================================================
  // 4. ACORDEÓN DE PREGUNTAS FRECUENTES (FAQ)
  // =========================================================================
  function initFaqAccordion() {
    const triggers = document.querySelectorAll(".vk-faq-trigger");
    if (!triggers.length) return;

    triggers.forEach((trigger) => {
      trigger.addEventListener("click", function () {
        const item = this.closest(".vk-faq-item");
        const isExpanded = this.getAttribute("aria-expanded") === "true";

        // Cerrar otros items si se desea acordeón exclusivo
        document.querySelectorAll(".vk-faq-item").forEach((otherItem) => {
          if (otherItem !== item) {
            otherItem.classList.remove("active");
            const otherTrigger = otherItem.querySelector(".vk-faq-trigger");
            if (otherTrigger)
              otherTrigger.setAttribute("aria-expanded", "false");
          }
        });

        if (isExpanded) {
          item.classList.remove("active");
          this.setAttribute("aria-expanded", "false");
        } else {
          item.classList.add("active");
          this.setAttribute("aria-expanded", "true");
        }
      });
    });
  }

  // =========================================================================
  // 5. MENÚ MÓVIL DESPLEGABLE (OFF-CANVAS)
  // =========================================================================
  function initMobileNav() {
    const menuBtn = document.getElementById("vk-mobile-menu-btn");
    const drawer = document.getElementById("vk-mobile-drawer");
    const closeBtn = document.getElementById("vk-drawer-close-btn");
    const drawerLinks = document.querySelectorAll(".vk-drawer-link");

    if (!menuBtn || !drawer) return;

    function openDrawer() {
      drawer.classList.add("open");
      drawer.setAttribute("aria-hidden", "false");
      menuBtn.setAttribute("aria-expanded", "true");
      document.body.style.overflow = "hidden";
    }

    function closeDrawer() {
      drawer.classList.remove("open");
      drawer.setAttribute("aria-hidden", "true");
      menuBtn.setAttribute("aria-expanded", "false");
      document.body.style.overflow = "";
    }

    menuBtn.addEventListener("click", openDrawer);
    if (closeBtn) closeBtn.addEventListener("click", closeDrawer);

    drawerLinks.forEach((link) => {
      link.addEventListener("click", closeDrawer);
    });

    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape" && drawer.classList.contains("open")) {
        closeDrawer();
      }
    });
  }

  // =========================================================================
  // 6. ANIMACIONES AL SCROLL (INTERSECTION OBSERVER)
  // =========================================================================
  function initScrollReveal() {
    const reveals = document.querySelectorAll(".vk-reveal");
    if (!reveals.length) return;

    // Añadir clase js-ready al elemento raíz para activar reveal suave
    document.documentElement.classList.add("js-ready");

    if ("IntersectionObserver" in window) {
      const revealObserver = new IntersectionObserver(
        (entries, observer) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              entry.target.classList.add("is-revealed");
              observer.unobserve(entry.target);
            }
          });
        },
        {
          root: null,
          threshold: 0.12,
          rootMargin: "0px 0px -40px 0px",
        },
      );

      reveals.forEach((el) => revealObserver.observe(el));
    } else {
      // Fallback para navegadores antiguos
      reveals.forEach((el) => el.classList.add("is-revealed"));
    }
  }

  // =========================================================================
  // 7. INICIALIZACIÓN GLOBAL
  // =========================================================================
  document.addEventListener("DOMContentLoaded", function () {
    initSimulator();
    initConfigurator();
    initProductTabs();
    initFaqAccordion();
    initMobileNav();
    initScrollReveal();

    // Smooth scroll universal para enlaces internos
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
      anchor.addEventListener("click", function (e) {
        const targetId = this.getAttribute("href");
        if (targetId && targetId !== "#") {
          const targetEl = document.querySelector(targetId);
          if (targetEl) {
            e.preventDefault();
            targetEl.scrollIntoView({ behavior: "smooth", block: "start" });
          }
        }
      });
    });
  });
})();

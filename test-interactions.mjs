import { chromium } from "playwright";

async function runTests() {
  console.log("🚀 Iniciando tests de interacción en http://127.0.0.1:9400...");
  const browser = await chromium.launch({ headless: true });
  const context = await browser.newContext({
    viewport: { width: 1440, height: 900 },
  });
  const page = await context.newPage();

  const consoleErrors = [];
  page.on("console", (msg) => {
    if (msg.type() === "error") {
      consoleErrors.push(msg.text());
    }
  });
  page.on("pageerror", (err) => {
    consoleErrors.push(err.message);
  });

  await page.goto("http://127.0.0.1:9400", { waitUntil: "networkidle" });
  console.log("✓ Página cargada correctamente.");

  // 1. Probar Simulador Térmico / Acústico
  console.log("\n--- Probando Simulador Térmico & Acústico ---");
  const tabSimple = page.locator('.vk-tab-btn[data-tech="simple"]');
  const tabTriple = page.locator('.vk-tab-btn[data-tech="triple"]');
  const valRuido = page.locator("#val-ruido");
  const valTermico = page.locator("#val-termico");

  console.log("Valor inicial ruido:", await valRuido.textContent());
  console.log("Valor inicial térmico:", await valTermico.textContent());

  await tabSimple.click();
  await page.waitForTimeout(300);
  console.log("Tras click en Vidrio Simple:");
  console.log(" - Ruido:", await valRuido.textContent());
  console.log(" - Térmico:", await valTermico.textContent());

  await tabTriple.click();
  await page.waitForTimeout(300);
  console.log("Tras click en Passivhaus Triple:");
  console.log(" - Ruido:", await valRuido.textContent());
  console.log(" - Térmico:", await valTermico.textContent());

  // 2. Probar Filtros de Productos
  console.log("\n--- Probando Filtros de Catálogo ---");
  const filterCorredera = page.locator(
    '.vk-filter-btn[data-filter="corredera"]',
  );
  await filterCorredera.click();
  await page.waitForTimeout(400);
  const visibleCardsCorredera = await page
    .locator(".vk-solution-card:not(.hidden)")
    .count();
  console.log(
    `Tarjetas visibles filtradas por 'corredera': ${visibleCardsCorredera}`,
  );

  const filterAll = page.locator('.vk-filter-btn[data-filter="all"]');
  await filterAll.click();
  await page.waitForTimeout(400);
  const visibleCardsAll = await page
    .locator(".vk-solution-card:not(.hidden)")
    .count();
  console.log(`Tarjetas visibles con 'todos': ${visibleCardsAll}`);

  // 3. Probar Configurador de Presupuesto
  console.log("\n--- Probando Configurador de Presupuesto ---");
  const estimateEl = page.locator("#vk-live-estimate");
  console.log("Presupuesto inicial:", await estimateEl.textContent());

  // Seleccionar 8 ventanas
  const opt8Ventanas = page.locator(
    '.vk-option-card[data-group="windows"][data-val="8"]',
  );
  await opt8Ventanas.click();
  await page.waitForTimeout(300);
  console.log(
    "Presupuesto tras elegir 8 ventanas:",
    await estimateEl.textContent(),
  );

  // Seleccionar Chalet
  const optChalet = page.locator(
    '.vk-option-card[data-group="dwelling"][data-val="chalet"]',
  );
  await optChalet.click();
  await page.waitForTimeout(300);
  console.log(
    "Presupuesto tras elegir Chalet:",
    await estimateEl.textContent(),
  );

  // 4. Probar Acordeón FAQ
  console.log("\n--- Probando Acordeón FAQ ---");
  const firstFaqTrigger = page.locator(".vk-faq-trigger").first();
  const firstFaqItem = page.locator(".vk-faq-item").first();
  console.log(
    "FAQ item 1 activo antes de click:",
    await firstFaqItem.evaluate((el) => el.classList.contains("active")),
  );
  await firstFaqTrigger.click();
  await page.waitForTimeout(300);
  console.log(
    "FAQ item 1 activo tras click:",
    await firstFaqItem.evaluate((el) => el.classList.contains("active")),
  );

  // 5. Probar Envío del Formulario
  console.log("\n--- Probando Formulario de Captación ---");
  await page.fill("#lead-name", "Carlos Navarro");
  await page.fill("#lead-phone", "612345678");
  await page.fill("#lead-email", "carlos@ejemplo.com");
  await page.fill("#lead-city", "Madrid");
  await page.click("#vk-btn-submit-lead");
  await page.waitForTimeout(400);

  const isFeedbackVisible = await page
    .locator("#vk-quote-feedback")
    .isVisible();
  console.log("¿Feedback de éxito visible tras envío?:", isFeedbackVisible);

  // 6. Probar Menú Móvil Off-Canvas
  console.log("\n--- Probando Menú Móvil Off-Canvas ---");
  await page.setViewportSize({ width: 375, height: 812 });
  const menuBtn = page.locator("#vk-mobile-menu-btn");
  const drawer = page.locator("#vk-mobile-drawer");
  const closeBtn = page.locator("#vk-drawer-close-btn");

  await menuBtn.click();
  await page.waitForTimeout(300);
  const isDrawerOpen = await drawer.evaluate((el) =>
    el.classList.contains("open"),
  );
  console.log("¿Menú móvil abierto tras click en hamburguesa?:", isDrawerOpen);

  await closeBtn.click();
  await page.waitForTimeout(300);
  const isDrawerClosed = await drawer.evaluate(
    (el) => !el.classList.contains("open"),
  );
  console.log(
    "¿Menú móvil cerrado tras click en botón de cierre?:",
    isDrawerClosed,
  );

  console.log("\n--- Errores de Consola ---");
  if (consoleErrors.length === 0) {
    console.log("✅ CERO errores en consola JavaScript.");
  } else {
    console.error("❌ Errores encontrados:", consoleErrors);
  }

  await browser.close();
  console.log("\n🎉 Todos los tests completados.");
}

runTests().catch((err) => {
  console.error("Error durante la ejecución de los tests:", err);
  process.exit(1);
});

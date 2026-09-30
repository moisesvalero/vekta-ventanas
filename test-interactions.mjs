import { chromium } from "playwright";

async function runTests() {
  console.log(
    "🚀 Iniciando tests de interacción Awwwards en http://127.0.0.1:9400...",
  );
  const browser = await chromium.launch({ headless: true });

  // Contexto Desktop (1440x900)
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

  // Esperar a que el preloader finalice y revele el contenido
  await page.waitForTimeout(2800);

  // Verificación de imágenes locales (naturalWidth > 0 y sin errores de red)
  console.log("\n--- Verificando Imágenes Locales ---");
  const images = page.locator("img");
  const count = await images.count();
  console.log(`Total de imágenes encontradas: ${count}`);

  for (let i = 0; i < count; i++) {
    const img = images.nth(i);
    await img.scrollIntoViewIfNeeded();
    await page.waitForTimeout(200);
    const src = await img.getAttribute("src");
    const isLoaded = await img.evaluate(
      (el) => el.complete && el.naturalWidth > 0,
    );
    console.log(
      ` - Imagen ${i + 1} (${src}): ${isLoaded ? "✓ Cargada con éxito (" + (await img.evaluate((el) => el.naturalWidth + "x" + el.naturalHeight)) + ")" : "❌ ERROR DE CARGA"}`,
    );
    if (!isLoaded) {
      throw new Error(`La imagen ${src} no se ha podido cargar.`);
    }
  }

  // Verificación de transición de Hover a Color
  console.log("\n--- Verificando Efecto Hover de Fotos a Color ---");
  const firstCard = page.locator("article.group").first();
  const firstImg = firstCard.locator("img");

  const filterBefore = await firstImg.evaluate(
    (el) => window.getComputedStyle(el).filter,
  );
  console.log("Filtro en reposo:", filterBefore);

  await firstCard.hover();
  await page.waitForTimeout(400);
  const filterAfter = await firstImg.evaluate(
    (el) => window.getComputedStyle(el).filter,
  );
  console.log("Filtro en hover:", filterAfter);

  // Capturar Hero en Desktop
  await page.evaluate(() => window.scrollTo(0, 0));
  await page.waitForTimeout(300);
  await page.screenshot({
    path: "screenshot-desktop-hero.png",
    fullPage: false,
  });

  // 1. Probar Freno Acústico
  console.log("\n--- Probando Freno Acústico y Osciloscopio ---");
  const dbDisplay = page.locator("#vk-db-display");
  console.log("Nivel inicial dB:", await dbDisplay.textContent());

  const btn85 = page.locator('.acoustic-toggle[data-db="85"]');
  await btn85.click();
  await page.waitForTimeout(400);
  console.log("Tras seleccionar 85 dB:", await dbDisplay.textContent());

  const btn18 = page.locator('.acoustic-toggle[data-db="18"]');
  await btn18.click();
  await page.waitForTimeout(400);
  console.log("Tras seleccionar 18 dB:", await dbDisplay.textContent());

  // Capturar sección Acústica
  const acousticSec = page.locator("#acustica");
  await acousticSec.scrollIntoViewIfNeeded();
  await page.waitForTimeout(400);
  await page.screenshot({
    path: "screenshot-desktop-acoustic.png",
    fullPage: false,
  });

  // 2. Probar Hotspots de Anatomía 7 Cámaras
  console.log("\n--- Probando Hotspots de Anatomía 7 Cámaras ---");
  const spotTitle = page.locator("#vk-spot-title");
  console.log("Título componente inicial:", await spotTitle.textContent());

  const spot2 = page.locator('.vk-hotspot[data-point="2"]');
  await spot2.click();
  await page.waitForTimeout(300);
  console.log("Tras click en Hotspot 02:", await spotTitle.textContent());

  const spot4 = page.locator('.vk-hotspot[data-point="4"]');
  await spot4.click();
  await page.waitForTimeout(300);
  console.log("Tras click en Hotspot 04:", await spotTitle.textContent());

  // 3. Probar Simulador Paramétrico
  console.log("\n--- Probando Simulador Paramétrico ---");
  const simCurrent = page.locator("#sim-current");
  const simDwelling = page.locator("#sim-dwelling");
  const simWindows = page.locator("#sim-windows");
  const resSavings = page.locator("#res-savings");
  const resUw = page.locator("#res-uw");

  console.log("Ahorro inicial:", await resSavings.textContent());
  console.log("Reducción Uw inicial:", await resUw.textContent());

  await simCurrent.selectOption("climalit_estandar");
  await simDwelling.selectOption("piso");
  await simWindows.selectOption("4");
  await page.waitForTimeout(300);

  console.log(
    "Ahorro tras seleccionar Piso con Climalit 4 ventanas:",
    await resSavings.textContent(),
  );
  console.log("Reducción Uw tras selección:", await resUw.textContent());

  // Capturar Catálogo de Sistemas
  const sistemasSec = page.locator("#sistemas");
  await sistemasSec.scrollIntoViewIfNeeded();
  await page.waitForTimeout(400);
  await page.screenshot({
    path: "screenshot-desktop-catalog.png",
    fullPage: false,
  });

  // Capturar Simulador
  const simSec = page.locator("#simulador");
  await simSec.scrollIntoViewIfNeeded();
  await page.waitForTimeout(400);
  await page.screenshot({
    path: "screenshot-desktop-simulator.png",
    fullPage: false,
  });

  // Capturar página completa
  await page.screenshot({
    path: "screenshot-desktop-full.png",
    fullPage: true,
  });
  console.log("✓ Capturados screenshots Desktop.");

  // Contexto Móvil 375px
  const mobileContext = await browser.newContext({
    viewport: { width: 375, height: 812 },
    userAgent:
      "Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1",
  });
  const mobilePage = await mobileContext.newPage();
  await mobilePage.goto("http://127.0.0.1:9400", { waitUntil: "networkidle" });
  await mobilePage.waitForTimeout(2800);
  await mobilePage.evaluate(() => window.scrollTo(0, 0));
  await mobilePage.waitForTimeout(300);
  await mobilePage.screenshot({
    path: "screenshot-mobile-375-hero.png",
    fullPage: false,
  });
  await mobilePage.screenshot({
    path: "screenshot-mobile-375-full.png",
    fullPage: true,
  });
  console.log("✓ Capturados screenshots Móvil 375px.");

  await browser.close();

  console.log("\n--- Resumen de Errores de Consola ---");
  if (consoleErrors.length === 0) {
    console.log("✓ 0 errores de consola JavaScript.");
  } else {
    console.error("❌ Errores detectados:", consoleErrors);
    process.exit(1);
  }

  console.log("\n✅ Todas las pruebas de interacción han pasado con éxito.");
}

runTests().catch((err) => {
  console.error("Error en ejecución de tests:", err);
  process.exit(1);
});

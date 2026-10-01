import { chromium } from "playwright";

const TARGET_URL = process.env.TEST_URL || "https://vekta-ventanas.vercel.app";

async function runTests() {
  console.log(`🚀 Iniciando tests de interacción en ${TARGET_URL}...`);
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

  await page.goto(TARGET_URL, { waitUntil: "networkidle" });
  console.log("✓ Página cargada correctamente.");

  // Esperar a que el preloader finalice y revele el contenido
  await page.waitForFunction(
    () => {
      const el = document.getElementById("vk-preloader");
      if (!el) return true;
      const matrix = new DOMMatrix(window.getComputedStyle(el).transform);
      return matrix.m42 < -100;
    },
    { timeout: 10000 },
  );
  await page.waitForTimeout(600);

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

  // 0. Probar Panel Deslizable Superior (Ficha de Laboratorio)
  console.log("\n--- Probando que el cursor superior YA NO abre el panel ---");
  const preloader = page.locator("#vk-preloader");

  // Mover cursor a la zona superior (Y = 5px) -> Debe permanecer CERRADO
  await page.mouse.move(700, 5);
  await page.waitForTimeout(600);
  const isStillClosedOnHover = await preloader.evaluate((el) => {
    const matrix = new DOMMatrix(window.getComputedStyle(el).transform);
    return matrix.m42 < -100;
  });
  console.log(
    "Panel permanece cerrado al posar cursor arriba (Y = 5px):",
    isStillClosedOnHover,
  );
  if (!isStillClosedOnHover) {
    throw new Error("El panel no debería abrirse al posar el cursor arriba.");
  }

  // Abrir panel pulsando deliberadamente el botón 'Ficha de Laboratorio ▾'
  console.log(
    "\n--- Probando Apertura Manual del Panel mediante Botón 'Ficha de Laboratorio ▾' ---",
  );
  const labBtn = page.locator("#vk-trigger-lab-btn");
  await labBtn.click();
  await page.waitForTimeout(800);
  const isPreloaderDown = await preloader.evaluate((el) => {
    const matrix = new DOMMatrix(window.getComputedStyle(el).transform);
    return Math.abs(matrix.m42) < 25; // yPercent: 0
  });
  console.log(
    "Panel deslizado hacia abajo al pulsar el botón:",
    isPreloaderDown,
  );
  if (!isPreloaderDown) {
    throw new Error(
      "El panel de laboratorio debería abrirse al hacer clic en el botón.",
    );
  }

  await page.screenshot({
    path: "screenshot-lab-drawer-open.png",
    fullPage: false,
  });

  // Cerrar panel pulsando el botón [×]
  const closeBtn = page.locator("#vk-close-preloader");
  await closeBtn.click();
  await page.waitForTimeout(700);
  const isPreloaderClosed = await preloader.evaluate((el) => {
    const matrix = new DOMMatrix(window.getComputedStyle(el).transform);
    return matrix.m42 < -100; // yPercent: -100
  });
  console.log("Panel cerrado tras pulsar [×]:", isPreloaderClosed);
  if (!isPreloaderClosed) {
    throw new Error("El panel no se cerró tras pulsar el botón [×].");
  }

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

  // Verificación de Favicon y Metadatos OG Image
  console.log("\n--- Verificando Favicon y Open Graph ---");
  const faviconHref = await page
    .locator('link[rel="icon"]')
    .getAttribute("href");
  console.log("Favicon href:", faviconHref);
  if (!faviconHref || !faviconHref.includes("favicon")) {
    throw new Error("No se encontró el link rel='icon' del favicon.");
  }
  const ogImageContent = await page
    .locator('meta[property="og:image"]')
    .getAttribute("content");
  console.log("OG Image content:", ogImageContent);
  if (!ogImageContent || !ogImageContent.includes("og-image.jpg")) {
    throw new Error(
      "No se encontró la etiqueta meta og:image apuntando a og-image.jpg.",
    );
  }
  console.log("✓ Favicon y OG Image correctamente configurados.");

  // Verificación de Teléfono Demo y Enlaces de Redes/Portfolio en Footer
  console.log("\n--- Verificando Teléfono Demo y Enlaces de Portfolio ---");
  const headerPhoneText = await page.locator("header").innerText();
  if (!headerPhoneText.includes("+34 900 000 000")) {
    throw new Error(
      "El teléfono del header no se ha actualizado al número demo ficticio.",
    );
  }
  console.log("✓ Teléfono demo en header verificado (+34 900 000 000).");

  const portfolioLink = await page
    .locator('footer a[href*="moisesvalero.es"]')
    .count();
  const linkedinLink = await page
    .locator('footer a[href*="linkedin.com/in/moisesvalero"]')
    .count();
  const githubLink = await page
    .locator('footer a[href*="github.com/moisesvalero"]')
    .count();
  console.log(
    `Enlaces encontrados en footer -> Portfolio: ${portfolioLink}, LinkedIn: ${linkedinLink}, GitHub: ${githubLink}`,
  );
  if (portfolioLink === 0 || linkedinLink === 0 || githubLink === 0) {
    throw new Error("Faltan enlaces a redes o portfolio en el footer.");
  }
  console.log(
    "✓ Enlaces de autor (moisesvalero.es, LinkedIn, GitHub) verificados en el footer.",
  );
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
  await mobilePage.goto(TARGET_URL, { waitUntil: "networkidle" });
  await mobilePage.waitForFunction(
    () => {
      const el = document.getElementById("vk-preloader");
      if (!el) return true;
      const matrix = new DOMMatrix(window.getComputedStyle(el).transform);
      return matrix.m42 < -100;
    },
    { timeout: 10000 },
  );
  await mobilePage.waitForTimeout(400);
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

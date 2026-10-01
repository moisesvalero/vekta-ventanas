import fs from "node:fs";
import path from "node:path";
import { fileURLToPath } from "node:url";

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const rootDir = path.resolve(__dirname, "..");

const frontPagePath = path.join(rootDir, "front-page.php");
const rootIndexPath = path.join(rootDir, "index.html");
const publicDir = path.join(rootDir, "public");
const publicIndexPath = path.join(publicDir, "index.html");
const assetsDir = path.join(rootDir, "assets");
const publicAssetsDir = path.join(publicDir, "assets");

let content = fs.readFileSync(frontPagePath, "utf8");

// Eliminar bloque de apertura PHP del inicio
content = content.replace(/^<\?php[\s\S]*?\?>\s*/i, "");

// Reemplazar tags de WordPress por valores estáticos equivalentes
content = content
  .replace(/<\?php\s+bloginfo\(\s*'language'\s*\);\s*\?>/g, "es")
  .replace(/<\?php\s+bloginfo\(\s*'charset'\s*\);\s*\?>/g, "UTF-8")
  .replace(/<\?php\s+bloginfo\(\s*'name'\s*\);\s*\?>/g, "Vekta Systems")
  .replace(
    /<\?php\s+echo\s+esc_url\(\s*get_stylesheet_directory_uri\(\)\s*\.\s*'\/assets\/images\/([^']+)'\s*\);\s*\?>/g,
    "./assets/images/$1",
  )
  .replace(
    /<\?php\s+echo\s+esc_html\(\s*date\(\s*'Y'\s*\)\s*\);\s*\?>/g,
    "2026",
  )
  .replace(/<\?php\s+wp_head\(\);\s*\?>/g, "")
  .replace(/<\?php\s+wp_footer\(\);\s*\?>/g, "");

// Escribir en raíz
fs.writeFileSync(rootIndexPath, content, "utf8");

// Preparar directorio public para Vercel
if (!fs.existsSync(publicDir)) {
  fs.mkdirSync(publicDir, { recursive: true });
}
fs.writeFileSync(publicIndexPath, content, "utf8");

// Copiar carpeta assets completa a public/assets
if (fs.existsSync(assetsDir)) {
  fs.cpSync(assetsDir, publicAssetsDir, { recursive: true });
}

// Copiar favicon.ico a la raíz de public
if (fs.existsSync(path.join(rootDir, "favicon.ico"))) {
  fs.copyFileSync(
    path.join(rootDir, "favicon.ico"),
    path.join(publicDir, "favicon.ico"),
  );
}

console.log(
  "✓ index.html y directorio public/ generados con éxito para despliegue.",
);

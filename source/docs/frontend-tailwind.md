---
title: Frontend con Tailwind
description: Compila CSS con el CLI oficial de Tailwind.
extends: _layouts.documentation
section: content
---

# Frontend con Tailwind

Syverum no impone un stack de frontend específico, pero en los ejemplos se utiliza **Tailwind CSS** por su velocidad y simplicidad.

---

## Estructura de archivos

- **`resources/css/app.css`** → archivo de entrada.  
- **`public/css/output.css`** → archivo generado.

---

## Comandos de compilación

```bash
# desarrollo (modo watch)
npx @tailwindcss/cli -i ./resources/css/app.css -o ./public/css/output.css --watch

# producción (minificado)
npx @tailwindcss/cli -i ./resources/css/app.css -o ./public/css/output.css --minify
```
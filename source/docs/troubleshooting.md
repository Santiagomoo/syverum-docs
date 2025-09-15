---
title: Solución de problemas
description: Errores comunes y cómo resolverlos rápidamente.
extends: _layouts.documentation
section: content
---

# Solución de problemas

## `.env` no carga

- Confirma que el archivo existe en la raíz del proyecto.
- Verifica permisos y el encoding (UTF‑8).

## Ruta 404

- Revisa el método HTTP (GET/POST).
- Comprueba el endpoint exacto en `Route::get('/ruta', ...)`.

## CSS no se compila

- Instala Node y ejecuta `npx @tailwindcss/cli ...`.
- Verifica rutas de entrada/salida.

## Permisos de `storage/`

- Crea `storage/framework/views` si no existe.
- Asegura permisos de escritura para el usuario del servidor.

## Panel no aparece

- Coloca `APP_DEBUG=true` en `.env` y recarga.

Enlaza con: [Variables de entorno](/docs/env-config), [Ruteo](/docs/routing) y [Frontend](/docs/frontend-tailwind).


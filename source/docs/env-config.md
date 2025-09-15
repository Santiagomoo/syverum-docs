---
title: Variables de entorno (.env)
description: Configura tu aplicación por ambiente y valida variables clave.
extends: _layouts.documentation
section: content
---

# Variables de entorno

Resumen: cómo estructurar `.env`, qué claves existen y buenas prácticas.

## Claves más usadas

| Variable        | Descripción                         |
|-----------------|-------------------------------------|
| `APP_NAME`      | Nombre de la app                    |
| `APP_DEBUG`     | Muestra el panel y errores detallados |
| `DB_CONNECTION` | Driver de BD (mysql)                |
| `DB_HOST`       | Host de la base                     |
| `DB_PORT`       | Puerto                              |
| `DB_DATABASE`   | Nombre de la base                   |
| `DB_USERNAME`   | Usuario                             |
| `DB_PASSWORD`   | Contraseña                          |

`EnvValidator` permite leer y validar variables, y determina si `APP_DEBUG` está activo.

## Buenas prácticas

- Ten un `.env.example` con variables semilla.
- No subas `.env` al repositorio.
- Usa valores distintos por ambiente (local, staging, prod).

## Errores comunes

- “Faltan datos de conexión”: revisa todas las claves `DB_*`.
- `APP_DEBUG` en producción: desactívalo para evitar mostrar información sensible.


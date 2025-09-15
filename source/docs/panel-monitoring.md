---
title: Panel de monitoreo
description: Inspecciona rutas, request y base de datos en tiempo de desarrollo.
extends: _layouts.documentation
section: content
---

# Panel de monitoreo

Cuando `APP_DEBUG=true`, SyverumX inyecta un panel de depuración en las vistas. Verás módulos como `routes`, `http` y `database`.

## ¿Cómo funciona?

- `PanelService` registra clases del núcleo.
- `Monitoring::check()` inspecciona propiedades marcadas con el atributo `#[Debuggable]`.
- El panel se inyecta en el HTML renderizado por `Factory::renderView()`.

## Activar/Desactivar

```dotenv
APP_DEBUG=true  # muestra el panel
```

En producción mantén `APP_DEBUG=false`.


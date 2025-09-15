---
title: CLI
description: Usa el installer `syverum` para crear y preparar proyectos.
extends: _layouts.documentation
section: content
---

# CLI

El paquete `syverum/installer` provee un comando global `syverum`.

## Comandos

```bash
# instalar el installer (una vez)
composer global require syverum/installer

# crear un nuevo proyecto
syverum new myapp

# dentro del proyecto
composer run dev   # php -S 127.0.0.1:3000 -t public
npm run dev        # tailwind en modo watch
```
---

## Generar controladores

Puedes crear controladores rápidamente con el comando **`make:controller`**:

```bash

# crear un controlador HomeController en app/Http/Controllers
syverum make:controller HomeController

```


> El controlador generado tendrá la estructura básica para empezar a trabajar.

---

## Generar middlewares

De igual manera, puedes generar middlewares con **`make:middleware`**:
```bash

# crear un middleware AuthMiddleware en app/Http/Middleware
syverum make:middleware AuthMiddleware

```

> El middleware creado implementa la interfaz MiddlewareInterface, listo para personalizar.

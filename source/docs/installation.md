---
title: Instalación
description: "Inicia un proyecto con el installer y arráncalo con un solo comando."
extends: _layouts.documentation
section: content
---

# Instalación

Para iniciar un proyecto, sigue estos pasos básicos:

```bash
# Instala el instalador de Syverum
composer global require syverum/installer

# Crea un nuevo proyecto
syverum new mi-app

# Entra al proyecto
cd mi-app

# Arranca el entorno de desarrollo
composer run dev
```

# Notas rápidas

- **`composer run dev`**: prepara y levanta el backend y frontend (Tailwind) automáticamente.  
  > No necesitas ejecutar `composer install` ni `npm install`.

- La aplicación se ejecuta en **http://127.0.0.1:3000**.  
  > Para cambiar el puerto, edita el archivo `composer.json` y ajusta el script `dev`.

---

## ¿Qué hace cada comando?

- **`composer global require syverum/installer`**  
  Instala globalmente el instalador de Syverum y habilita el comando `syverum` en tu terminal.

- **`syverum new mi-app`**  
  Crea la estructura base del proyecto junto con los archivos necesarios para comenzar.

- **`cd mi-app`**  
  Entra al directorio del proyecto recién creado.

- **`composer run dev`**  
  Instala y prepara dependencias, arranca el entorno de desarrollo, levanta el backend y compila el frontend con **Tailwind** y recarga en caliente.


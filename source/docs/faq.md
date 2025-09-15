---
title: Preguntas frecuentes
description: Respuestas rápidas a dudas comunes sobre Syverum.
extends: _layouts.documentation
section: content
---

# Preguntas frecuentes (FAQ)

---

## ¿Syverum es para APIs o vistas?

**Ambos.**  
El ruteo y los controladores funcionan tanto para HTML como para JSON.  
El soporte de vistas tipo Blade es opcional.

---

## ¿Qué PSR sigue?

La organización del código se alinea con:

- **PSR-4** → Autoload de clases.  
- **PSR-7 / PSR-15** → Conceptos de HTTP y middleware.

---

## ¿Puedo cambiar Blade por otro motor de vistas?

Sí.  
Por defecto se usa **`jenssegers/blade`**, pero puedes adaptar la `Factory` para conectar otro motor de plantillas.

---

## ¿Existe CLI propia?

Sí.  
El installer **`syverum`** automatiza la creación y bootstrap de proyectos, además de ofrecer comandos para generar controladores y middlewares.

---
title: "¿Qué es SyverumX?"
description: "Introducción rápida al framework, motivación y casos de uso."
extends: _layouts.documentation
section: content
---

# Introducción

SyverumX es un **framework PHP liviano y modular** que expone una interfaz MVC mínima: **ruteo expresivo**, **controladores sencillos** y **vistas tipo Blade**.  
El núcleo está **desacoplado**; cada parte vive en módulos como `Routing`, `Http`, `Support`, `Database` y `Panel`.

> **¿Qué ganarás?**  
> Comprender **qué problema resuelve**, **en qué se diferencia** de un full-stack y **qué piezas usarás** en tus primeros minutos.


## Diferencias clave (de un vistazo)

| Enfoque        | **SyverumX**                                    | Full-stack tradicional          |
|----------------|------------------------------------------------|--------------------------------|
| Peso inicial   | **Ligero:** solo módulos esenciales             | Completo desde el inicio        |
| Arquitectura   | **MVC mínimo** + dominio libre (Clean/Hexagonal)| MVC + múltiples capas acopladas |
| Estándares     | **PSR-4/PSR-7/PSR-11 friendly**                 | Depende del framework           |
| DI/IoC         | **Contenedor simple** vía servicios             | Contenedor avanzado             |
| Extensibilidad | **Módulos plug-and-play**                       | Paquetes y providers más pesados|


> **Idea clave:** empieza pequeño, crece por módulos. No hay ORM obligatorio, ni capas pesadas por defecto.


## Requisitos

- **PHP 8.x**
- **Composer**
- **Node.js** (para Tailwind y assets)
- **Servidor local** (XAMPP/Apache) o **PHP CLI**

> **Tip:** Si vas a compilar CSS/JS, ten `npm` disponible

## Primer vistazo 

Una vez creado el proyecto, encontrarás carpetas familiares: `app/`, `resources/`, `routes/`, `public/`, `storage/` y `core/`. Echa un vistazo a la estructura completa en la siguiente sección. Siguiente paso: lee Instalación y luego Estructura del proyecto.


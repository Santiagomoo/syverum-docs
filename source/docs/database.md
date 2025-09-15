---
title: Base de datos
description: Conéctate vía PDO y ejecuta consultas con helpers.
extends: _layouts.documentation
section: content
---

# Base de datos

Syverum expone una capa mínima sobre PDO para conexión y consultas.

## Configuración

`DatabaseService` lee `.env` y llama a `Connection::configure()`:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=syverum
DB_USERNAME=root
DB_PASSWORD=
```

## Consultas

```php
use Core\Database\Database;

$users = Database::query('SELECT * FROM users WHERE active = ?', [1]);

Database::execute('INSERT INTO users (name) VALUES (?)', ['Ana']);
```

## Depuración

`Connection::getDebugInfo()` expone estado de conexión cuando el panel está activo.


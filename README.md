# Tienda de Mangas (PHP Puro)

Este proyecto es una tienda online de mangas llamado **Mundo Manga** desarrollada en **PHP puro** con conexión a **MySQL**.  
Está pensado para correr de manera local, ya sea usando **XAMPP** (htdocs) o **Laragon**.

---

## Requisitos

- PHP 8+  
- MySQL 5.7+ o MariaDB  
- Servidor local como:
  - [XAMPP](https://www.apachefriends.org/)  
  - [Laragon](https://laragon.org/)  

---

## Instalación y configuración

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/FranciscoVola/Tienda-Mangas-PHP-MYSQL-local.git

2. **Mover el proyecto a la carpeta del servidor local**

    Si usás **XAMPP**: copiar dentro de la carpeta htdocs/

    Si usás Laragon: copiar dentro de la carpeta www/

3. **Configurar la base de datos**

    Importar el archivo .sql que está incluido

    Crear una base de datos en MySQL (ejemplo: mangas_db) (el archivo se llama dw3_vola_francisco.sql)

    Importar el archivo desde phpMyAdmin o por consola:
    **mysql -u root -p mangas_db < dw3_vola_francisco.sql**

4. **Configurar la conexión a la base de datos**

    En el archivo de configuración (config/database.php) editar los datos:

    $host = "localhost";
    $dbname = "dw3_vola_francisco.sql";
    $username = "root";
    $password = "";

5. **Ejecucion**

    Si usás XAMPP, abrí en el navegador:

    **http://localhost/nombre_de_tu_carpeta**

    Si usás Laragon, accedé a:

    **http://nombre_de_tu_carpeta.test**

 ---

 **Funcionalidades principales**

    Registro e inicio de sesión de usuarios

    Listado y detalle de mangas

    Carrito de compras (sin pasarela de pago)

    Panel de administración para gestión de productos y usuarios

**Notas**

    El proyecto está en desarrollo local (no productivo).

    No se incluye pasarela de pago real.

    Puede ampliarse fácilmente con frameworks como Laravel en el futuro.   

---

**Autor**
    Proyecto desarrollado como práctica de programación en PHP + MySQL.
    
    Francisco Vola
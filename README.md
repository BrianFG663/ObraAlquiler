🏗️ ObraAlquiler
ObraAlquiler es una aplicación web desarrollada con el framework Laravel, diseñada para gestionar proyectos de construcción y el alquiler de maquinaria. Esta herramienta facilita el control y seguimiento de obras, equipos y recursos, optimizando la administración en empresas del sector de la construcción.

✨ Funcionalidades principales
-Gestión de obras: Creación, edición y seguimiento de proyectos de construcción.
-Administración de maquinaria: Registro y control de equipos disponibles para alquiler.
-Asignación de recursos: Vinculación de maquinaria a obras específicas.
-Control de alquileres: Seguimiento de períodos de alquiler, costos y disponibilidad de equipos.
-Reportes: Generación de informes detallados sobre obras y utilización de maquinaria.

⚙️ Tecnologías necesarias
-Backend: Laravel Framework 12.12.0
-Composer
-PHP 8.3.19 
-Composer 2.8.6
-node 22.13.0
-git version 2.49.0
-Frontend: Blade, Tailwind CSS, Vite
-Base de datos: MySQL
-Entorno de desarrollo: Laragon


🚀 Instalación:

• descargar el repositorio de git-hub y localizarlo dentro de la carpeta laragon/www.
• Abrir laragon
• Entrar a la terminal y copiar el comando: cd ObraAlquiler
• copiar los siguientes comandos e iniciarlos uno a uno:
• composer install
• cp .env.example .env
• php artisan key:generate
• php artisan migrate
• php artisan migrate --seed
• php artisan key:generate
• npm install

🚀 Iniciar el proyecto:
• Iniciar laragon.
• entrar a la terminar y ejecutar el siguiente comando:
• npm run dev (no cerrar la terminal)
• abrir el proyecto dentro de laragon en menu->www->ObrAlquiler.
• Iniciar sesion.

👤 Usuario:
• E-MAIL: briangonzaz305@gmail.com
• CLAVE: brian

📧Opcion mail de maquinaria que requiere mantenimiento:
• En la carpeta descargada abrir el archivo .env, editar la parte de  MAIL y cambiar por:

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=briangonzaz305@gmail.com
MAIL_PASSWORD=wtcpyyrlimxswjpc
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=ObrAlquiler@gmail.com
MAIL_FROM_NAME="Sistema de Mantenimiento"

• Ahora dentro del mismo proyecto entrar a app/listeners/EnviarCorreoMantenimiento:
• Editar esta linea :
• Mail::to('pon tu correo aqui')->send(new MantenimientoMaquina($event->maquina));


• En una terminal dentro del proyecto ejecutar:
• php artisan config:cache
• php artisan config:clear

• ahora al finzalizar una asignacion si la maquinaria requiere mantenimiento te llegara un mail.










🏗️ ObraAlquiler
ObraAlquiler es una aplicación web desarrollada con el framework Laravel, diseñada para gestionar proyectos de construcción y el alquiler de maquinaria. Esta herramienta facilita el control y seguimiento de obras, equipos y recursos, optimizando la administración en empresas del sector de la construcción. <br><br>

✨ Funcionalidades principales:<br>
-Gestión de obras: Creación, edición y seguimiento de proyectos de construcción.<br>
-Administración de maquinaria: Registro y control de equipos disponibles para alquiler.<br>
-Asignación de recursos: Vinculación de maquinaria a obras específicas.<br>
-Control de alquileres: Seguimiento de períodos de alquiler, costos y disponibilidad de equipos.<br>
-Reportes: Generación de informes detallados sobre obras y utilización de maquinaria.<br>
<br><br>
⚙️ Tecnologías necesarias:<br>
-Backend: Laravel Framework 12.12.0<br>
-Composer<br>
-PHP 8.3.19 <br>
-Composer 2.8.6<br>
-node 22.13.0<br>
-git version 2.49.0<br>
-Frontend: Blade, Tailwind CSS, Vite<br>
-Base de datos: MySQL<br>
-Entorno de desarrollo: Laragon<br>
<br><br>

🚀 Instalación:<br>

• descargar el repositorio de git-hub y localizarlo dentro de la carpeta laragon/www.<br>
• Abrir laragon<br>
• Entrar a la terminal y copiar el comando: cd ObraAlquiler<br>
• copiar los siguientes comandos e iniciarlos uno a uno:<br>
• composer install<br>
• cp .env.example .env<br>
• php artisan key:generate<br>
• php artisan migrate<br>
• php artisan migrate --seed<br>
• php artisan key:generate<br>
• npm install<br><br>

🚀 Iniciar el proyecto:<br>
• Iniciar laragon.<br>
• entrar a la terminar y ejecutar el siguiente comando:<br>
• npm run dev (no cerrar la terminal)<br>
• abrir el proyecto dentro de laragon en menu->www->ObrAlquiler.<br>
• Iniciar sesion.<br><br>

👤 Usuario:<br>
• E-MAIL: briangonzaz305@gmail.com<br>
• CLAVE: brian<br><br>

📧Opcion mail de maquinaria que requiere mantenimiento:<br>
• En la carpeta descargada abrir el archivo .env, editar la parte de  MAIL y cambiar por:<br><br><br>

MAIL_MAILER=smtp<br>
MAIL_HOST=smtp.gmail.com<br>
MAIL_PORT=587<br>
MAIL_USERNAME=briangonzaz305@gmail.com<br>
MAIL_PASSWORD=wtcpyyrlimxswjpc<br>
MAIL_ENCRYPTION=tls<br>
MAIL_FROM_ADDRESS=ObrAlquiler@gmail.com<br>
MAIL_FROM_NAME="Sistema de Mantenimiento"<br><br>

• Ahora dentro del mismo proyecto entrar a app/listeners/EnviarCorreoMantenimiento:<br>
• Editar esta linea :<br>
• Mail::to('pon tu correo aqui')->send(new MantenimientoMaquina($event->maquina));<br>

<br><br>
• En una terminal dentro del proyecto ejecutar:<br>
• php artisan config:cache<br>
• php artisan config:clear<br>
<br><br>
• ahora al finzalizar una asignacion si la maquinaria requiere mantenimiento te llegara un mail.










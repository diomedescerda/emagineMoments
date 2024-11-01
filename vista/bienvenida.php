<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="./vista/styles/bienvenida.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <?php include('base/header.php'); ?>
    <div class="page">
        <section id="intro">
            <h1>Imagina el momento, nosotros lo hacemos realidad.</h1>
            <p>E'magine Events es una plataforma que conecta a profesionales de eventos, como cantantes y animadores,
                para crear momentos inolvidables, adaptados a cada ocasión.</p>
            <a class="button" href="">Browse</a>
        </section>
        <section id="artists">
            <br>
            <h3>Artistas más relevantes</h3>
            <div class="card-list">
                <a href="#" class="card-item">
                    <img src="./vista/img/example1.jpg" alt="Card Image">
                    <span class="banda">Banda</span>
                    <h3>The Beatles</h3>
                    <div class="arrow">
                        <i class="fas fa-arrow-right card-icon"></i>
                    </div>
                </a>
                <a href="#" class="card-item">
                    <img src="./vista/img/example1.jpg" alt="Card Image">
                    <span class="solista">Solista</span>
                    <h3>The Beatles</h3>
                    <div class="arrow">
                        <i class="fas fa-arrow-right card-icon"></i>
                    </div>
                </a>
                <a href="#" class="card-item">
                    <img src="./vista/img/example1.jpg" alt="Card Image">
                    <span class="instrumentista">Instrumentista</span>
                    <h3>The Beatles</h3>
                    <div class="arrow">
                        <i class="fas fa-arrow-right card-icon"></i>
                    </div>
                </a>
                <a href="#" class="card-item">
                    <img src="./vista/img/example1.jpg" alt="Card Image">
                    <span class="solista">Solista</span>
                    <h3>The Beatles</h3>
                    <div class="arrow">
                        <i class="fas fa-arrow-right card-icon"></i>
                    </div>
                </a>
            </div>
        </section>
        <section class="info-section">
            <div class="info-container">
                <h1>Más Info</h1>

                <div class="intro">
                    <p><strong>¿Cómo funciona nuestra plataforma de gestión de eventos?</strong></p>
                    <p>
                        Nuestra plataforma está diseñada para facilitar la planificación, organización y gestión de
                        eventos de cualquier tipo, ya sean conferencias, bodas, fiestas corporativas o festivales.
                    </p>
                </div>

                <div class="features">
                    <h2>Características principales:</h2>
                    <ul>
                        <li><strong>Planificación simplificada:</strong> Organiza facilmente tu evento, dejanos la
                            gestion de los musicos, quienes mejoraran el ambiente.</li>
                        <li><strong>Registro de asistentes:</strong> Sistema de registro personalizado, para que así
                            puedas comunicarte facilmente con proveedores para tu evento.</li>
                        <li><strong>Comunicación centralizada:</strong> Notificaciones automáticas por correo
                            electrónico para mantenerte informado.</li>
                        <li><strong>Panel de control intuitivo:</strong> Gestiona el evento desde una interfaz fácil de
                            usar.</li>
                        <li><strong>Colaboración eficiente:</strong> Comparte el acceso con tu equipo o colaboradores
                            con permisos personalizados.</li>
                        <li><strong>Gestión de presupuestos:</strong> Controla los gastos y recursos para mantener tu
                            evento dentro del presupuesto planeado.</li>
                    </ul>
                </div>

                <div class="target">
                    <h2>¿A quién está dirigido?</h2>
                    <p>
                        Ideal para organizadores profesionales de eventos, empresas que gestionan eventos corporativos,
                        planificadores de bodas y cualquier persona que busque una solución integral para organizar
                        eventos de manera eficiente.
                    </p>
                </div>

                <div class="reasons">
                    <h2>¿Por qué elegirnos?</h2>
                    <ul>
                        <li><strong>Soporte 24/7:</strong> Estamos disponibles para ayudarte ante cualquier duda o
                            inconveniente.</li>
                        <li><strong>Solución adaptable:</strong> Nuestra plataforma se ajusta a las necesidades de
                            eventos pequeños y grandes.</li>
                        <li><strong>Privacidad y seguridad:</strong> Nos tomamos la seguridad de los datos en serio y
                            protegemos toda tu información.</li>
                    </ul>
                </div>

                <div class="contact">
                    <h2>¿Tienes dudas?</h2>
                    <p>
                        Si necesitas más información o tienes alguna duda específica, no dudes en contactarnos.
                        Estaremos encantados de guiarte en cada paso del proceso de organización.
                    </p>
                </div>
            </div>
        </section>

        <!--ToDo
            <section id="categories">
            </section>
-->
    </div>

    <?php include('base/footer.php'); ?>
    <script src="./js/scroll_infinito.js"></script>
</body>

</html>
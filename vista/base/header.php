<header>
    <nav>
        <ul>
            <li>
                <a href="index.php"> <img src="./vista/img/logo.png" alt="e'magine events logo"> </a>
            </li>
            <li>
                <a href="">
                    <p>Descubrir</p>
                </a>
            </li>
            <li>
                <a href="">
                    <a href="index.php?action=mostrarLaberinto"><p>Laberinto</p></a>
                </a>
            </li>
            <li>
                <a href="">
                    <a href="index.php?action=consultarServicios"><p>Servicios</p></a>
                </a>
            </li>
            <li>
                <a href="">
                    <a href="index.php?action=listarContratos"><p>Contratos</p></a>
                </a>
            </li>
            <li>
                <a href="">
                    <p>Sobre Nosotros</p>
                </a>
            </li>
            <?php
            if (!isset($_SESSION['usuario'])) {
                echo "<li><a href=\"index.php?action=mostrarLogin\"> <p> Iniciar Sesión </p></a></li>";
                echo "<li> <a href=\"index.php?action=mostrarRegistro\"> <p class=\"button\">Registrarse</p> </a></li>";
            } else {
                $nombre = htmlspecialchars($_SESSION['usuario']['PrimerNombre']);
                echo "<li><a href=\"index.php?action=perfil\"> <p>$nombre</p></a></li>";
                echo " <li> <a href=\"index.php?action=cerrarSesion\">Cerrar Sesión</a> </li>";
            } ?>
        </ul>
    </nav>
</header>
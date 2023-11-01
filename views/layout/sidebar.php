<!-- Menu -->
<section id="menu">

    <!-- Links -->
    <section>
        <ul class="links">
            <li>
                <a href="<?=base_url?>inicio/inicio">
                    <h3>¿Quiénes somos?</h3>
                    <p>Conoce nuestro club, nuestra visión y misión. </p>
                </a>
            </li>
            <li>
                <a href="<?=base_url?>inicio/salonFama">
                    <h3>Miembros CNCC</h3>
                    <p>Un espacio dedicado a nuestros miembros de la cominidad que han vuelto realidad CNCC.</p>
                </a>
            </li>

            <li>
                <a href="<?=base_url?>torneo/tablaRendimiento">
                    <h3>Tabla de rendimiento</h3>
                    <p>Consulta los puntos realizados este mes u otros para nuestro club.</p>
                </a>
            </li>
            <?php if (isset($_SESSION["administrador"]) && $_SESSION["administrador"]==true): ?>
            <li>
                <a href="<?=base_url?>administracion/index">
                    <h3>Administración</h3>
                    <p>Administrador aquí encontraras las herramientas necesarias para regular el equipo y la pagina web.</p>
                </a>
            </li>
            <?php endif; ?>
            <li>
                <a href="<?=base_url?>noticias/inicio">
                    <h3>Noticias</h3>
                    <p>Actividades, proximos torneos, clases y más.</p>
                </a>
            </li>
            <?php if (!isset($_SESSION["identidad"])): ?>
            <li>
                <a href="<?=base_url?>usuario/login">
                    <h3>Ingresar</h3>
                    <p>Si ya eres parte de <strong>cncc</strong> ingresa a tu cuenta.
                    </p>
                </a>
            </li>
            <?php else: ?>
            <li>
                <a href="<?=base_url?>usuario/index">
                    <h3><?php echo $_SESSION["identidad"] -> username; ?></h3>
                    <p>Revisa tu perfil
                    </p>
                </a>
            </li>  
            <?php endif; ?>
        </ul>
    </section>

    <!-- Actions -->
    <?php if (isset($_SESSION["identidad"])): ?>
    <section>
        <ul class="actions stacked">
            <li><a href="<?=base_url?>usuario/cerrarSesion" class="button large fit">Cerrar sesión</a></li>
        </ul>
    </section>
    <?php endif; ?>
</section>
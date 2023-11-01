<div id="main">
    <article class="post">
        <h2 align="center">Ingresa a CNCC</h2>
        <p align="justify">
            Tu cuenta de CNCC te da acceso a la personalización de tu perfil, creación de blogs y compartir lo que gustes con nuestra comunidad.
        </p>
        <form action ="<?=base_url?>usuario/login" method="POST">
            <input type="text" name="username" placeholder="Jugador" required/>
            <br>
            <input type="password" name="password" placeholder="contraseña" required/>
            <br>
            <div align="center">
                <input  type="submit" value="Ingresar a la cuenta" />    
            </div>
            <br>
        </form>
        <p align="justify">
            Sí es la primera vez que ingresas sigue los siguientes pasos.
        </p>
        <section>
            <ul class="actions stacked">
                <li><a href="<?=base_url?>usuario/ingresar" class="button large fit">Solicitar cuenta</a></li>
            </ul>
        </section>
    </article>
</div>
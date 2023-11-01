<div id="main">
    <article class="post">
        <h2 align="center">Cambiar contraseña</h2>
        <p align="justify"> Bienvenido <?php echo $_SESSION["identidad"]; ?> deberás de crear tu primera contraseña y volver a ingresar con ella.</p>
        <p align="justify">
            Recuerda como consejo general crear una contraseña que contenga mayusculas y minusculas, así como numeros.
        </p>
        <form action ="<?=base_url?>usuario/cambiarPassword" method="POST">
            <input type="password" name="password1" placeholder="Nueva contraseña" required/>
            <br>
            <input type="password" name="password2" placeholder="Repite tu contraseña" required/>
            <br>
            <div align="center">
                <input  type="submit" value="Cambia contraseña" />    
            </div>
            <br>
        </form>
    </article>
</div>
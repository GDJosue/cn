<div id="main">
    <article class="post">
        <h2 align="center">Caballo Negro Chess Club te da la bienvenida</h2>
        <p align="center">El jugador cuyo usuario es:<strong><?php echo $username;?></strong></p>
        <p>
            <?php if($resultado)
            {
                echo "Se mandara a Lichess un mensaje con tu primera contraseña";
                }
                else{
                echo "Usuario no encontrado, recuerda jugar al menos un torneo con CNCC para obtener acceso a tu cuenta";
                }
            ?>
        </p>
    </article>
</div>
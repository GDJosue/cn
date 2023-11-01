<div id="main">
    <article class="post">
        <h1 align="center">Miembros fundadores de Caballo Negro Chess Club</h1>
        <p align="justify">
            Sección dedicada a nuestros miembros se que han unido este primer año como club oficial a 
            <strong>Caballo Negro Chess Club.</strong>
        </p>
        <div class="row gtr-uniform">
            <div class="col-4 col-12-small">
                <div class="primerLugar">
                    <span class="image fit"><img src="<?=base_url?>images/brandon.jpg" alt="" class="bordeFoto"/></span>
                    <h2 align="center" class="tituloBlanco">
                        Brandon Alexis Ruiz Uriostegui
                    </h2>
                    <p align="center">Por haber obtenido<strong class="strongBlanco"> El primer lugar <br> en el torneo afiliación Caballo Negro Chess Club</strong></p>
                </div>
            </div>
            <div class="col-4 col-12-small">
                <div class="segundoLugar">
                    <span class="image fit"><img src="<?=base_url?>images/edgar.jpg" alt="" class="bordeFoto"/></span>
                    <h2 align="center" class="tituloBlanco">
                        Rodriguez Pérez Edgar Osvaldo
                    </h2>
                    <p align="center">Por haber obtenido<strong class="strongBlanco"> El segundo lugar <br> en el torneo afiliación Caballo Negro Chess Club</strong></p>
                </div>
            </div>
            <div class="col-4 col-12-small">
                <div class="tercerLugar">
                    <span class="image fit"><img src="<?=base_url?>images/Jesus.jpg" alt="" class="bordeFoto"/></span>
                    <h2 align="center" class="tituloBlanco">
                        Jesús Fernández Mejia
                    </h2>
                    <p align="center">Por haber obtenido<strong class="strongBlanco"> El segundo lugar <br> en el torneo afiliación Caballo Negro Chess Club</strong></p>
                </div>
            </div>
        </div>
        <div>
        <br>
        <h2 align="center">Miembros del club presencial</h2>
        <p align="justify">Caballo Negro Chess Club existe gracias a sus miembros, que a continuación se encuentran todos y cada uno, ¡Vamos Caballos!</p>
            <table>
                <tr>
                    <th>
                        <p align="center">Nombre del jugador</p>
                    </th>
                    <th>
                        <p align="center">ID FIDE</p>
                    </th>
                </tr>
            <?php 
                $aux = 1;
                foreach($usuario as $jugador)
                {
                echo "
                    <tr>
                         <td>
                        <a href='https://ratings.fide.com/profile/".$jugador["idFide"]."'>
                            <p align='center'> ". $aux . " - " . $jugador["nombrePf"]."</p>
                        </td>
                        <td>
                        <a href='https://ratings.fide.com/profile/".$jugador["idFide"]."'>
                            <p align='center'> " .$jugador["idFide"]."</p>
                        </td>
                    </tr>
                    ";
                $aux += 1; 
                }?>
            </table>
        </div>
    </article>
</div>
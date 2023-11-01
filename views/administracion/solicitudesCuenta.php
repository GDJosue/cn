<div id="main">
    <article class="post">
        <h2 align="center">Solicitudes de cuenta</h2>
        <p align="justify">
            A continuación encontraras las solicitudes de cuenta de nuestros jugadores, pulsando el nombre de ellos seras redirigido a Lichess 
            donde mandaras el texto adjunto a su nombre, y marcar al usuario como "mensaje enviado".
        </p>
        <div class="table-wrapper">
            <table>
                <thead>
					<tr align="center">
						<th style="text-align: center">Usuario</th>
						<th style="text-align: center">Codigo a mandar</th>
						<th style="text-align: center">Mandar mensaje</th>
					</tr>
				</thead>
                <tbody>
                    <?php
                        foreach($solinc as $solicitudes)
                        {
                            echo "
                            <tr>
                                <td align='center'>
                                    ".$solicitudes['username']."
                                </td>
                                <td align='center'>
                                    ".$solicitudes['codigoCreacion']."
                                </td>
                                <td align='center'> 
                                <p><a href='https://lichess.org/inbox/".$solicitudes['username']."'>Enviar mensaje</a>.</p>
                                </td>
                            </tr>
                            ";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </article>
</div>